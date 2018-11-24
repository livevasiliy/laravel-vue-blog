<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use JWTAuth;

class ArticleController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        return $this->user
            ->articles()
            ->get(['title', 'body'])
            ->toArray();
    }

    public function show($id)
    {
        $product = $this->user->articles()->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id ' . $id . ' cannot be found'
            ], 400);
        }

        return $product;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;

        if ($this->user->articles()->save($article))
            return response()->json([
                'success' => true,
                'article' => $article
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be added'
            ], 500);
    }

    public function update(Request $request, $id)
    {
        $product = $this->user->articles()->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $product->fill($request->all())
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
    }

    public function destroy($id)
    {
        $product = $this->user->articles()->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id ' . $id . ' cannot be found'
            ], 400);
        }

        if ($product->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Article could not be deleted'
            ], 500);
        }
    }
}
