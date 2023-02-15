@extends("front.layouts.master")
@section('content')

@foreach($posts as $data)
<p>{{$data->name}}</p>
@endforeach

@endsection