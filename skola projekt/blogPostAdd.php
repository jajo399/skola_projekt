<?php

$uploadFileName = $_FILES["fileToUpload"]["name"];

$randomFileName = bin2hex(random_bytes(15));
$newFileName = preg_replace('/^.*\.\s*/', $randomFileName . '.', $uploadFileName);

$_FILES["fileToUpload"]["name"] = $newFileName;

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Odoslany subor neni obrazok.";
        $uploadOk = 0;
    }
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Iba subory typu JPG, JPEG, PNG & GIF su podporovane.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Vytvorenie blogu nebolo uspesne, vrat sa na predchadzajucu stranku.<br>";
    echo "<a href='/admin/blog-create'>Vratit sa naspet</a>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        if (isset($_POST['editId'])) {
            DB::update('blog_post', [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
                'image_file_name' => $newFileName,
                'create_time' => DB::sqleval("NOW()")
            ], "id=%s", $_POST['editId']);

            redirect('/blog/' . $_POST['editId']);
        } else {
            DB::insert('blog_post', [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
                'image_file_name' => $newFileName,
                'create_time' => DB::sqleval("NOW()")
            ]);
            $newBlogId = DB::insertId();

            redirect('/blog/' . $newBlogId);
        }


    } else {
        echo "Problem pri uploadovani obrazku";
        echo "<br>Vytvorenie blogu nebolo uspesne, vrat sa na predchadzajucu stranku.<br>";
        echo "<a href='/admin/blog-create'>Vratit sa naspet</a>";
    }
}
?>