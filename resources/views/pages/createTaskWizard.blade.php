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
                                    <h3 class="wizard-title">1. Project Category</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
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
                                    <h3 class="wizard-title">2. Project Descriptions</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-placeholder-1"></i>
                                    <h3 class="wizard-title">3. User Information & Address</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-globe"></i>
                                    <h3 class="wizard-title">4. Review & Submit</h3>
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
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="POST" action="{{ route('addProject') }}">
                                @csrf
                                <!--begin::Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h3 class="mb-10 font-weight-bold text-dark">Enter your task category</h3>
                                    <!--begin::Select-->
                                    <div class="accordion accordion-solid accordion-toggle-plus" id="accordionSubCat">
                                        {{-- Start Template Category --}}
                                        <div id="templateProjectWizardCategory" style="display: none;">
                                            <div class="card card-category-accordion-project-wizard" id="subCategoryTemplate_selector">
                                                <div class="card-header">
                                                    <div class="card-title" data-toggle="collapse" data-target="#collapseSubCatTemplate" id="subCategoryTemplateTitleDiv">
                                                        <span class="category-title" id="projectWizardCategoryTemplateTitle">Select Category</span>
                                                    </div>
                                                </div>
                                                <div id="collapseSubCatTemplate" class="collapse show">
                                                    <div class="card-body">
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Category</label>
                                                            <select id="categorySelectTemplate" subcatid="kt_tagify_subCat_project_wizard_Template" name="categoryTemplate" class="form-control form-control-solid form-control-sm project_category_select">
                                                                <option value="">Select Category</option>
                                                                @foreach($cats as $cat)
                                                                
                                                                <option value="{{ $cat->id }}">{{ ucwords($cat->name) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- <div class="fv-plugins-message-container"></div> -->
                                                        <!--end::Select-->
                                                        <!--begin::Select-->

                                                        <div class="form-group fv-plugins-icon-container">
                                                            <div id="divTagifykt_tagify_subCat_project_wizard_Template" style="display:none">
                                                                <label>Select Sub-Categories</label>
                                                                <input id="kt_tagify_subCat_project_wizard_Template" class="form-control" name="sub_categoriesTemplate" placeholder="Add sub-categories">
                                                            </div>
                                                            <!-- <div class="fv-plugins-message-container"></div> -->
                                                        </div>
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                                <div class="card-footer bg-transparent py-5" id="project_wizard_footer">
                                                    <button type="button" count-value="-1" id="remove_btn_project_wizard" category-accordion="subCategoryTemplate_selector" class="btn btn-danger remove-accordian-project-wizard">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="divProjectWizardCategory">

                                        </div>
                                        <input type="hidden" id="totalCatList" name="totalCatList">
                                        <input type="button" class="mr-auto ml-2 btn btn-primary mt-5" value="Add More Category " id="subCategoryAddButtonProjectWizard">
                                    </div>
                                    <div class="mt-3 text-muted">Select multiple subcategories. If you don't see your option just create one.</div>
                                </div>
                                <!--end::Wizard Step 1-->
                                <!--begin::Wizard Step 2-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Enter Task Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Title</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="name" placeholder="Task Title">
                                                <span class="form-text text-muted">Please enter your Task title</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Project Type</label>
                                                <select name="type" class="form-control form-control-solid form-control-sm">
                                                    <option value="">Select Project Type</option>
                                                    <option value="ready to hire">Ready To Hire</option>
                                                    <option value="planning">Required Planning and Budgeting</option>
                                                    <option value="N/A">Not Sure Yet</option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your project type.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Description</label>
                                                <textarea class="form-control form-control-solid form-control-sm" name="description" placeholder="Description" rows="7"></textarea>
                                                <span class="form-text text-muted">Please enter your Task Description</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Project Payment</label>
                                                <select name="payment_type" class="form-control form-control-solid form-control-sm">
                                                    <option value="">Select Payment Type</option>
                                                    <option value="project basis">Project Basis</option>
                                                    <option value="hourly basis">Hourly Basis</option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your project payment type.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Project Deadline</label>
                                                <select name="deadline" class="form-control form-control-solid form-control-sm">
                                                    <option value="">Select Payment Deadline</option>
                                                    <option value="flexible">Flexible</option>
                                                    <option value="asap">ASAP</option>
                                                    <option value="within a week">Within A Week</option>
                                                    <option value="within 2 weeks">Within Two Weeks</option>
                                                    <option value="within a month">Within A Month</option>
                                                    <option value="more than a month">More Than A Month</option>
                                                    <option value="N/A">Not Sure Yet</option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your project deadline.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Are you on site while working?</label>
                                                <select name="is_client_on_site" class="form-control form-control-solid form-control-sm">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                    <option value="NULL" selected>Not Sure Yet</option>
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Are repair parts provided?</label>
                                                <select name="is_repair_parts_provided" class="form-control form-control-solid form-control-sm">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                    <option value="NULL" selected>Not Sure Yet</option>
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2-->
                                <!--begin::Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">User Details</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="user_name" placeholder="Full Name" value="{{ !empty($user) ? $user->name : '' }}">
                                                <span class="form-text text-muted">Please enter your Full Name</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Phone</label>

                                                <input type="text" class="form-control form-control-solid form-control-sm" name="phone" placeholder="Phone" value="{{ !empty($user) ? $user->phone() : '' }}">
                                                <span class="form-text text-muted">Please enter your Phone</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Email</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="email" placeholder="Email" value="{{ !empty($user) ? $user->email() : '' }}">
                                                <span class="form-text text-muted">Please enter your Email</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>User Address</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <div class="form-group fv-plugins-icon-container">
                                                <!--begin::Select-->
                                                <label>City</label>
                                                <select class="form-control form-control-solid form-control-sm" id="citySelector" name="city">
                                                    @foreach($cities as $index => $city)
                                                    <option value="{{ $city->id }}" {{ ( !empty($user) && $city->id == $user->city->id) ? 'selected' : '' }}>{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="form-text text-muted">Please enter your City</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <!--end::Select-->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group fv-plugins-icon-container">
                                                <!--begin::Input-->
                                                <label>Street Address 1</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="street_01" placeholder="Street Address 1" value="{{ !empty($user) ? $user->street_01 : '' }}">
                                                <span class="form-text text-muted">Please enter your Street Address</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group fv-plugins-icon-container">
                                                <!--begin::Input-->
                                                <label>Street Address 2(Optional)</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="street_02" placeholder="Street Address 2" value="{{ !empty($user) ? $user->street_02 : '' }}">
                                                <span class="form-text text-muted">Please enter your Street Address</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>House Number or Unit(Optional)</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="house_number" placeholder="House Number or Unit">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Postal Code(Optional)</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="postal_code" placeholder="Postal Code">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Perish</label>
                                                <input type="text" class="form-control form-control-solid form-control-sm" name="perish" placeholder="Perish">
                                                <div class="fv-plugins-message-container"></div>
                                                <span class="form-text text-muted">Please enter your Perish</span>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="checkbox" id="locationCheck" name="user_equal_working" onchange="workingEqualsUser()" />
                                            <span class="font-weight-bold">Working Location is same as User Location</span>
                                        </div>
                                    </div>
                                    <div id="workingLocation" class="mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Working Location</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <!--begin::Select-->
                                                    <label>City</label>
                                                    <select class="form-control form-control-solid form-control-sm" id="citySelector" name="site_city">
                                                        @foreach($cities as $index => $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-text text-muted">Please enter your City</span>
                                                    <div class="fv-plugins-message-container"></div>
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <!--begin::Input-->
                                                    <label>Street Address 1</label>
                                                    <input type="text" class="form-control form-control-solid form-control-sm" name="site_street_01" placeholder="Street Address 1">
                                                    <span class="form-text text-muted">Please enter your Street Address</span>
                                                    <div class="fv-plugins-message-container"></div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <!--begin::Input-->
                                                    <label>Street Address 2(Optional)</label>
                                                    <input type="text" class="form-control form-control-solid form-control-sm" name="site_street_02" placeholder="Street Address 2">
                                                    <span class="form-text text-muted">Please enter your Street Address</span>
                                                    <div class="fv-plugins-message-container"></div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!--begin::Input-->
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>House Number or Unit(Optional)</label>
                                                    <input type="text" class="form-control form-control-solid form-control-sm" name="site_house_number" placeholder="House Number or Unit">
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-md-4">
                                                <!--begin::Input-->
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Postal Code(Optional)</label>
                                                    <input type="text" class="form-control form-control-solid form-control-sm" name="site_postal_code" placeholder="Postal Code">
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-md-4">
                                                <!--begin::Input-->
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Perish</label>
                                                    <input type="text" class="form-control form-control-solid form-control-sm" name="site_perish" placeholder="Perish">
                                                    <div class="fv-plugins-message-container"></div>
                                                    <span class="form-text text-muted">Please enter your Perish</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 3-->
                                <!--begin::Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2 row">
                                        <h3 class="col-md-12 my-3">Project Details</h3>
                                        <div class="col-md-12">
                                            <span class="font-weight-bold">Subcategories: </span>
                                            <span class="text-muted text-capitalize" id='subCatsId'></span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Task Title: </span>
                                            <span class="text-muted" id='taskTitleId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Task Description: </span>
                                            <span class="text-muted" id='taskDescriptionId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Project Type: </span>
                                            <span class="text-muted" id='taskTypeId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Payment Type: </span>
                                            <span class="text-muted" id='paymentTypeId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Project Deadline: </span>
                                            <span class="text-muted" id='projectDeadlineId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Are you on site while working? </span>
                                            <span class="text-muted" id='onSiteId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Are repair parts provided? </span>
                                            <span class="text-muted" id='repairPartId'>N/A</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2 row">
                                        <h3 class="col-md-12 my-3">User Details</h3>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Name: </span>
                                            <span class="text-muted" id='userNameId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Email: </span>
                                            <span class="text-muted" id='userEmailId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Phone: </span>
                                            <span class="text-muted" id='userPhoneId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">City: </span>
                                            <span class="text-muted" id='userCityId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Street Address 1: </span>
                                            <span class="text-muted" id='userStreet1Id'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Street Address 2: </span>
                                            <span class="text-muted" id='userStreet1Id'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">House Number: </span>
                                            <span class="text-muted" id='userHouseNumberId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Postal Code: </span>
                                            <span class="text-muted" id='userPostalCodeId'>N/A</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="font-weight-bold">Perish: </span>
                                            <span class="text-muted" id='userPerishId'>N/A</span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="font-weight-bold">Working Location is same as User Location: </span>
                                            <span class="text-muted" id='workingEqualUserId'>N/A</span>
                                        </div>
                                    </div>
                                    <div class="workingLocationReview" style="display:block;">
                                        <div class="d-flex align-items-center justify-content-between mb-2 row">
                                            <h3 class="col-md-12 my-3">Working Location</h3>
                                            <div class="col-md-6">
                                                <span class="font-weight-bold">City: </span>
                                                <span class="text-muted" id='workingCityId'>N/A</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="font-weight-bold">Street Address 1: </span>
                                                <span class="text-muted" id='workingStreet1Id'>N/A</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="font-weight-bold">Street Address 2: </span>
                                                <span class="text-muted" id='workingStreet1Id'>N/A</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="font-weight-bold">House Number: </span>
                                                <span class="text-muted" id='workingHouseNumberId'>N/A</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="font-weight-bold">Postal Code: </span>
                                                <span class="text-muted" id='workingPostalCodeId'>N/A</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="font-weight-bold">Perish: </span>
                                                <span class="text-muted" id='workingPerishId'>N/A</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 4-->

                                <!--begin::Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                        <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
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
<script
    src="{{ asset('js/custom/create-project-wizard-custom.js') }}" type="text/javascript">
</script>
<script
    src="{{ asset('js/custom/create-project-tagify.js') }}" type="text/javascript">
</script>
<script>
    var fixedNavbarWebsite = true;
    $(".navbar-marketing").addClass("navbar-scrolled");
    $(".navbar-marketing").removeClass("fixed-top");
    // $('#citySelector').select2({
    //     placeholder: "Select a City"
    // });
</script>
@endsection
