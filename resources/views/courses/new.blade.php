@extends('layouts.main')

@section('content')
{!! Form::open(array('url'=>'courses/new', 'class'=>'form-signup')) !!}
	<h2 class="form-signup-heading">Kurs hinzufügen</h2>
	<!--Ist beim Erstellen etwas faslch ausgefüllt worden, erscheint eine Fehlermeldung-->
    {!! showMessageAndErrors(Session::get('message'), $errors->all()) !!}

    {!! Form::label('title', 'Name') !!}
    {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Name')) !!}

   	{!! Form::label('semester_id', 'Semester') !!}
    {!! Form::select('semester_id', $semesters, '0', array('class'=>'form-control')) !!}
    
     <br/>
    <center>{!! Form::submit('Speichern', array('class'=>'btn btn-success'))!!}</center>
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop
