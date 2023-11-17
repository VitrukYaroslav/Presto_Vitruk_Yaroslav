<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome() {
        
        $articles = Article::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('articles'));
    }

    public function categoryShow(Category $category){

        return view('categoryShow', compact('category'));
    }

    public function searchArticles(Request $request){

        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('article.index', compact('articles'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function profile(Request $request){
        $user = $request->user();
        $articles = Article::where('user_id', $user->id)->get()->sortByDesc('created_at');
        foreach($articles as $article){
            $amount =  Article::where('user_id', $user->id)->count();
        }
        return view('profile', compact('articles', 'amount'));
    }
}
