@extends("back.layouts.master")
@section("title","Səhifələri yenilə")
@section('content')

<form method="Post" action="{{route('admin.page.update',$data->id)}}">
    @method("PUT")
    @csrf
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Ad</label>
    <input type="text" name="name" value='{{$data->name}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus>
    <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
  </div>
  
  <button type="submit" class="btn btn-primary">Yenilə</button>
</form>

@endsection
