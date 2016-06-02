@extends('layout')
 

@section('content')
    <p>Hello world</p>

    {{ $posts->render() }}
@endsection
