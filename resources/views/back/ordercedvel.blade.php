@foreach($totalsifaris as $sifariss)
<tr>
    <td>{{$sifariss->getMasa->name}}</td>
    <td>{{$sifariss->getKategory->name}}</td>
    <td>{{$sifariss->getMehsul->name}}</td>
    <td>{{$sifariss->getMehsul->price}}</td>

</tr>
@endforeach