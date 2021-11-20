<div class="card-header">
    <h4>Skills And Capabilities</h4>
    <p>Please describe your professional skills, capabilities and recognized spiritual gifts</p>
</div>
<div class="card-body">
<div class="row">   
    <div class="col-sm-6">
        <div class="mb-3">

            @forelse($skillOptions as $skillOption)

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$skillOption}}" id="skills{{ $loop->index}}" name="skillsets[]"
                {{ in_array($skillOption, $skillsets)? 'checked' : ''}}
                />
                <label class="form-check-label" for="skills{{ $loop->index}}">
                {{$skillOption}}
                </label>
            </div>
            @empty
            @endforelse
        </div>
    </div> 
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="otherSkills" class="form-label">Others (separate multiple items with commas)</label>
    <input type="text" class="form-control" id="otherSkills" value="{{ $other_skillsets ?? old('other_skillsets') }}" name="other_skillsets">
        </div>
    </div>
</div></div></div>

</div>
</div>