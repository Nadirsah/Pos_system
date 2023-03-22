@extends("back.layouts.master")
@section("title","Panel")
@section('content')


<div class="col-lg-6 mb-4">
    <div class="row">

        <div class="col-lg-6 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <div class="text-white small">
                        <button type="button" class="dropdown-item text-danger" style="font-size:16px"
                            data-bs-toggle="modal" data-bs-target="#exampleModalSifaris">
                            <i class="fa-solid fa-utensils fa-lg"> Sifaris</i>
                        </button>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Masalar</h6>

            </div>
            <!-- Card Body -->
            <div class="row" id="orderList">

            </div>
        </div>
    </div>
</div>

<!-- Area Chart -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Satis cedveli</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-success table-hover text-dark" id="dataTable"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>Masa</th>
                                <th>Mehsul</th>
                                <th>Qiymet</th>
                                <th>miqdar</th>
                                <th>Sifaris tarixi</th>
                                <th>Action</th>


                            </tr>
                        </thead>

                        <tbody id="ordercedvel">
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->

</div>


<!-- Modal Siafris-->
<div class="modal fade " style="width:1250px;" id="exampleModalSifaris" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sifaris</h5>

            </div>
            <form method="Post" action="{{route('admin.order.store')}}" id="addOrder" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th width="15%" scope="col">Masa</th>
                                <th width="15%" scope="col">Kategoriya</th>
                                <th width="15%" scope="col">Mehsul</th>
                                <th width="15%" scope="col">Miqdar</th>
                                <th width="15%" scope="col">Qiymet</th>
                                <th width="15%" scope="col">Odenis novu</th>
                                <th width="15%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="15%"> <select name="inputs[0][masa_id]" class="form-select" id="masa">
                                        <option value="">Masa seçin</option>
                                        @foreach ($masa as $masas)
                                        <option value="{{$masas->id}}">{{$masas->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td width="15%"><select name="inputs[0][kategoriya]" class="form-select" id="kategory">
                                        <option value="">Kategoriya seçin</option>
                                        @foreach ($kategoriya as $kategories)
                                        <option value="{{$kategories->id}}">{{$kategories->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td width="15%">
                                    <div class="mb-3">

                                        <select name="inputs[0][mehsul]" class="form-select" id="mehsul">
                                            <option value="">Mehsul seçin</option>
                                        </select>
                                    </div>
                                </td>

                                <td width="15%">
                                    <div class="mb-3">

                                        <input type="number" name="inputs[0][miqdar]" class="form-select" id="miqdar"
                                            placeholder="miqdar">

                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="mb-3">

                                        <select name="inputs[0][price]" class="form-select" id="price">
                                            <option value="">Qiymet</option>
                                        </select>
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputs[0][odenis]" checked
                                            id="odenis" value="nagd">
                                        <label class="form-check-label" for="odenis">
                                            Nagd
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputs[0][odenis]"
                                            id="sifaris" value="kart">
                                        <label class="form-check-label" for="sifaris">
                                            Kart
                                        </label>
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked
                                            name="inputs[0][sifaris]" id="odenis" value="0">
                                        <label class="form-check-label" for="odenis">
                                            Odenis
                                        </label>
                                    </div>

                                </td>
                                <td width="15%"><button type="button" name="add" id="add" class="btn btn-success">Elave
                                        et</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block">Göndər</button>
                </div>

            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- cap Modal -->

<!--  -->

@include('back.orderprintmodal')
@endsection

@section('script')
<script>
$(document).ready(function() {
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#table select[name^="inputs"][name$="[kategoriya]"]', function() {
            let select = $(this);
            let kid = select.val();
            let tr = select.closest('tr');
            $.ajax({
                url: '/getmehsul',
                type: 'post',
                data: 'kid=' + kid + '&_token={{csrf_token()}}',
                success: function(result) {
                    tr.find('select[name$="[mehsul]"]').html(result);
                }
            });
        });

        $(document).on('change', '#table select[name^="inputs"][name$="[mehsul]"]', function() {
            let select = $(this);
            let mid = select.val();
            let tr = select.closest('tr');
            $.ajax({
                url: '/getqiymet',
                type: 'post',
                data: 'mid=' + mid + '&_token={{csrf_token()}}',
                success: function(result) {
                    tr.find('select[name$="[price]"]').html(result);
                }
            })
        });

        $(document).on('change', '#edittable select[name^="inputs"][name$="[kategoriya]"]', function() {
            let select = $(this);
            let kid = select.val();
            let tr = select.closest('tr');
            $.ajax({
                url: '/geteditmehsul',
                type: 'post',
                data: 'editkid=' + editkid + '&_token={{csrf_token()}}',
                success: function(result) {
                    tr.find('select[name$="[mehsul]"]').html(result);
                }
            })
        });

        $(document).on('change', '#edittable select[name^="inputs"][name$="[kategoriya]"]', function() {
            let select = $(this);
            let kid = select.val();
            let tr = select.closest('tr');
            $.ajax({
                url: '/geteditqiymet',
                type: 'post',
                data: 'editkid=' + editkid + '&_token={{csrf_token()}}',
                success: function(result) {
                    tr.find('select[name$="[price]"]').html(result);
                }
            })
        });
    });


    showOrder();
    showOrderCedvel();
    showOrderPrint();


    function showOrder() {
        $.get("{{route('admin.ordershow')}}", function(data) {
            $('#orderList').empty().html(data);

        });
    }

    function showOrderCedvel() {
        $.get("{{route('admin.ordershowcedvel')}}", function(data) {
            $('#ordercedvel').empty().html(data);

        });
    }

    function showOrderPrint() {
        $.get("{{route('admin.ordershowprint')}}", function(data) {
            $('#ordercap').empty().html(data);

        });
    }


    $('#addOrder').on('submit', function(e) {
        e.preventDefault();
        var form = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            datatype: 'JSON',
            success: function() {
                $('#exampleModalSifaris').modal('hide');
                $('#addOrder')[0].reset();
                $('#orderprint').modal('show');
                showOrder();
                showOrderCedvel();
                showOrderPrint();


            }
        });
    });

    // $('#editOrder').on('submit', function(e) {
    //     e.preventDefault();
    //     var form = $(this).serialize();
    //     var url = $(this).attr('action');
    //     $.ajax({
    //         type: 'PUT',
    //         url: url,
    //         data: form,
    //         dataType: 'json',
    //         success: function(cavab) {
    //             $('.editmodal').modal('hide');
    //             $('#editOrder')[0].reset();
    //             showOrder();
    //             console.log(cavab)
    //         }
    //     });
    // });




    // $(document).on('click', '.editform', function(event) {
    //     event.preventDefault();
    //     var id = $(this).data('id');
    //     var masa = $(this).data('masa');
    //     var kategory = $(this).data('kategoriya');
    //     var mehsul = $(this).data('mehsul');
    //     var qiymet = $(this).data('price');
    //     var activ = $(this).data('sifaris');
    //     $('.editmodal').modal('show');
    //     $("#masas").val(masa);
    //     $("#kategorys").val(kategory);
    //     $("#mehsuls").val(mehsul);
    //     $("#prices").val(qiymet);
    //     $("#activs").val(activ);
    //     $("#id").val(id);

    // });

    // $('#editOrder').on('submit', function(e) {
    //     e.preventDefault();
    //     var form = $(this).serialize();
    //     var url = $(this).attr('action');
    //     $.post(url, form, function() {
    //         $('.editmodal').modal('hide');
    //         showOrder();
    //     })
    // });



});
</script>

