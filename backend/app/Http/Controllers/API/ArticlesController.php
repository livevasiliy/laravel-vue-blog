<?php

namespace App\Http\Controllers\API;

use JWTAuth;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user
            ->acticles()
            ->get(['title', 'body'])
            ->toArray();
//			return response ()->json (Article::all ())->withHeaders ([
//				'Access-Control-Allow-Origin' => '*',
//				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
//				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
//			]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|unique',
            'body' => 'required|string'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;

        if ($this->user->articles()->save($article)) {
            return response()->json([
                'success' => true,
                'article' => $article
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be added'
            ], 500);
        }

//			$data = Article::create ([
//				'title' => $request->get ('title'),
//				'body' => $request->get ('body'),
//				'userId' => Auth::user ()->id
//			]);
//			if (!$data) {
//				return redirect ()->back ();
//			}
//			return response ()->json ($data)->withHeaders ([
//				'Access-Control-Allow-Origin' => '*',
//				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
//				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
//			]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acticle = $this->user->acticles()->find($id);

        if (!$acticle) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id ' . $id . 'cannot be found'
            ], 400);
        }
        return $acticle;
//			$data = Article::findOrFail ($id);
//			return response ()->json ($data)->withHeaders ([
//				'Access-Control-Allow-Origin' => '*',
//				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
//				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
//			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = $this->user()->articles()->find($id);

        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id ' . $id . ' cannot be found'
            ], 400);
        }
        $updated = $article->fill($request->all())
            ->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article could not be updated'
            ], 500);
        }

//			$data = Article::findOrFail ($id);
//			$data->fill ($request->all ());
//			if (!$data->save ()) {
//				return redirect ()->back ();
//			}
//			return response ()->json ()->withHeaders ([
//				'Access-Control-Allow-Origin' => '*',
//				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
//				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
//			]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->user()->articles()->find($id);

        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry article with id ' . $id . ' could not be find'
            ], 400);
        }

        if ($article->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Article could not be deleted'
            ], 500);
        }

//			$data = Article::findOrFail ($id);
//			if (!$data->delete ()) {
//				return redirect ()->back ();
//			}
//			return response ()->json ()->withHeaders ([
//				'Access-Control-Allow-Origin' => '*',
//				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
//				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
//			]);
    }
}
