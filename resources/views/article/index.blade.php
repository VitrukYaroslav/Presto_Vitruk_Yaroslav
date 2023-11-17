<x-layout>
    <div class="container  my-5">
        <div class="row">
            <h1>{{__('ui.allArticles')}}</h1>
            @forelse ($articles as $article)
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
                <div class="col-12">
                    <div class="alert alert-warning py-3 shadow">
                        <p class="lead">
                            {{__("ui.nessunAricolo")}}
                        </p>
                    </div>
                </div>
            @endforelse
            {{$articles->links()}}
        </div>
    </div>
        
    
</x-layout>