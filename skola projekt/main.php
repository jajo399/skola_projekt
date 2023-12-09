<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JoeBLog landing page.">
    <meta name="author" content="Devcrud">
    <title>JoeBLog | Free Bootstrap 4.3.x template</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + JoeBLog main styles -->
	<link rel="stylesheet" href="assets/css/joeblog.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Second Navigation -->
    <?php include('header.php') ?>
    <!-- End Of Page Second Navigation -->
    
    <!-- page-header -->
    <header class="page-header"></header>
    <!-- end of page header -->

    <div class="container">
        <hr>
        <div class="page-container">
            <div class="page-content">

                <div class="row">
                <?php
                /*
                 * Blog karty
                 */
                $counter = 0;
                foreach ($blogPosts as $post) {
                    if ($counter != 0 && $counter % 2 == 0) {
                        echo "<div class=\"row\">";
                        echo "</div>";
                    }

                    $oldDate = strtotime($post['create_time']);
                    $formatedDate = date('d-m-Y', $oldDate);

                    echo "
                        <div class=\"col-lg-6\">
                            <div class=\"card text-center mb-5\">
                                <div class=\"card-header p-0\">                                   
                                    <div class=\"blog-media\">
                                        <img src=\"/uploads/{$post['image_file_name']}\" alt=\"\" class=\"w-100\">    
                                    </div>  
                                </div>
                                <div class=\"card-body px-0\">
                                    <h5 class=\"card-title mb-2\">{$post['title']}</h5>    
                                    <small class=\"small text-muted\">
                                        {$formatedDate} 
                                    </small>
                                    <p class=\"my-2\">{$post['description']}</p>
                                </div>
                                
                                <div class=\"card-footer p-0 text-center\">
                                    <a href=\"/blog/{$post['id']}\" class=\"btn btn-outline-dark btn-sm\">Precitat</a>
                                </div>                  
                            </div>
                        </div>
                    ";

                    $counter++;
                }
                ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="page-sidebar text-center">
                <h6 class="sidebar-title section-title mb-4 mt-3">O mne</h6>
                <?php
                echo "<img src=\"/uploads/{$imageFileName}\" alt=\"\" class=\"circle-100 mb-3\">";
                echo "<p>{$description}</p>";
                ?>
            </div>
        </div>
    </div>

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
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- JoeBLog js -->
    <script src="assets/js/joeblog.js"></script>

</body>
</html>