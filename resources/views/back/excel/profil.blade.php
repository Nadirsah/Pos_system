@extends("back.layouts.master")
@section("title","Panel")
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Excel</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Əlavə et <span><a href="{{route('admin.profile.create')}}"><i
                            class="btn btn-success fa-solid fa-circle-plus"></i></a></span>
                <a class="btn btn-danger float-end" style="margin-left:10px"
                    href="{{ route('admin.users.export') }}">Məlumatları xaricə köçür <i class="fa-solid fa-arrow-up"></i></a>
            </h6>
        </div>
        <div class="card-body">
            <div class="border border-secondary rounded p-3 mb-2">
                <form action="{{ route('admin.users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Excel sənədi seçin</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Məlumatları daxil et <i
                            class="fa-solid fa-arrow-down"></i></button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sifre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <th>{{$item->name}}</th>
                            <th>******</th>
                            <td><a href="{{route('admin.profile.edit',$item->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin.delete.profile',$item->id)}}"><i
                                    class="btn btn-danger fa-solid fa-trash"></i></a>
                        </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection