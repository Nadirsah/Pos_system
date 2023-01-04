@extends("back.layouts.master")
@section("title","Melumatlari yenile")
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
        <label for="#" class="form-label">Basliq</label>
        <select name="info" class="form-select" id="">
            <option value="">Basliq secin</option>
            @foreach ($header as $heades)
            <option @if($data->header_id==$heades->id) selected @endif value="{{$heades->id}}">{{$heades->name}}</option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">Seher</label>
        <input type="text" name="city" value='{{$data->city}}' class="form-control" id="city" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="area" class="form-label">Erazi</label>
        <input type="text" name="area" value='{{$data->area}}' class="form-control" id="area" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="people" class="form-label">Ehali</label>
        <input type="text" name="people" value='{{$data->people}}' class="form-control" id="people" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="city_text" class="form-label">Seher metni</label>
        <input type="text" name="city_text" value='{{$data->city_text}}' class="form-control" id="city_text" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="area_text" class="form-label">Erazi metni</label>
        <input type="text" name="area_text" value='{{$data->area_text}}' class="form-control" id="area_text" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="people_text" class="form-label">Ehali metni</label>
        <input type="text" name="people_text" value='{{$data->people_text}}'  class="form-control" id="people_text" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="city_image" class="form-label">Seher sekil</label>
        <input type="file" name="city_image" value='{{$data->city_image}}' id="city_image" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="area_image" class="form-label">Erazi sekli</label>
        <input type="file" name="area_image" value='{{$data->area_image}}'  class="form-control" id="area_image" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="ehali_image" class="form-label">Ehali sekil</label>
        <input type="file" name="ehali_image" value='{{$data->ehali_image}}' class="form-control" id="ehali_image" aria-describedby="emailHelp"
            autofocus>
    </div>



   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenile</button>
</form>

@endsection