@extends("back.layouts.master")
@section("title","Qəzet")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Məlumatlar <span><a href="{{route('admin.qezet.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Section</th>

                        <th>Şəkil_1</th>
                        <th>Şəkil_2</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Section</th>

                        <th>Şəkil_1</th>
                        <th>Şəkil_2</th>
                        <th>Action</th>


                    </tr>
                </tfoot>
                <tbody>
                    @foreach($info as $infos)
                    <tr>
                        <td>{{$infos->getHeader->name}}</td>

                        <td> <img src="{{asset($infos->img)}}" width="50" alt=""></td>
                        <td> <img src="{{asset($infos->img_1)}}" width="50" alt=""></td>
                        <td>

                            <a href="{{route('admin.qezet.edit',$infos->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.qezet',$infos->id)}}"><i
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