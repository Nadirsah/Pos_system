<div class="modal fade" id="order{{$masas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="Post" action="{{route('admin.xronika.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-info">Masa</label>
                        <input type="text" name="masa_id" value="{{$masas->name}}:{{$masas->orders}}"
                            class="form-control" id="name" aria-describedby="emailHelp" readonly>
                        <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Kategoriya</label>
                        <select name="name" class="form-select" id="kategory">
                            <option value="">Kategoriya seçin</option>
                            @foreach ($kategoriya as $kategories)
                            <option value="{{$kategories->id}}">{{$kategories->name}}</option>
                            @endforeach

                        </select>
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Mehsul</label>
                        <select name="mehsul" class="form-select" id="mehsul">
                            <option value="">Mehsul seçin</option>

                        </select>
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Qiymet</label>
                        <select name="price" class="form-select" id="price">
                            <option value="">Qiymet</option>
                        </select>
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <br><br>

                    <button type="submit" class="btn btn-primary btn-block">Göndər</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Bagla</button>
                <a class="btn btn-primary" href="login.html">Gonder</a>
            </div>
        </div>
    </div>
</div>

