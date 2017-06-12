@extends('layouts.main')

@section('footer')
	<h1>FOOTER!!!</h1>
@stop

@section('content')
    <h2>Semester</h2>
    <div class="table-responsive">
	    <table class="table table-striped table-hover">
	    	<thead>
	    		<tr>
		    		<th>Titel</th>
		    		<th>Start</th>
		    		<th width="10%">Bearbeiten</th>
		    		<th width="5%">Löschen</th>
		    		<th width="5%">Ansehen</th>	
		    	</tr>
	    	</thead>
	    	<tbody>
	    @foreach($semesters as $semester)
		    	<tr>
		        	<td>{!! $semester->title !!}</td>
		        	<td>{!! $semester->startdate !!}</td>
		        
		        	<td><div class="btn-group">{!! Html::link('/semesters/edit/'.$semester->id, 'Bearbeiten', array('class'=>'btn btn-success')) !!}</div></td>		        	
		        	<td><div class="btn-group">{!! Html::link('/semesters/delete/'.$semester->id, 'Löschen', array('class'=>'btn btn-success', 'onClick'=>'return confirm(\'Wirklich löschen?\');')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/semesters/show/'.$semester->id, 'Ansehen', array('class'=>'btn btn-success')) !!}</div></td>

		        </tr>
	    @endforeach
	    	</tbody>
	   	</table>
	</div>
	{!! $semesters->render() !!}
	<br/>
	

	{!! Html::link('semesters/new', 'Hinzufügen', array('class' => 'btn btn-success'))!!}
	{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop