{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Task Discussion';
    $taskDiscussionIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.task.taskSideBar', $task)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <form method="POST" action="{{ route('postDiscussion',$task->id) }}" id="discussionForm">
                        @csrf
                        <div class="form-group">
                            <div id="taskDiscussion" name="discussion-text" style="height: 100px"></div>
                            <input type="hidden" name="discussionText">
                            <div class="text-center">
                                <button class="btn btn-primary mt-3 w-25" onclick="validateAndGo()">Send text</button>
                            </div>
                        </div>
                    </form>
                    @if ($discussions->count() > 0)
                    <div class="container">
                        @foreach ($discussions as $discussion)
                        <div class="row p-3 my-3 border">
                            <div class="col-2 col-sm-1">
                                <img src="{{ !empty($discussion->user->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . $discussion->user->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}" id="profilePicture" width="100%">
                            </div>
                            <div class="col-10 col-sm-11">
                                <span>
                                    <a class="h4 font-weight-bolder" href="{{ route('viewUser',$discussion->user->id) }}">
                                        {{ $discussion->user->name }}
                                    </a>
                                @isTaskCreator($task->id,$discussion->user->id)
                                    <span class="text-muted">(Creator)</span>
                                @endisTaskCreator
                                </span>
                                <p class="text-muted">{{ $discussion->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="col-12">
                                <p class="mx-5">
                                    {!! $discussion->message !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center h5 text-muted">
                        No Discussions till now.<br>
                        Make one above.
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
    <script>
        var quill = new Quill('#taskDiscussion', {
            modules: {
                toolbar: [
                    [{ 'font': [] }],
                    [{
                        header: [1, 2, 3, 4, 5, false]
                    }],
                    [{ 'list': 'bullet' },{ 'list': 'ordered'},{ 'color': [] }],
                    ['bold', 'italic', 'underline'],
                    ['link','code-block']
                ]
            },
            placeholder: 'Enter your text.............',
            theme: 'snow' // or 'bubble'
        });

        function validateAndGo() {
            var form = document.querySelector('form');
            form.onsubmit = function() {
                event.preventDefault();
                var text = $('.ql-editor').html();
                if (text == "<p><br></p>") {
                    toastr.error("You must enter the text");
                } else {
                    var discussionText = document.querySelector('input[name=discussionText]');
                    discussionText.value = text;
                    document.getElementById("discussionForm").submit();
                }
            };

        }
    </script>
@endsection
