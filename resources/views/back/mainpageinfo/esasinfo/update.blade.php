@extends("back.layouts.master")
@section("title","Məlumatları yenilə")
@section('content')


<form method="Post" action="{{route('admin.esasinfo.update',$data->id)}}" >
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Section</label>
        <select name="info" class="form-select" id="">
            <option value="">Section secin</option>
            @foreach ($header as $heades)
            <option @if($data->header_id==$heades->id) selected @endif value="{{$heades->id}}">{{$heades->name}}</option>
            @endforeach

        </select>
        <span class="text-danger">@error('info'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Məlumat başligi</label>
        <input type="text" name="name" value='{{$data->name}}' class="form-control" id="name" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

   
    

   

    <div class="mb-3">
        <label for="summernote" class="form-label">Məzmun</label>
        <textarea name="content"  class="form-control" id="summernote" aria-describedby="emailHelp"
            autofocus>{{$data->content}}
    </textarea>
    <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
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