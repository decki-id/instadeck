@extends('/app')

@section('title', 'InstaDeck || Profile')

@section('content')
    @if (isset($user))
        <div class="container">
            <div class="py-3" id="dhs_row-default">
                <div class="col-3 pl-5 pr-5 mt-auto mb-auto text-center">
                    <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" id="dhs_profile-picture">
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-start align-items-center">
                        @guest
                            <h5 class="pr-3 dhs_h5">{{ $user->username }}</h5>
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @else
                            @if ($user->id != auth()->user()->id)
                                <h5 class="pr-3 dhs_h5">{{ $user->username }}</h5>
                                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                            @endif
                        @endguest
                    </div>
                    <div class="d-flex pt-2">
                        <div class="mr-5"><strong>{{ $postsCount }}</strong> Posts</div>
                        <div class="mr-5"><strong>{{ $followersCount }}</strong> Followers</div>
                        <div><strong>{{ $followingCount }}</strong> Following</div>
                    </div>
                    <div class="pt-2 font-weight-bold">{{ $user->profile->title }}</div>
                    <div>{{ $user->profile->description }}</div>
                    <div><a href="https://{{ $user->profile->url }}" class="dhs_link">{{ $user->profile->url }}</a></div>
                </div>
                <div class="col-3">
                    @can ('update', $user->profile)
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="/post/create" class="btn btn-sm btn-primary mr-3">Create New Post</a>
                            <a href="/profile/{{ $user->username }}/edit" class="btn btn-sm btn-success">Edit Profile</a>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="py-3" id="dhs_row-responsive">
                <div class="text-center mt-auto mb-auto" id="dhs_pp-div-responsive">
                    <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" id="dhs_profile-picture">
                </div>
                <div id="dhs_profile-detail-responsive">
                    <div class="d-flex justify-content-start align-items-center">
                        @guest
                            <h5 class="pr-3 dhs_h5">{{ $user->username }}</h5> 
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @else
                            @if ($user->id != auth()->user()->id)
                                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                            @endif
                        @endguest
                    </div>
                    <div class="pt-2" id="dhs_pff-phone">
                        <div class="text-center mr-3"><strong>{{ $postsCount }}</strong><br> Posts</div>
                        <div class="text-center mr-3"><strong>{{ $followersCount }}</strong><br> Followers</div>
                        <div class="text-center"><strong>{{ $followingCount }}</strong><br> Following</div>
                    </div>
                    <div class="pt-2" id="dhs_pff-tab">
                        <div class="mr-3"><strong>{{ $postsCount }}</strong> Posts</div>
                        <div class="mr-3"><strong>{{ $followersCount }}</strong> Followers</div>
                        <div><strong>{{ $followingCount }}</strong> Following</div>
                    </div>
                    <div id="dhs_profile1">
                        <div class="pt-2 font-weight-bold">{{ $user->profile->title }}</div>
                        <div>{{ $user->profile->description }}</div>
                        <div><a href="https://{{ $user->profile->url }}" class="dhs_link">{{ $user->profile->url }}</a></div>
                    </div>
                </div>
            </div>
            <div class="pb-3" id="dhs_profile2">
                <div class="pt-2 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="https://{{ $user->profile->url }}" class="dhs_link">{{ $user->profile->url }}</a></div>
            </div>
            <div class="row" id="dhs_bottom-btn">
                @can ('update', $user->profile)
                    <div class="col">
                        <a href="/profile/{{ $user->username }}/edit" class="form-control btn btn-success">Edit Profile</a>
                    </div>
                @endcan
            </div>
            <div class="row pt-4">
                @foreach($user->posts as $post)
                    <div class="col-4 pb-4">
                        <a href="/post/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="container">
            <div class="py-3" id="dhs_row-default">
                <div class="col-3 pl-5 pr-5 mt-auto mb-auto text-center">
                    <img src="{{ $profile->profile_picture_url }}" class="rounded-circle" id="dhs_profile-picture">
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-start align-items-center">
                        <h5 class="pr-3 dhs_h5">{{ $profile->username }}</h5>
                        <a href="https://instagram.com/deckideckidecki" target="_blank" class="btn btn-sm btn-info dhs_btn-text-white">
                            Follow Me on Instagram
                        </a>
                    </div>
                    <div class="d-flex pt-2">
                        <div class="mr-5"><strong>{{ $profile->media_count }}</strong> Posts</div>
                        <div class="mr-5"><strong>{{ $profile->followers_count }}</strong> Followers</div>
                        <div><strong>{{ $profile->follows_count }}</strong> Following</div>
                    </div>
                    <div class="pt-2 font-weight-bold">{{ $profile->name }}</div>
                    <div>{{ $profile->biography }}</div>
                    <div><a href="{{ $profile->website }}" class="dhs_link">{{ $profile->website }}</a></div>
                </div>
            </div>
            <div class="py-3" id="dhs_row-responsive">
                <div class="text-center mt-auto mb-auto" id="dhs_pp-div-responsive">
                    <img src="{{ $profile->profile_picture_url }}" class="rounded-circle" id="dhs_profile-picture">
                </div>
                <div id="dhs_profile-detail-responsive">
                    @if(Request::segment(2) == 'instagram-api')
                        <div class="d-flex justify-content-start align-items-center">
                            <h5 class="pr-3 dhs_h5">{{ $profile->username }}</h5>
                        </div>
                    @endif
                    <div class="pt-2" id="dhs_pff-phone">
                        <div class="text-center mr-3"><strong>{{ $profile->media_count }}</strong><br> Posts</div>
                        <div class="text-center mr-3"><strong>{{ $profile->followers_count }}</strong><br> Followers</div>
                        <div class="text-center"><strong>{{ $profile->follows_count }}</strong><br> Following</div>
                    </div>
                    <div class="pt-2" id="dhs_pff-tab">
                        <div class="mr-3"><strong>{{ $profile->media_count }}</strong> Posts</div>
                        <div class="mr-3"><strong>{{ $profile->followers_count }}</strong> Followers</div>
                        <div><strong>{{ $profile->follows_count }}</strong> Following</div>
                    </div>
                    <div id="dhs_profile1">
                        <div class="pt-2 font-weight-bold">{{ $profile->name }}</div>
                        <div>{{ $profile->biography }}</div>
                        <div><a href="{{ $profile->website }}" class="dhs_link">{{ $profile->website }}</a></div>
                    </div>
                </div>
            </div>
            <div class="pb-3" id="dhs_profile2">
                <div class="pt-2 font-weight-bold">{{ $profile->name }}</div>
                <div>{{ $profile->biography }}</div>
                <div><a href="{{ $profile->website }}" class="dhs_link">{{ $profile->website }}</a></div>
            </div>
            @if(Request::segment(2) == 'instagram-api')
                <div class="row" id="dhs_bottom-btn">
                    <div class="col">
                        <a href="https://instagram.com/deckideckidecki" target="_blank" class="form-control btn btn-info dhs_btn-text-white">
                            Follow Me on Instagram
                        </a>
                    </div>
                </div>
            @endif
            <div class="row pt-4">
                @for($a = 0; $a < count($media["data"]); $a++)
                    @foreach($media as $posts)
                        @if(isset($posts[$a]))
                            <div class="col-4 pb-4 dhs_posts-item">
                                <div class="dhs_posts-item-inner w-100 h-100">
                                    @if($posts[$a]['media_type'] == 'CAROUSEL_ALBUM')
                                        <div class="dhs_carousel-icon">
                                            <i class="fas fa-fw fa-images text-white"></i>
                                        </div>
                                    @endif
                                    @if($posts[$a]['media_type'] == 'IMAGE' || $posts[$a]['media_type'] == 'CAROUSEL_ALBUM')
                                        <div class="dhs_posts w-100 h-100">
                                            <img src="{{ $posts[$a]['media_url'] }}" class="w-100 h-100">
                                        </div>
                                        <div class="dhs_posts-info text-white d-flex justify-content-center align-items-center">
                                            <div class="mr-3"><i class="fas fa-fw fa-heart mr-1"></i>{{ $posts[$a]['like_count'] }}</div>
                                            <div class="ml-3"><i class="fas fa-fw fa-comment mr-1"></i>{{ $posts[$a]['comments_count'] }}</div>
                                        </div>
                                    @else
                                        <div class="dhs_posts w-100 h-100">
                                            <video class="w-100 h-100" preload="auto" autobuffer playsinline controls>
                                                <source src="{{ $posts[$a]['media_url'] }}">
                                            </video>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endfor
            </div>
        </div>
    @endif
@endsection