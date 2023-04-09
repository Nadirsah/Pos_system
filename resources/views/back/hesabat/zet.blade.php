@extends("back.layouts.master")
@section("title","Zet hesabati")
@section('content')
<div class="row">

    <form action="{{route('admin.zetdate')}}" method="post" id='date'>
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="from">Başlanğıc tarix</label>
                <input type="date" name="fromdate" class="form-control" id="from" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="to">Son tarix</label>
                <input type="date" name="todate" class="form-control" id="to" required>
            </div>
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-info btn-block">Hesabla</button>
            </div>
        </div>
    </form>

</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>

            <th>Toplam satis</th>
            <th>Nagd</th>
            <th>Kart</th>
        </tr>
    </thead>

    <tbody>

        <tr>
            <td>{{$nagd+$kart}}</td>
            <td>{{$nagd}}</td>
            <td>{{$kart}}</td>


        </tr>


    </tbody>
</table>


<script>
$(document).ready(function() {
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#date').on('submit', function(e) {
                e.preventDefault();
                var fromdate = $('input[name=fromdate]').val();
                var todate = $('input[name=todate]').val();
                $.ajax({
                    url: "{{ route('admin.zetdate') }}",
                    method: 'post',
                    data: {
                        fromdate: fromdate,
                        todate: todate,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(result) {
                        var nagdTableBody = '';
                        var kartTableBody = '';
                        var allTableBody = '';
                        var totalSalePrice = 0; // Toplam sale_price değerini saklamak için bir değişken
                        var totalSalePricenagd = 0;
                        var totalSalePricekart = 0;
                        
                        $.each(result.all, function(index, value) {
                            if (value.get_mehsul && value.get_mehsul
                                .sale_price) {
                                // Sadece sale_price özelliği dolu olan kayıtların değerlerini toplama ekle
                                totalSalePrice += value.get_mehsul
                                    .sale_price;

                            }
                             
                        });
                        $.each(result.nagd, function(index, value) {
                            if (value.get_mehsul && value.get_mehsul
                                .sale_price) {
                                // Sadece sale_price özelliği dolu olan kayıtların değerlerini toplama ekle
                                totalSalePricenagd += value.get_mehsul
                                    .sale_price*value.miqdar;
                            }
                            
                        });
                        $.each(result.kart, function(index, value) {
                            if (value.get_mehsul && value.get_mehsul
                                .sale_price) {
                                // Sadece sale_price özelliği dolu olan kayıtların değerlerini toplama ekle
                                totalSalePricekart += value.get_mehsul
                                    .sale_price*value.miqdar;
                            }
                           
                        });

                        var total=totalSalePricenagd+totalSalePricekart;
                        var nagd=totalSalePricenagd;
                         var kart= totalSalePricekart;
                        allTableBody += '<tr>';
                        allTableBody += '<td><strong>' + total +
                            '</strong></td>';
                            allTableBody += '<td><strong>'+nagd +'</strong></td>';
                            allTableBody += '<td><strong>'+kart+'</strong></td>';
                            allTableBody += '</tr>';
                        var table = $('#dataTable').DataTable();
                        table.clear().draw();
                        table.rows.add($(allTableBody)).draw();
                    }

                });
            });
        });


    });
});
</script>
@endsection