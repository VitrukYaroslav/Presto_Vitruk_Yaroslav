<footer class="container-fluid p-0 page-container ">
    <div class="row justify-content-center content-wrap">
      <div class="col-12 col-md-4">
        <ul class="nav flex-column align-items-center hovercustom">
          <h5 class="text-center text-white fw-bold mt-3">{{__("ui.linkUtili")}}:</h5>
          <p class="nav-item mb-2"><a href="{{ route('register') }}" class="nav-link p-0 text-white">{{__("ui.signIn")}}</a></p>
          <p class="nav-item mb-2"><a href="{{ route('login') }}" class="nav-link p-0 text-white">{{__("ui.login")}}</a></p> 
        </ul>
      </div>
      <div class="col-12 col-md-4 ">
        <p class="fw-bold mt-3 ">Presto.it</p>
          @auth
          @if(Auth::user()->is_revisor)
          <p>{{__("ui.accediZonaRevisore")}}</p>
          <p>{{__("ui.cliccaQui")}}</p>
          <a href="{{route('revisor.index')}}" class="btn btn-warning text-light shadow my-3">{{__("ui.revisorArea")}}</a>
          @elseif(!Auth::user()->is_revisor)
          <p>{{__("ui.lavoraConNoi")}}</p>
          <p>{{__("ui.cliccaQui")}}</p>
          <a href="{{route('mail.lavoraConNoi')}}" class="btn btn-warning text-light shadow my-3">{{__("ui.diventaRevisore")}}</a>
          @endif
          @else
          <p>{{__("ui.lavoraConNoi")}}</p>
          <p>{{__("ui.registratiQui")}}</p>
          <a href="{{route('register')}}" class="btn btn-warning text-light shadow my-3">{{__("ui.signIn")}}</a>

        @endauth
        
    </div>
  </div>
<footer>

      
   

    