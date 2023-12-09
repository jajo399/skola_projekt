<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<a href="/"><h1>HLAVNA STRANKA</h1></a>
<form id="formBody" action="/admin/login" method="post" enctype="multipart/form-data">
    <h1>Prihlasenie sa do admin rozhrania</h1>
    <p class="mb-0 mt-4">Meno</p>
    <input type="text" name="username" id="username" required>
    <p class="mb-0 mt-4">Heslo</p>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Prihlasit sa" name="submit">
</form>

</body>
</html>


