<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{    
    
    public function create(){
        return view('article.create');
    }

    public function articleShow(Article $article){
        return view('article.show',compact('article'));
    }

    public function articleIndex(){
        $articles = Article::where('is_accepted', true)->paginate(5);
        return view('article.index',compact('articles'));
    }
}

