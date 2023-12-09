<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <a href="/admin/logout"><h1>ODHLASIT SA</h1></a>
    <a href="/admin/blog-create"><h1>VYTVORIT BLOG</h1></a>
    <a href="/"><h1>HLAVNA STRANKA</h1></a>

    <form id="formBody" action="/admin/profile-edit" method="post" enctype="multipart/form-data">
        <p class="mb-0 mt-4">Popis</p>
        <textarea id="description" name="description" rows="4" cols="50">

        </textarea>

        <p class="mb-0 mt-4">Obrazok</p>
        <input type="file" name="fileToUpload" id="fileToUpload">

        <input type="submit" value="Odoslat" name="submit">
    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        var descriptionText = "<?php echo $description; ?>";
        $('#description').val(descriptionText);
    </script>
</body>
</html>


