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
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Axtar...">
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="hesabat" width="100%" cellspacing="0">
                <thead>
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


                    </tr>
                </thead>
                <tfoot class="text-danger bg-dark">
                    <th></th>
                    <th> </th>
                    <th></th>
                    <th> <div id="totalmiqdar"></div></th>
                    <th><div id="totalmayamebleg"></div></th>
                    <th><div id="totalyekunmayamebleg"></div></th>
                    <th><div id="totalsatismebleg"></div></th>
                    <th><div id="totalmebleg"></div></th>
                    <th></th>
                </tfoot>

                <tbody>
                    @foreach($order as $orders)
                    <tr>
                        <td>{{$orders->id}}</td>
                        <td>{{$orders->getKategory->name}}</td>
                        <td>{{$orders->getMehsul->name}}</td>
                        <td id="miqdar">{{$orders->miqdar}}</td>
                        <td id="mayammebleg">{{$orders->getMehsul->price}}</td>
                        <td id="yekunmayammebleg">{{($orders->getMehsul->price)*($orders->miqdar)}}</td>
                        <td id="satismebleg">{{$orders->getMehsul->sale_price}}</td>
                        <td id="mebleg">{{($orders->getMehsul->sale_price)*($orders->miqdar)}}</td>
                        <td>{{$orders->odenis}}</td>





                    </tr>
                    @endforeach

                </tbody>
                {{ $order->links() }}
                
            </table>
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
        var miqdar = parseInt(visibleRows[i].querySelector("#miqdar").textContent);
        total += miqdar;
    }

    // sonucu görüntüleyin
    $('#totalmiqdar').html(total);
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
        var miqdar = parseInt(visibleRows[i].querySelector("#mayammebleg").textContent);
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
        var miqdar = parseInt(visibleRows[i].querySelector("#yekunmayammebleg").textContent);
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
        var miqdar = parseInt(visibleRows[i].querySelector("#satismebleg").textContent);
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
        var miqdar = parseInt(visibleRows[i].querySelector("#mebleg").textContent);
        total += miqdar;
    }

    // sonucu görüntüleyin
    $('#totalmebleg').html(total);
    console.log("Total miqdar: " + total);
});
</script>







</script>
@endsection