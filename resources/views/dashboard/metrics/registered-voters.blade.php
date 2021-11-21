<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-info">
      <div class="card-body pb-0">
        <button class="btn btn-transparent p-0 float-right" type="button">
          <svg class="c-icon">
            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
          </svg>
        </button>
        <div class="text-value-lg">{{ $totals['registered_voters'] }}</div>
        <div>Registred Voters</div>
      </div>
      <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
        <canvas class="chart" id="card-chart2" height="70"></canvas>
      </div>
    </div>
  </div>