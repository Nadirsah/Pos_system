@extends("back.layouts.master")
@section("title","Məlumatları yenilə")
@section('content')


<form method="Post" action="{{route('admin.fotolar.update',$data->id)}}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf

    

    <div class="mb-3">
        <label for="name" class="form-label">Name </label>
        <input type="text" name="name" value='{{$data->name}}'  class="form-control" id="name" aria-describedby="emailHelp"
            >
            <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
    </div>

   


   

   

<br><br>

    <button type="submit" class="btn btn-primary btn-block">Yenilə</button>
</form>

@endsection