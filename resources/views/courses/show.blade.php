@extends('layouts.main')

@section('footer')
    <h1>Trololol</h1>
@stop


@section('content')
    <h2 class="heading">Kurs: {{ $course->title}} ({{ $course->semester->title }})</h2>
     <!--Erstelle Tabelle mit Studentennamen-->
     <div class="table-responsive">
     	<table class="table table-striped table-hover">
		    <h3 class="heading">Studenten</h3>
		    <tbody>
               
          
		        @foreach($course->grades as $grade)
		            <tr><td>{{ $grade->user->lastname }}, {{ $grade->user->firstname }}</td></tr>
		        @endforeach
		    </tbody>
		</table>
    </div>

{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"')) !!}
@stop


