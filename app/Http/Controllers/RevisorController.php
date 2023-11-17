<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }
   
    public function acceptArticle(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('message', __('ui.articleAccept'));
    }
    
    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('message',__('ui.articleReject'));
    }
   
    public function becomeRevisor(Request $request){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request->text));
        return redirect("/")->with('message', 'Hai richiesto di diventare revisore correttamente');
    }
    
    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message', 'l\'utente è diventato revisore');
    }

    public function workWithUs(){
        return view('mail.lavoraConNoi');
    }
}
