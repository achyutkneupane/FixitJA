@extends('layouts.app')
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
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
                                    <i class="wizard-icon flaticon-background"></i>
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

                            <!-- fir referebec -->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-background"></i>
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
                            <!--end::Wizard Step 3 Nav-->
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
                            <!--end::Svg Icon-->

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
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-globe"></i>
                                    <h3 class="wizard-title">Review & Submit</h3>
                                </div>
                            </div>
                            <!--end::Wizard Step 4 Nav-->

                        </div>
                    </div>
                    <!--end::Wizard Nav-->
                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin::Wizard Form-->
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!--begin::Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h3 class="mb-10 font-weight-bold text-dark">Enter your up to 3 categories</h3>
                                    <!--begin::Select-->
                                    <div class="card-body">
                                        <!--begin::Accordion-->
                                        <div class="accordion accordion-solid accordion-toggle-plus"
                                            id="accordionExample3">
                                            <div class="card">
                                                <div class="card-header" id="headingOne3">
                                                    <div class="card-title" data-toggle="collapse"
                                                        data-target="#collapseOne3">Category1</div>
                                                </div>
                                                <div id="collapseOne3" class="collapse show"
                                                    data-parent="#accordionExample3">
                                                    <div class="card-body">
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Category</label>



                                                            <select name="skills_category" id="selected_catgeory1"
                                                                class="form-control form-control-solid form-control-lg">
                                                                <option value="">Select Category </option>
                                                                @foreach ($category as $cate)
                                                                <option value="{{ $cate->id }}">{{ $cate->name }}
                                                                </option>
                                                                @endforeach

                                                            </select>


                                                            <div class="fv-plugins-message-container"></div>

                                                        </div>
                                                        <!--end::Select-->
                                                        <!--begin::Select-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Sub category</label>
                                                             <div>
                                                                <input id="kt_tagify_subcategory" class="form-control tagify"
                                                                    name="sub_categories"
                                                                    placeholder="Add sub-categories">
                                                                <div class="mt-3 text-muted">Select multiple
                                                                    subcategories. If you don't see
                                                                    your option just create one.</div>
                                                            </div>
                                                            <div class="fv-plugins-message-container"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" id="card_two">
                                                <div class="card-header" id="headingTwo3">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                        data-target="#collapseTwo3">Catgeory 2</div>
                                                </div>
                                                <div id="collapseTwo3" class="collapse"
                                                    data-parent="#accordionExample3">
                                                    <div class="card-body">
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Category</label>



                                                            <select name="skills_category" id="selected_catgeory2"
                                                                class="form-control form-control-solid form-control-lg">
                                                                <option value="">Select Category </option>
                                                                @foreach ($category as $cate)
                                                                <option value="{{ $cate->id }}">{{ $cate->name }}
                                                                </option>
                                                                @endforeach

                                                            </select>


                                                            <div class="fv-plugins-message-container"></div>

                                                        </div>
                                                        <!--end::Select-->
                                                        <!--begin::Select-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Sub category</label>
                                                            <div>
                                                                <input id="kt_tagify_subcategory2" class="form-control tagify"
                                                                    name="sub_categories"
                                                                    placeholder="Add sub-categories">
                                                                <div class="mt-3 text-muted">Select multiple
                                                                    subcategories. If you don't see
                                                                    your option just create one.</div>
                                                            </div>
                                                            <div class="fv-plugins-message-container"></div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" id="card_three">
                                                <div class="card-header" id="headingThree3">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                        data-target="#collapseThree3">Category</div>
                                                </div>
                                                <div id="collapseThree3" class="collapse"
                                                    data-parent="#accordionExample3">
                                                    <div class="card-body">
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Category</label>



                                                            <select name="skills_category" id="selected_catgeory3"
                                                                class="form-control form-control-solid form-control-lg">
                                                                <option value="">Select Category </option>
                                                                @foreach ($category as $cate)
                                                                <option value="{{ $cate->id }}">{{ $cate->name }}
                                                                </option>
                                                                @endforeach

                                                            </select>


                                                            <div class="fv-plugins-message-container"></div>

                                                        </div>
                                                        <!--end::Select-->
                                                        <!--begin::Select-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Sub category</label>
                                                             <div>
                                                                <input id="kt_tagify_subcategory3" class="form-control tagify"
                                                                    name="sub_categories"
                                                                    placeholder="Add sub-categories">
                                                                <div class="mt-3 text-muted">Select multiple
                                                                    subcategories. If you don't see
                                                                    your option just create one.</div>
                                                            </div>
                                                            <div class="fv-plugins-message-container"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <button type="button" name="add" id="add_btn" class="btn btn-success">Add
                                            More</button>







                                    </div>
                                    <!--end::Select-->
                                </div>
                                <!--end::Wizard Step 1-->
                                <!--begin::Wizard Step 2-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Upload certificate for each selected
                                        skills category</h4>
                                    <!--begin::Input-->


                                    <div class="form-group fv-plugins-icon-container">


                                        <div class="card-body">
                                            <!--begin::Accordion-->
                                            <div class="accordion accordion-solid accordion-toggle-plus"
                                                id="accordionExample3">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne3">
                                                        <div class="card-title" data-toggle="collapse"
                                                            data-target="#collapseOne3" id="selectcategory">
                                                            <p id="sc1"></p>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOne3" class="collapse show"
                                                        data-parent="#accordionExample3">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label col-lg-3 col-sm-12 text-lg-right">Certificate</label>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                    <div class="dropzone dropzone-default dropzone-primary"
                                                                        id="kt_dropzone_2">
                                                                        <div class="dropzone-msg dz-message needsclick">
                                                                            <input type="file" name="certificate"
                                                                                accept=".png, .jpg, .jpeg, .pdf, .docx" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label
                                                                    class="font-size-h6 font-weight-bolder text-dark">Expereince</label>
                                                                <input type="text" class="form-control "
                                                                    name="expereince" placeholder="experience"
                                                                    value="{{ old('educationinstutional_name') }}" />
                                                                @if ($errors->has('experience'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('experience') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo3">
                                                        <div class="card-title collapsed" data-toggle="collapse"
                                                            data-target="#collapseTwo3">
                                                            <p id="sc2"></p>
                                                        </div>
                                                    </div>
                                                    <div id="collapseTwo3" class="collapse"
                                                        data-parent="#accordionExample3">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label col-lg-3 col-sm-12 text-lg-right">Certificate</label>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                    <div class="dropzone dropzone-default dropzone-primary"
                                                                        id="kt_dropzone_2">
                                                                        <div class="dropzone-msg dz-message needsclick">
                                                                            <input type="file" name="certificate"
                                                                                accept=".png, .jpg, .jpeg, .pdf, .docx" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="font-size-h6 font-weight-bolder text-dark">Expereince</label>
                                                                <input type="text" class="form-control "
                                                                    name="expereince" placeholder="experience"
                                                                    value="{{ old('educationinstutional_name') }}" />
                                                                @if ($errors->has('experience'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('experience') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree3">
                                                        <div class="card-title collapsed" data-toggle="collapse"
                                                            data-target="#collapseThree3">
                                                            <p id="sc3"></p>
                                                        </div>
                                                    </div>
                                                    <div id="collapseThree3" class="collapse"
                                                        data-parent="#accordionExample3">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label col-lg-3 col-sm-12 text-lg-right">Certificate</label>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                    <div class="dropzone dropzone-default dropzone-primary"
                                                                        id="kt_dropzone_2">
                                                                        <div class="dropzone-msg dz-message needsclick">
                                                                            <input type="file" name="certificate"
                                                                                accept=".png, .jpg, .jpeg, .pdf, .docx" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="font-size-h6 font-weight-bolder text-dark">Expereince</label>
                                                                <input type="text" class="form-control "
                                                                    name="expereince" placeholder="experience"
                                                                    value="{{ old('educationinstutional_name') }}" />
                                                                @if ($errors->has('experience'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('experience') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>



                                        <div class="fv-plugins-message-container">


                                        </div>


                                        <div class="fv-plugins-message-container"></div>
                                    </div>


                                </div>
                                <!--end::Wizard Step 2-->
                                <!--begin::Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Your Education Background</h4>
                                    <!--begin::Select-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <div class="pb-10 pb-lg-12">
                                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Add
                                                Your Education
                                                Background</h3>

                                        </div>
                                    </div>
                                    <!--begin::Title-->
                                    <!--begin::Form Group-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Name of School, College
                                            or
                                            University</label>
                                        <input type="text" class="form-control " name="educationinstutional_name"
                                            placeholder="Name" value="{{old('educationinstutional_name')}}" />
                                        @if ($errors->has('educationinstutional_name'))
                                        <span
                                            class="text-danger">{{ $errors->first('educationinstutional_name') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Form Group-->

                                    <!--begin::Form Group-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Degree</label>

                                        <select class="form-control" id="user_type" name="degree"
                                            value="{{old('degree')}}">
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
                                            <input class="form-control" type="date" value="" id="example-date-input"
                                                name="start_date" />
                                        </div>
                                        <!--end::Form Group-->
                                        <!--begin::Form Group-->
                                        <div class="form-group">
                                            <label class="font-size-h6 font-weight-bolder text-dark">End Date</label>

                                            <div class="col-10">
                                                <input class="form-control" type="date" value="" id="example-date-input"
                                                    name="end_date" />
                                            </div>
                                            <!--end::Form Group-->
                                            <!--end::Form Group-->
                                            <!--begin::Form Group-->
                                            <div class="form-group">
                                                <label class="font-size-h6 font-weight-bolder text-dark">Total
                                                    GPA</label>
                                                <input type="text" class="form-control " name="gpa"
                                                    placeholder="Your gpa" value="{{old('gpa')}}" />
                                                @if ($errors->has('gpa'))
                                                <span class="text-danger">{{ $errors->first('gpa') }}</span>
                                                @endif
                                            </div>
                                            <!--end::Form Group-->




                                            <!--begin::Action-->

                                        </div>
                                    </div>







                                </div>
                                <div class="fv-plugins-message-container"></div>


                        </div>
                        <!--end::Select-->
                    </div>
                    <!--end::Wizard Step 3-->

                    <div class="pb-5" data-wizard-type="step-content">
                        <h4 class="mb-10 font-weight-bold text-dark">Reference certificate for each selected
                            skills category</h4>
                        <!--begin::Input-->


                        <div class="form-group fv-plugins-icon-container">


                            <div class="card-body">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample3">
                                    <div class="card">
                                        <div class="card-header" id="headingOne3">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne3">
                                                <p id="sct1">
                                            </div>
                                        </div>
                                        <div id="collapseOne3" class="collapse show" data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-lg-3 col-sm-12 text-lg-right">Reference</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <div class="dropzone dropzone-default dropzone-primary"
                                                            id="kt_dropzone_2">
                                                            <div class="dropzone-msg dz-message needsclick">
                                                                <input type="file" name="reference"
                                                                    accept=".png, .jpg, .jpeg, .pdf, .docx" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo3">
                                            <div class="card-title collapsed" data-toggle="collapse"
                                                data-target="#collapseTwo3">
                                                <p id="sct2">
                                            </div>
                                        </div>
                                        <div id="collapseTwo3" class="collapse" data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-lg-3 col-sm-12 text-lg-right">Reference</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <div class="dropzone dropzone-default dropzone-primary"
                                                            id="kt_dropzone_2">
                                                            <div class="dropzone-msg dz-message needsclick">
                                                                <input type="file" name="reference"
                                                                    accept=".png, .jpg, .jpeg, .pdf, .docx" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree3">
                                            <div class="card-title collapsed" data-toggle="collapse"
                                                data-target="#collapseThree3">
                                                <p id="sct3">
                                            </div>
                                        </div>
                                        <div id="collapseThree3" class="collapse" data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-lg-3 col-sm-12 text-lg-right">Reference</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <div class="dropzone dropzone-default dropzone-primary"
                                                            id="kt_dropzone_2">
                                                            <div class="dropzone-msg dz-message needsclick">
                                                                <input type="file" name="reference"
                                                                    accept=".png, .jpg, .jpeg, .pdf, .docx" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Accordion-->
                            </div>



                            <div class="fv-plugins-message-container">


                            </div>


                            <div class="fv-plugins-message-container"></div>
                        </div>


                    </div>
                    <!--begin::Wizard Step 4-->
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
                                <textarea class="form-control" id="exampleTextarea" rows="3"
                                    name="personal_description"></textarea>
                            </div>
                        </div>
                        <div class="fv-plugins-message-container"></div>



                        <div class="form-group fv-plugins-icon-container">
                            <div class="col-9 col-form-label">
                                <label for="exampleTextarea">9. How many working hours per week?
                                    <input type="text" class=" form-control " name="hours"
                                        placeholder="enter your work hours" rows="1" />
                            </div>
                        </div>
                        <div class="fv-plugins-message-container"></div>

                        <div class="form-group fv-plugins-icon-container">
                            <label class="col-9 col-form-label">10. What are the days you are working?
                            </label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">

                                    <input id="kt_tagify_workingdays" class="form-control tagify" name="working_days"
                                        placeholder="Add sub-categories">
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
                                        <input type="range" min="1" max="100" value="0" class="slider" id="myRange"
                                            name="total distance">
                                        <p>Total Distance: <span id="demo"></span></p>
                                    </div>
                                    <style>

                                    </style>

                                    <script>

                                    </script>
                            </div>
                        </div>
                        <div class="fv-plugins-message-container"></div>
                    </div>






                    <!--end::Wizard Step 4-->
                    <!--begin::wizard Step 5 -->

                    <div class="pb-5" data-wizard-type="step-content">
                        <h4 class="mb-10 font-weight-bold text-dark">Upload Your Profile Image</h4>
                        <!--begin::Input-->
                        <div class="form-group fv-plugins-icon-container">
                            <label class="col-9 col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input" id="kt_image_3">
                                    <div class="image-input-wrapper" style="">
                                        <img src="
                                                    @if(!is_null($document->where('type','profile_picture')->first()))
                                                    {{ asset('storage/'.$document->where('type','profile_picture')->first()->path)}}
                                                    @else
                                                    {{asset('images/unknown-avatar.png') }}
                                                    @endif
                                                " alt="Admin" class="rounded-circle object-fit-scale-down" width="150"
                                            height="150">
                                    </div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profile" accept=".png, .jpg, .jpeg"
                                            value="@if($errors->any()){{{old('profile')}}} @endif" />
                                        <input type="hidden" name="profile_avatar_remove" />
                                    </label>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                            </div>


                        </div>
                        <div class="fv-plugins-message-container"></div>
                    </div>





                    <!--end::wizard step 5 -->
                    <!--begin::wizard step 6 -->
                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                        <h3 class="mb-10 font-weight-bold text-dark">Enter your Address</h3>
                        <!--begin::Select-->
                        <div class="form-group fv-plugins-icon-container">
                            <label>Street</label>
                            <input type="text" name="street" class="form-control form-control-solid form-control-lg"
                                placeholder="Enter your street" />
                        </div>

                        <div class="fv-plugins-message-container"></div>

                        <div class="form-group fv-plugins-icon-container">
                            <label>House Number or Unit (Optional)</label>
                            <input type="text" name="house_number"
                                class="form-control form-control-solid form-control-lg"
                                placeholder="Enter your House number" />
                        </div>

                        <div class="fv-plugins-message-container"></div>

                        <div class="form-group fv-plugins-icon-container">
                            <label> Postal Code (Optional)</label>
                            <input type="text" name="postal_code"
                                class="form-control form-control-solid form-control-lg"
                                placeholder="Enter your  Postal Code (Optional)" />
                        </div>

                        <div class="fv-plugins-message-container"></div>
                        <div class="form-group fv-plugins-icon-container">
                            <label>City</label>
                            <select name="city" class="form-control form-control-solid form-control-lg">
                                <option value="">Select</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU" selected="selected">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia, Plurinational State of</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="fv-plugins-message-container"></div>
                    </div>


                    <!--end:: wizard step 6 -->
                    <!--begin::wizard step 7 -->
                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                        <h3 class="mb-10 font-weight-bold text-dark">Plase Check all information before Submit</h3>
                        <!--begin::Select-->
                        <div class="form-group fv-plugins-icon-container">
                            <h1> if all input information were correct, then click on Submit button. </h1>
                        </div>
                        <div class="fv-plugins-message-container"></div>
                    </div>

                    <!--end::Select-->

                    <!--end:: wizard step 7 -->


                    <!--begin::Wizard Actions-->
                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                        <div class="mr-2">
                            <button type="button"
                                class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
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
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    </form>
                    <!--end::Wizard Form-->
                </div>
            </div>
            <!--end::Wizard Body-->
        </div>
        <!--end::Wizard-->
    </div>
    <!--end::Wizard-->
</div>
</div>
<!--end::Container-->
</div>
@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('css/custom/create-project-wizard-custom.css') }}" rel="stylesheet" type="text/css" />



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

    document.getElementById("card_two").style.display = "none";
    document.getElementById("card_three").style.display = "none";

</script>
@endsection
