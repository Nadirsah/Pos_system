@extends("back.layouts.master")
@section("title","Məlumatları yenilə")
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif
<form method="Post" action="{{route('admin.naxcivan.update',$data->id)}}" enctype="multipart/form-data" >
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
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" value='{{$data->title}}' class="form-control" id="title" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">Şəhər</label>
        <input type="text" name="city" value='{{$data->city}}' class="form-control" id="city" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="area" class="form-label">Ərazi</label>
        <input type="text" name="area" value='{{$data->area}}' class="form-control" id="area" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="people" class="form-label">Əhali</label>
        <input type="text" name="people" value='{{$data->people}}' class="form-control" id="people" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="city_text" class="form-label">Şəhər mətni</label>
        <input type="text" name="city_text" value='{{$data->city_text}}' class="form-control" id="city_text" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="area_text" class="form-label">Əhali mətni</label>
        <input type="text" name="area_text" value='{{$data->area_text}}' class="form-control" id="area_text" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="people_text" class="form-label">Ehali metni</label>
        <input type="text" name="people_text" value='{{$data->people_text}}'  class="form-control" id="people_text" aria-describedby="emailHelp"
            autofocus>
    </div><br>

    <div class="mb-3">
        <label for="city_image" class="form-label">Şəhər şəkil</label>
        <img src="{{asset($data->city_image)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="city_image" value='{{$data->city_image}}' class="form-control" id="city_image" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="area_image" class="form-label">Ərazi şəkil</label>
        <img src="{{asset($data->area_image)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="area_image" value='{{$data->area_image}}'  class="form-control" id="area_image" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="ehali_image" class="form-label">Əhali şəkil</label>
        <img src="{{asset($data->people_image)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="ehali_image" value='{{$data->ehali_image}}' class="form-control" id="ehali_image" aria-describedby="emailHelp"
            autofocus>
    </div>



   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection