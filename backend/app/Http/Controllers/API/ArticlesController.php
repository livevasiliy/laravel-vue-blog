<?php
	
	namespace App\Http\Controllers\API;
	
	use App\Article;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class ArticlesController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index ()
		{
			return response ()->json (Article::all ())->withHeaders ([
				'Access-Control-Allow-Origin' => '*',
				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
			]);
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store (Request $request)
		{
			$data = Article::create ([
				'title' => $request->get ('title'),
				'body' => $request->get ('body'),
				'userId' => Auth::user ()->id
			]);
			if (!$data) {
				return redirect ()->back ();
			}
			return response ()->json ($data)->withHeaders ([
				'Access-Control-Allow-Origin' => '*',
				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
			]);
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function show ($id)
		{
			$data = Article::findOrFail ($id);
			return response ()->json ($data)->withHeaders ([
				'Access-Control-Allow-Origin' => '*',
				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
			]);
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function update (Request $request, $id)
		{
			$data = Article::findOrFail ($id);
			$data->fill ($request->all ());
			if (!$data->save ()) {
				return redirect ()->back ();
			}
			return response ()->json ()->withHeaders ([
				'Access-Control-Allow-Origin' => '*',
				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
			]);
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy ($id)
		{
			$data = Article::findOrFail ($id);
			if (!$data->delete ()) {
				return redirect ()->back ();
			}
			return response ()->json ()->withHeaders ([
				'Access-Control-Allow-Origin' => '*',
				'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
				'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
			]);
		}
	}