<script>
var i = 0;
$('#add').click(function() {
    ++i;
    $('#table').append(
        '<tr><td> <select name="inputs[' + i +
        '][masa_id]" class="form-select" id="masa"><option value="">Masa seçin</option>@foreach ($masa as $masas)<option value="{{$masas->id}}">{{$masas->name}}</option>@endforeach</select></td><td><select name="inputs[' +
        i +
        '][kategoriya]" class="form-select" id="kategory"><option value="">Kategoriya seçin</option>@foreach ($kategoriya as $kategories)<option value="{{$kategories->id}}">{{$kategories->name}}</option>@endforeach</select></td><td><div class="mb-3"><select name="inputs[' +
        i +
        '][mehsul]" class="form-select" id="mehsul"><option value="">Mehsul seçin</option></select></div></td><td><div class="mb-3"><input type="number" name="inputs[' +
        i +
        '][miqdar]" class="form-select" id="miqdar" placeholder="miqdar"></div></td><td><div class="mb-3"><select name="inputs[' +
        i +
        '][price]" class="form-select" id="price"><option value="">Qiymet</option></select></div></td><td width="15%"><div class="form-check"><input class="form-check-input" type="radio" name="inputs[' +
        i +
        '][odenis]" checkedid="odenis" value="nagd"><label class="form-check-label" for="odenis">Nagd</label></div><div class="form-check"><input class="form-check-input" type="radio" name="inputs[' +
        i +
        '][odenis]"id="sifaris" value="kart"><label class="form-check-label" for="sifaris">Kart</label></div></td><td><div class="form-check"><input class="form-check-input" type="checkbox" checked name="inputs[' +
        i +
        '][sifaris]" id="odenis"value="0"><label class="form-check-label" for="odenis">Odenis</label></div></td> <td><button type="button" name="add" id="remove" class="btn btn-danger">Sil</button></td>'
    );
});

$(document).on('click', '#remove', function() {
    $(this).parents('tr').remove();
})
</script>


@endsection