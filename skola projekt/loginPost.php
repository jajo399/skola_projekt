<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$account = DB::queryFirstRow("SELECT * FROM admin_users WHERE username=%s", $username);
$accountPassword = $account['password'];

if (password_verify($password, $accountPassword)) {
    $_SESSION['login_user'] = $username;

    redirect("/admin/blog-create");
} else {
    echo "Zadane udaje neboli najdene v databazi<br>";
    echo "<a href='/admin/login'>Naspet na login stranku</a>";
}




//$username = $_POST['username'];
//$password = $_POST['password'];
//
//$sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
//$result = mysqli_query($db,$sql);
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//$active = $row['active'];
//
//$count = mysqli_num_rows($result);
//
//// If result matched $myusername and $mypassword, table row must be 1 row
//
//if($count == 1) {
//    session_register("myusername");
//    $_SESSION['login_user'] = $myusername;
//
//    header("location: welcome.php");
//}else {
//    echo "Zadane udaje neboli najdene v databazi<br>";
//    echo "<a href='/admin/login'>Naspet na login stranku</a>";
//}