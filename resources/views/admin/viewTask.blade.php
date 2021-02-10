{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')

{{ $task->first()->id }}

@endsection