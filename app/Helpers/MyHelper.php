<?php

use App\Answer;
use App\Content;
use App\Note;
use App\People;
use App\Teacher;
use App\Question;
use App\Section;
use App\Student;
use App\Test;
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

	// Calcular el total de estudiantes en una evaluacion
	// No funciona :'v
	// csm
	public static function estudianteTestTotal($id_test){
		$total = Test::find($id_test)->students->count();
		// $total = 0;
		// foreach (Student::all() as $estudiante) {
		// 	foreach ($estudiante->tests as $test) {
		// 		if ($test->id == $id_test) {
		// 			$total +=1;
		// 		}
		// 	}
		// }
		
		return $total;
	}









}