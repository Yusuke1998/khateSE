<?php

namespace App\Http\Controllers;
use App\TestSimple;
use App\QuestionSimple;
use App\AnswerSimple;
use App\User;
use App\Section;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TestSimpleController extends Controller
{
    // Evaluacion de seccion simple, crear
	public function addevaluacionsimple(Request $req)
	{
		$data = request()->validate([
			'topic_id'		=>	'required',
			'note'			=>	'required',
			'section_id'	=>	'required',
			'people_id'		=>	'required'
		]);

		$prueba = TestSimple::create([
			'note'			=>	$data['note'],
			'topic_id'		=>	$data['topic_id'],
			'people_id'		=>	$data['people_id'],
			'section_id'	=>	$data['section_id']
		]);

		return back()->with('info', 'Se ha registrado la evaluacion');
	}

	public function evaluacion($id_test)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = TestSimple::where('id',$id_test)->first();

		return view('admin.evaluacion_simple')
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
		$test = TestSimple::where('id',$id_test)->first();

		return view('admin.pregunta_simple')
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
    		'test_id'	=>	'required',
    		'good'		=>	'required'
		]);
		// $en valor maximo de la evaluacion
		// $pv valor de la pregunta que se quiere crear
		// $ep valor total de las preguntas de la evaluacion

		$en = TestSimple::where('id',$data['test_id'])->first()->note;
		$pv = $data['value'];
		$ep = TestSimple::where('id',$data['test_id'])->first()->questionsimples->sum('value');

		if ($ep === 0) {
			$pregunta = QuestionSimple::create([
	    		'text'				=>	$data['text'],
	    		'value'				=>	$data['value'],
	    		'good'				=>	$data['good'],
	    		'test_simple_id'	=>	$data['test_id'],
			]);
			return redirect(route('evaluacionsimple.ver',$pregunta->test_simple_id))->with('info','Pregunta registrada exitosamente!');
		}

		if ($pv>$en) {
			return back()->with('info','El valor de la pregunta supera la ponderacion maxima de la evaluacion!');
		}

		if (($pv+$ep)>$en) {
			return back()->with('info','El valor de la pregunta supera la cantidad restante!');
		}else{
			$pregunta = QuestionSimple::create([
	    		'text'				=>	$data['text'],
	    		'value'				=>	$data['value'],
	    		'good'				=>	$data['good'],
	    		'test_simple_id'	=>	$data['test_id']
			]);
		}

		if (isset($pregunta)) {
			return redirect(route('evaluacionsimple.ver',$pregunta->test_simple_id))->with('info','Pregunta registrada exitosamente!');
		}else{
			return back()->with('info','No se ha creado la pregunta!');
		}
	}

	public function respuesta($id_test,$id_question)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = TestSimple::where('id',$id_test)->first();
		$question = QuestionSimple::where('id',$id_question)->first();

		return view('admin.respuesta_simple')
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
			'number'		=>	'required',
    		'people_id'		=>	'required',
    		'question_id'	=>	'required',
    		'test_id'		=>	'required'
		]);

		$respuesta = AnswerSimple::create([
    		'text'					=>	$data['text'],
    		'number'				=>	$data['number'],
    		'people_id'				=>	$data['people_id'],
    		'question_simple_id'	=>	$data['question_id'],
    		'test_simple_id'		=>	$data['test_id'],
		]);

		return redirect(route('evaluacionsimple.ver',$data['test_id']))->with('info','Respuesta registrada exitosamente!');
	}

	public function respuestas($id_test,$id_question)
	{
		$topics   	= Topic::all();
		$sections 	= Section::all()->sortByDesc('id');
		$id 		= Auth::user()->id;
		$me 		= User::find($id);
		$test 		= TestSimple::where('id',$id_test)->first();
		$question 	= QuestionSimple::where('id',$id_question)->first();
		$answers 	= AnswerSimple::all()
		->where('test_simple_id',$id_test)
		->where('question_simple_id',$id_question);

		return view('admin.ver_respuestas_simples')
				->with('me', $me)
				->with('topics', $topics)
				->with('sections', $sections)
				->with('test',$test)
				->with('question',$question)
				->with('answers', $answers);
	}

	public function asignar($id_question,$number)
	{
		$pregunta = QuestionSimple::find($id_question);
		$pregunta->update([
			'good'	=>	$number
		]);

		return back()->with('info','Respuesta asignada con exito!');
	}
}
