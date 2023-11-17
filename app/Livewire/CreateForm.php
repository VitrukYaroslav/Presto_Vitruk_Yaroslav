<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateForm extends Component
{
    use WithFileUploads;

    
    public $name;
    public $description;
    public $category;
    public $price;
    public $temporary_images;
    public $images = [];
    public $image;
    public $article;
    
    
    protected $rules = [
        'name'=> "required",
        'description' => "required|min:8",
        'price' => "required|numeric",
        'category'=>"required",
        'images.*'=>"image|max:1024",
        'temporary_images.*'=>"image|max:1024",
    ];

   
    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*'=> 'image|max:1024'
        ])) {
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }        
        


    public function store(){

        $this->validate();
        $category=Category::find($this->category);
        

        $this->article=$category->articles()->create([
            'user_id' =>Auth::user()->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,

        ]);
        
        if(count($this->images)){
            foreach ($this->images as $image) {
                // $this->article->images()->create(['path'=>$image->store('images','public')]);
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path'=>$image->store($newFileName,'public')]);
            
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 400 , 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
        
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        session()->flash('message', __('ui.messageCreation'));
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function cleanForm()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image = '';
        $this->images = [];
        $this->temporary_images = [];

    }
    
    public function render()
    {
        return view('livewire.create-form');
    }
}
