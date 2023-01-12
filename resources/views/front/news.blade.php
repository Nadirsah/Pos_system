@extends("front.layouts.master")
@section('content')



    <section class="new-details">
        <div class="container">
            <div class="heading">
                <h2>{!!$data->name!!}</h2>
            </div>
            <div class="photo">
                <img src="{{asset($data->image)}}" alt="">
            </div>
            <div class="new-details">
                <p>{!!$data->content!!}</p>
            </div>
        </div>
    </section>
   


@endsection