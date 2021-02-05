{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h1 class="card-header">
                        Categories
                        <div class="float-right">
                            <a href="{{ route('addCategory') }}" class="btn btn-dark">+ Add</a>
                        </div>
                    </h1>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Sub-Categories</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                    <tr>
                                        <th scope="row">{{ $cat->index + 1 }}</th>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->description }}</td>
                                        <td>{{ $cat->sub_categories->count() }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
