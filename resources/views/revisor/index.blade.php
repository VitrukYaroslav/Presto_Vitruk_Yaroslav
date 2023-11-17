<x-layout>
    <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="display-2">{{$article_to_check ? __("ui.articoleRev") : __("ui.nessunArticoleRev")}}
                </h1>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    @if($article_to_check)

    {{-- CAROUSEL & TEXT --}}
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-6">
                <div id="carouselExample" class="carousel slide">
                    @if ($article_to_check->images)
                        <div class="carousel-inner">
                            @foreach ($article_to_check->images as $image)
                                <div class="carousel-item  @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(400, 300) }}" class="d-block rounded img-fluid w-100"
                                    alt="...">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
              </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <h5 class="tc-accent">{{__("ui.revisioneImmagini")}}</h5>
                    <p>{{__("adulti")}}: <span class="{{$image->adult}}"></span></p>
                    <p>{{__("satira")}}: <span class="{{$image->spoof}}"></span></p>
                    <p>{{__("medicina")}}: <span class="{{$image->medical}}"></span></p>
                    <p>{{__("violenza")}}: <span class="{{$image->violence}}"></span></p>
                    <p>{{__("contenutoAmmiccante")}}: <span class="{{$image->racy}}"></span></p>
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div>
                    <h5 class="card-title">{{__("ui.name")}}: {{$article_to_check->name}}</h5>
                    <hr>
                    <p class="card-text">{{__("ui.description")}}: {{$article_to_check->description}}</p>
                    <p class="card-text">{{__("ui.published")}}: {{$article_to_check->created_at->format('d/m/Y')}}</p>
                    <form action="{{route('revisor.acceptArticle', ['article'=>$article_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button class="bnD bnD2" type="submit">{{__("ui.accept")}}</button>
                        </form>
                    <form action="{{route('revisor.rejectArticle', ['article'=>$article_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button class="bnD bnD2" type="submit">{{__("ui.reject")}}</button>
                        </form>
                            
                </div>
                
            </div>
        </div>
    </div>
    @endif
</x-layout>