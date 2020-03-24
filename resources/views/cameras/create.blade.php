@extends('layouts.layout')

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

