@extends("back.layouts.master")
@section("title","Sehife başlığı elave et")
@section('content')

<form method="Post" action="{{route('admin.header.store')}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Başliq</label>
    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus>
    <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
  </div>
  
  <button type="submit" class="btn btn-primary">Göndər</button>
</form>

@endsection