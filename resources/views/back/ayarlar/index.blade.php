@extends("back.layouts.master")
@section("title","Header")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Məlumatlar<span><a href="{{route('admin.ayarlar.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span> </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>



                        <th>Ad</th>
                        <th>Sekil</th>
                        <th>Activ-Passiv</th>
                        <th>Facebook</th>
                        <th>Telefon</th>
                        <th>Unvan</th>
                        <th>Action</th>

                    </tr>
                </thead>
                
                <tbody>
                    @foreach($info as $infos)
                    <tr>


                        <td>{{$infos->name}}</td>
                        <td> <img src="{{asset($infos->image)}}" width="50" alt=""></td>
                       
                        <td>{{$infos->activ}}</td>
                        <td>{{$infos->facebook}}</td>
                        <td>{{$infos->telefon}}</td>
                        <td>{{$infos->about}}</td>

                        <td>

                            <a href="{{route('admin.ayarlar.edit',$infos->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.ayarlar',$infos->id)}}"><i
                                    class="btn btn-danger fa-solid fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection