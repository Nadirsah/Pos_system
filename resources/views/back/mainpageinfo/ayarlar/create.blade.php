@extends("back.layouts.master")
@section("title","Məlumat əlavə et")
@section('content')

<!-- @if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif -->
<form method="Post" action="{{route('admin.indexheader.store')}}"  enctype="multipart/form-data">
    @csrf

   


    <div class="mb-3">
        <label for="name" class="form-label">Title</label>
        <input type="text" name="name" value="{{$info->name}}" class="form-control" id="name" aria-describedby="emailHelp">
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>
    
    <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label>
        <input type="file" name="image" value="{{old('image')}}" class="form-control" id="image" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('image'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>
    
    <div class="mb-3">
        <label for="activ" class="form-label">Aktiv-Passiv</label>
        <select name="activ" class="form-select" id="activ">
            <option @if ($info->activ==1) selected @endif value="1">Aktiv</option>
            <option @if ($info->activ==0) selected @endif value="0">Passiv</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="fb" class="form-label">Facebook</label>
        <input type="text" name="fb" value="{{$info->facebook}}" class="form-control" id="fb" aria-describedby="emailHelp">
            <span class="text-danger">@error('fb'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="ins" class="form-label">Instagram</label>
        <input type="text" name="ins" value="{{$info->instagram}}" class="form-control" id="ins" aria-describedby="emailHelp">
            <span class="text-danger">@error('ins'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
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