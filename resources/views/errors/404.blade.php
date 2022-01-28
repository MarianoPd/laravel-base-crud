@extends('layouts.app')


@section('content')

<div class="container ">
    <h1>Error 404!</h1>
    <h3>Page not found, Sorry!</h3>
    <p>{{ $exception->getMessage() }}</p>
</div>

@endsection