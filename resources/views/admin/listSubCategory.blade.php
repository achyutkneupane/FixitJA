{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h1 class="card-header">
                        Sub Categories
                        <div class="float-right">
                            <a href="{{ route('addSubCategory') }}" class="btn btn-dark">+ Add</a>
                        </div>
                    </h1>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $sub)
                                    <tr>
                                        <th scope="row">{{ $sub->index + 1 }}</th>
                                        <td>{{ $sub->name }}</td>
                                        <td>{{ $sub->description }}</td>
                                        <td>{{ $sub->category->name }}</td>
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
