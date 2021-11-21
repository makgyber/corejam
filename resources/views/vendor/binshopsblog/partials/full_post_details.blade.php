@if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">Edit
        Post</a>
@endif
<br>
  <div class="p-4 mb-4 text-bold text-dark rounded bg-transparent shadow-lg" 
style="background-image: url({{asset('assets/img/pacman.jpeg')}});background-size:contain;background-repeat:no-repeat;background-position:right; ">
    <div class="col-md-12 px-0">
      <h1 class="display-3 " style="text-shadow: 2px 2px #eeeeee;">{{$post->title}}</h1>
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
        <div class="rounded card shadow ">
          <div class="card-header content-center "><h5>About Us</h5></div>
          <div class="card-body  justify-content-center">
            M6:10 refers to Matthew 6:10 where Jesus teaches his disciples to pray for God's Kingdom.
We are the official communications and coordination channel of Senator Manny Pacquiao's presidential campaign to Christian churches all over the Philippines. 
</div>
          <a href="{{url('blog/about-us')}}" class="btn btn-info btn-sm mt-3">see more</a>
        </div>



        <div class="rounded card shadow ">
          <div class="card-header content-center "><h5>Plataporma ni Manny Pacquiao</h5></div>
          <div class="mb-0 card-body text-center">
            <a href="{{asset('assets/img/smp_programa.jpg')}}">
            <img src="{{asset('assets/img/smp_programa.jpg')}}" alt="SMP Platform" width="220em" height="220em">
          </a>
          </div>
        </div>
        <div class="rounded card shadow ">
          <div class="card-header content-center"><h5>Register via QR Code</h5></div>
          <div class="card-body text-center">
            <img src="{{asset('assets/img/qrhq.png')}}" alt="QR Code for Registration" width="220em" height="220em">
          </div>
          <a target="_blank" href="https://m610.ph/qrcode?p=eyJpdiI6IjkzOVowSDBQR05MUGFjMEJwOS96ekE9PSIsInZhbHVlIjoiTjRpVEo2elBFcmJ1QWtSTXo5azBDMG8rT244UytNUS81ZGt4b1liK2RiNFRzcnRoeEw1bHZzY2I5NmhLYWhMVyIsIm1hYyI6IjUxOTA2ZjhiOTgyMjQ2NTUwNjNhODcxMmJmZGVkNjNhMDhlMzJmY2U0ZTM4MmQ1MzRlMWUwODIxMGRkYTkzOGMiLCJ0YWciOiIifQ%3D%3D" class="btn btn-info btn-sm mt-3">Click Here to Register</a>
        </div>
        <div class="rounded card shadow ">
          <div class="card-header content-center"><h5>Links to Social Media</h5></div>
          <div class="card-body">
            <ol class="list-unstyled">
              <li><a href="#"  class="btn btn-sm btn-light mb-2 shadow-sm">Twitter</a></li>
              <li><i class="fa  fa-facebook"></i><a href="https://www.facebook.com/M610forMP/"   class="btn btn-sm btn-light  shadow-sm">Facebook</a></li>
            </ol>
          </div>
        </div>

  
      </div>
    </div>







