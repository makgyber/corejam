<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-primary">
      <div class="card-body pb-0">
        <div class="btn-group float-right">
          <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="c-icon">
              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
        </div>
        <div class="text-value-lg">{{ $totals['total_users'] }}</div>
        <div>Total Members</div>
      </div>
      <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
        <canvas class="chart" id="card-chart1" height="70"></canvas>
      </div>
    </div>
  </div>