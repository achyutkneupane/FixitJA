{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Task Timeline';
    $taskTimelineIsActive = 'true';
    $task = $logs->first()->task;
    $status = array();
    $status['created'] = [
        'icon'=>'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect fill="#3699FF" x="4" y="11" width="16" height="2" rx="1"/>
                        <rect fill="#3699FF" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                    </g>
                </svg>',
        'color'=>'primary'
    ];
    $status['changed'] = [
        'icon'=>'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path fill="#FFA800" d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                        <rect fill="#EE9D01" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                    </g>
                </svg>',
        'color'=>'warning'
    ];
    @endphp
    <div class="row">
        @include('admin.task.taskSideBar', $task)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="timeline timeline-5">
                        <div class="timeline-items">
                            @foreach ($logs as $log)
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Icon-->
                                        <div class="timeline-media bg-light-{{ $status[$log->status]['color'] }} }}">
                                            <span class="text-{!! $status[$log->status]['color'] !!}">{!! $status[$log->status]['icon'] !!}</span>
                                        </div>
                                    <!--end::Icon-->
                        
                                    <!--begin::Info-->
                                    <div class="timeline-desc timeline-desc-light-{{ $status[$log->status]['color'] }}">
                                        <span class="font-weight-bolder text-{{ $status[$log->status]['color'] }}">{{ $log->created_at->isoFormat('h:mm A') }}</span>
                                        <p class="text-muted"><a href="{{ route('viewUser',$log->log_by->first()->id) }}">{{ $log->log_by->first()->name }}</a></p>
                                        <p class="font-weight-normal text-dark-50 pb-2">
                                            {!! ucfirst($log->description) !!}
                                        </p>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
