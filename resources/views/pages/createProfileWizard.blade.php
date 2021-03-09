@extends('layouts.app')
@section('content')

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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
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
                            <i class="wizard-icon flaticon-background"></i>
                            <h3 class="wizard-title">Education</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
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
                            <i class="wizard-icon flaticon-background"></i>
                            <h3 class="wizard-title">Reference</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
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
                    <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Wizard Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h3 class="font-weight-bold text-dark">Enter your up to 3 skill categories</h3>
                            <!--begin::Select-->
                            <div class="card-body">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordion_category">
                                    <div class="card card-category-accordion" id="categoryCard">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapse1">
                                                <span class="glyphicon glyphicon-remove-circle pull-right "></span>
                                                <span class="category-title" id="categoryTitleselected_catgeory1"></span>
                                            </div>
                                        </div>
                                        <div id="collapse1" class="collapse show" data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select name="skills_category[]" subcatid="kt_tagify_subcategory" id="selected_catgeory1" class="form-control form-control-solid form-control-lg category-select">
                                                        <option value="">Select Category</option>
                                                        @foreach ($category as $cate)
                                                        <option value="{{ $cate->id }}">{{ $cate->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Select-->
                                                <!--begin::Select-->
                                                <div class="form-group">
                                                    <label>Sub category</label>
                                                    <div id="divTagifykt_tagify_subcategory">
                                                        <input id="kt_tagify_subcategory" class="form-control" name="sub_categories[]" placeholder="Add sub-categories">
                                                        <div class="mt-3 text-muted">Select multiple
                                                            subcategories. If you don't see
                                                            your option just create one.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Accordion-->
                            </div>
                            <button type="button" name="add" id="add_btn" class="btn btn-success">Add More</button>'
                            <!--end::Select-->
                        </div>
                        <!--end::Wizard Step 1-->

                        <!--begin::Wizard Step 2-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h3 class="font-weight-bold text-dark">Upload certificate for each selected
                                skill category/s</h3>
                            <div id="certificateSection">

                            </div>
                            <div class="card-body" id="templateCertificate" style="display: none;">
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionCertificate">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseCert" id="selectedCategory">
                                                <p id="certificateCategoryTitle">Test</p>
                                            </div>
                                        </div>
                                        <div id="collapseCert" class="collapse show" data-parent="#accordionCertificate">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Certificate (PDF, DOC, JPEG, PNG)
                                                        <div class="col-md-12">
                                                            <div class="dropzone dropzone-default dropzone-primary">
                                                                <div class="dropzone-msg dz-message needsclick"><input id="certificateFile" type="file" category="category-name" name="certificate[]" accept=".png, .jpg, .jpeg, .pdf, .docx"></div>
                                                            </div>
                                                        </div>
                                                    </label class="col-form-label">
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Experience
                                                        <input type="text" id="certificateExp" class="form-control" category="category-name" type="number" name="experience[]" placeholder="Years" value="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2-->

                        <!--begin::Wizard Step 3-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h3 class="mb-10 font-weight-bold text-dark">Add upto 3 of your education background</h3>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Name of School, College or University</label>
                                <input type="text" class="form-control " name="educationinstutional_name" placeholder="Name" value="{{old('educationinstutional_name')}}" />
                                @if ($errors->has('educationinstutional_name'))
                                <span class="text-danger">{{ $errors->first('educationinstutional_name') }}</span>
                                @endif
                            </div>
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Degree</label>

                                <select class="form-control" id="user_type" name="degree" value="{{old('degree')}}">
                                    <option value="">Select</option>
                                    <option value="Secondary level" id="type1">Secondary level</option>
                                    <option value="Higher Secondary level" id="type2">Higher Secondary level
                                    </option>
                                    <option value="Bachalaor" id="type3">Bachalaor</option>
                                    <option value="Master" id="type3">Master</option>
                                </select>
                                @if ($errors->has('degree'))
                                <span class="text-danger">{{ $errors->first('degree') }}</span>
                                @endif
                            </div>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Start Date</label>

                                <div class="col-10">
                                    <input class="form-control" type="date" value="" id="selectstartdate" name="start_date" />
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">End Date</label>

                                    <div class="col-10">
                                        <input class="form-control" type="date" value="" id="selectenddate" name="end_date" />
                                    </div>
                                    <!--end::Form Group-->
                                    <!--end::Form Group-->
                                    <!--begin::Form Group-->
                                   
                                    <!--end::Form Group-->
                                    <!--begin::Action-->
                                </div>
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 3-->

                        <!--begin::Wizard Step 4-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Reference certificate for each selected
                                skills category</h4>
                                <!--begin::Select-->
                            <div class="card-body">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordion_reference">
                                    <div class="card card-reference-accordion" id="referenceCard">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapse2">
                                                <span class="glyphicon glyphicon-remove-circle pull-right "></span>
                                                
                                            </div>
                                        </div>
                                        <div id="collapse2" class="collapse show" data-parent="#accordionExample3">
                                            <div class="card-body">
                                            <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Referal Name
                                                        <input type="text" id="refname" class="form-control"  type="text" name="referal_name" placeholder="Referal Name" value="">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Referal Email
                                                        <input type="email" id="refemail" class="form-control"  type="email" name="referal_email" placeholder="Referal Email" value="">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">Referal Contact Number
                                                        <input type="text" id="refphone" class="form-control"  type="text" name="referal_phone" placeholder="Referal Contact Number" value="">
                                                    </label>
                                                </div>
                                               
                                            
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Accordion-->
                            </div>
                            <button type="button" name="add_reference" id="add_more_reference" class="btn btn-success">Add More References</button>

                            
                            
                            </div>
                       
                        <!--end::Wizard Step 4-->

                        <!--begin::Wizard Step 5 -->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Please answer the question</h4>
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label">7. Are you willing to go for backgroud check or criminal
                                    report?</label>
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="police_report" value="1" />
                                        <span></span>Yes</label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="police_report" value="0" />
                                        <span></span>No</label>
                                    <label class="radio radio-primary radio-disabled">

                                </div>
                            </div>
                            <div class="fv-plugins-message-container"></div>
                            <div class="form-group fv-plugins-icon-container">
                                <div class="col-9 col-form-label">
                                    <label for="exampleTextarea">8.Write short description about yoursel
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" name="personal_description"></textarea>
                                </div>
                            </div>
                            <div class="fv-plugins-message-container"></div>
                            <div class="form-group fv-plugins-icon-container">
                                <div class="col-9 col-form-label">
                                    <label for="exampleTextarea">9. How many working hours per week?
                                        <input type="text" class=" form-control " name="hours" placeholder="enter your work hours" rows="1" />
                                </div>
                            </div>
                            <div class="fv-plugins-message-container"></div>

                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label">10. What are the days you are working?
                                </label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">

                                        <input id="kt_tagify_workingdays" class="form-control" name="working_days" placeholder="Add sub-categories">
                                        <div class="mt-3 text-muted">Select multiple days. If you don't see
                                            your option just create one.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="fv-plugins-message-container"></div>
                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label">11. Are you willing to travel long distace?</label>
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="is_travelling" value="1" />
                                        <span></span>Yes</label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="is_travelling" value="0" />
                                        <span></span>No</label>
                                </div>
                            </div>
                            <div class="fv-plugins-message-container"></div>

                            <div class="form-group fv-plugins-icon-container">
                                <div class="col-9 col-form-label">
                                    <label for="exampleTextarea">12. How long distance you are willing to travel?
                                        <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="0" class="slider" id="myRange" name="total_distance">
                                            <p>Total Distance: <span id="demo"></span>km</p>
                                        </div>
                                </div>
                            </div>
                            <div class="fv-plugins-message-container"></div>
                        </div>
                        <!--end::Wizard Step 5-->

                        <!--begin::wizard Step 6-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Upload Your Profile Image</h4>
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="image-input" id="kt_image_3">
                                        <div class="image-input-wrapper" style="">
                                           
                                        </div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="profile" accept=".png, .jpg, .jpeg" value="
                                                    @if(!is_null($document->where('type','profile_picture')->first()))
                                                    {{ asset('storage/'.$document->where('type','profile_picture')->first()->path)}}
                                                    @else
                                                    {{asset('images/unknown-avatar.png') }}
                                                    @endif
                                                " alt="Admin" class="rounded-circle object-fit-scale-down" width="150" height="150" />
                                           
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                </div>


                            </div>
                            <div class="fv-plugins-message-container"></div>
                        </div>
                        <!--end::wizard step 6-->

                        <!--begin::wizard step 7-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h3 class="mb-10 font-weight-bold text-dark">Enter your Address</h3>
                            <!--begin::Select-->
                            <div class="form-group fv-plugins-icon-container">
                                <label>Parishes</label>
                               <select name="parishes" class="form-control form-control-solid form-control-lg category-select">
                                    <option value="Saint Catherine">Saint Catherine</option>
                                    <option value="Clarendon">Clarendon</option>
                                    <option value="Liguanea (St Andrew)">Liguanea (St Andrew)</option>
                                    <option value="Saint Thomas">Saint Thomas</option>
                                     <option value="Port Royal">Port Royal</option>
                                      <option value="Saint John">Saint John</option>
                                       <option value="Saint David">Saint David</option>
                                       </select>
                                        
                                    

                            </div>
                            <div class="fv-plugins-message-container"></div>
                            <div class="form-group fv-plugins-icon-container">
                                <label>City</label>
                               <select name="cities" class="form-control form-control-solid form-control-lg category-select"> >
                                    <option value="Barbican">Barbican</option>
                                    <option value="Allerdyce">Allerdyce</option>
                                    <option value="Cherry Gardens">Cherry Gardens</option>
                                    <option value="Tivoli Gardens">Tivoli Gardens</option>
                                     <option value="Red Hills">Red Hills</option>
                                      <option value="Mountain View">Mountain View</option>
                                       <option value="Forest Hills">Forest Hills</option>
                                       </select>
                                        
                                    

                            </div>

                             
                            <div class="fv-plugins-message-container"></div>
                            <div class="form-group fv-plugins-icon-container">
                                <label>Street</label>
                                <input type="text" name="street" class="form-control" placeholder="Enter your street" />
                            </div>

                            <div class="fv-plugins-message-container"></div>

                            <div class="form-group fv-plugins-icon-container">
                                <label>House Number or Unit (Optional)</label>
                                <input type="text" name="house_number" class="form-control " placeholder="Enter your House number" />
                            </div>

                            <div class="fv-plugins-message-container"></div>

                            <div class="form-group fv-plugins-icon-container">
                                <label> Postal Code (Optional)</label>
                                <input type="text" name="postal_code" class="form-control" placeholder="Enter your  Postal Code (Optional)" />
                            </div>

                            
                           
                            <div class="fv-plugins-message-container"></div>
                        </div>
                        <!--end:: wizard step 7-->

                        <!--begin::wizard step 8-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h3 class="mb-10 font-weight-bold text-dark">Plase Check all information before Submit</h3>
                            <!--begin::Select-->
                            <div class="form-group fv-plugins-icon-container">
                                <h1> if all input information were correct, then click on Submit button. </h1>
                            </div>
                            <div class="fv-plugins-message-container"></div>
                        </div>
                        <!--end:: wizard step 8-->

                        <!--begin::Wizard Actions-->
                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                            <div class="mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
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

<script src="{{ asset('js/pages/custom/login/login-4.js') }}" type="text/javascript"></script>
<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-daterangepicker.js')}}"></script>


<script src="{{ asset('js/custom/create-workingdays-tagify.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/crud/file-upload/image-input.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script>
    var fixedNavbarWebsite = true;
    $(".navbar-marketing").addClass("navbar-scrolled");
    $(".navbar-marketing").removeClass("fixed-top");
</script>
@endsection
