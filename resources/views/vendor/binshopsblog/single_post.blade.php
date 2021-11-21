@extends("pages.base",['title'=>$post->gen_seo_title()])

@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
@endsection

@section("content")
<main class="container mt-5">
    @if(config("binshopsblog.reading_progress_bar"))
    <div id="scrollbar">
        <div id="scrollbar-bg"></div>
    </div>
@endif

    @include("binshopsblog::partials.show_errors")
    @include("binshopsblog::partials.full_post_details")

    

</main>


@endsection

@section('blog-custom-js')
    <script src="{{asset('binshops-blog.js')}}"></script>
@endsection