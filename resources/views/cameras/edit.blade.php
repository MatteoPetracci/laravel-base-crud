@extends('layouts.layout')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<body>
    
    <form action="{{(!empty($camera)) ? route('cameras.update', $camera->id) : route('cameras.store')}}" method="post">
        @csrf
        Model: <input type="text" name="model" value='{{(!empty($camera)) ? $camera->model : ''}}' id=""> <br>
        Resolution: <input type="text" name="resolution" value='{{(!empty($camera)) ? $camera->resolution : ''}}' id=""> <br>
        Price: <input type="text" name="price" value='{{(!empty($camera)) ? $camera->price : ''}}' id=""> <br>
        Memory: <input type="text" name="memory" value='{{(!empty($camera)) ? $camera->memory : ''}}' id=""> <br>

        @if (!empty($camera))
            <input type="hidden" name="id" value="{{$camera->id}}">
        @endif

        <button type="submit">Save</button>
        @if (!empty($camera))
            @method('PATCH')
            @else 
            @method('POST')
        @endif

    </form>
</body>
</html>