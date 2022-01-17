@extends('/app')

@section('title', 'InstaDeck || Create New Post')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <form action="/post" enctype="multipart/form-data" method="post">
                @csrf
                <div class="text-center"><h2>{{ __('New Post') }}</h2></div>
                <div class="form-group row">
                    <label for="image" class="col-form-label">{{ __('Post Image') }}</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')<strong>{{ $message }}</strong>@enderror
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-form-label">{{ __('Post Caption') }}</label>
                    <textarea
                        id="caption"
                        type="text"
                        class="form-control @error('caption') is-invalid @enderror"
                        name="caption"
                        autocomplete="caption">{{ old('caption') }}
                    </textarea>
                    @error('caption')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group row pt-3">
                    <div class="col"><button class="form-control btn btn-primary">Post</button></div>
                    <div class="col"><a href="/profile/{{ Auth::user()->username }}" class="form-control btn btn-danger">Cancel</a></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>window.onload = function () { document.querySelector("#image").focus(); }</script>
@endsection