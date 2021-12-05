<div class="col-sm-3 col-lg-3">
    <div class="card mb-4" style="--cui-card-cap-bg: #00aced">
      <div class="card-header position-relative d-flex justify-content-center align-items-center bg-gradient-success text-white">
        <h4>
          <i class="cil-people"></i><span class="ml-3">Age</span> </h4>
      </div>
      <div class="card-body row text-center">
        <div class="col">
          <div class="fs-5 fw-semibold"><h3>{{$totals['youth']??0}}</h3></div>
          <div class="text-uppercase text-medium-emphasis small">youth  (18-29)</div>
        </div>
        <div class="vr"></div>
        <div class="col">
          <div class="fs-5 fw-semibold"><h3>{{$totals['adults']??0}}</h3></div>
          <div class="text-uppercase text-medium-emphasis small">adults (30-59)</div>
        </div>
        <div class="vr"></div>
        <div class="col">
          <div class="fs-5 fw-semibold"><h3>{{$totals['seniors']??0}}</h3></div>
          <div class="text-uppercase text-medium-emphasis small">seniors (60 and up)</div>
        </div>
      </div>
    </div>
  </div>