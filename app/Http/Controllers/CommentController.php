<?php

namespace App\Http\Controllers;

use App\Comment;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input, Validator, Session;
use Symfony\Component\Console\Input\InputOption;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($id = 0)
    {
        if(!Input::has('article_id')) throw new InvalidArgumentException();

        $rules = array(
            'comment'    => 'required',
            'article_id' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()
                ->route('article.show',array('id' => Input::get('article_id')))
                ->withErrors($validator);
        } else {

            $article = Comment::findOrNew($id);
            $article->fill(Input::all());
            $article->save();

            // redirect
            Session::flash('message', 'Comment has been posted!');

            return redirect()->route('article.show',array('id' => Input::get('article_id')));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
