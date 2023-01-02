@extends("back.layouts.master")
@section("title","Sehife elave et")
@section('content')

<form method="Post" action="{{route('admin.page.store')}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ad</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Gonder</button>
</form>

@endsection