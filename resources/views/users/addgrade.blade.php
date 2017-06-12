@extends('layouts.main')

@section('content')
{!! Form::open(array('url'=>'users/addgrade', 'class'=>'form-signup')) !!}
    <h2 class="form-signup-heading">Note hinzufügen</h2>
    {!! showMessageAndErrors(Session::get('message'), $errors->all()) !!}
 
    {!! Form::hidden('user_id', $user->id) !!}
    {!! Form::label('course_id', 'Kurs') !!}
    {!! Form::select('course_id', $courses, '0', array('class'=>'form-control')) !!}
    {!! Form::label('grade', 'Note') !!}
    {!! Form::select('grade', $grades, '0', array('class'=>'form-control', 'placeholder'=>'Note')) !!}
    <br/>
    {!! Form::submit('Speichern', array('class'=>'btn btn-success'))!!}
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop