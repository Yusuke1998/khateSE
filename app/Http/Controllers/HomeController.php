<?php
namespace App\Http\Controllers;

use Symfony\Component\Console\Helper\FormatterHelper;
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
use App\TestGoogle;
use App\TextContent;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except('inicio');
	}

	public function inicio()
	{
		$sections = Section::all();
		return view('inicio',compact('sections'));
	}

	// Muestra la vista principal con todas la INFORMACION
	public function index()
	{
		$topics   	  = Topic::all();
		$contents 	  = Content::all()->sortByDesc('id');
		$textcontents = TextContent::all()->sortByDesc('id');
		$sections 	  = Section::all()->sortByDesc('id');
		$tests 	  	  = Test::all()->sortByDesc('id');
		$testsgoogle  = TestGoogle::all()->sortByDesc('id');
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

		if (Auth::user()->type == 'student') {
			return view('user.index')
					->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
					->with('me', $me)
					->with('tests',$tests)
					->with('testsgoogle',$testsgoogle)
					->with('sections', $sections)
					->with('topics', $topics);
		} elseif (Auth::user()->type == 'teacher') {
			$tests = Test::where('people_id',Auth::user()->people->id)->get();
			return view('admin.index')
				->with('files', $files)
				->with('textcontents', $textcontents)
				->with('images', $images)
				->with('videos', $videos)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
		}else{
			return view('admin.index')
					->with('files', $files)
					->with('textcontents', $textcontents)
					->with('images', $images)
					->with('videos', $videos)
					->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
					->with('me', $me)
					->with('tests',$tests)
					->with('testsgoogle',$testsgoogle)
					->with('sections', $sections)
					->with('topics', $topics);
		}
	}

	public function videos()
	{
		$sections = Section::all()->sortByDesc('id');
		$tests 	  = Test::all()->sortByDesc('id');
		$testsgoogle 	  = TestGoogle::all()->sortByDesc('id');
		$topics   = Topic::all();
		$id = Auth::user()->id;
		$me = User::find($id);
		$contents = Content::where('section_id',$me->people->student->section->id)->get();

		$videos   = [];

		foreach ($contents as $k => $v) {
			if ( preg_match("/(.mp4)$/", $v->file) ) {
				$videos[] = $contents[$k];
			}
		}

		return view('user.video')
				->with('videos', $videos)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function imagenes()
	{
		$topics   = Topic::all();
		$sections 	  = Section::all()->sortByDesc('id');
		$tests 	  = Test::all()->sortByDesc('id');
		$testsgoogle 	  = TestGoogle::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$contents = Content::where('section_id',$me->people->student->section->id)->get();

		$images 	  = [];

		foreach ($contents as $k => $v) {
			if ( preg_match("/(.png|.jpg|.jpeg|.gif)$/", $v->file) ) {
				$images[] = $contents[$k];
			}
		}
		return view('user.images')
				->with('contents', $images)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function estudiantes()
	{
		$sections 	  	= Section::all()->sortByDesc('id');
		$tests 	  		= Test::all()->sortByDesc('id');
		$testsgoogle 	= TestGoogle::all()->sortByDesc('id');
		$topics      	= Topic::all();
		$estudiantes 	= User::where('type', 'student')->get();
		$id = Auth::user()->id;
		$me = User::find($id);


		return view('admin.estudiantes')
				->with('contents', $estudiantes)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function pruebas()
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$tests = Test::where('section_id',$me->people->student->section->id)->get();
		$testsgoogle = TestGoogle::where('section_id',$me->people->student->section->id)->get();
		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.pruebas')
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function evaluaciones()
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$secction = $me->people->student->section->id;
		$tests 	  = Test::where('section_id',$secction)->get();
		$testsgoogle 	  = TestGoogle::where('section_id',$secction)->get();

		return view('user.evaluaciones')
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function topic($topic)
	{
		$topic  	= Topic::where('topic', $topic)->first();
		$topics   	= Topic::all();
		$id = Auth::user()->id;
		$me = User::find($id);

		if ($me->type == 'teacher') {
			$contents 	= TextContent::where('topic_id', $topic->id)->get();
			$contentsm 	= Content::where('topic_id', $topic->id)->get();
		}else{
			$contents 	= TextContent::where('topic_id', $topic->id)
			->where('section_id',$me->people->student->section_id)
			->get();
			$contentsm 	= Content::where('topic_id', $topic->id)
			->where('section_id',$me->people->student->section_id)
			->get();
		}
		$tests	  		= Test::all()->sortByDesc('id');
		$testsgoogle	= TestGoogle::all()->sortByDesc('id');
		$sections 		= Section::all()->sortByDesc('id');

		return view('user.topiccontent')
				->with('contents', $contents)
				->with('contentsm', $contentsm)
				->with('carbon', new BaseCarbon(now('America/Caracas'), 'America/Caracas'))
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	// Evaluacion con google forms
	public function addeval(Request $req)
	{
		$data = request()->validate([
			'topic_id'		=>	'required',
			'section_id'	=>	'required',
			'link'			=>	'required'
		]);

		$testgoogle = TestGoogle::create([
			'link' 			=> $data['link'],
			'topic_id' 		=> $data['topic_id'],
			'section_id' 	=> $data['section_id'],
		]);
		return back()->with('info', 'Se ha registrado la nueva evaluacion');
	}
	
	// Evaluacion normal
	public function addevaluacion(Request $req)
	{
		$data = request()->validate([
			'topic_id'		=>	'required',
			'note'			=>	'required',
			'section_id'	=>	'required',
			'people_id'		=>	'required'
		]);

		$prueba = Test::create([
			'note'			=>	$data['note'],
			'topic_id'		=>	$data['topic_id'],
			'people_id'		=>	$data['people_id'],
			'section_id'	=>	$data['section_id']
		]);

		return back()->with('info', 'Se ha registrado la evaluacion');
	}


	// FUncion que se encarga de insertar el contenido en la db
	public function addContent(Request $req)
	{
		$data = request()->validate([
			'name'			=>	'required|min:5',
			'section_id'	=>	'required',
			'publicar'		=>	'required|min:10',
			'file'			=>	'required',
			'topicid'		=>	'required',
			'peopleid'		=>	'required'
		]);

		$post = new Content();
		$post->name      	= $data['name'];
		$post->section_id   = $data['section_id'];
		$post->comment   	= $data['publicar'];
		$post->file 	 	= $req->file('file')->store('');
		$post->topic_id  	= $data['topicid'];
		$post->people_id 	= $data['peopleid'];
		$post->save();

		return back()->with('info','Contenido multimedia creado exitosamente!');
	}

	public function addcontenttext(Request $req)
	{
		$data = request()->validate([
			'nametext'		=>	'required|min:5',
			'section_id'	=>	'required',
			'publicartext'	=>	'required|min:10',
			'topicid'		=>	'required',
			'peopleid'		=>	'required'
		]);

		$posttext = new TextContent();
		$posttext->section_id   = $data['section_id'];
		$posttext->name        	= $data['nametext'];
		$posttext->textcontent 	= $data['publicartext'];
		$posttext->topic_id    	= $data['topicid'];
		$posttext->people_id   	= $data['peopleid'];
		$posttext->save();

		return back()->with('info','Contenido de texto creado exitosamente!');
	}

	public function profile()
	{
		$topics = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$tests = Test::all()->sortByDesc('id');
		$testsgoogle = TestGoogle::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);

		return view('user.profile')
				->with('topics', $topics)
				->with('sections', $sections)
				->with('me', $me)
				->with('testsgoogle',$testsgoogle)
				->with('tests',$tests);
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
		$people->save();
		$user->save();

		return redirect('profile')->with('info', 'Perfil editado satisfactoriamente.');
	}

	public function addtema(Request $req)
	{
		$data = request()->validate([
			'tema'			=>	'required|min:5',
			'description'	=>	'required|min:10',
			'topicimg'		=>	'required'
		]);

		$topic = new Topic();
		$topic->topic 		= $req->input('tema');
		$topic->description = $req->input('description');
		
		if ( $req->file('topicimg') )
		{
			$topic->image = $req->file('topicimg')->store('');
		}

		$topic->save();

		return back()->with('info', 'Se ha registrado el tema');
	}

	public function addseccion(Request $req)
	{
		$data = request()->validate([
			'section'	=>	'required|min:1',
		]);

		$secction = new Section();
		$secction->section 	= $data['section'];
		$secction->save();

		return back()->with('info', 'Se ha registrado la seccion');
	}


	public function historial($id_student)
	{
		$sections 	  	= Section::all()->sortByDesc('id');
		$tests 	  		= Test::all()->sortByDesc('id');
		$testsgoogle 	= TestGoogle::all()->sortByDesc('id');
		$topics      	= Topic::all();
		$estudiantes 	= User::where('type', 'student')->get();
		$estudiante 	= User::where('id', $id_student)->first();
		$id = Auth::user()->id;
		$me = User::find($id);

		return view('admin.historial')
				->with('contents', $estudiantes)
				->with('estudiante', $estudiante)
				->with('me', $me)
				->with('tests',$tests)
				->with('testsgoogle',$testsgoogle)
				->with('sections', $sections)
				->with('topics', $topics);
	}
}