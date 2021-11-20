<article class="blog-post card row g-0 border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative shadow">
    <div class="card-header bg-gradient-light" >
        <small class="float-right">{{date('d M Y ', strtotime($post->posted_at))}}</small>
        <h3 class="blog-post-title text-black"><a href='{{$post->url()}}' class="text-decoration-none text-primary">{{$post->title}}</a>
        </h3>
        
    </div>


    <div class="card-body bg-white">
        <div class="row">
        <?=$post->image_tag("medium", false, 'img-fluid'); ?>
        </div>
    
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
