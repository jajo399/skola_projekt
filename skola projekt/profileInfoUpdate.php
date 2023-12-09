<?php

$newFileName = "";

if ($_FILES["fileToUpload"]['error'] == 0) {
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

        } else {
            echo "Problem pri uploadovani obrazku";
            echo "<br>Vytvorenie blogu nebolo uspesne, vrat sa na predchadzajucu stranku.<br>";
            echo "<a href='/admin/blog-create'>Vratit sa naspet</a>";
            die();
        }
    }
}

if ($newFileName == "") {
    DB::update('admin_users', ['description' => $_POST['description']], "username=%s", "admin");
} else {
    DB::update('admin_users', ['description' => $_POST['description'], 'image_file_name' => $newFileName], "username=%s", "admin");
}

redirect("/");