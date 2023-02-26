@extends("back.layouts.master")
@section("title","Panel")
@section('content')

<div class="col-lg-6 mb-4">




</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Masalar</h6>

            </div>
            <!-- Card Body -->
           <div class="row">
           @foreach($masa as $masas)
            <div class="col-lg-4 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        {{$masas->name}}
                        <div class="text-white small"> {{$masas->orders}}
                            <a class="dropdown-item text-danger" style="font-size:16px" href="#order{{$masas->id}}"
                                data-toggle="modal">
                                Sifaris et
                            </a>
                            @include('back.modal')
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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

                                <th>Section</th>
                                <th>Başliq</th>
                                <th>Məzmun</th>
                                <th>Qiymet</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Section</th>
                                <th>Başliq</th>
                                <th>Məzmun</th>
                                <th>Qiymet</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($sifaris as $sifariss)
                            <tr>
                                <td>{{$sifariss->masa_id}}</td>
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

<!-- Modal -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
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
})
</script>

@endsection