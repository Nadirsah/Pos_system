@extends("front.layouts.master")
@section('content')


<section class="news-gallery-main">
        <div class="heading">
            <h2>Tarix</h2>
        </div>
      <div class="container">
@foreach($data as $datas)
        <div class="new">
          
          <div class="thumb">
          <img src="{{asset($datas->image)}}" alt="" width="100" class="rounded">
          </div>
          <div class="news-content">
            <h3>{!!$datas->name!!}</h3>
            <p>
             {!!$datas->content!!}
            </p>
            <div>
              <div class="vector-icon">
                <a href="{{route('news',$datas->id)}}"><i class="fa-solid fa-chevron-right"></i></a>
              </div>
              <h6>{{$datas->created_at->format('Y-m-d')}}</h6>
            </div>
          </div>
        </div>
@endforeach
       


      </div>

      {{ $data->links() }}

      
     
     
@endsection