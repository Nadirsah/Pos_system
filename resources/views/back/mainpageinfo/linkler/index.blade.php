@extends("back.layouts.master")
@section("title","Linklər")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Linklər <span><a href="{{route('admin.linkler.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Section</th>
                        <th>URL</th>
                        <th>Şəkil</th>
                        <th>Fon</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Section</th>
                        <th>URL</th>
                        <th>Şəkil</th>
                        <th>Fon</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>
                    @foreach($info as $infos)
                    <tr>
                        <td>{{$infos->getHeader->name}}</td>
                        <td>{{$infos->name}}</td>
                        <td> <img src="{{asset($infos->img)}}" width="50" alt=""></td>
                        <td> <img src="{{asset($infos->fon)}}" width="50" alt=""></td>
                        <td>

                            <a href="{{route('admin.linkler.edit',$infos->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.linkler',$infos->id)}}"><i
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