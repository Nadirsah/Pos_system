@extends("back.layouts.master")
@section("title","Məlumat əlavə et")
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif
<form method="Post" action="{{route('admin.naxcivan.store')}}"  enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Section</label>
        <select name="info" class="form-select" id="">
            <option value="">Section seçin</option>
            @foreach ($header as $headers)
            <option value="{{$headers->id}}">{{$headers->name}}</option>
            @endforeach

        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp"
            autofocus>
    </div>


    <div class="mb-3">
        <label for="city" class="form-label">Şəhər</label>
        <input type="text" name="city" class="form-control" id="city" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="area" class="form-label">Ərazi</label>
        <input type="text" name="area" class="form-control" id="area" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="people" class="form-label">Əhali</label>
        <input type="text" name="people" class="form-control" id="people" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="city_text" class="form-label">Şəhər mətni</label>
        <input type="text" name="city_text" class="form-control" id="city_text" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="area_text" class="form-label">Ərazi mətni</label>
        <input type="text" name="area_text" class="form-control" id="area_text" aria-describedby="emailHelp"
            autofocus>
    </div>
    <div class="mb-3">
        <label for="people_text" class="form-label">Əhali mətni</label>
        <input type="text" name="people_text" class="form-control" id="people_text" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="city_image" class="form-label">Şəhər şəkil</label>
        <input type="file" name="city_image" class="form-control" id="city_image" aria-describedby="emailHelp"
            >
    </div>

    <div class="mb-3">
        <label for="area_image" class="form-label">Ərazi şəkil</label>
        <input type="file" name="area_image" class="form-control" id="area_image" aria-describedby="emailHelp"
           >
    </div>
    <div class="mb-3">
        <label for="ehali_image" class="form-label">Əhali şəkil</label>
        <input type="file" name="people_image" class="form-control" id="ehali_image" aria-describedby="emailHelp"
            >
    </div>

    
    

    

    

    
<br><br>

    <button type="submit" class="btn btn-primary btn-block">Göndər</button>
</form>

@endsection
@section("css")
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection


@section("js")
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<script>
    $(document).ready(function() {
        $('#summernote').summernote(
            {
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      }
        );
    });
  </script>

@endsection