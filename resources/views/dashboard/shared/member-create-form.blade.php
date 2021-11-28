@include('dashboard.shared.member-create-form-personal')

<hr class=""/>

@include('dashboard.shared.member-create-form-skills')

</div>
</div>
<div class="col-sm-6">

@include('dashboard.shared.member-create-form-voter')

<hr/>
@include('dashboard.shared.member-create-form-position')

<hr/>

@include('dashboard.shared.member-create-form-business')

<div class="card-body" >
    <button type="submit" class="btn btn-primary">Save Details</button>
    <a href="{{route('members.index', ['affiliation_id'=>request()->get('affiliation_id')])}}" class="btn btn-primary">Return</a>
</div>

</div>