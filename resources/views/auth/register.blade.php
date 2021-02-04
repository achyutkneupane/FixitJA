@extends('layouts.app')

@section('content')
<!--begin::Main-->
<div class="d-flex flex-column flex-root">

    <!--begin::Signup-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
			
						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-20">
								<h3>Sign Up</h3>
								<div class="text-muted font-weight-bold">Enter your details to create your account</div>
							</div>
							<form  method="POST" action="{{ route('register') }}">
                            @csrf
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Fullname" name="name" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                                </div>
                                <div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Phone" name="phone" autocomplete="off" />
                                </div>
                                <div class="form-group mb-5">
                                <select id="user_type" name="user_type" class="form-control h-auto form-control-solid py-8 px-8">
                               <option value = "">Select</option>
                                   <option value = "general_user" id="type1">General</option>
                                   <option value = "Business" id="type2">Business</option>
                                   <option value = "individual_contractor" id="type3">Independent</option>
</select>
                                
                                  
                                </div>
                                <div class="form-group row" id="genders">
                                <select id="" name="gender" class="form-control h-auto form-control-solid py-8 px-8">
                               <option value = "">Select Gender</option>
                                   <option value = "Male" >Male</option>
                                   <option value = "Female" >Female</option>
                                   <option value = "Custom">Custom</option>

</select>
</div>
                                

                                <div class="form-group mb-5" id="webpersonal">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Website(Optional)" name="websitepersonal" />
                                </div>
                                
                                <div class="form-group mb-5" id="companyname">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Company Name" name="companyname" />
                                </div>
                                <div class="form-group mb-5" id="webcompany">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Website(Optional)" name="websitecompany" />
								</div>
                                
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword" />
								</div>
								<div class="form-group mb-5 text-left">
									<div class="checkbox-inline">
										<label class="checkbox m-0">
										<input type="checkbox" name="agree" />
										<span></span>I Agree the
										<a href="#" class="font-weight-bold ml-1">terms and conditions</a>.</label>
									</div>
									<div class="form-text text-muted text-center"></div>
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
									<button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign up form-->
						
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->

		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/custom/login/login-general.js"></script>
        <!--end::Page Scripts-->

        <script type="text/javascript">
     
     document.getElementById("genders").style.display="none";
     document.getElementById("webpersonal").style.display="none";
     document.getElementById("webcompany").style.display="none";
     document.getElementById("companyname").style.display="none";
     </script>
        
        @endsection
       
    
 

