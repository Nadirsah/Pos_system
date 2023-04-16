@foreach($totalsifaris as $sifariss)
<tr>
    <td>{{$sifariss->getMasa->name}}</td>
    <td>{{$sifariss->getMehsul->name}}</td>
    <td>{{$sifariss->miqdar}}</td>
    <td>{{$sifariss->getMehsul->sale_price}}</td>
    <td>{{($sifariss->getMehsul->sale_price)*($sifariss->miqdar)}}</td>
    <td>{{$sifariss->created_at}}</td>
    <td>{{$sifariss->updated_at}}</td>
<td>
    <a href="#edit{{$sifariss->id}}"  data-bs-toggle="modal" ><i class="fa-solid fa-file-pen text-warning"></i></a>
    @include('back.modal')
</td>

</tr>

@endforeach

