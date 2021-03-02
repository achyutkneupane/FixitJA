
<div class="alert alert-custom alert-notice alert-light-{{$alert_type}} fade show" role="alert">
    <div class="alert-icon"><i class="{{$alert_type == 'danger' ? 'flaticon-warning' : 'flaticon-info'}}"></i></div>
    <div class="alert-text">{{$content}}</div>
    @if($has_button)
    <a href="#" class="btn btn-primary font-weight-bold px-5 py-3">{{$button_text}}</a>
    @endif
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>

