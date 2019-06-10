<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon as BaseCarbon;
use Barryvdh\DomPDF\Facade as PDF;

use App\Content;
use App\Topic;
use App\People;
use App\User;
use App\TextContent;


# color pastel azul #a9e5e3


class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	

	// Muestra la vista principal con todas la INFORMACION
	public function index()
	{
		$topics   = Topic::all();
		$contents = Content::all()->sortByDesc('id');
		$files 	  = [];

		foreach ($contents as $k => $v) {
			if ( preg_match("/(.pdf|.txt|.csv|.doc|.docx|.ppt|.excel|.odt|.xls)$/", $v->file) ) {
				$files[] = $contents[$k];
			}
		}

		$id = Auth::user()->id;
		$me = User::find($id);

		if ( Auth::user()->type == 'student' ) {
			
			return view('user.index')
					->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
					->with('me', $me)
					->with('topics', $topics);
		}


		return view('admin.index')
				->with('contents', $files)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('topics', $topics);

	}
	public function videos()
	{
		$topics   = Topic::all();
		$contents = Content::all()->sortByDesc('id');

		$videos   = [];

		foreach ($contents as $k => $v) {
			if ( preg_match("/(.mp4)$/", $v->file) ) {
				$videos[] = $contents[$k];
			}
		}

		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.video')
				->with('videos', $videos)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('topics', $topics);
	}

	public function imagenes()
	{
		$topics   = Topic::all();
		$contents = Content::all()->sortByDesc('id');

		$images 	  = [];

		foreach ($contents as $k => $v) {
			if ( preg_match("/(.png|.jpg|.jpeg|.gif)$/", $v->file) ) {
				$images[] = $contents[$k];
			}
		}

		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.images')
				->with('contents', $images)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('topics', $topics);
	}

	public function estudiantes()
	{
		$topics      = Topic::all();
		$estudiantes = User::where('type', 'student')->get();

		$id = Auth::user()->id;
		$me = User::find($id);


		return view('admin.estudiantes')
				->with('contents', $estudiantes)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('topics', $topics);
	}

	public function pruebas()
	{
		$topics = Topic::all();

		$id = Auth::user()->id;
		$me = User::find($id);


		return view('user.pruebas')
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('topics', $topics);
	}

	public function topic($topic)
	{
		$topicid  = Topic::where('topic', $topic)->get();

		$contents = textcontent::where('topic_id', $topicid[0]->id)->get();
		$topics   = Topic::all();

		$id = Auth::user()->id;
		$me = User::find($id);

		// dd($contents);

		return view('user.topiccontent')
				->with('contents', $contents)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('topics', $topics);
	}




	// FUncion que se encarga de insertar el contenido en la db
	public function addContent(Request $req)
	{

		// ini_set('post_max_size', '500M');

		$post = new Content();

		$post->name      = $req->name;
		$post->comment   = $req->publicar;
		$post->file 	 = $req->file('file')->store('');
		$post->topic_id  = $req->topicid;
		$post->people_id = $req->peopleid;

		$post->save();

		return redirect('home');
	}

	public function addcontenttext(Request $req)
	{
		$posttext = new TextContent();

		$posttext->name        = $req->nametext;
		$posttext->textcontent = $req->publicartext;
		$posttext->topic_id    = $req->topicid;
		$posttext->people_id   = $req->peopleid;

		$posttext->save();

		return redirect('home');
	}

	public function profile()
	{
		$topics = Topic::all();

		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.profile')
				->with('topics', $topics)
				->with('me', $me);
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

		$students   = User::where('type', 'Estudiante')->get();

		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.dashboard')
			->with('me', $me)
			->with('estudiantes', $students)
			->with('posts', $posttopics)
			->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
			->with('topics', $topics);
	}

	public function postid($id)
	{
		$topics   = Topic::all();
		$post 	  = Content::find($id);
		$comments = Comment::all();
		$students = People::where('type', 'student')->get();

		$id = Auth::user()->id;
		$me = User::find($id);

		foreach ($post as $p) {
			dd($p);
		}

		return view('user.dashboard')
			->with('me', $me)
			->with('estudiantes', $students)
			->with('posts', $post)
			->with('comments', $comments)
			->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
			->with('topics', $topics);
	}

	


	// Solicitudes ajax


	

	// Logica del formulario

	public function publicar(Request $req)
	{
		$post = new Content();

		if ( $req->file('file') )
		{
			$post->file = $req->file('file')->store('');
		}

		$post->comment   = $req->publicar;
		$post->topic_id  = $req->topicid;
		$post->people_id = $req->peopleid;

		$post->save();

		return redirect('home');
	}

	public function editarpublicacion(Request $req)
	{
		$idpost = $req->input('postid');
		$post   = Post::find($idpost);

		if ( $req->file('file') )
		{
			Storage::delete($post->file);
			$post->file  = $req->file('file')->store('');
		}

		$post->post      = $req->input('publicacion');
		$post->topic_id  = $req->input('topicid');
		$post->people_id = $req->input('peopleid');

		$post->save();

		return redirect("post/$idpost");
	}

	public function eliminarpost(Request $req)
	{
		$id   = $req->input('postid');
		$post = Post::find($id);

		if ( isset($post->file) ) {
			Storage::delete($post->file);
		}

		$post->delete();

		return redirect('home')->with('success', 'La publicación se ha eliminado correctamente.');
	}

	// Editar perfil
	public function editarperfil(Request $req)
	{
		$peopleid = $req->input('peopleid');
		$userid   = $req->input('userid');

		$people   = People::find($peopleid);
		$user     = User::find($userid);

		$people->pin 		= $req->input('pin');
		$people->first_name = $req->input('first_name');
		$people->last_name  = $req->input('last_name');
		$people->phone 		= $req->input('phone');

		if ( $req->file('file') )
		{
			if ( $people->avatar !== 'user.png' )
			{
				Storage::delete($people->avatar);
			}
			$people->avatar = $req->file('file')->store('');
		}

		$user->email = $req->input('email');
		$user->about = $req->input('about');
		$user->type  = $req->input('type')?? $user->type;

		$people->save();
		$user->save();

		return redirect('profile')->with('success', 'Perfil editado satisfactoriamente.');
	}

	public function addtema(Request $req)
	{
		$topic = new Topic();

		$topic->topic 		= $req->input('tema');
		$topic->description = $req->input('description');
		
		if ( $req->file('topicimg') )
		{
			$topic->image = $req->file('topicimg')->store('');
		}

		$topic->save();

		return back()->with('success', 'Se ha registrado el tema');
	}

	public function addeval(Request $req)
	{
		$test = new Test();

		$test->link 	= $req->input('link');
		$test->topic_id = $req->input('topicid');

		$test->save();

		return back();
	}

}