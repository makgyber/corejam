@extends('dashboard.authBase')

@section('content')
<div class="container">
<div class="row">
    <div class="card m-auto flex vh-100 col-md-8 col-lg-6 col-sm-12" style="min-width:500px;max-width:640px;min-height:900px;">
        <div class="row text-center">
            <img src="{{asset('assets/img/id_top_wpic.png')}}" alt="" srcset="" class="img-fluid">
        </div>
        <div class="card-body text-center m-auto">
            <div class="row text-center overflow-hidden m-auto">
                <div class="card photocard text-center">
                    @if(isset($user->image) && $user->image != '')
                    <img src="{{url($user->image ? 'storage/'.$user->image : 'assets/img/user.svg')}}" alt="ID Picture" class="img-fluid img-thumbnail">
                    @else
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="134px" height="134px" viewBox="0 0 24 24">
                        <title></title>
                        <path d="M19.294 16.109l-3.414-2.219 1.287-2.359c0.288-0.519 0.457-1.137 0.458-1.796v-3.735c0-2.9-2.351-5.25-5.25-5.25s-5.25 2.351-5.25 5.25v0 3.735c0.001 0.658 0.17 1.277 0.468 1.815l-0.010-0.019 1.287 2.359-3.414 2.219c-1.033 0.676-1.706 1.828-1.706 3.137 0 0.002 0 0.005 0 0.007v-0 3.997h17.25v-3.997c0-0.002 0-0.005 0-0.007 0-1.309-0.673-2.461-1.692-3.128l-0.014-0.009zM19.5 21.75h-14.25v-2.497c0-0.001 0-0.003 0-0.004 0-0.785 0.404-1.477 1.015-1.877l0.009-0.005 4.578-2.976-1.952-3.578c-0.173-0.311-0.274-0.682-0.275-1.077v-3.735c0-2.071 1.679-3.75 3.75-3.75s3.75 1.679 3.75 3.75v0 3.735c-0 0.395-0.102 0.766-0.281 1.089l0.006-0.012-1.952 3.579 4.578 2.976c0.62 0.406 1.024 1.097 1.024 1.882 0 0.001 0 0.003 0 0.004v-0z"></path>
                    </svg>
                    <small>ID Picture</small>
                    @endif  
                </div>
                <div class="card">
                    {!!QrCode::size(150)->generate(route('profile.card', ['q' => Crypt::encrypt(['c'=>auth()->user()->id])]))!!}
                </div>
            </div>
        </div>
        <div class="card-body text-center" >
            <h1>{{ $user->last_name }}, {{$user->first_name}}</h1>
            <span class="d-block text-uppercase mb-3">{{$user->coordinator_level}} coordinator</span>
            <h3>{{ $user->region->name }}</h3>
            <span class="d-block text-uppercase mb-3">region</span>
            <h3>{{ $user->province->name }}</h3>
            <span class="d-block text-uppercase mb-3">province</span>
            <h3>{{ $user->city->name }}</h3>
            <span class="d-block text-uppercase mb-3">city / municipality</span>
        </div>
        <div class="row">
                <img src="{{asset('assets/img/id_bottom-wlogo.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
</div>
<style>
    .photocard {
        width:152px;
    }
</style>
@endsection