@extends("back.layouts.master")
@section("title","Panel")
@section('content')

<style>
tr.search-result td {
    font-weight: bold;
    background-color: #fff2a8;
}
</style>

<div class="row">
    <div class="col mb-4">
        <div class="card bg-info text-white shadow">
            <div class="card-body text-center">
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModalSifaris">
                    <i class="fa-solid fa-utensils fa-lg"></i> Sifaris
                </button>
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
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Axtar...">
                    </div>
                </div>



                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="Axtar...">
                    </div>
                </div> -->


            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <div style="height:500px; overflow-y: scroll;">
                        <table class="table table-bordered text-dark" id="myTable" width="100%" cellspacing="0">
                            <thead class="text-danger bg-dark" style="position: sticky; top: 0; z-index: 1;">
                                <tr>

                                    <th>Masa</th>
                                    <th>Mehsul</th>
                                    <th>miqdar</th>
                                    <th>Qiymet</th>
                                    <th>Yekun mebleg</th>
                                    <th>Sifaris tarixi</th>
                                    <th>Duzelis tarixi</th>
                                    <th>Action</th>


                                </tr>
                            </thead>

                            <tbody id="ordercedvel" style="position: relative;">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->

</div>


<!-- Modal Siafris-->
<div class="modal fade" id="exampleModalSifaris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sifaris</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.order.store') }}" id="addOrder" enctype="multipart/form-data">
                @csrf
                <div class="modal-body ">
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
                                <td width="15%">
                                    <select name="inputs[0][masa_id]" class="form-select" id="masa">
                                        <option value="">Masa seçin</option>
                                        @foreach ($masa as $masas)
                                        <option value="{{ $masas->id }}">{{ $masas->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td width="15%">
                                    <select name="inputs[0][kategoriya]" class="form-select" id="kategory">
                                        <option value="">Kategoriya seçin</option>
                                        @foreach ($kategoriya as $kategories)
                                        <option value="{{ $kategories->id }}">{{ $kategories->name }}</option>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tbody tr").each(function(index) {
            if (index !== 0) {
                $row = $(this);
                var name = $row.find("td:first-child").text().toLowerCase();
                var age = $row.find("td:nth-child(2)").text().toLowerCase();
                var country = $row.find("td:nth-child(3)").text().toLowerCase();
                if (name.indexOf(value) !== -1 || age.indexOf(value) !== -1 || country.indexOf(
                        value) !== -1) {
                    $row.show();
                } else {
                    $row.hide();
                }
            }
        });
    });
});


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
                url: "{{ route('admin.getmehsul') }}",
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
                url: "{{ route('admin.getqiymet') }}",
                type: 'post',
                data: 'mid=' + mid + '&_token={{csrf_token()}}',
                success: function(result) {
                    tr.find('select[name$="[price]"]').html(result);
                }
            })
        });


        $(document).on('change', '#editOrder select[name="kategoriya"]', function() {
            let select = $(this);
            let mid = select.val();
            $.ajax({
                url: "{{ route('admin.geteditmehsul') }}",
                type: 'post',
                data: 'mid=' + mid + '&_token={{csrf_token()}}',
                success: function(result) {
                    $("#editOrder select[name='mehsul']").html(result);
                }
            })
        });

        $(document).on('change', '#editOrder select[name="mehsul"]', function() {
            let select = $(this);
            let kid = select.val();
            $.ajax({
                url: "{{ route('admin.geteditqiymet') }}",
                type: 'post',
                data: 'kid=' + kid + '&_token={{csrf_token()}}',
                success: function(result) {
                    $("#editOrder select[name='price']").html(result);
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
        '][odenis]" checked id="odenis" value="nagd"><label class="form-check-label" for="odenis">Nagd</label></div><div class="form-check"><input class="form-check-input" type="radio" name="inputs[' +
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