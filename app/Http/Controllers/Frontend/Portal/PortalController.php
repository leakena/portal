<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Models\Portal\Post\Post;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $posts = Post::latest()->get();
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
            $posts = Post::latest()->get();
            session()->flash('flash_info', 'Post have been created');
        } else {
            session()->flash('flash_warning', 'Something went wrong');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
