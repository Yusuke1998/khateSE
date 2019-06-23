<?php

use App\Answer;
use App\Content;
use App\Note;
use App\People;
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

	public static function estudianteTestTotal($id_test){

		$total = Test::find($id_test)->students->count();
		
		return $total;
	}









}