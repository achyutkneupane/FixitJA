{{-- Author: Achyut Neupane --}}
@extends('layouts.app')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Category
                    <div class="text-muted pt-2 font-size-sm">
                        @if ($categories->count() == 0)
                            No categories
                        @elseif ($categories->count() == 1)
                            1 category
                        @else
                            {{ $categories->count() }} categories
                        @endif
                    </div>
                </h3>
            </div>
            <div class="card-toolbar">
                <button href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal"
                    data-target="#addCategoryModal">
                    <span class="svg-icon svg-icon-md">
                    </span>New Category</a>
            </div>
        </div>
        <div class="card-body">
            <div class="list-group">
                @if ($categories->count() == 0)
                    <h3 class="text-center list-group-item">
                        No Categories
                    </h3>
                @else
                    @foreach ($categories as $cat)
                        <div class="list-group-item">
                            <div class="mb-4 float-right">
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                    data-target="#addSubModal{{ $cat->id }}">
                                    Add
                                </button>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#editModal{{ $cat->id }}">
                                    Edit
                                </button>
                                <a href="{{ url('/category/delete', $cat->id) }}" type="button" class="btn btn-danger">
                                    Delete
                                </a>
                            </div>
                            <a data-toggle="collapse" href="#collapse{{ $cat->id }}">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="text-dark">Name: {{ $cat->name }}</h5>
                                </div>
                                <small class="text-dark-50 lead">Description: {{ $cat->description }}</small>
                            </a>
                            <div id="collapse{{ $cat->id }}" class="collapse">
                                <ul class="list-group list-group-flush">
                                    <div class="container">
                                        <h5>Sub-categories:</h5>
                                        @if ($cat->sub_categories->count() == 0)
                                            <li class="list-group-item">No sub-categories under {{ $cat->name }}</li>
                                        @else
                                            @foreach ($cat->sub_categories as $sub)
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <li class="list-group-item">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <b class="lead text-dark">Name: {{ $sub->name }}</b>
                                                            </div>
                                                            <small class="text-dark-75">Description:
                                                                {{ $sub->description }}</small>
                                                        </li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                            data-target="#editSubCat{{ $sub->id }}">
                                                            Edit
                                                        </button>
                                                        <a href="{{ url('/sub_category/delete', $sub->id) }}"
                                                            type="button" class="btn btn-danger">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="editSubCat{{ $sub->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category
                                                                    {{ $cat->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="height: 300px;">
                                                                <form action="{{ url('/sub_category/edit', $sub->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    <div class="form-group">
                                                                        <label for="name">Sub-Category Name</label>
                                                                        <input type="text" name="name" class="form-control"
                                                                            id="name" placeholder="Sub-Category Name"
                                                                            value="{{ $sub->name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description">Sub-Category
                                                                            Description</label>
                                                                        <input type="text" name="description"
                                                                            class="form-control" id="description"
                                                                            placeholder="Sub-Category Description"
                                                                            value="{{ $sub->description }}">
                                                                    </div>
                                                                    <button class="btn btn-dark">Add</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="modal fade" id="addSubModal{{ $cat->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add sub-category to
                                            {{ $cat->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="height: 300px;">
                                        <form action="{{ url('/sub_category/add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="category_id" value="{{ $cat->id }}">
                                            <div class="form-group">
                                                <label for="name">Sub-Category Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Sub-Category Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Sub-Category Description</label>
                                                <input type="text" name="description" class="form-control" id="description"
                                                    placeholder="Sub-Category Description">
                                            </div>
                                            <button class="btn btn-dark">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editModal{{ $cat->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category {{ $cat->name }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="height: 300px;">
                                        <form action="{{ url('/category/edit', $cat->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Category Name" value="{{ $cat->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Category Description</label>
                                                <input type="text" name="description" class="form-control" id="description"
                                                    placeholder="Category Description" value="{{ $cat->description }}">
                                            </div>
                                            <button class="btn btn-dark">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body" style="height: 300px;">
                                <form action="{{ url('/category/add') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Category Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Category Description</label>
                                        <input type="text" name="description" class="form-control" id="description"
                                            placeholder="Category Description">
                                    </div>
                                    <button class="btn btn-dark">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
