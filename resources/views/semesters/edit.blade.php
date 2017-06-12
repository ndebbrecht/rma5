@extends('layouts.main')

@section('content')
{!! Form::model($semester, array('url' => array('semesters/edit', $semester->id))) !!}
    <h2 class="form-signup-heading">Semester bearbeiten</h2>
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
    <center>{!! Form::submit('Ändern', array('class'=>'btn btn-success'))!!}</center> <!--btn btn-large btn-primary btn-block-->
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop
