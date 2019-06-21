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
use App\Section;
use App\Test;
use App\TextContent;


class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	// Muestra la vista principal con todas la INFORMACION
	public function index()
	{
		$topics   	  = Topic::all();
		$contents 	  = Content::all()->sortByDesc('id');
		$textcontents = TextContent::all()->sortByDesc('id');
		$sections 	  = Section::all()->sortByDesc('id');
		$tests 	  	  = Test::all()->sortByDesc('id');
		$files 	  	  = [];
		$videos   	  = [];
		$images	  	  = [];

		foreach ($contents as $k => $v) {
			if ( preg_match("/(.pdf|.txt|.csv|.doc|.docx|.ppt|.excel|.odt|.xls)$/", $v->file) ) {
				$files[] = $contents[$k];
			}

			if ( preg_match("/(.jpg|.png|.jpeg|.gif)$/", $v->file) ) {
				$images[] = $contents[$k];
			}

			if ( preg_match("/(.mp4)$/", $v->file) ) {
				$videos[] = $contents[$k];
			}
		}

		$id = Auth::user()->id;
		$me = User::find($id);

		if ( Auth::user()->type == 'student' ) {
			
			return view('user.index')
					->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
					->with('me', $me)
					->with('tests',$tests)
					->with('topics', $topics);
		}

		return view('admin.index')
				->with('files', $files)
				->with('textcontents', $textcontents)
				->with('images', $images)
				->with('videos', $videos)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('sections', $sections)
				->with('topics', $topics);

	}

	public function videos()
	{
		$sections 	  = Section::all()->sortByDesc('id');
		$tests 	  = Test::all()->sortByDesc('id');
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
				->with('tests',$tests)
				->with('seccions', $seccions)
				->with('topics', $topics);
	}

	public function imagenes()
	{
		$topics   = Topic::all();
		$sections 	  = Section::all()->sortByDesc('id');
		$tests 	  = Test::all()->sortByDesc('id');
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
				->with('tests',$tests)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function estudiantes()
	{
		$sections 	  = Section::all()->sortByDesc('id');
		$tests 	  = Test::all()->sortByDesc('id');
		$topics      = Topic::all();
		$estudiantes = User::where('type', 'student')->get();

		$id = Auth::user()->id;
		$me = User::find($id);


		return view('admin.estudiantes')
				->with('contents', $estudiantes)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function pruebas()
	{
		$topics = Topic::all();
		$sections 	  = Section::all()->sortByDesc('id');
		$tests 	  = Test::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);


		return view('user.pruebas')
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function topic($topic)
	{
		$sections 	= Section::all()->sortByDesc('id');
		$topicid  	= Topic::where('topic', $topic)->first();
		$topicid = $topicid->id;


		$contents 	= TextContent::where('topic_id', $topicid)->get();
		$contentsm 	= Content::where('topic_id', $topicid)->get();

		// dd($contents);

		$topics   	= Topic::all();
		$tests	  	= Test::all()->sortByDesc('id');

		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.topiccontent')
				->with('contents', $contents)
				->with('contentsm', $contentsm)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	// Todo lo referente a la evaluacion
	public function addevaluacion(Request $req)
	{
		$data = request()->validate([
			'topic'			=>	'required',
			'note'			=>	'required',
			'section_id'	=>	'required',
			'people_id'		=>	'required'
		]);

		$prueba = Test::create([
			'topic'			=>	$data['topic'],
			'note'			=>	$data['note'],
			'people_id'		=>	$data['people_id'],
			'section_id'	=>	$data['section_id']
		]);

		return back()->with('success', 'Se ha registrado la evaluacion');
	}

	public function addpregunta(Request $req)
	{
		dd($req);
	}

	public function addrespuesta(Request $req)
	{
		dd($req);
	}

	// FUncion que se encarga de insertar el contenido en la db
	public function addContent(Request $req)
	{
		// ini_set('post_max_size', '500M');
		$post = new Content();
		$post->name      	= $req->name;
		$post->section_id   = $req->section_id;
		$post->comment   	= $req->publicar;
		$post->file 	 	= $req->file('file')->store('');
		$post->topic_id  	= $req->topicid;
		$post->people_id 	= $req->peopleid;
		$post->save();

		return redirect('home');
	}

	public function addcontenttext(Request $req)
	{
		$posttext = new TextContent();
		$posttext->section_id   = $req->section_id;
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
		$sections = Section::all()->sortByDesc('id');
		$tests = Test::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.profile')
				->with('topics', $topics)
				->with('sections', $sections)
				->with('me', $me)
				->with('tests',$tests);
	}

	public function topicid(Request $req)
	{
		$sections = Section::all()->sortByDesc('id');
		$tests = Test::all()->sortByDesc('id');
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
			->with('tests',$tests)
			->with('sections', $sections)
			->with('estudiantes', $students)
			->with('posts', $posttopics)
			->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
			->with('topics', $topics);
	}

	public function postid($id)
	{
		$sections = Section::all()->sortByDesc('id');
		$tests = Test::all()->sortByDesc('id');
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
			->with('tests',$tests)
			->with('sections', $sections)
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

		$people->first_name = $req->input('first_name');
		$people->last_name  = $req->input('last_name');

		if ( $req->file('file') )
		{
			if ( $people->avatar !== 'user.png' )
			{
				Storage::delete($people->avatar);
			}
			$people->avatar = $req->file('file')->store('');
		}

		$user->email = $req->input('email');
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