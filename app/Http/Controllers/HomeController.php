<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Topic;
use App\People;
use App\User;
use App\Comment;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable

	 */

	// Mostrat las vistas

	public function index()
	{
		// $allposts = Post::all()->sortByDesc('id');


		$topics   = Topic::all();

		$allposts = DB::table('posts')
					->join('people', 'people.id', '=', 'posts.people_id')
					->join('users', 'people.id', '=', 'users.people_id')
					->join('topics', 'topics.id', '=', 'posts.topic_id')
					->select('people.first_name', 'people.last_name', 'people.avatar', 'users.type', 'users.email', 'posts.post', 'posts.id', 'posts.file', 'posts.created_at', 'topics.topic')
					->get()->sortByDesc('id');


		$students = DB::table('users')
					->join('people', 'people.id', '=', 'users.people_id')
					->where('type', 'Estudiante')
					->get();

		$id = Auth::user()->id;
		$me = DB::table('users')
					->join('people', 'people.id', '=', 'users.people_id')
					->where('users.id', $id)
					->get();

		return view('user.dashboard')
			->with('me', $me)
			->with('posts', $allposts)
			->with('estudiantes', $students)
			->with('topics', $topics);
	}

	public function profile()
	{
		$id = Auth::user()->id;
		$me = DB::table('users')
					->join('people', 'people.id', '=', 'users.people_id')
					->where('users.id', $id)
					->get();

		return view('user.profile')
				->with('me', $me);
	}

	public function topic($topic)
	{
		$topicid    = Topic::where('topic', $topic)->get();
		$topics     = Topic::all();

		$posttopics = DB::table('posts')
						->join('people', 'people.id', '=', 'posts.people_id')
						->join('users', 'people.id', '=', 'users.people_id')
						->join('topics', 'topics.id', '=', 'posts.topic_id')
						->select('people.first_name', 'people.last_name', 'people.avatar', 'users.type', 'users.email', 'posts.post', 'posts.id', 'posts.file', 'posts.created_at', 'topics.topic')
						->where('topic_id', $topicid[0]->id)
						->get()->sortByDesc('id');

		$students   = DB::table('users')
						->join('people', 'people.id', '=', 'users.people_id')
						->where('type', 'Estudiante')
						->get();

		$id = Auth::user()->id;
		$me = DB::table('users')
					->join('people', 'people.id', '=', 'users.people_id')
					->where('users.id', $id)
					->get();

		return view('user.dashboard')
			->with('me', $me)
			->with('estudiantes', $students)
			->with('posts', $posttopics)
			->with('topics', $topics);
	}

	public function topicid(Request $req)
	{
		$posttopics = DB::table('posts')
						->join('people', 'people.id', '=', 'posts.people_id')
						->join('users', 'people.id', '=', 'users.people_id')
						->join('topics', 'topics.id', '=', 'posts.topic_id')
						->select('people.first_name', 'people.last_name', 'people.avatar', 'users.type', 'users.email', 'posts.post', 'posts.id', 'posts.file', 'posts.created_at', 'topics.topic')
						->where('topic_id', $req->input('topicid'))
						->get()->sortByDesc('id');


		$topics     = Topic::all();

		$students   = DB::table('users')
						->join('people', 'people.id', '=', 'users.people_id')
						->where('type', 'Estudiante')
						->get();

		$id = Auth::user()->id;
		$me = DB::table('users')
					->join('people', 'people.id', '=', 'users.people_id')
					->where('users.id', $id)
					->get();

		return view('user.dashboard')
			->with('me', $me)
			->with('estudiantes', $students)
			->with('posts', $posttopics)
			->with('topics', $topics);
	}

	public function postid($id)
	{
		$topics = Topic::all();

		$post = DB::table('posts')
				->join('people', 'people.id', '=', 'posts.people_id')
				->join('users', 'people.id', '=', 'users.people_id')
				->join('topics', 'topics.id', '=', 'posts.topic_id')
				->select('people.first_name', 'people.last_name', 'people.avatar', 'users.type', 'users.email', 'posts.post', 'posts.id', 'posts.file', 'posts.created_at', 'topics.topic')
				->where('posts.id', $id)
				->get();

		$comments = DB::table('comments')
				->join('people', 'people.id', '=', 'comments.people_id')
				->join('users', 'people.id', '=', 'users.people_id')
				->select('people.first_name', 'people.last_name', 'people.avatar', 'users.type', 'users.email', 'comments.comment', 'comments.file', 'comments.created_at', 'comments.id')
				->where('post_id', $id)
				->get();

		$students = DB::table('users')
					->join('people', 'people.id', '=', 'users.people_id')
					->where('type', 'Estudiante')
					->get();

		$id = Auth::user()->id;
		$me = DB::table('users')
					->join('people', 'people.id', '=', 'users.people_id')
					->where('users.id', $id)
					->get();

		return view('user.dashboard')
			->with('me', $me)
			->with('estudiantes', $students)
			->with('posts', $post)
			->with('comments', $comments)
			->with('topics', $topics);

	}



	// Logica del formulario

	public function publicar(Request $req)
	{

		$post = new Post();

		if ( $req->file('file') )
		{
			$post->file = $req->file('file')->store('');
		}

		$post->post      = $req->publicar;
		$post->topic_id  = $req->topicid;
		$post->people_id = $req->peopleid;

		$post->save();

		return redirect('home');
	}

	public function comentar(Request $req)
	{
		$comment = new Comment();

		if ( $req->file('file') )
		{
			$post->file = $req->file('file')->store('');
		}

		$comment->comment   = $req->comentario;
		$comment->post_id   = $req->postid;
		$comment->people_id = $req->peopleid;

		$comment->save();

		return redirect("post/$req->postid");
	}

	public function eliminarcomment(Request $req)
	{
		$id = $req->input('commentid');
		$comment = Comment::find($id);

		if ( isset($comment->file) ) {
			Storage::delete($comment->file);
		}

		$comment->delete();

		return back()->with('success', 'El comentario se ha eliminado correctamente.');
	}

	public function eliminarpost(Request $req)
	{
		$id = $req->input('postid');
		$post = Post::find($id);

		if ( asset($post->file) ) {
			Storage::delete($post->file);
		}

		$post->delete();

		return redirect('home')->with('success', 'La publicación se ha eliminado correctamente.');
	}

}
