<hr>
<h3>Global</h3>
<div class="row">
@forelse($globalRegionCounts as $regionCount)
    <div class="col-sm-6">
        <div class="progress-group">
            <div class="progress-group-header align-items-end">
                <svg class="c-icon progress-group-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-pin"></use>
                </svg>
                <div>{{$regionCount->subregion}}</div>
                <div class="ml-auto font-weight-bold mr-2">{{$regionCount->user_count}}</div>
                    <div class="text-muted small">
                        <a href="{{ route('globalstats', ['subregion'=>$regionCount->subregion])}}"><i class="cil-search"></i></a>
                    </div>
                </div>
                <div class="progress-group-bars">
                <div class="progress progress-xs">
                    </div>
            </div>
        </div>
    </div>
@empty
@endforelse
</div>