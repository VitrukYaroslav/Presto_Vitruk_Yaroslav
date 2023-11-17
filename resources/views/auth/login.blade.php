<x-layout>
  <section class="mt-5">
      <div class="container py-5">
          <div class="row justify-content-center">
            <div class="col-12 col-md-12">
              <div class="card rounded text-black">
                <div class="row">
                  
                    <div class="col-12 d-none d-md-block col-md-6">
                        <div>
                            <img src="/media/login1.gif" height="580" width="630" alt="logo">
                        </div>
                       
                  </div>
                  
                  <div class="col-12 col-md-6 mt-4">
                      <div class="text-center">
                        <img src="/media/logo.png"style="width: 185px;" alt="logo">
                          <h3 class="text-center">LOGIN <i class="bi bi-door-open"></i></h3>
                      </div>
      
                      <form method="POST" action="/login" class="p-5 mt-5" id="login">
                        @csrf
                        <div class="form-outline text-center">
                            <input type="text" name="email" id="username" class="login-form-field" placeholder="Email">
                        </div>
      
                        <div class="form-outline text-center mt-4">
                            <input type="password" name="password" id="password" class="login-form-field" placeholder="Password">
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <button type="submit"class="bnD bnD2">Login</button>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-">
                            <p class="display-6">{{__("ui.nonHaiAccount")}}</p>                        
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="/register" type="button" class="btn btn-danger">{{__("ui.signIn")}}</a>
                        </div>
                        </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
</x-layout>