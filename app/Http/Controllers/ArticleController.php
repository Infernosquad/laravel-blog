<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator, Input, Session, Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at','DESC')->paginate(10);

        return view('article.index',['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($id = 0)
    {
        $rules = array(
            'title' => 'required',
            'body'  => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {

            return redirect()
                ->route('article.create')
                ->withErrors($validator);

        } else {

            $tags = explode(',',Input::get('tags'));

            /** @var \Illuminate\Database\Eloquent\Model $article */
            $article = Article::findOrNew($id);
            $article->fill(Input::all());
            $article->save();

            $oldTags = $article->tags->transform(function ($item) use ($tags) {
                if(!in_array($item->tag,$tags)){
                    $item->delete();
                }else{
                    return $item->tag;
                }
            })->all();

            $tags = array_diff($tags,$oldTags);

            $tagsCollection = [];

            foreach ($tags as $tag) {
               $tagsCollection[] = new Tag(['tag' => $tag]);
            }

            $article->tags()->saveMany($tagsCollection);

            return redirect()->route('article.index')->with('message','Successfully created article!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('article.show',['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('article.create',['article' => $article ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return $this->store($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();

        Session::flash('message', 'Successfully deleted the article!');

        return redirect()->route('article.index');
    }
}
