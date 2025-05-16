<div class="post-single-author">
    <div class="authors-info">
        <div class="image">
            <a href="{{ route("frontend.user", $post->user->username) }}" class="image">
                <img src="{{ asset("uploads/author/".($post->user->profile ?? "default.webp")) }}" alt="{{ $post->user->name }}"/>
            </a>
        </div>
        <div class="content">
            <a href="{{ route("frontend.user", $post->user->username) }}"><h4>{{ $post->user->name }}</h4></a>
            @if ($post->user->about)
            <p>{{ $post->user->about }}</p>
            @endif
            <div class="social-media">
                <ul class="list-inline">
                    @if ($user->facebook)
                    <li>
                        <a href="{{ $user->facebook }}" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    @endif
                    @if ($user->twitter)
                    <li>
                        <a href="{{ $user->twitter }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    @endif
                    @if ($user->instagram)
                    <li>
                        <a href="{{ $user->instagram }}" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    @endif
                    @if ($user->linkedin)
                    <li>
                        <a href="{{ $user->linkedin }}" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    @endif
                    @if ($user->youtube)
                    <li>
                        <a href="{{ $user->youtube }}" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    @endif
                    @if ($user->pinterest)
                    <li>
                        <a href="{{ $user->pinterest }}" target="_blank">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
