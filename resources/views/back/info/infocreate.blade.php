@extends("back.layouts.master")
@section("title","Məlumat əlavə et")
@section('content')


<form method="Post" action="{{route('admin.info.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="#" class="form-label">Səhifə</label>
        <select name="page_id" class="form-select" id="">
            <option value="">Səhifə seçin</option>
            @foreach ($page as $pages)
            <option value="{{$pages->id}}">{{$pages->name}}</option>
            @endforeach

        </select>
        <span class="text-danger">@error('page_id'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3" >
        <label for="content1" class="form-label">Səhifə</label>
        <input  name="page" class="form-control" value="{{old('page')}}" id="content1" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('page'){{'Bu sahə boş ola bilməz!'}}@enderror</span>

    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Məlumat başlıgı</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Qiymet</label>
        <input type="text" name="price" value="{{old('price')}}" class="form-control" id="price" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('price'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

   
    

    <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label>
        <input type="file" name="image" value="{{old('image')}}" class="form-control" id="image" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('image'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    

    <div class="mb-3" >
        <label for="content" class="form-label">Məzmun</label>
        <textarea  id="summernote" name="content" value="{{old('content')}}" class="form-control" id="content" aria-describedby="emailHelp"
            autofocus>
           
    </textarea>
    <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
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