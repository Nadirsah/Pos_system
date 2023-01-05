@extends("back.layouts.master")
@section("title","Səhifə başlıqları")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Başlıqları <span><a href="{{route('admin.header.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Başlıq</th>

                        <th>Action</th>


                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <th>Başlıq</th>

                        <th>Action</th>

                    </tr>

                </tfoot>
                <tbody>
                    @foreach($data as $datas)
                    <tr>
                        <td>{{$datas->name}}</td>

                        <td>
                            <a href="{{route('admin.header.edit',$datas->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.header',$datas->id)}}"><i
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