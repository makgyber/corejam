<article class="blog-post card">
    <div class="card-header">
        <?=$post->image_tag("medium", true, ''); ?>
    </div>


    <div class="card-body">
    <h2 class="blog-post-title"><a href='{{$post->url()}}'>{{$post->title}}</a></h2>
    <h5 class=''>{{$post->subtitle}}</h5>
    <p class="blog-post-meta">{{date('d M Y ', strtotime($post->posted_at))}} by {{$post->author->name}}</p>
    
    <p>
        @if (config('binshopsblog.show_full_text_at_list'))
            <p>{!! $post->post_body_output() !!}</p>
        @else
            <p>{!! mb_strimwidth($post->post_body_output(), 0, 400, "...") !!}</p>
        @endif
    </p>
    
    </div>


    <div class="card-footer">

        <div class='text-center'>
            <a href="{{$post->url()}}" class="btn btn-primary">View Post</a>
        </div>
    </div>
</article>
