<?php

use App\Answer;
use App\AnswerSimple;
use App\Content;
use App\Note;
use App\NoteSelect;
use App\People;
use App\Question;
use App\QuestionSimple;
use App\Section;
use App\Student;
use App\Test;
use App\TestSimple;
use App\TextContent;
use App\Topic;
use App\User;

class MyHelper{
	// Calcular nota completa obtenida en un test
    public static function notaTotal($id_test,$id_people){
		$test = Test::where('id',$id_test)->first();
		$total_pts = 0;
		// test/questions/ansrers/notes
		foreach ($test->questions as $question) {
			if ($question->answers) {
				foreach ($question->answers as $answer) {
					if ($answer->people_id === $id_people) {
						$total_pts += $answer->notes->sum('note');
					}
				}
			}
		}
		return $total_pts;
	}

	// Calcular la nota de un estudiante en una respuesta
	public static function notaTotalRespuesta($id_answer,$id_people){
		$answer = Answer::where('id',$id_answer)->first();
		$nota = 0;
		foreach ($answer->notes as $note) {
			if ($note->people_id == $id_people) {
				$nota = $note->note;
			}
		}
		$nota_total = ($nota==0) ? '00' : $nota ;
		return $nota_total;
	}

	// Calcular la nota de un estudiante en una respuesta de seleccion
	public static function notaSimpleTotalRespuesta($id_student,$id_question){
		$nota = 0;

		$pregunta = QuestionSimple::where('id',$id_question)->first();
		foreach ($pregunta->noteselects as $note) {
			if ($note->student_id == $id_student) {
				return $nota = $note->note;
			}
		}

		$nota_total = ($nota==0) ? '00' : $nota ;
		return $nota_total;
	}

	// sumar todas las notas de un estudiante en una evaluacion de seleccion
	public static function notaSimpleTotal($id_test,$id_people){
		$nota = NoteSelect::where('test_simple_id',$id_test)
		->where('people_id',$id_people)
		// ->where('question_simple_id',$id_question)
		->get();
		// $test = TestSimple::where('id',$id_test)->first();
		$total_pts = 0;
		// foreach ($test->questionsimples as $question) {
		// 	if ($question->answersimples) {
		// 		foreach ($question->noteselects as $note) {
		// 			if ($note->people_id === $id_people) {
		// 				$total_pts += $note->sum('note');
		// 				// $total_pts = 1;
		// 			}
		// 		}
		// 	}
		// }
		return $total_pts;
	}

	// public static function tieneNotaSelect($id_test,$id_question,$id_student){
	// 	$test = TestSimple::find($id_test);
	// 	foreach ($test->questionsimples as $questions) {
	// 		if ($question->id == $id_question) {
	// 			foreach ($question->answersimples as $answer) {
	// 				# code...
	// 			}
	// 		}
	// 		# code...
	// 	}
	// 	return true;
	// }













}