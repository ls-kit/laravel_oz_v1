@extends('layouts.master')

@section('content')
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
@endsection
