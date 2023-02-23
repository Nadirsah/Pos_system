@extends("back.layouts.master")
@section("title","Masalar")
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masa <span><a class="collapse-item"
                    href="{{route('admin.page.create')}}"><i
                        class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sirala</th>
                        <th>Ad</th>
                        <th>Sıra</th>
                        <th>Yenilə</th>
                        <th>Sil</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sirala</th>
                        <th>Ad</th>
                        <th>Sıra</th>
                        <th>Yenilə</th>
                        <th>Sil</th>

                    </tr>
                </tfoot>
                <tbody id="orders">
                    @foreach($data as $datas)
                    <tr id="page_{{$datas->id}}">
                        <td style="width:20px" class="text-center"><i
                                class="handle fa-solid fa-arrows-up-down-left-right " style="cursor:move"></i></td>
                        <td>{{$datas->name}}</td>
                        <th>{{$datas->orders}}</th>
                        <td><a href="{{route('admin.page.edit',$datas->id)}}"><i
                                    class="btn btn-info fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="{{route('admin.delete.page',$datas->id)}}"><i
                                    class="btn btn-danger fa-solid fa-trash"></i></a></td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
$('#orders').sortable({
    handle: '.handle',
    update: function() {
        var siralama = $('#orders').sortable('serialize');
        $.get("{{route('admin.page.orders')}}?" + siralama, function(data) {});
    }
});
</script>


@endsection