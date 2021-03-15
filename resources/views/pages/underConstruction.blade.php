@extends('layouts.app')
@section('content')
<div class="bgimg-under-construction">
    <div class="middle-under-construction">
        <a href="/">
            <img class="under-construction-image-middle" src="/images/logo.png"></a>
        <div>
            <h1 class="mt-5">This page is under construction.</h1>
            <h2 class="mb-5">Please come back later.</h1>
        </div>
        <a class="p-2" type="button" href="/">Home</a>
        <a class="p-2" type="button" onclick="history.back()">Go Back</a>
    </div>
</div>
@endsection
