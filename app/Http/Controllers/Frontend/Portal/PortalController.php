<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Models\Portal\Post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class PortalController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::latest()->limit(4)->get();
		return view('frontend.portals.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function store()
	{
		$this->validate(request(), [
			'body' => 'required',
			'file' => 'required'
		]);

		$newPost = new Post();

		$newPost->body = request('body');

		if (Input::file()) {

			$filename = Input::file('file');
			$change = $filename->getClientOriginalExtension();
			$newfilename = auth()->id() . str_random(10) . '.';
			$filename->move('img/frontend/uploads/images', "{$newfilename}" . $change);
			$newPost->file = $newfilename . $change;

		}


		if (request('published') == true) {
			$newPost->published = 1;
		} else {
			$newPost->published = 0;
		}
		$newPost->create_uid = auth()->id();

		if ($newPost->save()) {
			session()->flash('flash_info', 'Post have been created');
		} else {
			session()->flash('flash_warning', 'Something went wrong');
		}

		return redirect()->back();
	}


	public function show(Post $post)
	{
		$post = Post::find($post->id);
		return view('frontend.portals.show', compact('post'));
	}

    /**
     * @param Post $post
     */
	public function edit(Post $post)
	{
		return view('frontend.portals.edit')->with('post', $post);
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function post()
	{
		$posts = Post::latest()->paginate(5);

		return view('frontend.portals.blog', compact('posts'));
	}


    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
	public function delete(Post $post){
        Post::find($post->id)->delete();
        session()->flash('flash_success', 'Post have been deleted.');
        return redirect()->back();
    }
}
