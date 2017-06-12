@extends('layouts.main')

@section('content')
{!! Form::model($course, array('url' => array('courses/edit', $course->id))) !!}
    <h2 class="form-signup-heading">Kurs bearbeiten</h2>
    <!--Ist beim Bearbeiten ein Fehler aufgetreten, erscheint unter der Überschrift eine Fehlermeldung-->
     {!! showMessageAndErrors(Session::get('message'), $errors->all()) !!}
 	
 	<!--Textfeld Name veränderbar-->
    {!! Form::label('title', 'Name') !!}
    {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Name')) !!}

    <!--Dropdown für die verfügbaren Semester-->
    {!! Form::hidden('semester_id', $course->semester_id) !!}
    {!! Form::label('semester_id', 'Semester') !!}
    {!! Form::select('semester_id', $semesters, '0', array('class'=>'form-control')) !!}

    <br/>
    <!--Ändern Button-->
    <center>{!! Form::submit('Ändern', array('class'=>'btn btn-success'))!!}</center>

{!! Form::close() !!}
<br/>
<!--Zurück Button-->
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop
