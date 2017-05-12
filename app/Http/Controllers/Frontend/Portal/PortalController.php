<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Http\Controllers\Frontend\Portal\ApiController;
use App\Models\Access\User\Profile;
use App\Models\Portal\Post\Post;
use App\Models\Portal\Post\View;
use App\Http\Controllers\Controller;
use App\Models\Portal\Resume\Resume;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Backend\User\UserContract;
use Illuminate\Http\Request;


class PortalController extends Controller
{
    /**
     * PortalController constructor.
     */

    protected $academic;
    protected $studentPrefix;
    protected $controller;
    protected $users;
    public function __construct( Controller $cont, UserContract $userRepo)
    {
        $this->middleware('auth');
        $this->studentPrefix = '/api/student';
        $this->academic = '/api/academic-year';
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

        $user =auth()->user();
        $studentScore = $this->controller->getElementByApi($this->studentPrefix.'/score', ['student_id_card'], [$user->email], []);
        $years = $this->controller->getElementByApi($this->academic.'/all', [], [], []);

        $studentScore = $studentScore['course_score'];

        foreach ($years as $year){
            if($year == end($years))
            $academic_year = $year ;
        }

        foreach ($studentScore as $score){
            if($score == end($studentScore)){
                $scores = $score;
            }
        }

//        $studentScore = $studentApi['course_score'];
//        dd($studentScore);


        /*$input = [
            'name' => 'LEROY',
            'email' => 'leroy@gmail.com',
            'password' => 'testing'
        ];*/

//        $this->users->create($input);


        $posts = Post::latest()->limit(3)->get();
        $profile = Profile::where(['user_uid' => auth()->id()])->first();
        $resume = Resume::where(['user_uid' => auth()->id()])->first();

//
//        $studentData = $this->controller->getElementByApi($this->studentPrefix.'/annual-object', ['student_id_card','academic_year_id'], ['e20150547', 2017], []);
//
//
//
//        $academic = $this->controller->getElementByApi($this->academic.'/all', [], [], []);
//        dd($academic);
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


        return view('frontend.portals.index', compact('resume', 'profile', 'posts', 'studentScore', 'years', 'scores', 'academic_year'));
    }

    /**
     * @param $year
     * @return mixed
     */
    public function score($year){

        $user =auth()->user();

        $studentScore = $this->controller->getElementByApi($this->studentPrefix.'/score', ['student_id_card', 'academic_year_id'], [$user->email, $year], []);

        $academic_years = $this->controller->getElementByApi($this->academic.'/all', [], [], []);



        $posts = Post::latest()->limit(3)->get();
        $profile = Profile::where(['user_uid' => auth()->id()])->first();
        $resume = Resume::where(['user_uid' => auth()->id()])->first();

        if($studentScore == null || count($studentScore['course_score'])==0){

            return Response::json([
                view('frontend.portals.index', compact('academic_years', 'posts', 'profile', 'resume', 'studentScore')),
                'status' => false,
            ]);
        }else{
            return Response::json([
                view('frontend.portals.index', compact('academic_years', 'posts', 'profile', 'resume', 'studentScore')),
                'status' => true,
                'data' => $studentScore
            ]);
        }


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
    public function store(Request $request)
    {

        $newPost = new Post();

        $newPost->body = request('body');

        if (Input::file()) {

            $filename = Input::file('file');

            $change = $filename->getClientOriginalExtension();
            $newFilename = auth()->id() . str_random(8) . '.'.$change;
//            $filename->move('docs', "{$newFilename}" . $change);

//            Storage::disk('local')->put($newFilename,  file_get_contents($filename->getRealPath()));

            if (Input::file('file')->getMimeType() == 'image/jpeg') {

                $filename->move('img/frontend/uploads/images', "{$newFilename}");
            } else {

                $filename->move('docs', "{$newFilename}");
            }
            $newPost->file = $newFilename;

        }

        switch($request->btn_submit) {

            case 'Publish':
                //action save here
                $newPost->published = 1;
                break;

            case 'Draft':
                //action for save-draft here
                $newPost->published = 0;
                break;
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
            if ($post->profile) {
                $file = explode(".",$post->file);
                $filename = Input::file('file');
                $change = $filename->getClientOriginalExtension();
                $newfilename = auth()->id() . str_random(10) . '.';

                if (Input::file('file')->getMimeType() == 'image/jpeg') {

                    $filename->move('img/frontend/uploads/images', "{$newfilename}".$change);
                } else {

                    $filename->move('docs', "{$newfilename}".$change);
                }

                if ($file[1] == 'jpg' || $file[1] == 'jpeg' || $file[1] == 'png') {
                    unlink(public_path('img/frontend/uploads/images/' . $post->file));
                }else{
                    unlink(public_path('/docs' . $post->file));
                }

                $post->file = $newfilename . $change;
            }else{
                $filename = Input::file('file');
                $change = $filename->getClientOriginalExtension();
                $newfilename = auth()->id() . str_random(10) . '.';
                if (Input::file('file')->getMimeType() == 'image/jpeg') {

                    $filename->move('img/frontend/uploads/images', "{$newfilename}".$change);
                } else {

                    $filename->move('docs', "{$newfilename}".$change);
                }
                $post->file = $newfilename . $change;
            }

        }
        elseif(request('name') == null){

            if(isset($post->file)){
                $file = explode(".",$post->file);
                if ($file[1] == 'jpg' || $file[1] == 'jpeg' || $file[1] == 'png') {
                    unlink(public_path('img/frontend/uploads/images/' . $post->file));
                }else{
                    unlink(public_path('docs/' . $post->file));
                }
                $post->file = null;
            }

        }

        $post->body = request('body');

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

        if ($post->file){
            if(str_contains($post->file, '.pdf'))
                unlink(public_path('docs/' . $post->file));
            else
                unlink(public_path('img/frontend/uploads/images/' . $post->file));
        }
        Post::find($post->id)->delete();
        session()->flash('flash_success', 'Post have been deleted.');
        return redirect()->back();
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish(Post $post){

        $post->published = 1;
        $post->updated_at = Carbon::now();

        if($post->save()){
            return redirect()->back();
        }

    }
}
