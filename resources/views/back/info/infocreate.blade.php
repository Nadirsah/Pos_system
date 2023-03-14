@extends("back.layouts.master")
@section("title","Məlumat əlavə et")
@section('content')


<form method="Post" action="{{route('admin.info.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="#" class="form-label">Kategoriya</label>
        <select name="page_id" class="form-select" id="">
            <option value="">Kategoriya seçin</option>
            @foreach ($category as $categories)
            <option value="{{$categories->id}}">{{$categories->name}}</option>
            @endforeach

        </select>
        <span class="text-danger">@error('page_id'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <!-- <div class="mb-3" >
        <label for="content1" class="form-label">Səhifə</label>
        <input  name="page" class="form-control" value="" id="content1" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger"></span>

    </div> -->
    <div class="mb-3">
        <label for="name" class="form-label">Mehsul adi</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" aria-describedby="emailHelp"
            >
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    

    

    <div class="mb-3">
        <label for="price" class="form-label">Qiymet</label>
        <input type="text" name="price" value="{{old('price')}}" class="form-control" id="price" aria-describedby="emailHelp"
            >
            <span class="text-danger">@error('price'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <!-- <div class="mb-3">
        <label for="color" class="form-label">Reng</label>
        <input type="text" name="color" value="" class="form-control" id="color" aria-describedby="emailHelp"
            >
            <span class="text-danger"></span>
    </div> -->

    <!-- <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" name="brand" value="" class="form-control" id="brand" aria-describedby="emailHelp"
            >
            <span class="text-danger"></span>
    </div> -->
    

    <!-- <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label>
        <input type="file" name="image" value="" class="form-control" id="image" aria-describedby="emailHelp"
            >
            <span class="text-danger"></span>
    </div> -->

    

    <!-- <div class="mb-3" >
        <label for="content" class="form-label">Məzmun</label>
        <textarea  id="summernote" name="content" value="" class="form-control" id="content" aria-describedby="emailHelp"
            >
           
    </textarea>
    <span class="text-danger"></span>
    </div> -->
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