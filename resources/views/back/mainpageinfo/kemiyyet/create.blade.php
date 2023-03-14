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
<form method="Post" action="{{route('admin.fotolar.store')}}"  enctype="multipart/form-data">
    @csrf

    


    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
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