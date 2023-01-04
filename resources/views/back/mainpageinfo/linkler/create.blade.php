@extends("back.layouts.master")
@section("title","sekil elave et")
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif
<form method="Post" action="{{route('admin.linkler.store')}}"  enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Basliq</label>
        <select name="info" class="form-select" id="">
            <option value="">Sehife secin</option>
            @foreach ($header as $headers)
            <option value="{{$headers->id}}">{{$headers->name}}</option>
            @endforeach

        </select>
    </div>


    <div class="mb-3">
        <label for="name" class="form-label">URL</label>
        <input type="url" name="name" class="form-control" id="name" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Sekil</label>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="fon" class="form-label">Fon</label>
        <input type="file" name="fon" class="form-control" id="fon" aria-describedby="emailHelp"
            autofocus>
    </div>

    
    

    

    

    
<br><br>

    <button type="submit" class="btn btn-primary btn-block">Gonder</button>
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