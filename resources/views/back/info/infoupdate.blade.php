@extends("back.layouts.master")
@section("title","Məlumatları yenilə")
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif
<form method="Post" action="{{route('admin.info.update',$data->id)}}" enctype="multipart/form-data">
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Səhifə</label>
        <select name="info" class="form-select" id="">
            <option value="">Səhifə seçin</option>
            @foreach ($page as $pages)
            <option @if($data->page_id==$pages->id) selected @endif value="{{$pages->id}}">{{$pages->name}}</option>
            @endforeach

        </select>
    </div>

    <div class="mb-3" >
        <label for="content1"  class="form-label">Səhifə</label>
        <input  name="page" value='{{$data->slug}}' class="form-control" id="content1" aria-describedby="emailHelp"
            autofocus>

    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Məlumat başlığı</label>
        <input type="text" name="name" value='{{$data->name}}' class="form-control" id="name" aria-describedby="emailHelp"
            autofocus>
    </div>

    
   

    <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label> <br>
        <img src="{{asset($data->image)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            autofocus>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Məlumat başlığı</label>
        <textarea name="content"  class="form-control" id="content" aria-describedby="emailHelp"
            autofocus>{{$data->content}}
    </textarea>

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection