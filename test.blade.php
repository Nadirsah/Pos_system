@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
   <li> {{$error}}</li>
    @endforeach
</div>
@endif



return [
            'info' => 'required',
            'name' => 'required',
            'content' => 'required',
            'page' => 'required',
            
        ];



        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg|max:200',]);


        ->with(["success"=>"Məlumat əlavə olundu!"])

        ->with(["success"=>"Məlumat uğurla yeniləndi!"])

        ->with(["success"=>"Məlumat uğurla silindi!"])

        php artisan make:request QezetPostRequest
        php artisan make:request QarabagPostRequest
        php artisan make:request NaxcivanPostRequest
        php artisan make:request LinkPostRequest
        php artisan make:request FotoPostRequest
        php artisan make:request EsasPostRequest

        use App\Http\Requests\QezetPostRequest;
        use App\Http\Requests\QarabagPostRequest;
        use App\Http\Requests\NaxcivanPostRequest;
        use App\Http\Requests\LinkPostRequest;
        use App\Http\Requests\EsasPostRequest;
        use App\Http\Requests\FotoPostRequest;
