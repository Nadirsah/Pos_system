@extends("back.layouts.master")
@section("title","Mehsulu yenilə")
@section('content')


<form method="Post" action="{{route('admin.mehsul.update',$data->id)}}" enctype="multipart/form-data">
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Kategoriya</label>
        <select name="page_id" class="form-select" id="">
            <option value="">Kategoriya seçin</option>
            @foreach ($category as $categorie)
            <option @if($data->page_id==$categorie->id) selected @endif value="{{$categorie->id}}">{{$categorie->name}}</option>
            @endforeach

        </select>
        <span class="text-danger">@error('page_id'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    
    <div class="mb-3">
        <label for="name" class="form-label">Mehsul adi</label>
        <input type="text" name="name" value='{{$data->name}}' class="form-control" id="name" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>
   
    <div class="mb-3">
        <label for="price" class="form-label">Qiymet</label>
        <input type="text" name="price" value='{{$data->price}}' class="form-control" id="price" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('price'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="sale_price" class="form-label">Satis Qiymet</label>
        <input type="text" name="sale_price" value='{{$data->sale_price}}' class="form-control" id="sale_price" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger">@error('price'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>
    
    <!-- <div class="mb-3">
        <label for="color" class="form-label">Reng</label>
        <input type="text" name="color" value='' class="form-control" id="color" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger"></span>
    </div> -->
   
    <!-- <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" name="brand" value='' class="form-control" id="brand" aria-describedby="emailHelp"
            >
            <span class="text-danger"></span>
    </div> -->
    <!-- <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label> <br>
        <img src="" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            autofocus>
            <span class="text-danger"></span>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Məlumat başlığı</label>
        <textarea name="content"  class="form-control" id="content" aria-describedby="emailHelp"
            autofocus>
    </textarea>
    <span class="text-danger"></span> -->

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection