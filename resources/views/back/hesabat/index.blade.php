@extends("back.layouts.master")
@section("title","Satis hesabati")
@section('content')



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Satislar</h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Axtar...">
                    </div>
                </div>
                <form action="{{route('admin.date')}}" method="post" id='date'>
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
            <div style="height: 500px; overflow-y: scroll;">
                <table class="table table-bordered" id="hesabat" width="100%" cellspacing="0">
                    <thead class="text-danger bg-dark" style="position: sticky; top: 0; z-index: 1;">
                        <tr>

                            <th>No</th>
                            <th>Kategoriya </th>
                            <th>Mehsul</th>
                            <th>Miqdar</th>
                            <th>Maya qiymeti</th>
                            <th>Yekun Maya qiymeti</th>
                            <th>Satis qiymeti</th>
                            <th>Yekun qiymeti</th>
                            <th>Odenis novu</th>
                            <th>Tarix</th>


                        </tr>
                    </thead>

                    <div style="position: sticky; top: 40px; z-index: 1;">
                        <tbody id="#" style="position: relative;">
                            @foreach($order as $orders)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$orders->getKategory->name}}</td>
                                <td>{{$orders->getMehsul->name}}</td>
                                <td id="miqdar">{{$orders->miqdar}}</td>
                                <td id="mayammebleg">{{$orders->getMehsul->price}}</td>
                                <td id="yekunmayammebleg">{{($orders->getMehsul->price)*($orders->miqdar)}}</td>
                                <td id="satismebleg">{{$orders->getMehsul->sale_price}}</td>
                                <td id="mebleg">{{($orders->getMehsul->sale_price)*($orders->miqdar)}}</td>
                                <td>{{$orders->odenis}}</td>
                                <td>{{ date('d.m.Y H:i:s', strtotime($orders->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </div>
                    <tfoot class="text-danger bg-dark" style="position: sticky; bottom: 0; z-index: 1;">
                        <th></th>
                        <th> </th>
                        <th></th>
                        <th>
                            <div id="toplammiqdar"></div>
                        </th>
                        <th>
                            <span id="totalmayamebleg"></span><span> azn</span>
                        </th>
                        <th>
                            <span id="totalyekunmayamebleg"></span><span> azn</span>
                        </th>
                        <th>
                            <span id="totalsatismebleg"></span><span> azn</span>
                        </th>
                        <th>
                            <span id="totalmebleg"></span><span> azn</span>
                        </th>
                        <th></th>
                        <th>
                            <span id="tarix"></span>
                        </th>
                    </tfoot>




                </table>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#hesabat tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

// 
// Miqdar arama kutusunu seçin ve bir olay dinleyicisi ekleyin
var searchInput = document.querySelector("#searchInput");
searchInput.addEventListener("keyup", function() {

    // kullanıcının arama yapması durumunda görüntülenecek satırları belirleyin
    var searchTerm = searchInput.value.toLowerCase();
    var rows = document.querySelectorAll("#hesabat tbody tr");
    for (var i = 0; i < rows.length; i++) {
        var category = rows[i].querySelectorAll("td")[1].textContent.toLowerCase();
        var product = rows[i].querySelectorAll("td")[2].textContent.toLowerCase();
        if (category.indexOf(searchTerm) > -1 || product.indexOf(searchTerm) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }

    // görüntülenen satırların id'si miqdar olanlarını seçin ve cəmini hesaplayın
    var visibleRows = document.querySelectorAll("#hesabat tbody tr:not([style='display: none;'])");
    var total = 0;
    for (var i = 0; i < visibleRows.length; i++) {
        var miqdar = parseFloat(visibleRows[i].querySelector("#miqdar").textContent);
        total += miqdar;
    }

    // sonucu görüntüleyin
    $('#toplammiqdar').html(total);
    console.log("Total miqdar: " + total);
});

// Maya-Mebleg arama kutusunu seçin ve bir olay dinleyicisi ekleyin
var searchInput = document.querySelector("#searchInput");
searchInput.addEventListener("keyup", function() {

    // kullanıcının arama yapması durumunda görüntülenecek satırları belirleyin
    var searchTerm = searchInput.value.toLowerCase();
    var rows = document.querySelectorAll("#hesabat tbody tr");
    for (var i = 0; i < rows.length; i++) {
        var category = rows[i].querySelectorAll("td")[1].textContent.toLowerCase();
        var product = rows[i].querySelectorAll("td")[2].textContent.toLowerCase();
        if (category.indexOf(searchTerm) > -1 || product.indexOf(searchTerm) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }

    // görüntülenen satırların id'si miqdar olanlarını seçin ve cəmini hesaplayın
    var visibleRows = document.querySelectorAll("#hesabat tbody tr:not([style='display: none;'])");
    var total = 0;
    for (var i = 0; i < visibleRows.length; i++) {
        var miqdar = parseFloat(visibleRows[i].querySelector("#mayammebleg").textContent);
        total += miqdar;
    }

    // sonucu görüntüleyin
    $('#totalmayamebleg').html(total);
    console.log("Total miqdar: " + total);
});

// Maya-yekun-Mebleg arama kutusunu seçin ve bir olay dinleyicisi ekleyin
var searchInput = document.querySelector("#searchInput");
searchInput.addEventListener("keyup", function() {

    // kullanıcının arama yapması durumunda görüntülenecek satırları belirleyin
    var searchTerm = searchInput.value.toLowerCase();
    var rows = document.querySelectorAll("#hesabat tbody tr");
    for (var i = 0; i < rows.length; i++) {
        var category = rows[i].querySelectorAll("td")[1].textContent.toLowerCase();
        var product = rows[i].querySelectorAll("td")[2].textContent.toLowerCase();
        if (category.indexOf(searchTerm) > -1 || product.indexOf(searchTerm) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }

    // görüntülenen satırların id'si miqdar olanlarını seçin ve cəmini hesaplayın
    var visibleRows = document.querySelectorAll("#hesabat tbody tr:not([style='display: none;'])");
    var total = 0;
    for (var i = 0; i < visibleRows.length; i++) {
        var miqdar = parseFloat(visibleRows[i].querySelector("#yekunmayammebleg").textContent);
        total += miqdar;
    }

    // sonucu görüntüleyin
    $('#totalyekunmayamebleg').html(total);
    console.log("Total miqdar: " + total);
});

// satis-Mebleg arama kutusunu seçin ve bir olay dinleyicisi ekleyin
var searchInput = document.querySelector("#searchInput");
searchInput.addEventListener("keyup", function() {

    // kullanıcının arama yapması durumunda görüntülenecek satırları belirleyin
    var searchTerm = searchInput.value.toLowerCase();
    var rows = document.querySelectorAll("#hesabat tbody tr");
    for (var i = 0; i < rows.length; i++) {
        var category = rows[i].querySelectorAll("td")[1].textContent.toLowerCase();
        var product = rows[i].querySelectorAll("td")[2].textContent.toLowerCase();
        if (category.indexOf(searchTerm) > -1 || product.indexOf(searchTerm) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }

    // görüntülenen satırların id'si miqdar olanlarını seçin ve cəmini hesaplayın
    var visibleRows = document.querySelectorAll("#hesabat tbody tr:not([style='display: none;'])");
    var total = 0;
    for (var i = 0; i < visibleRows.length; i++) {
        var miqdar = parseFloat(visibleRows[i].querySelector("#satismebleg").textContent);
        total += miqdar;
    }

    // sonucu görüntüleyin
    $('#totalsatismebleg').html(total);
    console.log("Total miqdar: " + total);
});

// Satis-yekun-Mebleg arama kutusunu seçin ve bir olay dinleyicisi ekleyin
var searchInput = document.querySelector("#searchInput");
searchInput.addEventListener("keyup", function() {

    // kullanıcının arama yapması durumunda görüntülenecek satırları belirleyin
    var searchTerm = searchInput.value.toLowerCase();
    var rows = document.querySelectorAll("#hesabat tbody tr");
    for (var i = 0; i < rows.length; i++) {
        var category = rows[i].querySelectorAll("td")[1].textContent.toLowerCase();
        var product = rows[i].querySelectorAll("td")[2].textContent.toLowerCase();
        if (category.indexOf(searchTerm) > -1 || product.indexOf(searchTerm) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }

    // görüntülenen satırların id'si miqdar olanlarını seçin ve cəmini hesaplayın
    var visibleRows = document.querySelectorAll("#hesabat tbody tr:not([style='display: none;'])");
    var total = 0;
    for (var i = 0; i < visibleRows.length; i++) {
        var miqdar = parseFloat(visibleRows[i].querySelector("#mebleg").textContent);
        total += miqdar;
    }

    // sonucu görüntüleyin
    $('#totalmebleg').html(total);
    console.log("Total miqdar: " + total);
});


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
                    url: "{{ route('admin.date') }}",
                    method: 'post',
                    data: {
                        fromdate: fromdate,
                        todate: todate,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(result) {
                        var tableBody = '';
                        var totalMiqdar = 0;
                        var totalMayaMebleg = 0;
                        var totalYekunMayaMebleg = 0;
                        var totalSatisMebleg = 0;
                        var totalMebleg = 0;
                        $.each(result, function(index, value) {
                            tableBody += '<tr>';
                            tableBody += '<td>' + value.id +
                                '</td>';
                            tableBody += '<td>' + value.get_kategory
                                .name +
                                '</td>';
                            tableBody += '<td>' + value.get_mehsul
                                .name +
                                '</td>';
                            tableBody += '<td>' + value.miqdar +
                                '</td>';
                            tableBody += '<td>' + value.get_mehsul
                                .price +
                                '</td>';
                            tableBody += '<td>' + (value.get_mehsul
                                    .price) * (value.miqdar) +
                                '</td>';
                            tableBody += '<td>' + value.get_mehsul
                                .sale_price +
                                '</td>';
                            tableBody += '<td>' + (value.get_mehsul
                                    .sale_price) * (value.miqdar) +
                                '</td>';
                            tableBody += '<td>' + value.odenis +
                                '</td>';
                            tableBody += '<td>' + new Date(value
                                    .created_at).toLocaleDateString(
                                    'en-GB') +
                                '</td>';
                            tableBody += '</tr>';
                            totalMiqdar += parseInt(value.miqdar);
                            totalMayaMebleg += parseFloat(value.get_mehsul.price);
                            totalYekunMayaMebleg += parseFloat((value.get_mehsul.price) * (value.miqdar));
                            totalSatisMebleg += parseFloat(value.get_mehsul.sale_price);
                            totalMebleg += parseFloat((value.get_mehsul.sale_price) * (value.miqdar));
                        });
                        $('#hesabat tbody').html(tableBody);
                        $('#toplammiqdar').html(totalMiqdar);
                        $('#totalmayamebleg').html(totalMayaMebleg.toFixed(2));
                        $('#totalyekunmayamebleg').html(totalYekunMayaMebleg.toFixed(2));
                        $('#totalsatismebleg').html(totalSatisMebleg.toFixed(2));
                        $('#totalmebleg').html(totalMebleg.toFixed(2));
                    }
                });
            });
        });





    });
});
// tabled yekun gostermek ucun 

$(document).ready(function() {
    var sumMiqdar = 0;
    $('#hesabat tbody tr').each(function() {
        var miqdar = parseFloat($(this).find('#miqdar').text());
        if (!isNaN(miqdar)) {
            sumMiqdar += miqdar;
        }
    });
    $('#toplammiqdar').text(sumMiqdar);
});

$(document).ready(function() {
    var sumMiqdar = 0;
    $('#hesabat tbody tr').each(function() {
        var miqdar = parseFloat($(this).find('#mayammebleg').text());
        if (!isNaN(miqdar)) {
            sumMiqdar += miqdar;
        }
    });
    $('#totalmayamebleg').text(sumMiqdar);
});
$(document).ready(function() {
    var sumMiqdar = 0;
    $('#hesabat tbody tr').each(function() {
        var miqdar = parseFloat($(this).find('#yekunmayammebleg').text());
        if (!isNaN(miqdar)) {
            sumMiqdar += miqdar;
        }
    });
    $('#totalyekunmayamebleg').text(sumMiqdar);
});

$(document).ready(function() {
    var sumMiqdar = 0;
    $('#hesabat tbody tr').each(function() {
        var miqdar = parseFloat($(this).find('#satismebleg').text());
        if (!isNaN(miqdar)) {
            sumMiqdar += miqdar;
        }
    });
    $('#totalsatismebleg').text(sumMiqdar);
});

$(document).ready(function() {
    var sumMiqdar = 0;
    $('#hesabat tbody tr').each(function() {
        var miqdar = parseFloat($(this).find('#mebleg').text());
        if (!isNaN(miqdar)) {
            sumMiqdar += miqdar;
        }
    });
    $('#totalmebleg').text(sumMiqdar);
});



</script>



@endsection