@extends('layouts.app')
@section('content')
<script>
var sessionCatId,sessionSubCatId;
var status = "{{ auth()->user()->status }}";
</script>
@if(!empty(session()->get('subcategory_id')))
<script>
var sessionSubCatId = {!! session()->get('subcategory_id') !!};
</script>
@endif
@if(!empty(session()->get('category_id')))
<script>
var sessionCatId = {!! session()->get('category_id') !!}
</script>
@endif
@if(!empty(auth()->user()->city->name))
<script>
var cityId = {{ auth()->user()->city->id }};
</script>
@else
<script>
    var cityId = '';
</script>
@endif
@php
$page_title = auth()->user()->status == 'pending' ? 'Edit Application' : 'Create Profile';
$education = auth()->user()->educations->first();
@endphp
<script>
</script>
<!-- <div class="d-flex flex-column-fluid"> -->
<!--begin::Container-->
<!-- <div class="container"> -->
<div class="card card-custom">

    <div class="card-body p-0">
        <!--begin::Wizard-->
        <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
            <!--begin::Wizard Nav-->
            <div class="wizard-nav border-bottom">
                <div class="wizard-steps p-8 p-lg-10">
                    <!--begin::Wizard Step 1 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-folder-1"></i>
                            <h3 class="wizard-title">Skills</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                        x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 1 Nav-->

                    <!--begin::Wizard Step 2 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-clipboard"></i>
                            <h3 class="wizard-title">Proof Skills</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                        x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 2 Nav-->

                    <!--begin::Wizard Step 3 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class=" wizard-icon flaticon-book"></i>
                            <h3 class="wizard-title">Education</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                        x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 3 Nav-->

                    <!-- begin::Wizard Step 4 Nav -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-users"></i>
                            <h3 class="wizard-title">Reference</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                        x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 4 Nav-->

                    <!-- begin::Wizard Step 5 Nav -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-plus"></i>
                            <h3 class="wizard-title">Other Information</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                        x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!-- end::Wizard Step 5 Nav -->

                    <!-- begin::Wizard Step 6 Nav -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-avatar"></i>
                            <h3 class="wizard-title">Profile Picture</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                        x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 6 Nav-->

                    <!-- begin::Wizard Step 7 Nav -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-placeholder"></i>
                            <h3 class="wizard-title">Address</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                        x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Wizard Step 7 Nav-->

                    <!--begin::Wizard Step 8 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-globe"></i>
                            <h3 class="wizard-title">Review & Submit</h3>
                        </div>
                    </div>
                    <!--end::Wizard Step 8 Nav-->

                </div>
            </div>
            <!--end::Wizard Nav-->

            <!--begin::Wizard Body-->
            <div class="row justify-content-center my-5 px-8 my-lg-10 px-lg-10">
                <div class="col-xl-12 col-xxl-7">
                    <!--begin::Wizard Form-->
                    <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                    


                        <!--begin::Wizard Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h3 class="font-weight-bold text-dark">List up to 3 skills</h3>



                            <!--begin::Select-->
                            <div class="card-body">



                                <!--begin::Accordion-->
                                @if(auth()->user()->allCategories()->count() != 0)

                                @foreach(auth()->user()->allCategories() as $subcats)



                                <div class="accordion accordion-solid accordion-toggle-plus"
                                    id="accordion_category{{ $loop->index }}">
                                    <div class="card card-category-accordion" id="categoryCard">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse"
                                                data-target="#collapse{{ $loop->index }}">
                                                <span class="glyphicon glyphicon-remove-circle pull-right "></span>
                                                <span class="category-title"
                                                    id="categoryTitleselected_catgeory{{ $loop->index }}">{{ ucwords($subcats['category']['category_name']) }}</span>
                                            </div>
                                        </div>



                                        <div id="collapse{{ $loop->index }}" class="collapse show"
                                            data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Category</label>

                                                    <select name="skills_category" subcatid="kt_tagify_subcategory{{ $loop->index +1}}"
                                                        id="selected_catgeory{{ $loop->index + 1 }}"
                                                        class="form-control form-control-solid form-control-lg category-select">

                                                      
                                                        <option
                                                            value="{{ $subcats['category']['category_id'] ? 'selected' : ''}}">
                                                            {{  ucwords($subcats['category']['category_name']) }}
                                                        </option>
                                                        @foreach ($category as $cate)
                                                         <option value="{{ $cate->id }}">{{ ucwords($cate->name) }}
                                                        </option>
                                                        @endforeach


                                                    </select>
                                                </div>


                                                <!--end::Select-->
                                                <!--begin::Select-->

                                                <div class="form-group">
                                                    <label>Sub category</label>



                                                    <div id="divTagifykt_tagify_subcategory">

                                                   
                                                    

                                                        <input id="kt_tagify_subcategory{{ $loop->index + 1}}"    class="form-control"
                                                            name="sub_categories{{ $loop->index + 1 }}"
                                                            placeholder="Add sub-categories" value="">
                                                        <div class="mt-3 text-muted">Select multiple
                                                            subcategories. If you don't see
                                                            your option, just create one.</div>

                                                    </div>


                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach




                                @else
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordion_category">
                                    <div class="card card-category-accordion" id="categoryCard">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapse1">
                                                <span class="glyphicon glyphicon-remove-circle pull-right "></span>
                                                <span class="category-title" id="categoryTitleselected_catgeory0">Select Category</span>
                                            </div>
                                        </div>
                                        <div id="collapse1" class="collapse show" data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select name="skills_category" subcatid="kt_tagify_subcategory" id="selected_catgeory0" class="form-control form-control-solid form-control-lg category-select">
                                                        <option value="">Select Category</option>
                                                        @foreach ($category as $cate)
                                                        <option value="{{ $cate->id }}">{{ ucwords($cate->name) }}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>


                                                <!--end::Select-->
                                                <!--begin::Select-->
                                                <div class="form-group">
                                                    <label>Sub category</label>
                                                    <div id="divTagifykt_tagify_subcategory">
                                                        <input id="kt_tagify_subcategory" class="form-control"
                                                            name="sub_categories" placeholder="Add sub-categories">
                                                        <div class="mt-3 text-muted">Select multiple
                                                            subcategories. If you donot see
                                                            your option just create one.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif







                                <!--begin::Accordion-->
                            </div>
                            <input type="hidden" id="totalCatList" name="totalCatList">
                            <button type="button" name="add" id="add_btn" class="btn btn-success">Add More</button>
                            <!--end::Select-->
                        </div>

                        <!--end::Wizard Step 1-->

                        <!--begin::Wizard Step 2-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h3 class="font-weight-bold text-dark">Upload certificate for each selected
                                skill category/s</h3>


                            @if(auth()->user()->documents->count() != 0)

                            <div id="certificateSection">


                            </div>

                            @foreach(auth()->user()->allCategories() as $category)
                            <div class="card-body" id="">
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionCertificate">
                                    <div class="card">

                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseCert"
                                                id="">
                                                <p id="">{{   ucwords($category['category']['category_name']) }}</p>
                                            </div>
                                        </div>

                                        <div id="collapseCert" class="collapse show" data-parent="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Certificate
                                                        (PDF, DOC, JPEG, PNG)
                                                        @if(!empty($category))
                                                        <div class="col-md-12">
                                                            <h4 class="font-weight-bold">

                                                            </h4>

                                                            <div class="dropzone dropzone-default dropzone-primary">

                                                                <div class="dropzone-msg dz-message needsclick">
                                                                    @if($category['document'])
                                                                    <a href="{{route('getfile', basename($category['document']['path']))}}"
                                                                        class="dropzone-select btn btn-light-primary font-weight-bold btn-sm dz-clickable"><i
                                                                            class="fas fa-long-arrow-alt-down"></i><span>Download certificate
                                                                        </span></a>
                                                                    @endif
                                                                        <br><br>
                                                                       <input
                                                                        id="certificateFile" type="file"
                                                                        category="category-name"
                                                                        accept=".png, .jpg, .jpeg, .pdf, .docx">
                                                                        
                                                                </div>

                                                            </div>





                                                        </div>
                                                        @else
                                                        <div class="col-md-12">
                                                            <h4 class="font-weight-bold">

                                                            </h4>



                                                            <div class="dropzone dropzone-default dropzone-primary">


                                                                <div class="dropzone-msg dz-message needsclick"><input
                                                                        id="certificateFile" type="file"
                                                                        category="category-name"
                                                                        value="{{ asset('storage/'. $document->path) }}"
                                                                        accept=".png, .jpg, .jpeg, .pdf, .docx"></div>
                                                            </div>



                                                        </div>

                                                        @endif

                                                    </label class="col-form-label">
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Experience
                                                        <input type="text" class="form-control"
                                                            category="category-name" type="number" placeholder="Years"
                                                            value="{{ $category['document'] ? $category['document']['experience'] : '' }}">
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @else
                            <div id="certificateSection">

                            </div>


                            <div class="card-body" id="templateCertificate" style="display: none;">
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionCertificate">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseCert"
                                                id="selectedCategory">
                                                <p id="certificateCategoryTitle">Test</p>
                                            </div>
                                        </div>
                                        <div id="collapseCert" class="collapse show"
                                            data-parent="#accordionCertificate">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Certificate
                                                        (PDF, DOC, JPEG, PNG)
                                                        <div class="col-md-12">
                                                            <h4 class="font-weight-bold">
                                                            </h4>

                                                            </h4>
                                                            <div class="dropzone dropzone-default dropzone-primary">
                                                                <div class="dropzone-msg dz-message needsclick"><input
                                                                        id="certificateFile" type="file"
                                                                        category="category-name"
                                                                        accept=".png, .jpg, .jpeg, .pdf, .docx"></div>
                                                            </div>
                                                        </div>
                                                    </label class="col-form-label">
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Experience
                                                        <input type="text" id="certificateExp" class="form-control"
                                                            category="category-name" type="number" placeholder="Years"
                                                            value="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <input type="hidden" id="totalCertificateList" name="totalCertificateList">
                        <!--end::Wizard Step 2-->

                        <!--begin::Wizard Step 3-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h3 class="mb-10 font-weight-bold text-dark">Enter your education background</h3>

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Name of School, College or University</label>
                                <input type="text" class="form-control " name="educationinstutional_name" placeholder="Name" value="@if($education){{ $education->education_institution_name }}@endif"/>
                                @if ($errors->has('educationinstutional_name'))
                                <span class="text-danger">{{ $errors->first('educationinstutional_name') }}</span>
                                @endif
                            </div>
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Degree</label>
                                <select class="form-control" id="degree_wizard_profile" name="degree">
                                    <option value="" disabled selected>Select a degree</option>
                                    <option value="secondary_level" id="type1" {{ ($education && $education->degree == 'secondary_level') ? 'selected disabled' : '' }}>Secondary level</option>
                                    <option value="higher_secondary_level" id="type2" {{ ($education && $education->degree == 'higher_secondary_level') ? 'selected disabled' : '' }}>Higher Secondary level</option>
                                    <option value="bachelors" id="type3" {{ ($education && $education->degree == 'bachelors') ? 'selected disabled' : '' }}>Bachelors</option>
                                    <option value="masters" id="type3" {{ ($education && $education->degree == 'masters') ? 'selected disabled' : '' }}>Masters</option>
                                </select>
                                @if ($errors->has('degree'))
                                <span class="text-danger">{{ $errors->first('degree') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Start Date <strong class="text-muted">(Optional)</strong></label>
                                <div class="col-12">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type="text" class="form-control datepicker" name="start_date" id="selectstartdate" format="Y-m-d"  placeholder="Select date" value="@foreach(auth()->user()->educations as $education) {{ $education->start_date }} @endforeach" />
                                    </div>
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">End Date <strong class="text-muted">(Optional)</strong></label>
                               
                                    <div class="col-12">
                                    <div class='input-group date' id='datetimepicker1'>
                                         <input type="text" class="form-control datepicker" name="end_date" id="selectenddate" format="Y-m-d"  placeholder="Select date" value="@foreach(auth()->user()->educations as $education) {{ $education->end_date }} @endforeach" />
                    </div>
                                    </div>
                                    <!--end::Form Group-->
                                    <!--end::Form Group-->
                                    <!--begin::Form Group-->

                                    <!--end::Form Group-->
                                    <!--begin::Action-->
                                </div>
                            </div>

                        </div>
                        <!--end::Wizard Step 3-->

                        <!--begin::Wizard Step 4-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Reference for each selected skills category</h4>
                            <!--begin::Select-->
                            @if(auth()->user()->references->count() != 0)
                            @foreach (auth()->user()->references as $reference)
                            <div class="card-body">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-solid accordion-toggle-plus"
                                    id="accordion_reference{{ $loop->index }}">
                                    <div class="card card-reference-accordion" id="referenceCard1">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse"
                                                data-target="#collapseReference1">
                                                <span class="glyphicon glyphicon-remove-circle pull-right "></span>

                                            </div>
                                        </div>
                                        <div id="collapseReference1" class="collapse show"
                                            data-parent="#accordionExample3">
                                            <div class="card-body col-12">
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark col-12">Referral Name
                                                        <input type="text" id="refname" class="form-control" type="text"
                                                            name="referal_name" placeholder="Referral Name"
                                                            value="{{ $reference->refname }}">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark col-12">Referral Email <span class="text-muted lead">(Optional)</span>
                                                        <input type="email" id="refemail" class="form-control"
                                                            type="email" name="referal_email"
                                                            placeholder="Referral Email"
                                                            value="{{ $reference->refemail }}">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark col-12">Referral Contact Number
                                                        <input type="text" id="refphone" class="form-control"
                                                            type="text" name="referal_phone"
                                                            placeholder="Referral Contact Number"
                                                            value="{{ $reference->refphone }}">
                                                    </label>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Accordion-->
                            </div>
                            @endforeach
                            @else
                            <div class="card-body">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordion_reference">
                                    <div class="card card-reference-accordion" id="referenceCard1">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse"
                                                data-target="#collapseReference1">
                                                <span class="glyphicon glyphicon-remove-circle pull-right "></span>
                                            </div>
                                        </div>
                                        <div id="collapseReference1" class="collapse show"
                                            data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark col-12">Referral Name
                                                        <input type="text" id="refname" class="form-control" type="text"
                                                            name="referal_name" placeholder="Referal Name" value="">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-darkc col-12">Referral Email <span class="text-muted lead">(Optional)</span>
                                                        <input type="email" id="refemail" class="form-control"
                                                            type="email" name="referal_email"
                                                            placeholder="Referal Email" value="">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark col-12">Referral Contact Number
                                                        <input type="tel" id="refphone" class="form-control"
                                                            type="text" name="referal_phone"
                                                            placeholder="Referal Contact Number" value="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Accordion-->
                            </div>

                            <input type="hidden" id="totalRefList" name="totalRefList">
                            <button type="button" name="add_reference" id="add_more_reference"
                                class="btn btn-success">Add More References</button>
                            @endif



                        </div>

                        <!--end::Wizard Step 4-->

                        <!--begin::Wizard Step 5 -->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Please answer these questions</h4>
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label">7. Are you willing to do a background check?</label>
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="police_report"
                                            {{ auth()->user()->is_police_record ? 'checked' : ''}} value="1" />
                                        <span></span>Yes</label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="police_report"
                                            {{ !auth()->user()->is_police_record ? 'checked' : ''}} value="0" />
                                        <span></span>No</label>
                                    <label class="radio radio-primary radio-disabled">

                                </div>
                            </div>
                            <div class="form-group fv-plugins-icon-container">
                                <div class="col-9 col-form-label">
                                    <label for="exampleTextarea">8. Provide a short description about yourself.
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3"
                                        name="personal_description">{{ auth()->user()->introduction }}</textarea>
                                </div>
                            </div>
                            <div class="form-group fv-plugins-icon-container">
                                <div class="col-9 col-form-label">
                                    <label for="exampleTextarea">9. How many working hours per week?
                                        <input type="text" class="form-control " name="hours"
                                            placeholder="Enter your working hours" rows="1"
                                            value="{{ auth()->user()->hours}}" />
                                </div>
                            </div>

                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label">10. What days are you available to work?
                                </label>

                            <input type="hidden" id="workingdays" value="{{ auth()->user()->days}}" />


                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        <input id="kt_tagify_workingdays" class="form-control" name="working_days"
                                            placeholder="Add sub-categories" value="">
                                        <div class="mt-3 text-muted">Select multiple days. If you don't see your option just create one.</div>
                                    </div>

                                </div>



                            </div>
                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label">11. Are you willing to travel long distance?</label>
                                <div class="radio-inline">
                                    <label class="radio radio-primary1">
                                        <input type="radio" name="is_travelling"
                                            {{ auth()->user()->is_travelling  ? 'checked' : ''}} value="1" />
                                        <span></span>Yes</label>
                                    <label class="radio radio-primary1">
                                        <input type="radio" name="is_travelling"
                                            {{ auth()->user()->is_travelling == '0' ? 'checked' : ''}} value="0" />
                                        <span></span>No</label>
                                        <label class="radio radio-primary1 radio-disabled">
                                </div>
                            </div>
                             
                            <div class="form-group fv-plugins-icon-container">
                                <div class="col-9 col-form-label">
                                    <label for="exampleTextarea">12. Select the distance you are willing to travel.
                                        <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="{{ auth()->user()->total_distance ? auth()->user()->total_distance : '1' }}" class="slider" id="myRange"
                                                name="total_distance" >
                                            <p>Total Distance: <span id="demo" > {{ auth()->user()->total_distance ? : '1' }} </span>Km</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 5-->

                        <!--begin::wizard Step 6-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Upload Your Profile Image</h4>
                            <!--begin::Input-->
                            @if(Auth::user()->documents)
                            
                           
                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-6">
                                    <div class="editProfileImage mb-3">
                                        <img src="{{ !empty(Auth::user()->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . Auth::user()->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}"
                                            id="profilePicture" style="height:200px; width:200px;">
                                    </div>
                                    <input id="profile_image" type="file" accept=".jpg,.gif,.png,.jpeg" name="profile"
                                        onchange="document.getElementById('profilePicture').src = window.URL.createObjectURL(this.files[0])"/>
                                    @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @else
                             <div class="form-group row">
                                <div class="col-lg-9 col-xl-6">
                                    <div class="editProfileImage mb-3">
                                        <img src="{{ !empty(Auth::user()->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . Auth::user()->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}"
                                            id="profilePicture" style="height:200px; width:200px;">
                                    </div>
                                    <input id="profile_image" type="file" accept=".jpg,.gif,.png,.jpeg" name="profile" value="{{ !empty(Auth::user()->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . Auth::user()->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}"
                                        onchange="document.getElementById('profilePicture').src = window.URL.createObjectURL(this.files[0])" />
                                    @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            
                            
                        </div>

            <!--end::wizard step 6-->
                        <!--begin::wizard step 7-->
            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                <h3 class="mb-10 font-weight-bold text-dark">Enter your Address</h3>
                <!--begin::Select-->
                <div class="form-group fv-plugins-icon-container">
                    <label>Parishes</label>
                    <select class="form-control select2" id="userParishSelect" name="parish">
                        <option label=""></option>
                        @foreach($parishes as $parish)
                        <option value="{{ $parish->id }}"{{ !empty(auth()->user()->city->parish) && $parish->id == auth()->user()->city->parish->id ? ' selected' : '' }}>
                            {{ $parish->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group fv-plugins-icon-container">
                    <label>City</label>
                    <select class="form-control select2" id="userCitySelect" name="cities">
                    </select>
                </div>
                
                <div class="form-group fv-plugins-icon-container">
                    <label>Street Address</label>
                    <input type="text" name="street_01" class="form-control my-1" placeholder="Street Address 1"
                        value="{{ auth()->user()->street_01}}" />
                    <input type="text" name="street_02" class="form-control my-1" placeholder="Street Address 2(Optional)"
                            value="{{ auth()->user()->street_02}}" />
                </div>
                <div class="form-group fv-plugins-icon-container">
                    <label> Postal Code (Optional)</label>
                    <input type="text" name="postal_code" class="form-control"
                        placeholder="Enter your  Postal Code (Optional)" />
                </div>
            </div>
            <!--end:: wizard step 7-->

            <!--begin::wizard step 8-->
            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                <h3 class="mb-10 font-weight-bold text-dark">Please check all the informations before submitting your application</h3>
                <!--begin::Select-->
                <div class="form-group fv-plugins-icon-container">
                    <div class="d-flex align-items-center justify-content-between mb-2 row">
                        <h3 class="col-md-12 my-3">Skill</h3>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Skills: </span>
                            <span class="text-muted" id='skill'></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2 row">
                        <h3 class="col-md-12 my-3">Education</h3>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Education instutional name: </span>
                            <span class="text-muted" id='educationname'>N/A</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Degree: </span>
                            <span class="text-muted" id='educationdegree'>N/A</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Start Date: </span>
                            <span class="text-muted" id='educationstartdate'>N/A</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">End Date: </span>
                            <span class="text-muted" id='educationenddate'>N/A</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2 row">
                        <h3 class="col-md-12 my-3">Other Information</h3>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Police Report: </span>
                            <span class="text-muted" id='policereport'>N/A</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Description: </span>
                            <span class="text-muted" id='description'>N/A</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Working hours: </span>
                            <span class="text-muted" id='hours'>N/A</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Working days: </span>
                            <span class="text-muted" id='working_days'></span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Is travelling?: </span>
                            <span class="text-muted" id='istravelling'>N/A</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-bold">Can travel total distance: </span>
                            <span class="text-muted" id='totaldistance'>N/A</span>
                        </div>
                    </div>

                    <div class="workingLocationReview" style="display:block;">
                        <div class="d-flex align-items-center justify-content-between mb-2 row">
                            <h3 class="col-md-12 my-3">Address</h3>
                            <div class="col-md-6">
                                <span class="font-weight-bold">City: </span>
                                <span class="text-muted" id='workingCityId'>N/A</span>
                            </div>
                            <div class="col-md-6">
                                <span class="font-weight-bold">Address: </span>
                                <span class="text-muted" id='workingStreet1Id'>N/A</span>
                            </div>
                            
                            
                            <div class="col-md-6">
                                <span class="font-weight-bold">Parish: </span>
                                <span class="text-muted" id='workingPerishId'>N/A</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: wizard step 8-->
                </div>
            </div>

            <!--begin::Wizard Actions-->
            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                <div class="mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                        data-wizard-type="action-prev">Previous</button>
                </div>
                <div>
                    <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                        data-wizard-type="action-submit">Submit</button>
                    <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                        data-wizard-type="action-next">Next</button>
                </div>
            </div>
            <!--end::Wizard Actions-->
            </form>
            <!--end::Wizard Form-->
        </div>
    </div>
    <!--end::Wizard Body-->
</div>
<!--end::Wizard-->
</div>
</div>
<!--end::Container-->
@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('css/custom/create-profile-wizard-custom.css') }}" rel="stylesheet" type="text/css" />



@endsection
{{-- Scripts Section --}}

@section('scripts')
<script src="{{ asset('js/custom/custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/custom/create-profile-wizard-custom.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/custom/create-profile-tagify.js') }}" type="text/javascript"></script>
<script
    src="{{ asset('js/custom/parish-city-select.js') }}" type="text/javascript">
</script>

<script src="{{ asset('js/pages/custom/login/login-4.js') }}" type="text/javascript"></script>
<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-daterangepicker.js')}}"></script>


<script src="{{ asset('js/custom/create-workingdays-tagify.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script>
    var fixedNavbarWebsite = true;
    $(".navbar-marketing").addClass("navbar-scrolled");
    $(".navbar-marketing").removeClass("fixed-top");
</script>


<!-- Added by Ashish Pokhrel  -->
<script>
    $(function(){
        $(".datepicker").datepicker();
    });
</script>
@endsection