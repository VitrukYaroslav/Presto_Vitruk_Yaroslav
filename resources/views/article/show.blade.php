<x-layout>
  <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 p-0">
                <h1 class="display-2 text-center">{{ $article->name }}</h1>
            </div>
        </div>
    </div>

    <div class="container card rounded">
        <div class="row justify-content-evenly">
            <div class="col-12 col-md-6">
              <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                @if ($article->images)
                        <div class="carousel-inner rounded">
                            @foreach ($article->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif ">
                                    <img src="{{ $image->getUrl(400, 300) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                    @endif
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div> 
              
            </div>

            <div class="col-12 col-md-6 d-flex align-items-center">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center"><strong>{{ $article->name }}</strong></h5>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="card-text text-break my-5">{{ $article->description }}</p>

                        </div>

                        <div class="d-flex justify-content-center">
                            <p class="card-text"><strong>{{ $article->price }}€</strong></p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('categoryShow', ['category' => $article->category]) }}"
                                class=" bnD2 bnD">{{ __('ui.' . $article->category->name) }}</a>

                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="card-footer text-end mt-5">Pubblicato il:
                                {{ $article->created_at->format('d/m/Y') }}</p>

                        </div>
                        <div class="d-flex justify-content-center">
                            @if ($article->user)
                                <p class="text-center title mt-5 display-6 fontlogin"><span class="fw-bold">Autore:
                                    </span> {{ $article->user->name }} </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
