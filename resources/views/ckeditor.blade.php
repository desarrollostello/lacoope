<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CKEditor</title>
</head>
<body>
    <div class="container">
        <br>
        <form action="" id="submit" >
            <label>Titulo</label>
            <input class="form-control" type="text" name="titulo" id="titulo">
            <br>
            <textarea class="form-control" id="editor" name="editor"></textarea>
            <br>
            <button type="submit" class="btn btn-success"> Enviar </button>
        </form>
    </div>
</body>
</html>




<script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"> </script>
<script>

    CKEDITOR.replace( 'editor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>