<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Topic;
use App\Section;
use App\User;
use App\Question;
use App\Student;
use App\Answer;
use App\Test;

class TestController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function evaluacion($id_test)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		// $test = Test::find($id_test);
		$test = Test::where('id',$id_test)->first();

		return view('admin.evaluacion')
				->with('me', $me)
				->with('test',$test)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function pregunta($id_test)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		// $test = Test::find($id_test);
		$test = Test::where('id',$id_test)->first();

		return view('admin.pregunta')
				->with('me', $me)
				->with('test',$test)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function pregunta_guardar(Request $request)
	{
		$data = request()->validate([
			'text'		=>	'required',
    		'value'		=>	'required',
    		'test_id'	=>	'required'
		]);

		$pregunta = Question::create([
    		'text'		=>	$data['text'],
    		'value'		=>	$data['value'],
    		'test_id'	=>	$data['test_id']
		]);
		return redirect(route('evaluacion.ver',$pregunta->test_id));
	}

	public function evaluacion_estudiante($id_test)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = Test::where('id',$id_test)->first();

		return view('user.evaluacion')
				->with('me', $me)
				->with('test',$test)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function respuesta($id_test,$id_question)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = Test::where('id',$id_test)->first();
		$question = Question::where('id',$id_question)->first();

		return view('user.respuesta')
				->with('me', $me)
				->with('test',$test)
				->with('question',$question)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function respuesta_guardar(Request $request)
	{
		$data = request()->validate([
			'text'			=>	'required',
    		'people_id'		=>	'required',
    		'question_id'	=>	'required',
    		'student_id'	=>	'required',
    		'test_id'		=>	'required'
		]);

		$estudiante = Student::where('people_id',$data['people_id'])->first();

		$respuesta = Answer::create([
    		'text'			=>	$data['text'],
    		'people_id'		=>	$data['people_id'],
    		'question_id'	=>	$data['question_id'],
    		'test_id'		=>	$data['test_id'],
    		'student_id'	=>	$data['student_id']
		]);

		/**

		$estudiante->answers()->attach($respuesta->id);
		$estudiante->questions()->attach($data['question_id']);

		$test = false;

		if (!$test) {
			$estudiante->tests()->attach($data['test_id']);
			$test = true;
		}

		**/

		return redirect(route('estudiante.evaluacion',$respuesta->test_id));
	}
}
