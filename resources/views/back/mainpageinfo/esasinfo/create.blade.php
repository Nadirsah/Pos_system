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
<form method="Post" action="{{route('admin.esasinfo.store')}}" >
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Section</label>
        <select name="info" class="form-select" id="">
            <option value="">Section secin</option>
            @foreach ($header as $headers)
            <option value="{{$headers->id}}">{{$headers->name}}</option>
            @endforeach

        </select>
    </div>


    <div class="mb-3">
        <label for="name" class="form-label">Məlumat başlığı</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
            autofocus>
    </div>

    
    

    

    

    <div class="mb-3" >
        <label for="content" class="form-label">Məzmun</label>
        <textarea  id="summernote" name="content" class="form-control" id="content" aria-describedby="emailHelp"
            autofocus>
    </textarea>
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