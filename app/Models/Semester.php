<?php namespace Laravel5App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel5App\Models\Course;
class Semester extends Model {

    /* Felder:
    id: int(11)
    title: varchar(255)
    startdate: date
    created_at: datetime
    updated_at: datetime
    deleted_at: datetime
    */


	public function grades()
    {
        return $this->hasMany('Laravel5App\Models\Grade');
    }

    //NEU, ein Semester hat viele Kurse! 
    public function courses()
    {
        return $this->hasMany('Laravel5App\Models\Course');
    }


	public static $rules = array(
	    'title'=>'required',
        'startdate' => 'date_format:Y-m-d|required'
    );

    public function deleteCascade()
    {
        //hier fehlte das GET sonst würden die Kurse nicht gelöscht werden
        $courses = Course::where('semester_id', '=', $this->id)->get();
    	foreach($courses as $course)
    	{
    		$course->deleteCascade();
    	}
    	$this->delete();
    }
}
