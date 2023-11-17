<x-layout>
    <section class="mt-5">
        <div class="container py-5">
          <div class="row justify-content-center">
            <div class="col-12 col-md-12">
              <div class="card rounded text-black">
                <div class="row">
                  
                  <div class="col-12 col-md-6 mt-4 ">
                      <div class="text-center">
                        <img src="/media/logo.png"style="width: 185px;" alt="logo">
                          <h3 class="text-center">REGISTRATI <i class="bi bi-person-plus"></i></h3>
                      </div>
      
                      <form method="POST" action="/register" class="p-5 mt-5" id="register">
                        @csrf
                        <div class="form-outline text-center mb-3">
                            <input type="text" name="name" id="username" class="login-form-field" placeholder="Username">
                        </div>
                        <div class="form-outline text-center mb-3">
                            <input type="text" name="email" id="email" class="login-form-field" placeholder="Email">
                        </div>
      
                        <div class="form-outline text-center mb-3">
                            <input type="password" name="password" id="password" class="login-form-field" placeholder="Password">
                        </div>
                        
                        <div class="form-outline text-center mb-3">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="login-form-field" placeholder="Conferma Password">
                        </div>

                        <div class="mb-3 textArea mx-auto">
                            <label for="exampleFormControlTextarea1" class="form-label "></label>
                            <textarea name="description" class="form-control formRevisore" id="exampleFormControlTextarea1" rows="3" placeholder="Scrivici qualcosa su di te"></textarea>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <button type="submit" class="bnD bnD2">Registrati</button>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <p class="display-6">{{__("ui.haiAccount")}}</p>                        
                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="/login" type="button" class="btn btn-success">{{__("ui.login")}}</a>
                        </div>
                        </form>
                    </div>
                        <div class="col-12 d-none d-md-block col-md-6">
                            <div>
                                <img src="/media/register.gif" height="660" width="640" alt="logo">
                            </div>        
                        </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</x-layout>
