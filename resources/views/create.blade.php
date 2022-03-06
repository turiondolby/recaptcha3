@extends('app')

@section('content')
    <form action="/posts" method="post">
        @csrf
        <button type="submit">Create post</button>
    </form>

@endsection
