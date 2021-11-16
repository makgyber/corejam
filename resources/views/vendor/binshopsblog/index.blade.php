@extends("pages.base",['title'=>$title])

@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
@endsection

@section("content")

<main class="container mt-5">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark" style="background-image: url('{{asset('assets/img/m610.png')}}'); background-size: contain; background-repeat: no-repeat; background-position:center ">
      
      <div class="px-0 d-flex flex-row-reverse">
        
        <p class="lead mb-0"></p>
        <h1 class="display-4 fst-italic ">
            "Thy kingdom come,<br>
            Thy will be done,<br>
            on earth as it is in heaven."
        </h1>
      </div>
      <p class="lead my-3 d-flex flex-row-reverse">Matthew 6:10</p>
    </div>
  
    {{-- <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">World</strong>
            <h3 class="mb-0">Featured post</h3>
            <div class="mb-1 text-muted">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block bg-gradient-warning">
            <svg class="bd-placeholder-img " width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h3 class="mb-0">Post title</h3>
            <div class="mb-1 text-muted">Nov 11</div>
            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
          </div>
        </div>
      </div>
    </div> --}}
  
    <div class="row g-5">
      <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          Our Activities
        </h3>
        <div class="row">
        @if($category_chain)
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @forelse($category_chain as $cat)
                            / <a href="{{$cat->url()}}">
                                <span class="cat1">{{$cat->category_name}}</span>
                            </a>
                        @empty @endforelse
                    </div>
                </div>
            </div>
        @endif

        @if(isset($BinshopsBlog_category) && $BinshopsBlog_category)
            <h2 class='text-center'> {{$BinshopsBlog_category->category_name}}</h2>

            @if($BinshopsBlog_category->category_description)
                <p class='text-center'>{{$BinshopsBlog_category->category_description}}</p>
            @endif

        @endif
      </div>

        <div class="row">
          @forelse($posts as $post)
            @if($post->slug != 'about-us')
              @include("binshopsblog::partials.index_loop")
            @endif
          @empty
              <div class="col-md-12">
                  <div class='alert alert-danger'>No posts!</div>
              </div>
          @endforelse
       </div>
  
        <hr>
        <nav class="blog-pagination" aria-label="Pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled">Newer</a>
        </nav>
  
      </div>
  
      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
          <div class="p-4 mb-3 bg-light rounded">
            <h5 class="text-uppercase text-center text-dark border-bottom pb-2"><i class="cil-clock"></i> @php $date = new DateTime('today', new DateTimeZone('Asia/Manila')); echo $date->format('l, F d, Y ');@endphp</h5>
            <h1 class="m-4 text-center text-danger">
              @php 
                $election = new DateTime('2022-05-09', new DateTimeZone('Asia/Manila')); 
                $today = new DateTime('today', new DateTimeZone('Asia/Manila')); 
                $interval = date_diff($today, $election, true);
                echo $interval->format('%r%a days');
              @endphp 
            </h1>
            <p class=" text-center">before the <span class="text-info">May 9, 2022 National and Local Elections</span></p>

          </div>
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">
              M6:10 refers to Matthew 6:10 where Jesus teaches his disciples to pray for God's Kingdom.
We are the official communications and coordination channel of Senator Manny Pacquiao's presidential campaign to Christian churches all over the Philippines. 
            </p>

            <a href="{{url('blog/about-us')}}" class="btn btn-info btn-sm mt-3">see more</a>

          </div>
  
          <div class="mt-4 p-4 bg-light rounded">
            <h4 class="fst-italic">Links to Social Media</h4>
            <ol class="list-unstyled">
              <li><a href="#">Twitter</a></li>
              <li><i class="fa  fa-facebook"></i><a href="https://www.facebook.com/M610forMP/">Facebook</a></li>
            </ol>
          </div>

          <div class="mt-4 p-4 bg-light rounded">
            <h4>Blog Categories</h4>
                @forelse($categories as $category)
                    <a href="{{$category->url()}}">
                        <h6>{{$category->category_name}}</h6>
                    </a>
                @empty
                    <a href="#">
                        <h4>No Categories</h4>
                    </a>
                @endforelse
          </div>
  
          
        </div>
      </div>
    </div>
  
  </main>

    <div class='col-sm-12 BinshopsBlog_container'>
        @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
            <div class="text-center">
                <p class='mb-1'>You are logged in as a blog admin user.
                    <br>
                    <a href='{{route("binshopsblog.admin.index")}}'
                       class='btn border  btn-outline-primary btn-sm '>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        Go To Blog Admin Panel</a>
                </p>
            </div>
        @endif

        <div class="row">
            <div class="col-md-9">

                

                <div class="container">
                  
              </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>

        <div class='text-center  col-sm-4 mx-auto'>
            {{$posts->appends( [] )->links()}}
        </div>
        
    </div>

@endsection
