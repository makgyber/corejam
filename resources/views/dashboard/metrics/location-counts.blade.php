<div class="row">
@forelse($regionCounts as $regionCount)
    @php
        $drillDown = $params ?? [];
        if(!isset($params['region_code'])) $drillDown['region_code'] = $regionCount->code;
        if(!isset($params['province_code'])) $drillDown['province_code'] = $regionCount->code;
    @endphp
    <div class="col-sm-6">
        <div class="progress-group">
            <div class="progress-group-header align-items-end">
            <svg class="c-icon progress-group-icon">
                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-pin"></use>
            </svg>
            <div>{{$regionCount->name}}</div>
            <div class="ml-auto font-weight-bold mr-2">{{$regionCount->user_count}}</div>
            <div class="text-muted small">({{ number_format(100*($regionCount->user_count/$regionTargets[$regionCount->code]), 2)}}%)
            <a href="{{ route('stats', $drillDown)}}"><i class="cil-search"></i></a>
            </div>
            </div>
            <div class="progress-group-bars">
            <div class="progress progress-xs">
                <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format(100*($regionCount->user_count/$regionTargets[$regionCount->code]), 2)}}%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </div>
        </div>
    </div>
  @empty
  @endforelse
</div>