
      
    <div class="c-wrapper">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="{{ url('/assets/brand/m610.svg')  }}" width="60" height="36" alt="CoreUI Logo"></a>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
        
        <a href="{{route('index')}}" class="c-header-brand btn btn-light btn-check">Blog Home</a>
        
        <?php
            // use App\MenuBuilder\FreelyPositionedMenus;
            // if(isset($appMenus['top menu'])){
            //     FreelyPositionedMenus::render( $appMenus['top menu'] , 'c-header-', 'd-md-down-none');
            // }
            $messageCount = Auth::user()->newThreadsCount(); 
            use Cmgmyr\Messenger\Models\Thread;
            $popThreads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
        ?>  
        
        
        <ul class="c-header-nav ml-auto mr-4">
            {{-- <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
                <svg class="c-icon">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-bell') }}"></use>
                </svg></a></li>
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
                <svg class="c-icon">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-list-rich') }}"></use>
                </svg></a></li> --}}
          <li class="c-header-nav-item d-md-down-none mx-2">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <svg class="c-icon">
                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-envelope-open') }}"></use>
              </svg>
              @if($messageCount)
              <span class="badge badge-pill badge-info">{{$messageCount}}</span>
              @endif
            </a>
            @include('dashboard.messenger.partials.pop-messages')   
          </li>
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <!-- <div class="c-avatar"><img class="c-avatar-img" src="{{ url('/assets/img/avatars/6.jpg') }}" alt="{{ Auth::user()->email }}"></div> -->
            {{ Auth::user()->email }}
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
              <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
              
              <a class="dropdown-item" href="{{ url('cms/profile') }}">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-user') }}"></use>
                </svg> Profile</a>

              {{-- <a class="dropdown-item" href="{{ url('cms/reminders') }}">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-bell') }}"></use>
                </svg> Reminders<span class="badge badge-info ml-auto">42</span></a> --}}
                
                <a class="dropdown-item" href="{{ url('cms/messages') }}">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-envelope-open') }}"></use>
                </svg> Messages
                @if($messageCount)
                <span class="badge badge-info ml-auto">{{$messageCount}}</span>
                @endif
              </a>
                
               <!-- <a class="dropdown-item" href="{{ url('/notes') }}">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-task') }}"></use>
                </svg> Notes<span class="badge badge-danger ml-auto">42</span></a>
                 
                <a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-comment-square') }}"></use>
                </svg> Comments<span class="badge badge-warning ml-auto">42</span></a> 
              <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
              
               
                
                <a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-settings') }}"></use>
                </svg> Settings</a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-credit-card') }}"></use>
                </svg> Payments<span class="badge badge-secondary ml-auto">42</span></a>-->
                <a class="dropdown-item" href="{{route('profile.show-change-password')}}">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                </svg> Change Password</a> 
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-account-logout') }}"></use>
                </svg><form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="btn btn-ghost-dark btn-block">Logout</button></form></a>
            </div>
          </li>
        </ul>
        <div class="c-subheader px-3">
          {{-- <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <?php $segments = ''; ?>
            @for($i = 1; $i <= count(Request::segments()); $i++)
                <?php $segments .= '/'. Request::segment($i); ?>
                @if($i < count(Request::segments()))
                    <li class="breadcrumb-item">{{ Request::segment($i) }}</li>
                @else
                    <li class="breadcrumb-item active">{{ Request::segment($i) }}</li>
                @endif
            @endfor
          </ol> --}}

          <div class="mt-3 d-flex col-12 text-center">
            <h5 class="text-uppercase text-right text-dark col-5 mt-1"><i class="cil-clock"></i> @php $date = new DateTime('today', new DateTimeZone('Asia/Manila')); echo $date->format('l, F d, Y ');@endphp</h5>
            <h2 class=" text-center text-danger  col-auto">
              @php 
                $election = new DateTime('2022-05-09', new DateTimeZone('Asia/Manila')); 
                $today = new DateTime('today', new DateTimeZone('Asia/Manila')); 
                $interval = date_diff($today, $election, true);
                echo $interval->format('%r%a days');
              @endphp 
            </h2>
            <p class=" text-left  col-5 mt-1">before the <span class="text-info">May 9, 2022 National and Local Elections</span></p>
          </div>
        </div>
        
    </header>