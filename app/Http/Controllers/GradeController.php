<?php namespace Laravel5App\Http\Controllers;

use Laravel5App\Models\Grade;
use Laravel5App\Models\Course;
use Laravel5App\Models\Semester;
use Laravel5App\Models\User;
use Validator;
use View;
use Request;
use Hash;

class GradeController extends Controller {

	//Laden
    public function getIndex()
    {
        $grades = Grade::paginate(15);
        $users = array();
        $courses = array();

        foreach($grades as $grade)
        {
            $users[$grade->user_id] = User::find($grade->user_id);
            $courses[$grade->course_id] = Course::find($grade->course_id);
        }
        return view('grades.index')->with('grades', $grades)->with('users', $users)->with('courses', $courses);
    }

    //Neue Note Anlegen
    public function getNew()
    {
    	$grade = new Grade();
        $courseArray = Course::orderBy('title', 'asc')->get();
        $courses = array('0' => '--- bitte wählen ---');
        foreach ($courseArray as $course)
        {
            $courses[$course->id] = $course->title;
        }
        $userArray = User::orderBy('lastname', 'asc')->get();
        $users = array('0' => '--- bitte wählen ---');
        foreach ($userArray as $user)
        {
            $users[$user->id] = $user->lastname.','.$user->firstname;
        }
        return view('grades.new')->with('grades', Grade::allGradesAsArray(true))->with('courses', $courses)->with('users', $users);
    }

    //Formula neu
    public function postNew()
    {
		$validator = Validator::make(Request::all(), Grade::$rules);

    	if ($validator->passes())
    	{
        	//erfolgreiche Anlegung
        	$grade = new Grade;
		    $grade->user_id = Request::input('user_id');
		    $grade->grade = Request::input('grade');
		    $grade->course_id = Request::input('course_id');
		    $grade->save();

		    return redirect('grades')->with('message', 'success|Note erfolgreich hinterlegt!');
    	}
    	else
    	{
        	//Fehlermeldung
        	return redirect('grades/new')->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
    	}
    }

    //Bearbeiten
    public function postEdit($id)
    {
        $grade = Grade::find($id);
        $rules = Grade::$rules;
        $rules['user_id'] = '';
        $rules['grade'] = '';
        $rules['course_id'] = '';
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->passes())
        {
            //Änderung erfolgreich
            $grade->user_id = Request::input('user_id');
		    $grade->grade = Request::input('grade');
		    $grade->course_id = Request::input('course_id');
            $grade->save();

            return redirect('grades/index')->with('message', 'success|Note erfolgreich gespeichert!');
        }
        else
        {
            //Fehlermeldung
            return redirect('grades/edit/'.$grade->id)->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
        }
    }

    //Bearbeiten
    public function getEdit($id = 0)
    {
        $grade= Grade::find($id);
        return view('grades.edit')->with('grade', $grade)->with('grades', Grade::allGradesAsArray(true));
    }

    //Löschen
    public function getDelete($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return redirect('grades/index')->with('message', 'success|Note wurde erfolgreich gelöscht!');
    }


 public function getShow($id=0)
    {
        $grade = Grade::find($id);

        return view('grades.show')->with('grade', $grade);
    }

}
