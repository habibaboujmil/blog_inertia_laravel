<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Article;
use App\Models\Theme;
use App\Models\User;

class ArticlesController extends Controller
{
    public function articleList()
    {
        $articles = article::with('theme:id,name','author:id,name')
        ->paginate(10);
        $themes = theme::pluck('name');
        
    
        return Inertia::render('home/home',['articles'=>$articles]);
    }


    public function index(Request $request)
    {
        $theme_id=$request->input('theme_id');
        $user_id = Auth::user()->id;
        $articles = article::with('theme:id,name','author:id,name')->where('author_id',$user_id)
                    ->when($theme_id != '', function ($query) use ($theme_id) {
                        $query->where('theme_id',$theme_id);})
                    ->orderBy('created_at')->paginate(10);
        $themes = theme::pluck('name');
        return Inertia::render('admin/index',
                ['articles'=>$articles, 'themes'=>$themes]);
    }

    public function create()
    {
        $themes = theme::pluck('name');
        return Inertia::render('admin/create',['themes'=>$themes]);
    }

    public function store(Request $request)
    {
        $theme_id=theme::where('name',$request->input('theme'))->value('id');
        $user_id = Auth::user()->id;
        $article= new article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author_id = $user_id;
        $article->theme_id = $theme_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $fileUrl = Storage::url($path);
            $article->image_url = $fileUrl;
        }
        $article->save();
        return redirect()->route('list');
    }

    public function show($id)
    {
        $article = article::with('theme')->find($id);

        return Inertia::render('admin/update',
                ['article'=>$article]);
    }




    public function update(Request $request,$id)
    {
        $article=article::find($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $fileUrl = Storage::url($path);
            $article->image_url = $fileUrl;
        }
        $article->save();
    
        return redirect()->route('list');
    }

    public function delete($id)
    {
        $article = article::find($id);
        $article->delete();
        return redirect()->route('list');
    }

    public function details($id)
    {
        $article = article::with('theme','author')->find($id);
        return Inertia::render('admin/details',
                ['article'=>$article]);
    }

}
