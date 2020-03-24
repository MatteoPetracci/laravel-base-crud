@extends('layouts.layout')
@section('main')
<h2>All Cameras</h2>
    @foreach ($cameras as $camera)
        <ul style="list-style:none">
            <li>{{$camera->id}}</li>
            <li>{{$camera->model}}</li>
            <li>{{$camera->resolution}}</li>
            <li>{{$camera->price}}</li>
            <li>{{$camera->memory}}</li>
        </ul>
    @endforeach
@endsection
