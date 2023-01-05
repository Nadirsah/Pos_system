@extends("back.layouts.master")
@section("title","Qəzeti yenile")
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif
<form method="Post" action="{{route('admin.qezet.update',$data->id)}}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Section</label>
        <select name="info" class="form-select" id="">
            <option value="">Section seçin</option>
            @foreach ($header as $heades)
            <option @if($data->header_id==$heades->id) selected @endif value="{{$heades->id}}">{{$heades->name}}</option>
            @endforeach

        </select>
    </div>

   

    <div class="mb-3">
        <label for="image" class="form-label">Şəkil_1 1</label> <br>
        <img src="{{asset($data->img)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            >
    </div>

    <div class="mb-3">
        <label for="image_1" class="form-label">Şəkil_2 </label> <br>
        <img src="{{asset($data->img_1)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image_1" class="form-control" id="image_1" aria-describedby="emailHelp"
            >
    </div>


   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection