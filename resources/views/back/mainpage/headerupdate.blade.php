@extends("back.layouts.master")
@section("title","Səhifə başlığını yenilə")
@section('content')

<form method="Post" action="{{route('admin.header.update',$data->id)}}">
    @method("PUT")
    @csrf
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Ad</label>
    <input type="text" name="name" value='{{$data->name}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Yenilə</button>
</form>

@endsection