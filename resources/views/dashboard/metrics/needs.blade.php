<div class="row">
  <div class="col-sm-12 col-lg-12">
    <div class="card mb-4" style="--cui-card-cap-bg: #00aced">
      <div class="card-header position-relative d-flex justify-content-center align-items-center bg-gradient-primary text-white">
        <h4>
          <i class="cil-people"></i><span class="ml-3">Ano ang pinaka-kailangan ngayon?</span> </h4>
      </div>
      <div class="card-body row text-center">
        @forelse($needsCount as $need)
          <div class="col">
            <div class="fs-5 fw-semibold"><h3>{{$need->needcount??0}}</h3></div>
            <div class="text-uppercase text-medium-emphasis small">{{$need->needs??''}}</div>
          </div>
          @if($loop->index < count($needsCount)-1)
            <div class="vr"></div>
          @endif
        @empty
        @endforelse
        
      </div>
    </div>
  </div>
</div>