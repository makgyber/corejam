<div class="card-header">
    <h4>Position in Organisation</h4>
</div>
<div class="card-body">
    <div class="mb-3">
        <label for="region_code" class="form-label">Position</label>
        <select class="form-control" name="position" id="position">
            @forelse($positionOptions as $positionOption)
            <option value="{{$positionOption}}"
            {{ $positionOption == $position_other ? 'selected' : ($showOther==1 && $positionOption == 'Other' ? 'selected' : '')}}
            >{{$positionOption}}</option>
            @empty
            @endforelse
        </select>
        <input type="text" class="form-control  {{ $showOther==1 ? ''  : 'd-none'}}" placeholder="please specify position" name="position_other" id="position_other" value="{{$position_other}}"/>
    </div>

</div>

<div class="card-header">
    <h5>Outreach / Mission</h5>
</div>
<div class="card-body">
    <div class="mb-3">
        <label for="outreach" class="form-label">Choose an option</label>
        <select class="form-control" name="outreach" id="outreach">
            <option value=""></option>
            @forelse($outreachOptions as $outreachOption)
            <option value="{{$outreachOption}}"
            {{ $outreachOption == $member->outreach ? 'selected' : ''}}
            >{{$outreachOption}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>