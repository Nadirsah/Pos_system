@extends("back.layouts.master")
@section("title","Səhifə əlavə et")
@section('content')

<form method="Post" action="{{route('admin.masa.store')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ad</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="exampleInputEmail1"
            aria-describedby="emailHelp" autofocus>
        <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>

    </div>

   

    <button type="submit" class="btn btn-primary">Göndər</button>
</form>

@endsection