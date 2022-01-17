@extends('/app')

@section('title', 'InstaDeck || Post')

@section('content')
<div class="container" id="dhs_show-post-default">
    <div class="row">
        <div class="col-6">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-6">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark">
                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle dhs_pp-post-detail">
                        </a>
                    </div>
                    <div>
                        <div class="font-weight-bold d-flex">
                            <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark mr-1">{{ $post->user->username }}</a>
                            @if ($post->user->id != auth()->user()->id)
                                |
                                <follow-link user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-link>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark">{{ $post->user->username }}</a>
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container" id="dhs_show-post-responsive">
    <div class="row">
        <div class="col-8 offset-2 d-flex align-items-center pb-2">
            <div class="pr-3">
                <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle dhs_pp-post-detail">
                </a>
            </div>
            <div>
                <div class="font-weight-bold d-flex">
                    <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark mr-1">{{ $post->user->username }}</a>
                    @if ($post->user->id != auth()->user()->id)
                        |
                        <follow-link user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-link>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2">
            <a href="/post/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2 pt-2 pb-4">
            <div>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark">{{ $post->user->username }}</a>
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection