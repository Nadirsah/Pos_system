@foreach($sifaris as $activ)
<div class="col-2 mb-4">

    <div class="card bg-primary text-white shadow" style="width:100px;height:100px;">
        <div class="card-body">
            {{$activ->getMasa->name}}

            <div>{!!$activ->sifaris==0 ? "<span class='text-danger'>Mesgul</span>" : "<span
                    class='text-success'>Bos</span>"!!}</div>

            <div class="text-white small d-flex justify-content-between">
                <a class="text-warning edit" style="font-size:16px" href="#edit{{$activ->id}}" 
                    data-bs-toggle="modal">
                    <i class="fa-solid fa-chair"></i>
                </a>
                <a class="text-warning edit" style="font-size:16px" href="{{route('admin.order.edit',$activ->masa_id)}}" >
                <i class="fa-solid fa-print"></i>
                </a>
                @include('back.modal')

            </div>
        </div>
    </div>
</div>
@endforeach