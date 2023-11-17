<div class="container">
    {{-- Be like water. --}}
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center display-1 my-5">{{__("ui.createArticle")}}</h1>
        </div>
        <div class="col-12 col-md-6">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form wire:submit.prevent='store'>
                <div class="mb-3">
                    <label for="name" class="form-label">{{__("ui.title")}}</label>
                    <input wire:model.live='name' type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <textarea wire:model.live='description' class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">{{__("ui.description")}}:</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">{{__("ui.price")}}</label>
                    <input wire:model.live='price' type="text" class="form-control" id="price">
                </div> 
                <div class="mb-3">
                    <label for="category" class="form-label">{{__("ui.categories")}}</label>
                        <select wire:model.defer="category" id="category" class="form-control">
                            <option value="">{{__("ui.choiceCategory")}}</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{__("ui.$category->name")}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                
                <div class="mb-3">
                    <input wire:model='temporary_images' type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
                    @error('temporary_images.*')
                        <p class="text-danger mt-2">{{$message}}</p>
                    @enderror
                </div>
                @if (!empty($images))
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p>Photo preview:</p>
                            <div class="row border border-4 border-info rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col my-3">
                                        <div class="img-preview shadow rounded mx-auto" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                @endif
                
                <button type="submit" class="bnD bnD2 mt-4">Crea</button>
            </form>
        </div>
    </div> 
</div>

