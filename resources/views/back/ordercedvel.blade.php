@foreach($totalsifaris as $sifariss)
<tr>
    <td>{{$sifariss->getMasa->name}}</td>
    <td>{{$sifariss->getMehsul->name}}</td>
    <td>{{$sifariss->getMehsul->price}}</td>
    <td>{{$sifariss->miqdar}}</td>
    <td>{{$sifariss->created_at}}</td>
<td>
    <a href="#edit{{$sifariss->id}}"  data-bs-toggle="modal" ><i class="fa-solid fa-file-pen text-warning"></i></a>
    @include('back.modal')
</td>

</tr>

@endforeach