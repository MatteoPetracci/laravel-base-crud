<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('cameras.store')}}" method="post">
        @csrf
        <input type="text" name="model" id="">
        <input type="text" name="resolution" id="">
        <input type="text" name="price" id="">
        <input type="text" name="memory" id="">
        <button type="submit">Save</button>
        @method('POST')
    </form>
</body>
</html>