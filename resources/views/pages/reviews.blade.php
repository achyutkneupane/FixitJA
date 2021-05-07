{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
@php
    $page_title = "Reviews";
@endphp
<div class="container jumbotron">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="h3">
                        Add reviews
                    </div>
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="form-group">
                                    <div id="reviewText" name="review-text" style="height: 100px"></div>
                                    <input type="hidden" name="reviewText">
                                    <div class="star-rating">
                                        Rating:
                                        <span class="far fa-star" data-rating="1"></span>
                                        <span class="far fa-star" data-rating="2"></span>
                                        <span class="far fa-star" data-rating="3"></span>
                                        <span class="far fa-star" data-rating="4"></span>
                                        <span class="far fa-star" data-rating="5"></span>
                                        <input type="hidden" name="rating" class="rating-value">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-primary mt-3 w-25" onclick="validateAndGo()">Send text</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .star-rating {
            font-size: 1.3em;
        }
        .star-rating .fa-star {
            line-height:64px;
        }

        .star-rating .far{
            color: #000000;
        }

        .star-rating .fas{
            color: #ffd300;
        }
    </style>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        var quill = new Quill('#reviewText', {
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
            placeholder: 'Enter your review.............',
            theme: 'snow' // or 'bubble'
        });


        var $star_rating = $('.star-rating .far');

        var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('far').addClass('fas');
            } else {
            return $(this).removeClass('fas').addClass('far');
            }
        });
        };

        $star_rating.on('click', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
        });

        SetRatingStar();
        $(document).ready(function() {

        });
    </script>
@endsection