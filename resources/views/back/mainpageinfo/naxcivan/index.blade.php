@extends("back.layouts.master")
@section("title","Naxcivan")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Məlumatlar <span><a href="{{route('admin.naxcivan.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Section</th>
                        <th>Title</th>
                        <th>Şəhər</th>
                        <th>Ərazi</th>
                        <th>Əhali</th>
                        <th>Şəhər_şəkil</th>
                        <th>Ərazi_şəkil</th>
                        <th>Əhali_şəkil</th>
                        <th>Şəhər_text</th>
                        <th>Ərazi_text</th>
                        <th>Əhali_text</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Section</th>
                        <th>Title</th>
                        <th>Şəhər</th>
                        <th>Ərazi</th>
                        <th>Əhali</th>
                        <th>Şəhər_şəkil</th>
                        <th>Ərazi_şəkil</th>
                        <th>Əhali_şəkil</th>
                        <th>Şəhər_text</th>
                        <th>Ərazi_text</th>
                        <th>Əhali_text</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>
                    @foreach($info as $infos)
                    <tr>
                        <td>{{$infos->getHeader->name}}</td>
                        <td>{{$infos->title}}</td>
                        <td>{{$infos->city}}</td>
                        <td>{{$infos->area}}</td>
                        <td>{{$infos->people}}</td>
                        <td> <img src="{{asset($infos->city_image)}}" width="50" alt=""></td>
                        <td> <img src="{{asset($infos->area_image)}}" width="50" alt=""></td>
                        <td> <img src="{{asset($infos->people_image)}}" width="50" alt=""></td>
                        <td>{{$infos->city_text}}</td>
                        <td>{{$infos->area_text}}</td>
                        <td>{{$infos->people_text}}</td>
                        
                        <td>

                            <a href="{{route('admin.naxcivan.edit',$infos->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.naxcivan',$infos->id)}}"><i
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