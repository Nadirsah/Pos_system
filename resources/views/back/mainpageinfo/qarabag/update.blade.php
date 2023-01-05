@extends("back.layouts.master")
@section("title","Məlumatları yenile")
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif
<form method="Post" action="{{route('admin.qarabag.update',$data->id)}}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Section</label>
        <select name="info" class="form-select" id="">
            <option value="">Section seçin</option>
            @foreach ($header as $heades)
            <option @if($data->header_id==$heades->id) selected @endif value="{{$heades->id}}">{{$heades->name}}</option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Ön söz</label>
        <input type="text" name="name" value='{{$data->name}}' class="form-control" id="name" aria-describedby="emailHelp"
            >
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value='{{$data->title}}' id="title" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Məzmun</label>
        <input type="text" name="content" class="form-control" value='{{$data->content}}' id="content" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label> <br>
        <img src="{{asset($data->img)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            >
    </div>

    <div class="mb-3">
        <label for="slide_fon" class="form-label">Slide fon</label> <br>
        <img src="{{asset($data->slide_fon)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="slide_fon" class="form-control" id="slide_fon" aria-describedby="emailHelp"
            >
    </div>


   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection