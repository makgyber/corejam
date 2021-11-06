@if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">Edit
        Post</a>
@endif

<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark shadow-lg" 
style="background-image: url({{asset('assets/img/pacman.jpeg')}});background-size:contain;background-repeat:no-repeat;background-position:right; ">
    <div class="col-md-12 px-0">
      <h1 class="display-4 fst-italic">{{$post->title}}</h1>
      <p class="lead my-3">{{$post->subtitle}}</p>
    </div>
  </div>
  <div class="row g-5">
      <div class="col-md-8">
        <article class="card blog-post  shadow-lg">
          <div class="card-header">
          <h2 class="blog-post-title">{{$post->subtitle}}</h2>
           <span class="blog-post-meta float-right">{{$post->posted_at->diffForHumans()}} </span>
          </div>

          <div class="card-body">
          <?=$post->image_tag("medium", false, 'd-block mx-auto'); ?>
        </div>
          <div class="card-body">
          {!! $post->post_body_output() !!}
          </div>

     </article>
  
  
      </div>
  
      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            
            <p class="mb-0">
              M6:10 refers to Matthew 6:10 where Jesus teaches his disciples to pray for God's Kingdom.
We are the official communications and coordination channel of Senator Manny Pacquiao's presidential campaign to Christian churches all over the Philippines. 
            </p>

            <a href="{{url('blog/about-us')}}" class="btn btn-info btn-sm mt-3">see more</a>
            </div>
          @includeWhen($post->categories,"binshopsblog::partials.categories",['post'=>$post])


        </div>
      </div>
    </div>







