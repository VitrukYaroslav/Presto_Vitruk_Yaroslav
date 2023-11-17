<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            @forelse ($category->articles->where("is_accepted", true) as $article)
            <div class="col-12 col-md-4 mb-3 ">
                <div class="card shadow xcard">
                    <img src="{{$article->images()->first()->getUrl(400,300)}}" class="card-img-top p-3 rounded " alt="...">
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
           
            @empty
                <div class="container-fluid">
                    <div class="row justify-content-center text-center">
                        <div class="col-12 ">
                            <p class="h1">{{__("ui.miDispiace")}}</p>
                            <img class="mw-100" src="/media/error.gif" alt="">
                                <p class="h1 mt-4">{{__("ui.noCategory")}}</p>
                                <p class="h2 mt-3 ">{{__("ui.pubblicaCategoria")}}</p>
                                <div class="d-flex center h1">
                                    <a class="bnD bnD2 mt-4" href="{{route('article.create')}}">Inserisci un nuovo articolo</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforelse
        </div>
    </div>    
</x-layout>