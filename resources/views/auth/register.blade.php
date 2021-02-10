{{$show_sidebar = false}}
@extends('layouts.app')
@section('content')

		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
		<div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
			<!--begin::Login-->
			<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
				<!--begin::Content-->
				<div class="login-container d-flex flex-center flex-row flex-row-fluid order-2 order-lg-1 flex-row-fluid bg-white py-lg-0 pb-lg-0 pt-15 pb-12">
					<!--begin::Container-->
					<div class="login-content login-content-signup d-flex flex-column">
						<!--begin::Aside Top-->
						
							<!--begin::Aside header-->
							<a href="#" class="login-logo pb-lg-4 pb-10">
								<img src="{{asset('media/logos/logo-4.png')}}" class="max-h-70px" alt="" />
							</a>
							<!--end::Aside header-->
							<!--begin: Wizard Nav-->
							
						<!--end::Aside Top-->
						<!--begin::Signin-->
						<div class="login-form">
							<!--begin::Form-->
							<form  method = "POST" action ="{{ route('register') }}">
								@csrf
								<!--begin: Wizard Step 1-->
								<div class="" data-wizard-type="step-content" data-wizard-state="current">
									<!--begin::Title-->
									<div class="pb-10 pb-lg-12">
										<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Create Account</h3>
										<div class="text-muted font-weight-bold font-size-h4">Already have an Account ?
										<a href="/login" class="text-primary font-weight-bolder">Sign In</a></div>
									</div>
									<!--begin::Title-->
									<!--begin::Form Group-->
									<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Full Name</label>
										<input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="name" placeholder="Name" value="" />
									</div>
									<!--end::Form Group-->
									<!--begin::Form Group-->
									<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
										<input type="email" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="email" placeholder="Email" value="" />
									</div>
									<!--end::Form Group-->
										<!--begin::Form Group-->
										<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Phone</label>
										<input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="phone" placeholder="Phone" value="" />
									</div>
									<!--end::Form Group-->

										<!--begin::Form Group-->
										<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Type</label>
										
										<select class="form-control" id="user_type" name="user_type">
										<option value = "">Select</option>	
										<option value = "general_user" id="type1">General</option>
										<option value = "Business" id="type2">Business</option>
										<option value = "individual_contractor" id="type3">Independent</option>
										</select>
										</div>
										

									<!--end::Form Group-->

									<!--begin::Form Group-->
									<div class="form-group" id="genders">
										<label class="font-size-h6 font-weight-bolder text-dark">Gender</label>
										
										<select class="form-control"  name="gender">
										<option value = "Male" >Male</option>
										<option value = "Female" >Female</option>
										<option value = "Custom">Custom</option>
										</select>
										</div>
										

									<!--end::Form Group-->

										<!--end::Form Group-->
										<!--begin::Form Group-->
										<div class="form-group" id="webpersonal">
										<label class="font-size-h6 font-weight-bolder text-dark">Website</label>
										<input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="websitepersonal" placeholder="Website (Optional)" value="" />
									</div>
									<!--end::Form Group-->
										<!--end::Form Group-->
										<!--begin::Form Group-->
										<div class="form-group" id="companyname" >
										<label class="font-size-h6 font-weight-bolder text-dark">CompanyName</label>
										<input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="companyname" placeholder="Company Name" value="" />
									</div>
									<!--end::Form Group-->
										<!--end::Form Group-->
										<!--begin::Form Group-->
										<div class="form-group" id="webcompany">
										<label class="font-size-h6 font-weight-bolder text-dark">Website</label>
										<input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="websitecompany" placeholder="Website (Optional)" value="" />
									</div>
									<!--end::Form Group-->
										<!--begin::Form Group-->
										<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark">Password</label>
										<input type="password" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password" placeholder="Password" value="" />
									</div>
									<!--end::Form Group-->
									<!--begin::Form Group-->
										<div class="form-group">
										<label class="font-size-h6 font-weight-bolder text-dark"> Confirm Password</label>
										<input type="password" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="cpassword" placeholder=" Confirm Password" value="" />
									</div>
									<!--end::Form Group-->

									<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
									
									
								</div>
								</div>
								
						</div>
						<!--end::Signin-->
					</div>
					<!--end::Container-->
				
				<!--begin::Content-->
				
				<!--end::Aside-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
	

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('css/pages/login/login-4.css') }}" rel="stylesheet" type="text/css"/>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/custom/login/login-4.js') }}" type="text/javascript"></script>
	{{-- Scripts Section --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
	<script>
		  
		  document.getElementById("genders").style.display="none";
     document.getElementById("webpersonal").style.display="none";
     document.getElementById("webcompany").style.display="none";
     document.getElementById("companyname").style.display="none";
		</script>

@endsection	
       
    
 

