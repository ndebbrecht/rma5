<?php namespace Laravel5App\Http\Controllers;

use Laravel5App\Models\Grade;
use Laravel5App\Models\Course;
use Laravel5App\Models\User;
use Laravel5App\Models\Semester;
use Validator;
use View;
use Request;
use Hash;

class SemesterController extends Controller {
	
	 //Index
    public function getIndex()
    {
    	$semesters = Semester::paginate(15);
        return view('semesters.index')->with('semesters', $semesters);
    }

    //Neues Semester
    public function getNew()
    {
    	$semester = new Semester();
        return view('semesters.new')->with('semester', $semester);
    }

    //Formularauswertung
    public function postNew()
    {
		$validator = Validator::make(Request::all(), Semester::$rules);
 
    	if ($validator->passes()) 
    	{
        	//Erfolgreiche Anlegung
        	$semester = new Semester;
		    $semester->title = Request::input('title');
		    $semester->startdate = Request::input('startdate');
		    $semester->save();
		 
		    return redirect('semesters')->with('message', 'success|Semester erfolgreich angelegt!');
    	} 
    	else 
    	{
        	//Fehlermeldung   
        	return redirect('semesters/new')->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
    	}
    }

    //Bearbeiten
    public function postEdit($id)
    {
        $semester = Semester::find($id);
        $rules = Semester::$rules;
        $rules['title'] = '';
        $rules['startdate'] = '';
        $validator = Validator::make(Request::all(), $rules);
 
        if ($validator->passes()) 
        {
            //Erfolgreich
            
            $semester->title = Request::input('title');
            $semester->startdate = Request::input('startdate');
            $semester->save();
         
            return redirect('semesters/index')->with('message', 'success|Semester wurde erfolgreich gespeichert!');
        } 
        else 
        {
            //Fehlermeldung  
            return redirect('semesters/edit/'.$semester->id)->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
        }
    }

    //Bearbeiten
    public function getEdit($id = 0)
    {
        $semester = Semester::find($id);
        return view('semesters.edit')->with('semester', $semester);
    }


    //course Array fuellen damit man es aufrufen kann bei der Detailansicht
      //Anzeigen
    public function getShow($id = 0)
    {
        $semester = Semester::find($id);
        $courseArray = Course::orderBy('title','asc')->get();
        foreach($courseArray as $course)
        {
            $courses[$course->id] = $course->title;
        }
        return view('semesters.show')->with('semester', $semester)->with('courses', $courses);
    }

    //Löschen
    public function getDelete($id)
    {
        $semester = Semester::find($id);
        $semester->deleteCascade();
        return redirect('semesters/index')->with('message', 'success|Semester wurde erfolgreich gelöscht!');
    }

}
