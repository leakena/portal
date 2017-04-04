<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Models\Access\User\Profile;
use App\Models\Portal\Post\Post;
use App\Models\Portal\Post\View;
use App\Http\Controllers\Controller;
use App\Models\Portal\Resume\Resume;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Backend\User\UserContract;


class PortalController extends Controller
{
    /**
     * PortalController constructor.
     */

    protected $studentPrefix;
    protected $controller;
    protected $users;
    public function __construct( Controller $cont, UserContract $userRepo)
    {
        $this->middleware('auth');
        $this->studentPrefix = '/api/student';
        $this->controller = $cont;
        $this->users = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$input = [
            'name' => 'LEROY',
            'email' => 'leroy@gmail.com',
            'password' => 'testing'
        ];*/

//        $this->users->create($input);

//        hello thei
//        iouhikjuhkihu
        $posts = Post::latest()->limit(3)->get();
        $profile = Profile::where(['user_uid' => auth()->id()])->first();
        $resume = Resume::where(['user_uid' => auth()->id()])->first();


//        $studentData = $this->controller->getElementByApi($this->studentPrefix.'/annual-object', ['student_id_card','academic_year_id'], ['e20150547', 2017], []);
//
//        dd($studentData);

//        $studentData = $this->controller->getElementByApi($this->studentPrefix.'/data', [], [], []);
//
//
//
//        //dd($studentData);
//
//        //$index =0;
//        for ($i=0; $i<=400; $i++){
//
//            $this->users->create($studentData[$i]);
//
//        }




        //$studentData = $this->controller->getElementByApi($this->studentPrefix.'/score', ['student_annual_id', 'semester_id'], [20486, null], []);

        //$studentData = $studentData['data'];


        return view('frontend.portals.index', compact('resume', 'profile', 'posts'));
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
            'body' => 'required'
        ]);

        $newPost = new Post();

        $newPost->body = request('body');

        if (Input::file()) {

            $filename = Input::file('file');
            $change = $filename->getClientOriginalExtension();
            $newfilename = auth()->id() . str_random(10) . '.';

            if (Input::file('file')->getMimeType() == 'image/jpeg') {
                $filename->move('img/frontend/uploads/images', "{$newfilename}" . $change);
            } else {
                $filename->move('docs', "{$newfilename}" . $change);
            }

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
        $newView = new View();
        $newView->post_uid = $post->id;
        $newView->save();
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
        if(str_contains($post->file, '.pdf'))
            unlink(public_path('docs/' . $post->file));
        else
            unlink(public_path('img/frontend/uploads/images/' . $post->file));
        Post::find($post->id)->delete();
        session()->flash('flash_success', 'Post have been deleted.');
        return redirect()->back();
    }
}
