@extends("back.layouts.master")
@section("title","Sehife başlığı elave et")
@section('content')

<form method="Post" action="{{route('admin.header.store')}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Başliq</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Göndər</button>
</form>

@endsection