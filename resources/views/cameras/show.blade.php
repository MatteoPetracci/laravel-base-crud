@extends('layouts.layout')
@section('main')
    <h2>Show 1 Camera</h2>
    <ul>
        <li>{{$camera->id}}</li>
        <li>{{$camera->model}}</li>
        <li>{{$camera->resolution}}</li>
        <li>{{$camera->price}}</li>
        <li>{{$camera->memory}}</li>
        <li>{{$camera->created_at}}</li>
        <li>{{$camera->updated_at}}</li>
    </ul>
@endsection