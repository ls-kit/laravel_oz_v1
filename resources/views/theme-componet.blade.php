<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme compoent</title>
</head>
<body>
    <form action="{{ route('components.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="name" placeholder="name">
        <br>
        <input type="text" name="label" id="label" placeholder="label">
        <br>
        <input type="text" name="description" id="label" placeholder="description">
        <br>
        <input type="file" name="source" id="label" placeholder="source file">
        <br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
