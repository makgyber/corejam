
<h4>Affiliations</h4>
<div class="row">
@forelse($affiliationCounts as $affiliationCount)
    <div class="col-sm-6">
        <div class="progress-group">
            <div class="progress-group-header align-items-end">
                <svg class="c-icon progress-group-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-pin"></use>
                </svg>
                <div>{{$affiliationCount->name??''}}</div>
                <div class="ml-auto font-weight-bold mr-2">{{$affiliationCount->user_count}}</div>
                    <div class="text-muted small">
                        
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