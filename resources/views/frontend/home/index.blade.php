@extends("frontend.master")

@section("title", config('app.sitesettings')::first()->site_title." - ".config('app.sitesettings')::first()->tagline)

@section("content")

@include("frontend.home.inc.featuredpost")
@include("frontend.home.inc.category")

<section class="section-feature-1">
    <div class="container-fluid">
        <div class="row">
            @include("frontend.home.inc.recentpost")
            @include("frontend.home.inc.sidebar")
        </div>
    </div>
</section>

<style>
    /* Adjust this value to match your sticky header height */
    .realtime-analytics-section {
        margin-top: 100px;
    }
    @media (max-width: 767px) {
        .realtime-analytics-section {
            margin-top: 120px;
        }
    }
</style>
@endsection
