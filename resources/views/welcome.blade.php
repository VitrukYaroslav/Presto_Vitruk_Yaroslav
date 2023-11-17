<x-layout>
<div class="container mt-5">
    <div class="row justify-content-center">
            <h1 class="font-weight-semibold text-center p-3">{{__("ui.welcomeTitle")}}</h1>           
        </div>
</div>
<div class="mt-5"></div>

<div class="container">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    <div class="row  mt-5">
        @foreach ($articles as $article)
        <div class="col-12 col-md-4 mb-3 ">
            <div class="card shadow xcard">
                <img src="{{$article->images()->first()->getUrl(400,300)}}" class="card-img-top p-3 rounded" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->name}}</h5>
                    <p class="card-text text-truncate">{{$article->description}}</p>
                    <p class="card-text">{{$article->price}} €</p> 
                    <div class="d-flex flex-column center mb-3">      
                        <a href="{{route('categoryShow',['category'=> $article->category])}}" class="bnD bnD2"> {{$article->category->name}}</a>
                        <a href="{{route('article.show', compact('article'))}}" class="bnD bnD2">{{__("ui.show")}}</a>
                    </div>
                    <p class="card-footer">{{__("ui.published")}} : {{$article->created_at->format('d/m/Y')}}</p>
                </div>  
            </div>
        </div>
        @endforeach
    </div>
</div>     
</x-layout>