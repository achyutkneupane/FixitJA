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
                                <!--end::Wizard Step 4 Nav-->
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
                                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post">
                                    @csrf
                                    <!--begin::Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h3 class="mb-10 font-weight-bold text-dark">Enter your category details</h3>
                                        <!--begin::Select-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>Category</label>

                                            <select name="skills_category" id="selected_catgeory"
                                                class="form-control form-control-solid form-control-lg">
                                                <option value="">Select Category </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>

                                            <div class="fv-plugins-message-container"></div>
                                        </div>
                                        <!--end::Select-->
                                        <!--begin::Select-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>Sub category</label>
                                            <div>
                                                <input id="kt_tagify_custom" class="form-control tagify"
                                                    name="sub_categories" placeholder="Add sub-categories">
                                                <div class="mt-3 text-muted">Select multiple subcategories. If you don't see
                                                    your option just create one.</div>
                                            </div>
                                            <div class="fv-plugins-message-container"></div>
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


                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-right"
                                                    id="choosencategory"></label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <div class="dropzone dropzone-default dropzone-primary"
                                                        id="kt_dropzone_2">
                                                        <div class="dropzone-msg dz-message needsclick" name="certificate">
                                                            <h3 class="dropzone-msg-title">Drop files here or click to
                                                                upload.</h3>
                                                            <span class="dropzone-msg-desc">Upload up to 10 files</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="fv-plugins-message-container">
                                                <div class="form-group">
                                                    <label
                                                        class="font-size-h6 font-weight-bolder text-dark">Expereince</label>
                                                    <input type="text" class="form-control " name="expereince"
                                                        placeholder="experience"
                                                        value="{{ old('educationinstutional_name') }}" />
                                                    @if ($errors->has('experience'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('experience') }}</span>
                                                    @endif
                                                </div>

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
                                            <div class="card-toolbar">
                                                <!--begin::Dropdown-->



                                                <!--begin::Button-->
                                                <a href="/addeducation" class="btn btn-primary font-weight-bolder"
                                                    style="float:right">
                                                    <span class="svg-icon svg-icon-md">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                <path
                                                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span> Add Education Background</a>
                                                <!--end::Button-->
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!--begin: Datatable-->
                                            <table class="table table-bordered table-checkable" id="kt_datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Record ID</th>
                                                        <th>Name of School, Colleges of University</th>
                                                        <th>Degree </th>
                                                        <th>Start Date</th>
                                                        <th>Graduated date</th>
                                                        <th>Total Gpa</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Munal Adarasha Viday Sadan</td>
                                                        <td>Secondary level</td>
                                                        <td>2058</td>
                                                        <td>2070</td>
                                                        <td>3.8 gpa</td>
                                                        <td><button type="button" class="btn btn-primary">Edit</button></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end: Datatable-->
                                        </div>
                                    </div>
                                    <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Select-->
                        </div>
                        <!--end::Wizard Step 3-->
                        <!--begin::Wizard Step 4-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Please answer the question</h4>
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-9 col-form-label">7. Are you willing to go for backgroud check or criminal
                                    report?</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline checkbox-success">
                                            <input type="checkbox" name="police_report" />
                                            <span></span>Yes</label>
                                        <label class="checkbox checkbox-outline checkbox-success">
                                            <input type="checkbox" name="police_report" />
                                            <span></span>No</label>

                                    </div>

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
                                        <input type="text" class=" form-control " name="hrs-per_weeks"
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
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline checkbox-success">
                                            <input type="checkbox" name="long_distance" />
                                            <span></span>Yes</label>
                                        <label class="checkbox checkbox-outline checkbox-success">
                                            <input type="checkbox" name="long_distance" />
                                            <span></span>No</label>

                                    </div>

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
                                    <div class="image-input" id="kt_image_2">
                                        <div class="image-input-wrapper"
                                            style="background-image: url({{ asset('media/users/blank.png') }})"></div>
                                        <label
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="change" data-toggle="tooltip" title=""
                                            data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="profile" accept=".png, .jpg, .jpeg" />
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
                                    <option value="AF">Category 1</option>
                                    <option value="AX">Category 2</option>
                                    <option value="AL">Category 3</option>
                                    <option value="DZ">Category 4</option>
                                </select>
                            </div>
                            <div class="fv-plugins-message-container"></div>
                        </div>


                        <!--end:: wizard step 6 -->
                        <!--begin::wizard step 7 -->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h3 class="mb-10 font-weight-bold text-dark">Enter your Address</h3>
                            <!--begin::Select-->
                            <div class="form-group fv-plugins-icon-container">
                                <h1> all input data </h1>
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
    <script src="{{ asset('js/custom/create-workingdays-tagify.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/crud/file-upload/dropzonejs.js') }}"></script>
    <script src="{{ asset('js/pages/crud/file-upload/image-input.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
    <script>
        var fixedNavbarWebsite = true;
        $(".navbar-marketing").addClass("navbar-scrolled");
        $(".navbar-marketing").removeClass("fixed-top");

    </script>
@endsection
