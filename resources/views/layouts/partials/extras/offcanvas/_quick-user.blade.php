@php
$direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
{{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10" style="z-index:9999;">
    {{-- Header --}}
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">
            User Profile
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>

    {{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
        {{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-85 mr-5">
                @auth
                @php
                    $docs = auth()->user()->documents->where('type', 'profile_picture')->first();
                @endphp
                @if (!is_null($docs))
                <div class="symbol-label" style="background-image:url('{{ asset('storage/'.$docs->path)}}')">
                </div>
                @else
                <div class="symbol-label" style="background-image:url('{{ asset('images/unknown-avatar.png') }}')"></div>
                @endif
                @endauth
                <!--i class="symbol-badge bg-success"></i-->
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    @auth
                    <a href="{{ route('viewProfile') }}">
                        <span class="text-dark font-weight-bold">
                            {{ auth()->user()->name }}
                        </span>
                    </a>
                    @endauth
                </a>
                <div class="text-muted mt-1">
                    {{ auth()->user()->userType() }}
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                {{ Metronic::getSVG('media/svg/icons/Communication/Mail-notification.svg', 'svg-icon-lg svg-icon-primary') }}
                            </span>
                            <span class="navi-text text-muted text-hover-primary">
                                @auth
                                {{ auth()->user()->email() }}
                                @endauth
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Separator --}}
        <div class="separator separator-dashed mt-8 mb-5"></div>

        {{-- Nav --}}
        <div class="navi navi-spacer-x-0 p-0">
            {{-- Item --}}
            <a href="/home" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            {{ Metronic::getSVG('media/svg/icons/Home/Home.svg', 'svg-icon-md svg-icon-success') }}
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Dashboard
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>
            <a href="{{ route('viewProfile') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            {{ Metronic::getSVG('media/svg/icons/General/User.svg', 'svg-icon-md svg-icon-success') }}
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Profile
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>

            <a href="{{ route('listTask') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            {{ Metronic::getSVG('media/svg/icons/Text/Bullet-list.svg', 'svg-icon-md svg-icon-success') }}
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Tasks
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>

            <a href="{{ route('accountSecurity') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            {{ Metronic::getSVG('media/svg/icons/General/Lock.svg', 'svg-icon-md svg-icon-success') }}
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Account Setting
                        </div>
                        <!-- <div class="text-muted">
  View your profile
  <span class="label label-light-danger label-inline font-weight-bold">update</span>
  </div>
 -->
                    </div>
                </div>
            </a>

            {{-- Logout --}}
            <a href="{{ route('logout') }}" class="navi-item" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            {{ Metronic::getSVG('media/svg/icons/Navigation/Sign-out.svg', 'svg-icon-md svg-icon-primary') }}
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Logout
                        </div>
                    </div>
                </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
