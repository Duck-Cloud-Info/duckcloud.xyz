@extends("frontend.master")

@push('meta')
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 150) }}" />
    <meta property="og:url" content="{{ request()->fullUrl() }}" />
    <meta property="og:image" content="{{ asset('uploads/post/' . $post->thumbnail) }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $post->title }}" />
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 150) }}" />
    <meta name="twitter:image" content="{{ asset('uploads/post/' . $post->thumbnail) }}" />

    <link rel="canonical" href="{{ request()->fullUrl() }}" />
    <meta name="author" content="{{ $post->user->name }}" />

@endpush

@section("title", $post->title." - ".config('app.sitesettings')::first()->site_title)

@section("content")
<section class="post-single">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="post-single-image">
                    <img src="{{ asset("uploads/post/".$post->thumbnail) }}" alt="{{ $post->title }}"/>
                </div>
                <div class="post-single-body">
                    <div class="post-single-title">
                        <h1>{{ $post->title }}</h1>
                        <ul class="entry-meta">
                            <li class="post-author-img"><img src="{{ asset("uploads/author/".($post->user->profile ?? "default.webp")) }}" alt="{{ $post->user->name }}"/></li>
                            <li class="post-author"><a href="{{ route("frontend.user", $post->user->username) }}">{{ $post->user->name }}</a></li>
                            <li class="entry-cat"><a href="{{ route("frontend.category", $post->category->slug) }}" class="category-style-1"><span class="line"></span>{{ $post->category->title }}</a></li>
                            <li class="post-date"><span class="line"></span>{{ $post->created_at->format("F d, Y") }}</li>
                            <li class="post-views">
                                <span class="line"></span><i class="fa fa-eye"></i> {{ $post->views }} views
                            </li>
                        </ul>
                    </div>
                    <div class="post-single-content">
                        {!! $post->content !!}
                    </div>
                    <div class="post-single-bottom">
                        @if ($post->tags_count > 0)
                        <div class="tags">
                            <p>Tags:</p>
                            <ul class="list-inline">
                                @foreach ($post->tags as $tag)
                                <li>
                                    <a href="{{ route("frontend.tag", $str::slug($tag->name)) }}">{{ $tag->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="social-media">
                            <p>Share on :</p>
                            <ul class="list-inline">
                                <li>
                                    <a href="{{ request()->url() }}" onclick="shareTo('facebook')"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#instagramModal"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{ request()->url() }}" onclick="shareTo('twitter')"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#youtubeModal"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @include("frontend.post.inc.author")
                    @include("frontend.post.inc.comment")
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="instagramModal" tabindex="-1" role="dialog" aria-labelledby="instagramModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="instagramModalLabel">Instagram Sharing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sorry, Instagram sharing is not supported currently.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="youtubeModal" tabindex="-1" role="dialog" aria-labelledby="youtubeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="youtubeModalLabel">YouTube Sharing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sorry, YouTube sharing is not supported currently.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
function shareTo(platform) {
    const url = encodeURIComponent(window.location.href);
    let shareUrl = '';

    switch (platform) {
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${url}`;
            break;
    }

    window.open(shareUrl, '_blank');
}
</script>
@endsection

