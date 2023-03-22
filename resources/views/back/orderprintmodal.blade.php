<style>
/* html,
body {
    margin: 10px;
    padding: 10px;
    font-family: sans-serif;
} */
/* Modal penceresi stil ayarları */

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

<div class="modal fade modalorder" id="orderprint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-contentorder">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="myModalLabel">Sifaris</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <thead>
                        <tr class="text-dark">
                            <th>Kategoriya</th>
                            <th>Mehsul</th>
                            <th>Miqdar</th>
                        </tr>
                    </thead>
                    <tbody id="ordercap">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" onclick="window.print()">Cap et</button>

            </div>
        </div>
    </div>
</div>


    <script>
  $(document).ready(function() {
    // Modal açılış butonuna tıklandığında
    $("#orderprint").on("show.bs.modal", function() {
      // Arka planı kapatmak için bir div oluştur
      var modalBackdrop = $('<div class="modal-backdrop"></div>');
      // Yeni div'i modal penceresinin arkasına ekle
      $(this).after(modalBackdrop);
    });

    // Modal kapatıldığında
    $("#orderprint").on("hidden.bs.modal", function() {
      // Arka planı kapatan div'i kaldır
      $(this).next(".modal-backdrop").remove();
    });
});
</script>