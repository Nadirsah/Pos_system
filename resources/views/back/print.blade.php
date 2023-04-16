<style>
html,
body {
    margin: 10px;
    padding: 10px;
    font-family: sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6,
p,
span,
label {
    font-family: sans-serif;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0px !important;

}

table thead th {
    height: 28px;
    text-align: left;
    font-size: 20px;
    font-family: sans-serif;
}

table,
th,
td {
    border: 2px solid #10091D;
    padding: 8px;
    font-size: 18px;
}

.heading {
    font-size: 30px;
    margin-top: 12px;
    margin-bottom: 12px;
    font-family: sans-serif;
}

.small-heading {
    font-size: 20px;
    font-family: sans-serif;
}

.total-heading {
    font-size: 20px;
    font-weight: 700;
    font-family: sans-serif;
}

.order-details tbody tr td:nth-child(1) {
    width: 20%;
}

.order-details tbody tr td:nth-child(3) {
    width: 20%;
}

.text-start {
    text-align: left;
}

.text-end {
    text-align: right;
}

.text-center {
    text-align: center;
}

.company-data span {
    margin-bottom: 4px;
    display: inline-block;
    font-family: sans-serif;
    font-size: 20px;
    font-weight: 400;
}

.no-border {
    border: 1px solid #fff !important;
}


.bg-blue {
    background-color: #414ab1;
    color: #fff;
}
</style>

<!-- <table class="order-details">
    <thead>
        <tr>
            <th width="50%" colspan="2">
                <h2 class="text-start">Zeyd Halal Sufrə</h2>
            </th>
            <th width="50%" colspan="2" class="text-end company-data">

                <span>Tarix: {{date("y/m/d")}}</span> <br>
                <span>Unvan: Sumqayıt şəhəri. 9-cu mkr</span> <br>
            </th>
        </tr>
        <tr>
            <th class="no-border text-start heading" colspan="5">
                {{$data[0]->getMasa->name}}
            </th>
        </tr>
        <tr class="bg-blue">
            <th width="50%" colspan="2">Order Details</th>
            <th width="50%" colspan="2">User Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Order Id:</td>
            <td>6</td>
            <td>Full Name:</td>
            <td>Ved Prakash</td>
        </tr>
        <tr>
            <td>Tracking Id/No.:</td>
            <td>funda-CRheOqspbA</td>

            <td>Email Id:</td>
            <td>ved@gmail.com</td>
        </tr>
        <tr>
            <td>Ordered Date:</td>
            <td>22-09-2022 10:54 AM</td>

            <td>Phone:</td>
            <td>8889997775</td>
        </tr>
        <tr>
            <td>Payment Mode:</td>
            <td>Cash on Delivery</td>

            <td>Address:</td>
            <td>asda asdad asdad adsasd</td>
        </tr>
        <tr>
            <td>Order Status:</td>
            <td>completed</td>

            <td>Pin code:</td>
            <td>566999</td>
        </tr>
    </tbody>
</table> -->

<table>
    <thead>
        <h1 class="text-center">{{$option->name}}</h1>



        <tr>
            <th class="no-border text-start heading" width="50%" colspan="2">
                {{$data[0]->getMasa->name}}
            </th>
            <th width="50%" colspan="2" class="text-end company-data">

                <span>Tarix: {{date("y/m/d")}}</span> <br>
                <span>Saat: {{date("H:i:s ")}}</span> <br>
                <span>Unvan: {{$option->about}}</span> <br>
                <span>Telefon: {{$option->telefon}}</span> <br>

            </th>
        </tr>
        <tr class="text-dark">

            <th>Mehsul</th>
            <th>Miqdar</th>
            <th>Qiymet</th>
            <th>Cem</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $info)
        <tr>

            <td width="25%" style="font-size:16px">
                {{$info->getMehsul->name}}
            </td>
            <td width="25%" style="font-size:16px">{{$info->miqdar}}x</td>
            <td width="25%" style="font-size:16px" id="">{{($info->getQiymet->sale_price)}}</td>
            <td width="25%" style="font-size:16px" id="kategory">{{($info->getQiymet->sale_price)*($info->miqdar)}}</td>

        </tr>
        @endforeach
        <tr>
            <td colspan="4" class="total-heading">Cəm : <span id="total"></span>-AZN</td>

        </tr>
    </tbody>
</table>


<!-- <div class="container-fluid ">
    <div class="row">
        <div class="col ">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark text-center">Bizi seçdiyiniz üçün minnətdarıq.</h6>
                </div>
                <div class="card-body">
                    <table class="table border border-dark">
                        <div class="text-dark border border-dark">{{$data[0]->getMasa->name}}</div>
                        <thead>
                            <tr>
                                <th class="text-dark" style="font-size:50px" scope="col">Kategoriya</th>
                                <th class="text-dark" scope="col">Mehsul</th>
                                <th class="text-dark" scope="col">Qiymet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $info)
                            <tr>
                                <td class="text-dark">{{$info->getKategory->name}}</td>
                                <td class="text-dark">{{$info->getMehsul->name}}</td>
                                <td class="text-dark">{{$info->getQiymet->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div style="margin-top:250px">
    <form method="Post" action="{{route('admin.printorder')}}" id="editOrder">
        @csrf
        @foreach($data as $index => $row)
        <div class="mb-3">
            <input type="hidden" name="data[{{$index}}][id]" value="{{$row->id}}" >
            <input type="hidden" name="data[{{$index}}][masa_id]" value="{{$row->masa_id}}" >
            <input type="hidden" name="data[{{$index}}][kategoriya]" value="{{$row->kategoriya}}">
            <input type="hidden" name="data[{{$index}}][mehsul]" value="{{$row->mehsul}}">
            <input type="hidden" name="data[{{$index}}][qiymet]" value="{{$row->price}}">
            <input type="hidden" name="data[{{$index}}][miqdar]" value="{{$row->miqdar}}">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="data[{{$index}}][odenis]" checked id="odenis{{$index}}" value="nagd">
                <label class="form-check-label" for="odenis{{$index}}">
                    Nagd
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="data[{{$index}}][odenis]"  id="odenis{{$index}}" value="bank">
                <label class="form-check-label" for="odenis{{$index}}">
                    Bank
                </label>
            </div>
            
            <input type="checkbox" name="data[{{$index}}][sifaris]" value="1" id="activs{{$index}}" checked>
        </div>
        <!-- bura niye yazdiqki? -->
        @endforeach
        <button type="submit" class="" onclick="window.print()">Print</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
function calculateTotal() {
    var sum = 0;
    var elements = document.querySelectorAll("#kategory");
    for (var i = 0; i < elements.length; i++) {
        sum += parseFloat(elements[i].textContent);
    }
    return sum;
}

document.addEventListener("DOMContentLoaded", function() {
    var total = calculateTotal();
    $('#total').html(total);
    console.log(total);
});
</script>