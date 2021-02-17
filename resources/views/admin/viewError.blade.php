{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            Error Overview
                        </h3>
                    </div>

                    @if (!isset($error->solved_at))
                        <div class="card-toolbar">
                            <form action="{{ route('errorSolved', $error->id) }}" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="PUT">
                                <button class="btn btn-primary font-weight-bolder">
                                    Solved
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">In Module: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">{{ $error->module }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Found By: </label>
                        <div class="col-lg-9 col-xl-6">
                            <a href="{{ route('viewUser', $error->foundBy->id) }}"><span
                                    class="form-control form-control-lg form-control-solid">{{ $error->foundBy->name }}</span></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Title: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">{{ $error->title }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Description: </label>
                        <div class="col-lg-9 col-xl-6">
                            <textarea class="form-control form-control-lg form-control-solid"
                                rows="5">{{ $error->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">In URL: </label>
                        <div class="col-lg-9 col-xl-6">
                            <a href="{{ $error->url }}"><span
                                    class="form-control form-control-lg form-control-solid">{{ $error->url }}</span></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">IP Address: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">{{ $error->ip }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">User Agent: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="form-control form-control-lg form-control-solid">{{ $error->user_agent }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Found: </label>
                        <div class="col-lg-9 col-xl-6">
                            <span
                                class="form-control form-control-lg form-control-solid">{{ $error->created_at->diffForHumans() }}({{ $error->created_at }})</span>
                        </div>
                    </div>
                    @if (isset($error->solved_at))
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Solved By: </label>
                            <div class="col-lg-9 col-xl-6">
                                <span
                                    class="form-control form-control-lg form-control-solid">{{ $error->solvedBy->name }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Solved: </label>
                            <div class="col-lg-9 col-xl-6">
                                <span
                                    class="form-control form-control-lg form-control-solid">{{ \Carbon\Carbon::parse($error->solved_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
