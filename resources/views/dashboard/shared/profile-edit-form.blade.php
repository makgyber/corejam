@method('PUT')
@csrf

@include('dashboard.shared.member-edit-form-personal')

<hr class=""/>


@include('dashboard.shared.member-edit-form-skills')


<div class="col-sm-6">

@include('dashboard.shared.member-edit-form-voter')

<hr/>
@include('dashboard.shared.member-edit-form-business')

<div class="card-body" >
    <button type="submit" class="btn btn-primary">Save Details</button>
    <a href="{{ $return_link }}" class="btn btn-primary">Return</a>
</div>
</div>