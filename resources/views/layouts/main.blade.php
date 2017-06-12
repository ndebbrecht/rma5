<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Studentenverwaltung</title>
	<!-- Latest compiled and minified CSS -->
	{!! Html::style('css/bootstrap.min.css') !!}
	{!! Html::style('css/bootstrap-theme.min.css') !!}
	{!! Html::style('css/bootstrap.datetimepicker.css') !!}
	{!! Html::style('css/style.css') !!}
	{!! Html::style('css/creative.css') !!}
	{!! Html::script('js/moment.js') !!}
	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/bootstrap.datetimepicker.js') !!}
	{!! Html::script('js/bootstrap.datetimepicker-de.js') !!}
	<script>
		$(document).ready(function() {
		      $('.datetimepicker').datetimepicker({
		          language: 'de',
		          pickTime: false,
		          format: 'yyyy-mm-DD'
		      });
		  });
	</script>
</head>
<body>
	<div class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {!! Html::link('/', 'Studentenverwaltung', array('class'=>'navbar-brand')) !!}
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
			<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Studenten <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            {!! cleverLink('users/index', 'Liste') !!}
	            {!! cleverLink('users/new', 'Hinzufügen') !!}
	          </ul>

	        </li>

	       	<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Noten <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            {!! cleverLink('grades/index', 'Liste') !!}
	            {!! cleverLink('grades/new', 'Hinzufügen') !!}
	          </ul>

	        </li>

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kurse <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            {!! cleverLink('courses/index', 'Liste') !!}
	            {!! cleverLink('courses/new', 'Hinzufügen') !!}
	          </ul>

	        </li>

	       <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Semester <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            {!! cleverLink('semesters/index', 'Liste') !!}
	            {!! cleverLink('semesters/new', 'Hinzufügen') !!}
	          </ul>

	        </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>
