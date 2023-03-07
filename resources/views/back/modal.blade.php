<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Sifaris</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="Post" action="{{route('admin.orderupdate')}}" id="editOrder"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id"  id="orderid" class="form-control" 
                        aria-describedby="emailHelp" >

                    <div class="mb-3">
                        <label for="name" class="form-label text-info">Masa</label>

                        <input type="text" name="masa_id"  id="masa_id">


                        </select>
                        <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Kategoriya</label>
                        <input type="text" name="kategoriya"  id="kategoriya">
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Mehsul</label>
                        <input type="text" name="mehsul"  id="mehsuls">

                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Qiymet</label>
                        <input type="text" name="price"  id="qiymet">

                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="edit" class="form-label text-info">Duzelis et</label>
                        <input type="checkbox" name="sifaris" id="" value="0" id="edit">

                    </div>
                    <br><br>

                    <button type="submit" class="btn btn-primary btn-block">Göndər</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Bagla</button>
               
            </div>
        </div>
    </div>
</div>