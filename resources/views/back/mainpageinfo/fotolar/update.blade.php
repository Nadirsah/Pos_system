@extends("back.layouts.master")
@section("title","Məlumatları yenilə")
@section('content')


<form method="Post" action="{{route('admin.fotolar.update',$data->id)}}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="#" class="form-label">Section</label>
        <select name="info" class="form-select" id="">
            <option value="">Section seçin</option>
            @foreach ($header as $heades)
            <option @if($data->header_id==$heades->id) selected @endif value="{{$heades->id}}" {{old('id')}} >{{$heades->name}}</option>
            @endforeach

        </select>
        <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Məlumat </label>
        <input type="text" name="name" value='{{$data->name}}'  class="form-control" id="name" aria-describedby="emailHelp"
            >
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Şəkil</label> <br>
        <img src="{{asset($data->img)}}" alt="" width="100" class="rounded"> <br>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp"
            >
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>


   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection