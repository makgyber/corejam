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
<hr>
<div class="card-header">
    <h5>Outreach / Mission</h5>
</div>
<div class="card-body">
    <div class="mb-3">
        <textarea id="outreach" name="outreach" class="form-control">{{ $member->outreach }}</textarea>
    </div>
</div>
<hr>
<div class="card-header">
    <h5>Ano ang pinaka-kailangan mo ngayon?</h5>
</div>
<div class="card-body">
    <div class="mb-3">
        <label for="needs" class="form-label">Choose an option</label>
        <select class="form-control" name="needs" id="needs">
            <option value=""></option>
            @forelse($needsOptions as $needsOption)
            <option value="{{$needsOption}}"
            {{ $needsOption == $member->needs ? 'selected' : ''}}
            >{{$needsOption}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>