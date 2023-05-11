@extends("back.layouts.master")
@section("title","Kategoriya")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kategoriya <span><a href="{{route('admin.kategoriya.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kategoriya</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($data as $datas)
                    <tr>
                        <td>{{$datas->name}}</td>

                        <td>
                            <a href="{{route('admin.kategoriya.edit',$datas->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.kategoriya',$datas->id)}}"><i
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