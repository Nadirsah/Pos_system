@extends("back.layouts.master")
@section("title","Profili yenilə")
@section('content')




<form method="Post" action="{{route('admin.profile.update',$data->id)}}">
    @method("PUT")
    @csrf

   
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" name="oldpass" class="form-control form-control-user" id="exampleInputPassword"
                placeholder="Köhnə şifrə">
            <span class="text-danger">@error('password'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
        </div>

    </div>

    
    <button type="submit" class="btn btn-primary">Yenilə</button>
</form>

@endsection