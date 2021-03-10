@extends('layouts.app')
@section('content')
<div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div>
<form method ="post" action="/profile" enctype="multipart/form-data" multiple>
@csrf
<div class="form-group fv-plugins-icon-container">
                                        <label>Certificate</label>
                                        <input name="certificate[]" class="form-control form-control-solid form-control-lg" type="file"  multiple />
                                        <span class="form-text text-muted">Please area of covering.</span>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <div class="pb-lg-0 pb-5">
                                <button type="submit" id="Upload" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Upload</button>
                            </div>
</form>

<h1> Your certificate are </h1>

 @foreach($user as $users )
 {{ $users->certificate}}
 <img src="{{ asset('uploads/documents/'.$users->certificate) }}" class="img-fluid img-thumbnail" id="movies_image" style="height:300px;width:300px;">
 

 @endforeach               
                     

                    
                            
                       
                 
@endsection