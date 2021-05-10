{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')
    @php
        $page_title = 'Setting';
        $page_description = 'Change Static Texts';
    @endphp
    @foreach($statics as $static)
    <script>
        var statictext{{ $static->id }} = "@php echo(str_replace('"','\"',$static->content)); @endphp";
    </script>
    <div class="card card-custom my-3">
        <div class="card-body">
            <form method="post" action="{{ route('postStaticTexts', $static->id) }}" id="staticForm{{ $static->id }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $static->title }}" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="sub_title" placeholder="Enter Sub-Title" value="{{ $static->sub_title }}">
                </div>
                <div class="form-group">
                    <div id="staticContent{{ $static->id }}" name="static-text" style="height: 200px"></div>
                    <input type="hidden" name="staticContent" id="static{{ $static->id }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary mt-3 w-25" onclick="validateAndGo{{ $static->id }}()">Send text</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
<script>

    @foreach($statics as $static)
    var quill = new Quill('#staticContent{{ $static->id }}', {
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
    $('#staticContent{{ $static->id }} > .ql-editor').html(statictext{{ $static->id }});
    function validateAndGo{{ $static->id }}() {
        var form = document.querySelector('form');
        form.onsubmit = function() {
            event.preventDefault();
            var text = $('.ql-editor').html();
            if (text == "<p><br></p>") {
                toastr.error("You must enter the content");
            } else {
                var discussionText = document.querySelector('#static{{ $static->id }}');
                discussionText.value = text;
                document.getElementById("staticForm{{ $static->id }}").submit();
            }
        };

    }
    @endforeach
</script>
@endsection
