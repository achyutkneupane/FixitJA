{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Reviews';
    $profileReviewIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            @if(auth()->user() != $user)
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="h3">
                        Add Review
                    </div>
                    <form method="post" action="{{ route('postUserReview',$user->id) }}" id="reviewForm">
                        @csrf
                        <div id="reviewText" name="review-text" style="height: 100px"></div>
                        <input type="hidden" name="reviewText">
                        <div class="star-rating">
                            Rating:
                            <span class="far fa-star" data-rating="1"></span>
                            <span class="far fa-star" data-rating="2"></span>
                            <span class="far fa-star" data-rating="3"></span>
                            <span class="far fa-star" data-rating="4"></span>
                            <span class="far fa-star" data-rating="5"></span>
                            <input type="hidden" name="rating" class="rating-value" id="rating">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary mt-3 w-25" onclick="validateReview()">Send text</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if ($reviews->count() > 0)
                @foreach ($reviews as $review)
                <div class="card card-custom mb-3">
                    <div class="card-body">
                        <div class="row p-3">
                            <div class="col-2 col-sm-1">
                                <img src="{{ !empty($review->reviewer->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . $review->reviewer->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}" id="profilePicture" width="100%">
                            </div>
                            <div class="col-10 col-sm-11">
                                <span>
                                    <a class="h4 font-weight-bolder" href="{{ route('viewUser',$review->reviewer->id) }}">
                                        {{ $review->reviewer->name }}
                                    </a>
                                </span>
                                <p class="text-muted">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                            <p class="mx-5 font-weight-bold h6">
                                Rating: <b>{{ $review->rating }}</b>/5
                            </p>
                            <div class="col-12">
                                <p class="mx-5">
                                    {!! $review->review !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="card card-custom">
                <div class="card-body text-center">
                    No reviews
                </div>
            </div>
            @endif
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
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
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

        function validateReview() {
            event.preventDefault();
            var text = $('.ql-editor').html();
            if (text == "<p><br></p>") {
                toastr.error("You must enter the review");
            }
            else if ($('#rating').val() == "") {
                toastr.error("You must enter the rating");
            }
            else {
                var reviewText = document.querySelector('input[name=reviewText]');
                reviewText.value = text;
                document.getElementById("reviewForm").submit();
            }
        }
    </script>
@endsection
