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
                                <th>Başliq</th>
                                <th>Məzmun</th>
                                <th>Qiymet</th>



                            </tr>
                        </thead>

                        <tbody >
                            @foreach($totalsifaris as $sifariss)
                            <tr>
                                <td>{{$sifariss->getMasa->name}}</td>
                                <td>{{$sifariss->getKategory->name}}</td>
                                <td>{{$sifariss->getMehsul->name}}</td>
                                <td>{{$sifariss->getMehsul->price}}</td>

                            </tr>
                            @endforeach
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
            <form method="Post" action="{{route('admin.xronika.store')}}" id="addOrder" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th scope="col">Masa</th>
                                <th scope="col">Kategoriya</th>
                                <th scope="col">Mehsul</th>
                                <th scope="col">Qiymet</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <select name="inputs[0][masa_id]" class="form-select" id="masa">
                                        <option value="">Masa seçin</option>
                                        @foreach ($masa as $masas)
                                        <option value="{{$masas->id}}">{{$masas->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><select name="inputs[0][kategoriya]" class="form-select" id="kategory">
                                        <option value="">Kategoriya seçin</option>
                                        @foreach ($kategoriya as $kategories)
                                        <option value="{{$kategories->id}}">{{$kategories->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <div class="mb-3">

                                        <select name="inputs[0][mehsul]" class="form-select" id="mehsul">
                                            <option value="">Mehsul seçin</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3">

                                        <select name="inputs[0][price]" class="form-select" id="price">
                                            <option value="">Qiymet</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3">
                                        <input type="checkbox" checked name="inputs[0][sifaris]" id="" value="0">
                                    </div>
                                </td>
                                <td><button type="submit" name="add" id="add" class="btn btn-success">Elave et</button>
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



@endsection

@section('script')
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
        '][mehsul]" class="form-select" id="mehsul"><option value="">Mehsul seçin</option></select></div></td><td><div class="mb-3"><select name="inputs[' +
        i +
        '][price]" class="form-select" id="price"><option value="">Qiymet</option></select></div></td><td><button type="button"  class="btn btn-danger remove-table-row">Sil</button></td></tr>'
    );
});

$(document).on('click', '.remove-table-row', function() {
    $(this).parents('tr').remove();
})



$(document).ready(function() {
    $("#kategory").change(function() {
        let kid = $(this).val();
        $.ajax({
            url: '/getmehsul',
            type: 'post',
            data: 'kid=' + kid + '&_token={{csrf_token()}}',
            success: function(result) {
                $('#mehsul').html(result)
            }
        })
    });

    $("#kategory").change(function() {
        let kid = $(this).val();
        $.ajax({
            url: '/getqiymet',
            type: 'post',
            data: 'kid=' + kid + '&_token={{csrf_token()}}',
            success: function(result) {
                $('#price').html(result)
            }
        })
    });
});

$(document).ready(function(){
    showOrder();
    

function showOrder() {
$.get("{{route('admin.ordershow')}}",function(data){
    $('#orderList').empty().html(data);
});
}

showOrder();
$('#addOrder').on('submit',function(e){
    e.preventDefault();
    var form=$(this).serialize();
    var url=$(this).attr('action');
    $.ajax({
        type:'POST',
        url:url,
        data:form,
        datatype:'json',
        success:function(){
            $('#exampleModalSifaris').modal('hide');
            $('#addOrder')[0].reset();
            showOrder();
        }
    });
});
$(document).on('click','.edit',function(event){
    event.preventDefault();
    var id=$(this).data('id');
    var masa=$(this).data('masa');
    var kategory=$(this).data('kategory');
    var mehsul=$(this).data('mehsul');
    var qiymet=$(this).data('price');
    $('#editOrderModal').modal('show');
    $("#masa_id").val(masa);
    $("#kategoriya").val(kategory);
    $("#mehsuls").val(mehsul);
    $("#qiymet").val(qiymet);
    $("#orderid").val(id);
    
});

$('#editOrder').on('submit',function(e){
e.preventDefault();
var form=$(this).serialize();
var url=$(this).attr('action');
$.post(url,form,function(data){
    $('#editOrderModal').modal('hide');
    showOrder();
})
});

});

</script>


@endsection