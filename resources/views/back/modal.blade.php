<div class="modal fade" id="order{{$activ->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="Post" action="{{route('admin.xronika.update',$activ->id)}}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <input type="hidden" name="" value="{{$activ->id}}"
                            class="form-control" id="name" aria-describedby="emailHelp" readonly>

                    <div class="mb-3">
                        <label for="name" class="form-label text-info">Masa</label>
                        <select name="masa_id" class="form-select" >
                            <option value="{{$activ->masa_id}}">{{$activ->getMasa->name}}</option>
                            @foreach ($masa as $masas)
                            <option value="{{$masas->id}}">{{$masas->name}}</option>
                            @endforeach

                        </select>
                        <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Kategoriya</label>
                        <select name="kategoriya" class="form-select" >
                            <option value="{{$activ->kategoriya}}">{{$activ->getKategory->name}}</option>
                            @foreach ($kategoriya as $kategories)
                            <option value="{{$kategories->id}}">{{$kategories->name}}</option>
                            @endforeach

                        </select>
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Mehsul</label>
                        <select name="mehsul" class="form-select" >
                            <option value="{{$activ->mehsul}}">{{$activ->getMehsul->name}}</option>

                        </select>
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Qiymet</label>
                        <select name="price" class="form-select" >
                            <option value="{{$activ->price}}">{{$activ->getMehsul->price}}</option>
                        </select>
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="edit" class="form-label text-info">Duzelis et</label>
                        <input type="radio" name="sifaris" id="" value="0" id="edit" >
                        <label for="close" class="form-label text-info">Bagla</label>
                        <input type="radio" name="sifaris" id="" value="1" id="close">
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

