<x-layout>

<div class="row py-5 px-4"> 
    <div class="col-12 col-md-8 mx-auto"> <!-- Profile widget --> 
        <div class="bg-white shadow rounded overflow-hidden"> 
            <div class="px-4 pt-0 pb-4 cover">  
                <div class="media-body mb-5 color-p"> 
                    <h4 class="mt-0 mb-0 fw-bold">Username: <span class="display-6 fontlogin">{{Auth::user()->name}}</span></h4>     
                    <h4 class="mt-0 mb-0 fw-bold">Email: <span class="display-6 fontlogin">{{Auth::user()->email}}</span></h4>     
                </div> 
                
            </div> 
            <div class="bg-light p-4 d-flex justify-content-end text-center"> 
                <ul class="list-inline mb-0"> 
                    <li class="list-inline-item"> 
                        <h5 class="font-weight-bold mb-0 d-block">{{$amount}}</h5>
                        <small class="text-muted"> <i class="fas fa-image mr-1"></i>{{__("ui.articoles")}}</small> 
                    </li> 
                </ul> 
            </div> 
            <div class="px-4 py-3"> <h5 class="mb-0">{{__("ui.about")}}</h5> 
                <div class="p-4 rounded shadow-sm bg-light"> 
                    <p class="font-italic mb-0">{{Auth::user()->description}}</p>
                </div> 
            </div> 
            <div class="py-4 px-4"> 
                <div class="d-flex align-items-center justify-content-between mb-3"> 
                    <h5 class="mb-0">{{__("ui.articoles")}}:</h5>
                </div> 
                <div class="row"> 
                    <div class="row justify-content center">
                        <div class="row justify-content-beetween mt-5">
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
                </div> 
            </div> 
        </div> 
    </div>
</div>
</x-layout>