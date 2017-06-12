@extends('layouts.main')

@section('footer')
	<h1>FOOTER!!!</h1>
@stop

@section('content')
    <h2>Kurse</h2>
    <!-- Erstelle eine Tabelle--> 
    <div class="table-responsive">
	    <table class="table table-striped table-hover">
	    	<thead>
	    		<tr>
		    		<th>Name</th>
		    		<th>Semester</th>
		    		<th width="10%">Bearbeiten</th>
		    		<th width="5%">Löschen</th>
		    		<th width="5%">Ansehen</th>	
		    	</tr>
	    	</thead>
	    	<tbody>
	    @foreach($courses as $course)
	 
		    	<tr>
		    		<!--Für jeden Kurstitel und dem zugehörigen Semesternamen-->
		        	<td>{!! $course->title !!}</td>
		        	<td>{!! $semesters[$course->semester_id]->title !!}</td>
		        	
		        	<!--Buttons zum Bearbeiten-->
		        	<td><div class="btn-group">{!! Html::link('/courses/edit/'.$course->id, 'Bearbeiten', array('class'=>'btn btn-success')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/courses/delete/'.$course->id, 'Löschen', array('class'=>'btn btn-success', 'onClick'=>'return confirm(\'Wirklich löschen?\');')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/courses/show/'.$course->id, 'Ansehen', array('class'=>'btn btn-success')) !!}</div></td>
		        </tr>
	    @endforeach
	    	</tbody>
	   	</table>
	</div>
	{!! $courses->render() !!}
	<br/>
	

	{!! Html::link('courses/new', 'Hinzufügen', array('class' => 'btn btn-success'))!!}
	{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop