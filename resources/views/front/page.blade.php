@extends("front.layouts.master")
@section('content')
<div class="container py-5">
        <div class="row">

          

            <div class="col-lg-9">
               
                <div class="row">
                    @foreach($data as $infos)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{asset($infos->image)}}" with='200'>
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                       
                                        <li><a class="btn btn-success text-white mt-2" href="{{route('item',$infos->id)}}"><i class="far fa-eye"></i></a></li>
                                     
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">{{$infos->name}}</a>
                                <ul class="w-100 list-unstyled   mb-0">
                                    
                                    <li >
                                    Reng:{{$infos->color}}
                                    </li>
                                    <li >
                                    Qiymət:{{$infos->price}} azn
                                    </li>
                                </ul>
                               
                               
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
               
            </div>

        </div>
    </div>
    <!-- End Content -->

@endsection