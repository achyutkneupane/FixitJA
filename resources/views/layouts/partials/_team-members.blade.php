<!--begin::Content-->
<div class="flex-row-lg-fluid ml-lg-8">
    <!--begin::Row-->
    <div class="row">
        <!--begin::Col-->
        @foreach($users as $user)
        <div class="col-xl-4">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body pt-4 d-flex flex-column justify-content-between">
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                            <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                <div class="symbol-label" style="background-image:url('{{ !empty($user->documents->where('type', 'profile_picture')->first()) ? asset('storage/' . $user->documents->where('type', 'profile_picture')->first()->path) : asset('images/unknown-avatar.png') }}')";></div>

                            </div>
                            <div class="symbol symbol-lg-75 symbol-primary d-none">
                                <span class="font-size-h3 font-weight-boldest">JM</span>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column" style="display:inline">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $user->name }}</a>

                            @foreach($user->allCategories() as $category)
                            @if($loop->last)
                                 {{ ucwords($category['category']['category_name']) }}
                            @else
                                {{ ucwords($category['category']['category_name']) }},
                            @endif
                            @endforeach
                          

                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::User-->
                    <!--begin::Desc-->
                    <p class="mb-7">
                   {{ $user-> introduction}}
                    </p>
                    <!--end::Desc-->
                    <!--begin::Info-->
                    <div class="mb-7">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>

                            <a href="mailto:contact@fixtija.com" class="text-muted text-hover-primary">contact@fixtija.com</a>



                        </div>
                        <div class="d-flex justify-content-between align-items-cente my-1">
                            <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>

                            <a href="tel:555-565-1846" class="text-muted text-hover-primary">(555) 565-1846</a>

                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                            <span class="text-muted">{{ $user->city->name }}</span>
                        </div>
                    </div>
                    <!--end::Info-->
                    <a href="/contact" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">Contact Us</a>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        @endforeach
        <!--end::Col-->


    </div>
    <!--end::Row-->

</div>
<!--end::Content-->
