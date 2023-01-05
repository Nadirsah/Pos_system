@extends("back.layouts.master")
@section("title","Linkler")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Melumatlar <span><a href="{{route('admin.naxcivan.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Basliq</th>
                        <th>Title</th>
                        <th>Seher</th>
                        <th>Erazi</th>
                        <th>Ehali</th>
                        <th>Seher_sekil</th>
                        <th>Erazi_sekil</th>
                        <th>Ehali_sekil</th>
                        <th>Seher_text</th>
                        <th>Erazi_text</th>
                        <th>Ehali_text</th>
                        <th>Duymeler</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Basliq</th>
                        <th>Title</th>
                        <th>Seher</th>
                        <th>Erazi</th>
                        <th>Ehali</th>
                        <th>Seher_sekil</th>
                        <th>Erazi_sekil</th>
                        <th>Ehali_sekil</th>
                        <th>Seher_text</th>
                        <th>Erazi_text</th>
                        <th>Ehali_text</th>
                        <th>Duymeler</th>

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