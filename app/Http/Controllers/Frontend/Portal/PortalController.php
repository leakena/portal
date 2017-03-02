<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Models\Access\User\Profile;
use App\Models\Portal\Post\Post;
use App\Http\Controllers\Controller;
use App\Models\Portal\Resume\Resume;
use Illuminate\Support\Facades\Input;


class PortalController extends Controller
{
    /**
     * PortalController constructor.
     */
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
        $profile = Profile::where(['user_uid' => auth()->id()])->first();
        $resume = Resume::where(['user_uid' => auth()->id()])->first();
        return view('frontend.portals.index', compact('resume', 'profile'));
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
     * @return $this
     */
    public function edit(Post $post)
    {
        return view('frontend.portals.edit')->with('post', $post);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post)
    {
        if (!empty(Input::file())) {

            $filename = Input::file('file');
            $change = $filename->getClientOriginalExtension();
            $newfilename = auth()->id() . str_random(10) . '.';
            $filename->move('img/frontend/uploads/images', "{$newfilename}" . $change);
            unlink(public_path('img/frontend/uploads/images/' . $post->file));
            $post->file = $newfilename . $change;

        }

        $post->body = request('body');

        if (request('published') == true) {
            $post->published = 1;
        } else {
            $post->published = 0;
        }
        $post->save();

        return redirect('/posts');
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
    public function delete(Post $post)
    {
        unlink(public_path('img/frontend/uploads/images/' . $post->file));
        Post::find($post->id)->delete();
        session()->flash('flash_success', 'Post have been deleted.');
        return redirect()->back();
    }
}
