@extends("back.layouts.master")
@section("title","Məlumatları yenilə")
@section('content')

<!-- @if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif -->
<form method="Post" action="{{route('admin.indexheader.update',$info->id)}}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Title</label>
        <input type="text" name="name" value="{{$info->name}}" class="form-control" id="name" aria-describedby="emailHelp">
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="about" class="form-label">Haqqimizda</label>
        <input type="text" name="about" value="{{$info->about}}" class="form-control" id="about" aria-describedby="emailHelp">
            <span class="text-danger">@error('about'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
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

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection