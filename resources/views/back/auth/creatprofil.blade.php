@extends("back.layouts.master")
@section("title","Istifadəçi əlavə et")
@section('content')




<form method="Post" action="{{route('admin.profile.store')}}">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ad</label>
        <input type="text" name="name" value='{{old("name")}}' class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" autofocus>
        <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>
   
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
                placeholder="Yeni şifrə">
            <span class="text-danger">@error('password'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Göndər</button>
</form>

@endsection