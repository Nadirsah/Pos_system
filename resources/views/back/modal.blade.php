<div class="modal fade edittable" id="edit{{$sifariss->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Sifaris</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id='edittable'>
                <form method="Post" action="{{route('admin.order.update',$sifariss->id)}}" id="editOrder"
                    enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <input type="hidden" name="id" value="{{$sifariss->id}}" id="id" class="form-control"
                        aria-describedby="emailHelp">

                    <div class="mb-3">
                        <label for="name" class="form-label text-info">Masa</label>

                        <select name="masa_id" class="form-select" id="masas">
                            <option value="">Select</option>
                            @foreach ($masa as $masas)
                            @if($sifariss->masa_id == $masas->id)
                            <option value="{{$masas->id}}" selected>{{$masas->name}}</option>
                            @else
                            <option value="{{$masas->id}}">{{$masas->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Kategoriya</label>

                        <select name="kategoriya" class="form-select" id="kategorys" >
                            <option value="">Kategoriya seçin</option>
                            @foreach ($kategoriya as $kategories)
                            @if($sifariss->kategoriya == $kategories->id)
                            <option value="{{$kategories->id}}" selected>{{$kategories->name}}</option>
                            @else
                            <option value="{{$kategories->id}}">{{$kategories->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Mehsul</label>
                        <select name="mehsul" class="form-select" id="subkategorys">
                            <option value="">Mehsul seçin</option>
                            @foreach ($mehsul as $mehsuls)
                            @if($sifariss->mehsul == $mehsuls->id)
                            <option value="{{$mehsuls->id}}" selected>{{$mehsuls->name}}</option>
                            @else
                            <option value="{{$mehsuls->id}}">{{$mehsuls->name}}</option>
                            @endif
                            @endforeach
                        </select>

                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Miqdar</label>
                        <input type="number" value='{{$sifariss->miqdar}}' name="miqdar">

                        <span class="text-danger">@error('miqdar'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label text-info">Qiymet</label>
                        <select name="price" class="form-select" id="prices">
                            <option value="">Qiymet</option>
                            @foreach ($mehsul as $mehsuls)
                            @if($sifariss->mehsul == $mehsuls->id)
                            <option value="{{$mehsuls->id}}" selected>{{$mehsuls->sale_price}}</option>
                            @else
                            <option value="{{$mehsuls->id}}">{{$mehsuls->sale_price}}</option>
                            @endif
                            @endforeach
                        </select>

                        <span class="text-danger">@error('content'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="edit" class="form-label text-info">Duzelis et</label>
                        <input type="checkbox" name="sifaris" id="" value="0" id="activs" checked>

                    </div>
                    <br><br>

                    <button type="submit" class="btn btn-primary btn-block">Göndər</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Bagla</button>

            </div>
        </div>
    </div>
</div>





<!-- close modal -->

