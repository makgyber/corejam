@if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">Edit
        Post</a>
@endif

<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">{{$post->title}}</h1>
      <p class="lead my-3">{{$post->subtitle}}</p>
    </div>
  </div>
  <div class="row g-5">
      <div class="col-md-8">
        <article class="card blog-post">
          <div class="card-header">
          <h2 class="blog-post-title">{{$post->subtitle}}</h2>
           <p class="blog-post-meta">{{$post->posted_at->diffForHumans()}} @includeWhen($post->author,"binshopsblog::partials.author",['post'=>$post])</p>
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
            
            <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
          </div>
          @includeWhen($post->categories,"binshopsblog::partials.categories",['post'=>$post])
          <div class="p-4">
            <h4 class="fst-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">March 2021</a></li>
              <li><a href="#">February 2021</a></li>
              <li><a href="#">January 2021</a></li>
              <li><a href="#">December 2020</a></li>
              <li><a href="#">November 2020</a></li>
              <li><a href="#">October 2020</a></li>
              <li><a href="#">September 2020</a></li>
              <li><a href="#">August 2020</a></li>
              <li><a href="#">July 2020</a></li>
              <li><a href="#">June 2020</a></li>
              <li><a href="#">May 2020</a></li>
              <li><a href="#">April 2020</a></li>
            </ol>
          </div>

        </div>
      </div>
    </div>







