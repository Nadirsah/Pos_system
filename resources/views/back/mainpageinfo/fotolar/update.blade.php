@extends("back.layouts.master")
@section("title","Melumatlari yenile")
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif
<form method="Post" action="{{route('admin.fotolar.update',$data->id)}}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Basliq</label>
        <select name="info" class="form-select" id="">
            <option value="">Basliq secin</option>
            @foreach ($header as $heades)
            <option @if($data->header_id==$heades->id) selected @endif value="{{$heades->id}}">{{$heades->name}}</option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Melumat basligi</label>
        <input type="text" name="name" value='{{$data->name}}' class="form-control" id="name" aria-describedby="emailHelp"
            >
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Sekil</label> <br>
        <img src="{{asset($data->img)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            >
    </div>


   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenile</button>
</form>

@endsection