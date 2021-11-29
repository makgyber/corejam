<div class="card-header">
    <h5>Level and Area of Responsibility</h5>
</div>
<div class="card-body">
    <div class="mb-3">
        <label for="coordinator_level" class="form-label">Coordinator Level</label>
        @php
         $level = isset($user) ? $user->coordinator_level : old('coordinator_level')
        @endphp
        <select class="form-control" id="coordinator_level" name="coordinator_level">   
            <option value="">Select coordinator level</option>
            @forelse ($coordinatorLevels as $coordinatorLevel)
                @if ($level == $coordinatorLevel)
                    <option value="{{$coordinatorLevel}}" selected>{{$coordinatorLevel}}</option> 
                @else
                    <option value="{{$coordinatorLevel}}">{{$coordinatorLevel}}</option>    
                @endif
            
            @empty
            
            @endforelse

        </select>
    </div>

    @if($action=='create')
    @include('dashboard.shared.member-create-form-locations')
    @else  
    @include('dashboard.shared.member-edit-form-locations')
    @endif

</div>