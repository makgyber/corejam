<div class="row">
@forelse($locationCounts as $locationCount)
    @php
        $drillDown = $params ?? [];
        if(!isset($params['subregion'])) $drillDown['subregion'] = $locationCount->name;
        if(isset($params['subregion']) && !isset($params['country_id'])) $drillDown['country_id'] = $locationCount->id;
        if(isset($params['subregion']) && isset($params['country_id']) && !isset($params['state_id'])) $drillDown['state_id'] = $locationCount->id;
        if(isset($params['subregion']) && isset($params['country_id']) && isset($params['state_id']) && !isset($params['world_city_id'])) $drillDown['world_city_id'] = $locationCount->id;
    @endphp
    <div class="col-sm-6">
        <div class="progress-group">
            <div class="progress-group-header align-items-end">
                <i class="cil-pin mr-2 mb-1"></i>
                <div>{{$locationCount->name}}</div>
                <div class="ml-auto font-weight-bold mr-2">{{$locationCount->user_count}}</div>
                <a href="{{ route('globalstats', $drillDown)}}"><i class="cil-search"></i></a>
            </div>
            <div class="progress-group-bars">
                <div class="progress progress-xs">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $locationCount->user_count}}%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
  @empty
  @endforelse
</div>