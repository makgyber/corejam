<div class="card ">
    <div class="card-header">
        <h5 class="d-inline-block">
            Update Avatar <a href="{{route('faq', 'profile')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a>
        </h5>
    </div>
    <div class="card-body row">
       <div class="col-4">
            <img src="{{url(auth()->user()->image ? 'storage/'.auth()->user()->image : 'assets/img/m610.png')}}" alt="" 
            class="avatar rounded-pill img-thumbnail col-3 d-inline" style="width:10em;height:10em" />
        </div>
        <div class="col-8  align-middle text-center">
            <form action="{{route('avatar')}}" enctype="multipart/form-data" class="col-12"  method="POST">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="avatar" name="avatar">
                          <label class="custom-file-label" for="avatar">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                      </div>
                </div>
            </form>
        </div>
    </div>
</div>