{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')
    @php
        $page_title = 'Setting';
        $page_description = 'Change Static Texts';
    @endphp
    <div class="card card-custom">
        <div class="card-body">
            <form method="post" action="{{ route('postStaticTexts') }}" id="staticForm">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="sub_title" placeholder="Enter Sub-Title">
                </div>
                <div class="form-group">
                    <div id="staticContent" name="static-text" style="height: 500px"></div>
                    <input type="hidden" name="staticContent">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary mt-3 w-25" onclick="validateAndGo()">Send text</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        var quill = new Quill('#staticContent', {
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
                    toastr.error("You must enter the content");
                } else {
                    var discussionText = document.querySelector('input[name=staticContent]');
                    discussionText.value = text;
                    document.getElementById("staticForm").submit();
                }
            };

        }
    </script>
@endsection
