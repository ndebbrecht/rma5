<?php namespace Laravel5App\Http\Controllers;

use Laravel5App\Models\User;
use Laravel5App\Models\Course;
use Laravel5App\Models\Semester;
use Laravel5App\Models\Grade;
use Validator;
use View;
use Request;
use Hash;
use DB;

class CourseController extends Controller {

		public function getIndex()
    {
        $courses = Course::paginate(10);
        //jeder angelegter Kurs kommt in ein Array für das jeweilige Semester
        $semesters= array();
        //Für jeden Kurs wird die zugehörige Semester_ID ermittelt
        foreach($courses as $course)
        {
            $semesters[$course->semester_id]= Semester::find($course->semester_id);
        }
        //Ausgegeben wird der Kurs und das Semester in der index.blade.php datei
        return view('courses.index')->with('courses', $courses)->with('semesters', $semesters);
    }

    //Neuer Kurs
    public function getNew()
    {
        //Neuen Kurs anlegen
        $course = new Course();
        //Semester auswählen im Dropdown
        $semesterArray = Semester::orderBy('title','asc')->get();
        $semesters = array('0' => '--- bitte wählen ---');
        foreach($semesterArray as $semester)
        {
            $semesters[$semester->id] = $semester->title;
        }
        return view('courses.new')->with('course', $course)->with('semesters',$semesters);
    }

    //Formularauswertung
    public function postNew()
    {
        $validator = Validator::make(Request::all(), Course::$rules);
 
        $course = Course::where('title', '=', Request::input('title'))->where('semester_id', '=', Request::input('semester_id'))->get();
        if(count($course) > 0)
        {
            return redirect('courses/new/')->with('message', 'danger|Dieser Kurs lieg bereits für dieses Semester vor.')->withInput();
        }else if ($validator->passes()) 
        {
            //Student speichern
            $course = new Course;
            $course->title = Request::input('title');
            $course->semester_id = Request::input('semester_id');
            $course->deleted_at = null;
            $course->save();
         
            return redirect('courses/index')->with('message', 'success|Kurs erfolgreich angelegt!');
        } 
        else 
        {
            // Fehler Meldung bei falschen Angaben
            return redirect('courses/new/')->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
        }
    }


    //edit-Action (Formularauswertung)
    public function postEdit($id)
    {
        $course = Course::find($id);
        $rules = Course::$rules;
        $rules['title'] = '';
        $rules['semester_id'] = '';
 
        $validator = Validator::make(Request::all(), $rules);
 
        if ($validator->passes()) 
        {
            // Erfolgreiche Änderung
            
            $course->title = Request::input('title');
            $course->semester_id = Request::input('semester_id');
            $course->save();
         
            return redirect('courses/index')->with('message', 'success|Kurs wurde erfolgreich gespeichert!');
        } 
        else 
        {
            // Fehlermeldung  
            return redirect('courses/edit/'.$courses->id)->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
        }
    }

    // Bearbeiten
    public function getEdit($id = 0)
    {
        $course = Course::find($id);
        $semesterArray = Semester::orderBy('title', 'asc')->get();
        $semesters = array('0' => '--- bitte wählen ---');
        foreach($semesterArray as $semester)
        {
            $semesters[$semester->id] = $semester->title;
        }
        return view('courses.edit')->with('course', $course)->with('semesters', $semesters);
        
    }

    //Anzeigen
    public function getShow($id = 0)
    {
        $course = Course::find($id);
        return view('courses.show')->with('course', $course);
    }

    //Löschen
    public function getDelete($id)
    {
        $course = Course::find($id);
        $course->deleteCascade();
        return redirect('courses/index')->with('message', 'success|Kurs wurde erfolgreich gelöscht!');
    }


}
