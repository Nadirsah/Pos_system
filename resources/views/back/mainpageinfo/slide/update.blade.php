@extends("back.layouts.master")
@section("title","Slide yenilə")
@section('content')

<!-- @if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif -->
<form method="Post" action="{{route('admin.slide.update',$data->id)}}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf

   

    

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value='{{$data->name}}' id="title" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('title'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Məzmun</label>
        <input type="text" name="content" class="form-control" value='{{$data->content}}' id="content" aria-describedby="emailHelp"
            >
            <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label> <br>
        <img src="{{asset($data->img)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            >
            <span class="text-danger">@error('image'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

   


   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection