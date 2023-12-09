<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JoeBLog landing page.">
    <meta name="author" content="Devcrud">
    <title>JoeBLog | Free Bootstrap 4.3.x template</title>
    <!-- font icons -->
    <link rel="stylesheet" href="/assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + JoeBLog main styles -->
	<link rel="stylesheet" href="/assets/css/joeblog.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Page Second Navigation -->
    <?php include('header.php') ?>
    <!-- End Of Page Second Navigation -->

    <!-- Page Header -->

    <!-- End Of Page Header -->

    <section class="container">
        <div class="page-container">
            <div class="page-content">
                <div class="card">
                    <div class="card-header pt-0">
                        <?php echo "
                            <h3 class=\"card-title mb-4\">{$blogPost['title']}</h3>
                        ";?>

                        <div class="blog-media mb-4">
                            <?php echo "
                                <img src=\"/uploads/{$blogPost['image_file_name']}\" alt=\"\" class=\"w-100\">
                            ";?>
                        </div>  
                        <small class="small text-muted">
                            <a href="#" class="text-muted">Pridal Admin</a>
                            <span class="px-2">·</span>
                            <?php echo "<span>{$timeAdd}</span>"; ?>
                        </small>
                    </div>
                    <div class="card-body border-top">
                        <?php echo $blogPost['content'];?>
                    </div>
                    
                    <div class="card-footer">
                         <h6 class="mt-5 mb-3 text-center"><a href="#" class="text-dark">Komentare</a></h6>
                        <hr>
                        <?php

                        $commentCookie = "";
                        if (isset($_COOKIE['commentCookie'])) {
                            $commentCookie = $_COOKIE['commentCookie'];
                        }

                        foreach ($comments as $comment) {
                            if ($comment['cookie'] == $commentCookie) {                                echo "
                                <div class=\"media mt-5\">
                                    <div class=\"media-body\">
                                        <h6 class=\"mt-0\">{$comment['name']}</h6>
                                        <p>{$comment['comment']}</p>
                                        <a style='color:red' href=\"/comment/delete/{$comment['id']}/{$postId}\">odstranit komentar</a>
                                    </div>
                                </div>
                                ";
                            } else {
                                echo "
                                <div class=\"media mt-5\">
                                    <div class=\"media-body\">
                                        <h6 class=\"mt-0\">{$comment['name']}</h6>
                                        <p>{$comment['comment']}</p>
                                    </div>
                                </div>
                                ";
                            }

                        }

                        ?>

                        <h6 class="mt-5 mb-3 text-center"><a href="#" class="text-dark">Napis Svoj Komentar</a></h6>
                        <hr>
                        <form id="formBody" action="/comment/add" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-12 form-group">
                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Napis svoj komentar sem"></textarea>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Meno">
                                </div>
                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-block">Pridat Komentar</button>
                                </div>
                            </div>
                            <?php
                            echo "<input type=\"hidden\" id=\"postId\" name=\"postId\" value=\"{$postId}\">";
                            ?>
                        </form>
                    </div>                  
                </div>
            </div>
        </div>
    </section>

    <!-- Page Footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-3 text-center text-md-left mb-3 mb-md-0">
                    <img src="assets/imgs/logo.svg" alt="" class="logo">
                </div>
            </div>
            <p class="border-top mb-0 mt-4 pt-3 small">Pouzita tema - JoeBlog Created <a href="https://www.devcrud.com" class="text-muted font-weight-bold" target="_blank">DevCrud.</a> - Projekt Jakub Dobrovodsky</p>
        </div>
    </footer>
    <!-- End of Page Footer -->

	<!-- core  -->
    <script src="/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- JoeBLog js -->
    <script src="/assets/js/joeblog.js"></script>

</body>
</html>
