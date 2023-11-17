<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                <div class="text-center">
                <img src="/media/logo.png"style="width: 185px;" alt="logo">
                    <h3 class="text-center">Diventa Revisore <i class="bi bi-person-square"></i></h3>
                </div>
                    <h3>Nome: {{Auth::user()->name}}</h3>
                    <h3>Email: {{Auth::user()->email}}</h3>
                <form class="mt-3" method="POST" action="{{route('become.revisor')}}">
                @csrf
                <div class="mb-3 text-center">
                    <label for="exampleFormControlTextarea1" class="form-label "></label>
                    <textarea name="text" class="form-control formRevisore" id="exampleFormControlTextarea1" rows="3" placeholder="Perché vuoi diventare revisore?"></textarea>
                    <button type="submit" class="btn btn-warning text-light shadow my-3">Diventa revisore</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
