@extends('layouts.main')

@section('footer')
	<h1>FOOTER!!!</h1>
@stop

@section('content')
    <h2>Noten</h2>
    <div class="table-responsive">
	    <table class="table table-striped table-hover">
	    	<thead>
	    		<tr>
		    		<th>Student</th>
		    		<th>Kurs</th>
		    		<th>Note</th>
		    		<th width="10%">Bearbeiten</th>
		    		<th width="5%">Löschen</th>
		    		<th width="5%">Ansehen</th>		    				    		
		    	</tr>
	    	</thead>
	    	<tbody>
	    @foreach($grades as $grade)
		    	<tr>
		        	<td>{!! $users[$grade->user_id]->lastname !!}, {!! $users[$grade->user_id]->firstname !!}</td>
					<td>{!! $courses[$grade->course_id]->title !!}</td>
					<td>{!! $grade->grade !!}</td>

		        	<td><div class="btn-group">{!! Html::link('/grades/edit/'.$grade->id, 'Bearbeiten', array('class'=>'btn btn-success')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/grades/delete/'.$grade->id, 'Löschen', array('class'=>'btn btn-success', 'onClick'=>'return confirm(\'Wirklich löschen?\);')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/grades/show/'.$grade->id, 'Ansehen', array('class'=>'btn btn-success')) !!}</div></td>
		        </tr>
	    @endforeach
	    	</tbody>
	   	</table>
	</div>
	{!! $grades->render() !!}
	<br/>
	

	{!! Html::link('grades/new', 'Hinzufügen', array('class' => 'btn btn-success'))!!}
	{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop