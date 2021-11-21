<div class="col-sm-6 col-lg-6">
    <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
      <div class="card-header position-relative d-flex justify-content-center align-items-center bg-gradient-warning text-white">
        <h4>
        <i class="cil-wc"></i><span class="ml-3">Gender</span> </h4>
      </div>
      <div class="card-body row text-center">
        <div class="col">
          <div class="fs-5 fw-semibold"><h3>{{$totals['male'] ?? 0}}</h3></div>
          <div class="text-uppercase text-medium-emphasis small">male</div>
        </div>
        <div class="vr"></div>
        <div class="col">
          <div class="fs-5 fw-semibold"><h3>{{$totals['female'] ?? 0}}</h3></div>
          <div class="text-uppercase text-medium-emphasis small">female</div>
        </div>
      </div>
    </div>
  </div>