@extends('layouts.main')

@section('footer')
	<h1>FOOTER!!!</h1>
@stop

@section('content')


    <h2>Studenten</h2>
    <div class="table-responsive">
	    <table class="table table-striped table-hover">
	    	<thead>
	    		<tr>
		    		<th>Name</th>
		    		<th>Vorname</th>
		    		<th>Geburtsdatum</th>
		    		<th>Noten</th>
		    		<th width="10%">Note hinzufügen</th>
		    		<th width="10%">Bearbeiten</th>
		    		<th width="5%">Löschen</th>
		    		<th width="5%">Ansehen</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    @foreach($users as $user)
		    	<tr>
		        	<td>{!! $user->lastname !!}</td>
		        	<td>{!! $user->firstname !!}</td>
		        	<td>{!! date("d.m.Y", strtotime($user->birthdate)) !!}</td>
		        	<td>@foreach($user->grades as $grade)
		        			{!! $grade->course->title !!}: {!! $grade->grade !!}<br/>
		        		@endforeach
								@if ($user->getAverageGrade())
								{!! $user->getAverageGrade()!!}
							@else
									Keine Noten vergeben
								@endif
							</td>
		        	<td><div class="btn-group">{!! Html::link('/users/addgrade/'.$user->id, 'Note hinzufügen', array('class'=>'btn btn-success')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/users/edit/'.$user->id, 'Bearbeiten', array('class'=>'btn btn-success')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/users/delete/'.$user->id, 'Löschen', array('class'=>'btn btn-success', 'onClick'=>'return confirm(\'Wirklich löschen?\');')) !!}</div></td>
		        	<td><div class="btn-group">{!! Html::link('/users/show/'.$user->id, 'Ansehen', array('class'=>'btn btn-success')) !!}</div></td>
		        </tr>
	    @endforeach
	    	</tbody>
	   	</table>
	</div>
	{!! $users->render() !!}
	<br/>



	{!! Html::link('users/new', 'Hinzufügen', array('class' => 'btn btn-success'))!!}
	{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"'))!!}
@stop
