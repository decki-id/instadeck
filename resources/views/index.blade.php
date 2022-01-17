@extends('/app')

@section('title', 'InstaDeck || Home')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error')}}
            </div>
        @endif

        @if(session()->exists('posts'))
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-6 offset-3 d-flex align-items-center pb-2">
                        <div class="pr-3">
                            <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark">
                                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle dhs_pp-post-detail">
                            </a>
                        </div>
                        <div>
                            <div class="font-weight-bold d-flex">
                                <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark mr-1">{{ $post->user->username }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3">
                        <a href="/post/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3 pt-2 pb-4">
                        <div>
                            <p>
                                <span class="font-weight-bold">
                                    <a href="/profile/{{ $post->user->username }}" class="dhs_link-dark">{{ $post->user->username }}</a>
                                </span> {{ $post->caption }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row justify-content-center pt-5 pb-5">
                <div class="dhs_search-not-found">Welcome to InstaDeck!<br>If you following some accounts on InstaDeck, their posts will appear here.</div>
            </div>
        @endif

        <!-- <div class="row">
            <div class="col-12 d-flex justify-content-center">
                $posts->links("pagination::bootstrap-4")
            </div>
        </div> -->
    </div>
@endsection