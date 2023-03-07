@foreach($sifaris as $activ)
<div class="col-2 mb-4">

    <div class="card bg-primary text-white shadow" style="width:100px;height:100px;">
        <div class="card-body">
            {{$activ->getMasa->name}}

            <div>{!!$activ->sifaris==0 ? "<span class='text-danger'>Mesgul</span>" : "<span
                    class='text-success'>Bos</span>"!!}</div>

            <div class="text-white small">
                <a class="dropdown-item text-danger edit" style="font-size:16px" href=""
                data-id='{{$activ->id}}'data-masa='{{$activ->getMasa->name}}'data-kategory='{{$activ->getKategory->name}}'
                data-mehsul='{{$activ->getMehsul->name}}'
                data-price='{{$activ->getMehsul->price}}'
                    data-toggle="modal">
                    <i class="fa-solid fa-chair"></i>
                </a>
                @include('back.modal')
            </div>
        </div>
    </div>
</div>
@endforeach