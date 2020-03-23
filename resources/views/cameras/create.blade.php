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
        Model: <input type="text" name="model" id=""> <br>
        Resolution: <input type="text" name="resolution" id=""> <br>
        Price: <input type="text" name="price" id=""> <br>
        Memory: <input type="text" name="memory" id=""> <br>
        <button type="submit">Save</button>
        @method('POST')
    </form>
</body>
</html>