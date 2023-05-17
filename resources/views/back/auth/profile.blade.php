@extends("back.layouts.master")
@section("title","Profil")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Əlavə et</h6><span> <a class="collapse-item"
                href="{{route('admin.profile.create')}}"><i
                    class="btn btn-success fa-solid fa-circle-plus"></i></a></span><span
            style="margin-left:10px">Excel<a href="{{route('admin.excel')}}"><i
                    class="btn btn-success fa-solid fa-file-arrow-down" style="margin-left:10px"></i></a></span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>İstifadəçi adı</th>
                        <th>Sifrə</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>İstifadəçi adı</th>
                        <th>Sifrə</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $info)
                    <tr>
                        <td>{{$info->id}}</td>
                        <td>{{$info->name}}</td>
                        <td>******</td>

                        <td><a href="{{route('admin.profile.edit',$info->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.profile',$info->id)}}"><i
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