<?php

$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

require_once __DIR__ . '/vendor/bramus/router/src/Bramus/Router/Router.php';

$router = new \Bramus\Router\Router();

require_once __DIR__ . '/vendor/sergeytsalkov/meekrodb/db.class.php';

DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'skola_projekt';
DB::$host = 'localhost';
DB::get();

function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if(file_exists($filePath)){
        extract($variables);

        ob_start();

        include $filePath;

        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;

}

function redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}


$router->get('/', function () {
    $blogPosts = DB::query("SELECT * FROM blog_post");
    $userProfile = DB::queryFirstRow("SELECT * FROM admin_users WHERE username=%s", 'admin');

    includeWithVariables('main.php', array(
        'blogPosts' => $blogPosts,
        'description' => $userProfile['description'],
        'imageFileName' => $userProfile['image_file_name']
    ));
});


function verifyLogin() {
    session_start();

    if (isset($_SESSION['login_user']) == false) {
        redirect("/admin/login");
    }

}

$router->mount('/admin', function () use ($router) {
    $router->get('/blog-create', function () {
        verifyLogin();

        includeWithVariables('blogCreate.php', array());
    });

    $router->get('/blog-edit/(\d+)', function ($id) {
        verifyLogin();

        $blogPost = DB::queryFirstRow("SELECT * FROM blog_post WHERE id=%i", $id);

        includeWithVariables('blogCreate.php', array(
            'title' => $blogPost['title'],
            'description' => $blogPost['description'],
            'content' => $blogPost['content'],
            'editId' => $id
        ));
    });
    $router->get('/blog-delete/(\d+)', function ($id) {
        verifyLogin();

        DB::delete('blog_post', 'id=%i', $id);

        redirect("/");
    });
    $router->post('/blogPostAdd', function () {
        verifyLogin();

        includeWithVariables('blogPostAdd.php', array());
    });

    $router->get('/profile-edit', function () {
        verifyLogin();

        $profile = DB::queryFirstRow("SELECT * FROM admin_users WHERE id=%i", 1);

        includeWithVariables('profileInfo.php', array('description' => $profile['description']));
    });
    $router->post('/profile-edit', function () {
        verifyLogin();

        $userProfile = DB::queryFirstRow("SELECT * FROM admin_users WHERE username=%s", 'admin');

        includeWithVariables('profileInfoUpdate.php', array('description' => $userProfile['description']));
    });


    $router->get('/login', function () {
        includeWithVariables('login.php', array());
    });
    $router->post('/login', function () {
        includeWithVariables('loginPost.php', array());
    });

    $router->get('/logout', function () {
        includeWithVariables('logout.php', array());
    });
});


$router->get('/blog/(\d+)', function ($id) {
    $blogPost = DB::query("SELECT * FROM blog_post WHERE id = %i", $id);
    $comments = DB::query("SELECT * FROM comments WHERE post_id = %i", $id);

    $orgDate = $blogPost[0]['create_time'];
    $newDate = date("d-m-Y", strtotime($orgDate));

    includeWithVariables('post.php', array(
        'blogPost' => $blogPost[0],
        'timeAdd' => $newDate,
        'postId' => $id,
        'comments' => $comments
    ));

});
$router->post('/comment/add', function () {
    includeWithVariables('commentAdd.php', array());
});
$router->get('/comment/delete/(\d+)/(\d+)', function ($id, $blogId) {
    $comment = DB::queryFirstRow("SELECT * FROM comments WHERE id=%i", $id);
    if (isset($_COOKIE['commentCookie'])) {
        if ($_COOKIE['commentCookie'] == $comment['cookie']) {
            DB::delete('comments', 'id=%i', $id);
        }
    }

    redirect("/blog/{$blogId}");
});

$router->run();