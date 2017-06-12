@extends('layouts.main')

@section('content')
{!! Form::open(array('url'=>'semesters/new', 'class'=>'form-signup')) !!}
    <h2 class="form-signup-heading">Semester hinzufügen</h2>
    <!--Fehlermeldung-->
    {!! showMessageAndErrors(Session::get('message'), $errors->all()) !!}
 
    {!! Form::label('title', 'Name') !!}
    {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Name')) !!}
    {!! Form::label('startdate', 'Start') !!}
    <div class="input-group date datetimepicker"  data-date-format="YYYY-MM-DD">
    {!! Form::text('startdate', null, array('class'=>'form-control', 'placeholder'=>'Start')) !!}          
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <br/>
   <center> {!! Form::submit('Speichern', array('class'=>'btn btn-success'))!!}</center>
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop