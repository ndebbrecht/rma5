@extends('layouts.main')

@section('content')
{!! Form::model($grade, array('url' => array('grades/edit', $grade->id))) !!}
    <h2 class="form-signup-heading">Note bearbeiten</h2>
    <!--Ist ein Fehler aufgetreten wird er hier aufgeführt.-->
    {!! showMessageAndErrors(Session::get('message'), $errors->all()) !!}

 	<!-- nur Note bearbeiten lassen -->
    {!! Form::hidden('user_id', $grade->user_id) !!}
    {!! Form::hidden('course_id', $grade->course_id) !!}
  	{!! Form::label('grade', 'Note') !!}
    {!! Form::select('grade', $grades, '0', array('class'=>'form-control')) !!}

    <br/>
    <center>{!! Form::submit('Ändern', array('class'=>'btn btn-success'))!!}</center>
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop
