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
    <a href="/admin/profile-edit"><h1>UPRAVIT PROFILz</h1></a>
    <a href="/"><h1>HLAVNA STRANKA</h1></a>
    <form id="formBody" action="/admin/blogPostAdd" method="post" enctype="multipart/form-data">
        <p class="mb-0 mt-4">Nadpis</p>
        <input type="text" name="title" id="title" value="<?php if (isset($title)) {echo $title;} ?>" required>
        <p class="mb-0 mt-4">Popis</p>
        <input type="text" name="description" id="description" value="<?php if (isset($description)) {echo $description;} ?>" required>
        <input style="display: none" type="text" name="content" id="content">

        <p class="mb-0 mt-4">Obrazok</p>
        <input type="file" name="fileToUpload" id="fileToUpload" required>

        <p class="mb-0 mt-4">Text blogu</p>
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
        <textarea id="froala-editor"></textarea>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
        <script>
            var editorVariable = new FroalaEditor('#froala-editor',  {
                toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'selectAll', 'clearFormatting', '|', 'html', '|', 'undo', 'redo']
            }, function () {
                editorVariable.html.set(`<?php if (isset($content)) {echo $content;} ?>`);
            });
        </script>

        <?php
        if (isset($editId)) {
            echo "<input type=\"hidden\" id=\"editId\" name=\"editId\" value=\"{$editId}\">";
        }
        ?>

        <input type="submit" value="Odoslat" name="submit">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>

        $('#formBody').submit(function () {
            let editorRawHtml = editorVariable.html.get();
            $('#content').val(editorRawHtml);

        });
    </script>
</body>
</html>


