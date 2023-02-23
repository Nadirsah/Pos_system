@extends("back.layouts.master")
@section("title","Mehsul")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mehsul</h6><span> <a class="collapse-item"
                href="{{route('admin.info.create')}}"><i class="btn btn-success fa-solid fa-circle-plus"></i></a></span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Məlumat başlığı</th>
                        <th>səhifə</th>
                        <th>Şəkil</th>
                        <th>Məzmun</th>
                        <th>Qiymət</th>
                        <th>Reng</th>
                        <th>Brand</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Məlumat başlığı</th>
                        <th>səhifə</th>
                        <th>Şəkil</th>
                        <th>Məzmun</th>
                        <th>Qiymət</th>
                        <th>Reng</th>
                        <th>Brand</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>
                    @foreach($info as $infos)
                    <tr>
                        <td>{{$infos->page_id}}</td>
                        <td>{{$infos->name}}</td>
                        <td>{{$infos->slug}}</td>
                        <td> <img src="{{asset($infos->image)}}" width="50" alt=""></td>
                        <td>{{$infos->content}}</td>
                        <td>{{$infos->price}}</td>
                        <td>{{$infos->color}}</td>
                        <td>{{$infos->brand}}</td>
                        <td><a href="{{route('admin.info.edit',$infos->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.info',$infos->id)}}"><i
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