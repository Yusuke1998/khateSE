<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon as BaseCarbon;
use Barryvdh\DomPDF\Facade as PDF;

use App\Post;
use App\Topic;
use App\People;
use App\User;
use App\Comment;
use App\Note;
use App\Test;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	// Mostrat las vistas

	public function index()
	{
		if ( Auth::user()->isactivated ) {

			$topics   = Topic::all();

			$allposts = DB::table('posts')
						->join('people', 'people.id', '=', 'posts.people_id')
						->join('users', 'people.id', '=', 'users.people_id')
						->join('topics', 'topics.id', '=', 'posts.topic_id')
						->select('people.first_name', 'people.last_name', 'people.avatar', 'users.type', 'users.email', 'posts.post', 'posts.id', 'posts.file', 'posts.created_at', 'topics.topic')
						->get()->sortByDesc('id');

			$students = User::where('type', 'Estudiante')->get();

			$id = Auth::user()->id;
			$me = User::find($id);

			return view('user.dashboard')
				->with('me', $me)
				->with('posts', $allposts)
				->with('estudiantes', $students)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('topics', $topics);
		}
		else {
			return view('user.disactivated');
		}
	}

	public function profile()
	{
		if ( Auth::user()->isactivated ) {

			$topics = Topic::all();

			$id = Auth::user()->id;
			$me = User::find($id);

			return view('user.profile')
					->with('topics', $topics)
					->with('me', $me);
		}
		else {
			return view('user.disactivated');
		}
	}

	public function topicid(Request $req)
	{
		if ( Auth::user()->isactivated ) {

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
		else {
			return view('user.disactivated');
		}
	}

	public function postid($id)
	{
		if ( Auth::user()->isactivated ) {

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

			$students = User::where('type', 'Estudiante')->get();

			$id = Auth::user()->id;
			$me = User::find($id);

			return view('user.dashboard')
				->with('me', $me)
				->with('estudiantes', $students)
				->with('posts', $post)
				->with('comments', $comments)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('topics', $topics);
		}
		else {
			return view('user.disactivated');
		}
	}

	public function progreso()
	{
		if ( Auth::user()->isactivated ) {

			$people = People::where('id', Auth::user()->people_id)->get();
			$topics = Topic::all();

			$id = Auth::user()->id;
			$me = User::find($id);

			$notas  = Note::where('user_id', $id)->get();

			return view('user.progreso')
					->with('topics', $topics)
					->with('notas', $notas)
					->with('people', $people)
					->with('me', $me);
		}
		else {
			return view('user.disactivated');
		}
	}

	public function certificado()
	{
		$id  = Auth::user()->people_id;
		$p   = People::where('id', $id)->get();
		$pin = $p[0]->pin;
		$nota = 0;

		if ( $p[0]->isgraduated != 0 )
		{
			$notas = Note::where('user_id', $id)->get();

			for ($i=0; $i < count($notas); $i++) {
				$nota += $notas[$i]->note;
			}

			$data['data'] = $notas;
			$data['nota'] = $nota / count($notas);

			$pdf = PDF::loadView('pdf.certificado', $data)->setPaper('letter', 'landscape');
			return $pdf->download("certificado-$pin.pdf");
		}
		else {
			return redirect()->back();
		}
	}


	// vistas del profesor


	public function notas()
	{
		if ( Auth::user()->type == 'Profesor' )
		{
			$topics   = Topic::all();
			$notas    = Note::all();
			$tests    = Test::all();
			$people   = User::where('type', 'Estudiante')->get();
			// $students = User::where('type', 'Estudiante')->get();

			$id = Auth::user()->id;
			$me = User::find($id);

			return view('admin.notas')
					->with('topics', $topics)
					->with('notas', $notas)
					->with('tests', $tests)
					->with('personas', $people)
					->with('estudiantes', $people)
					->with('me', $me);
		}
		else {
			return redirect('login');
		}
	}

	public function topic($topic)
	{
		if ( Auth::user()->type == 'Profesor' )
		{
			$topicid = Topic::where('topic', $topic)->get();
			$topics  = Topic::all();

			$id = Auth::user()->id;
			$me = User::find($id);

			return view('user.dashboard')
				->with('me', $me)
				->with('topics', $topics);
		}
		else {
			return redirect('login');
		}
	}



	// Solicitudes ajax


	public function getpublicacion(Request $req)
	{
		return Post::find($req->input('idpost'));
	}
	public function getcomentario(Request $req)
	{
		return Comment::find($req->input('idcomment'));
	}
	public function toggleCertificate(Request $req)
	{
		$peopleid = $req->input('peopleid');
		$people   = People::find($peopleid);

		if( $people->isgraduated == 1 )
		{
			$people->isgraduated = 0;
		}
		else {
			$people->isgraduated = 1;
		}

		$people->save();

		echo $people->isgraduated;
	}
	public function addnotas(Request $req)
	{
		$testid  = $req->input('testid');
		$userid  = $req->input('userid');
		$note    = $req->input('note');

		$notes = Note::where('user_id', $userid)->where('test_id', $testid)->get();

		if ( isset($notes[0]) && $notes[0]->test_id == $testid && $notes[0]->user_id == $userid )
		{
			die('false');
		}
		else
		{
			$note = new Note();

			$note->test_id = $req->input('testid');
			$note->user_id = $req->input('userid');
			$note->note    = $req->input('note');

			$note->save();

			echo 'Nota registrada satisfactoriamente';
		}
	}


	// Boton de notas
	public function notaspdf(Request $req)
	{
		$data['notas'] = Note::all();

		// return view('pdf.notas')->with('notas', $data['notas']);

		$pdf = PDF::loadView('pdf.notas', $data);
		return $pdf->download('notas.pdf');
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

	public function comentar(Request $req)
	{
		$comment = new Comment();

		if ( $req->file('filecomment') )
		{
			$comment->file = $req->file('filecomment')->store('');
		}

		$comment->comment   = $req->comentario;
		$comment->post_id   = $req->postid;
		$comment->people_id = $req->peopleid;

		$comment->save();

		return redirect("post/$req->postid");
	}

	public function editarcomentario(Request $req)
	{
		$id = $req->input('idcomment');
		$comment = Comment::find($id);

		if ( $req->file('filecomment') )
		{
			Storage::delete($comment->file);
			$comment->file = $req->file('filecomment')->store('');
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

		$topic->topic = $req->input('tema');

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

	public function bloquear(Request $req)
	{
		$user = User::where('people_id', $req->input('peopleid'))->get();

		if ($user[0]->isactivated == 1)
		{
			$user[0]->isactivated = 0;
		}
		else
		{
			$user[0]->isactivated = 1;
		}

		$user[0]->save();

		return back();
	}
}