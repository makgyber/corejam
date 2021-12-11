@extends('dashboard.authBase')

@section('content')
<div class="container">
<div class="row">
    <div class="card m-auto flex vh-100 col-md-8 col-lg-6 col-sm-12" style="min-width:500px">
        <div class="row text-center">
            <img src="{{asset('assets/img/id_top.png')}}" alt="" srcset="" class="img-fluid">
        </div>
        <div class="card-body text-center m-auto">
            <div class="row text-center overflow-hidden m-auto">
                <div class="card photocard"></div>
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
                <img src="{{asset('assets/img/id_bottom.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
</div>
<style>
    .photocard {
        width:165px;
        background-image: url("{{url($user->image ? 'storage/'.$user->image : 'assets/img/m610.png')}}");
        background-position:center;
        background-size:cover;
    }
</style>
@endsection