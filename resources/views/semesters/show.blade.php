@extends('layouts.main')

@section('footer')
    <h1>HAHA</h1>
@stop


@section('content')
    <h2 class="heading">{{ $semester->title }}</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>Semester-Titel</td>
                    <td>{!! $semester->title !!}</td>
                </tr>
                <tr>
                    <td>Startdatum</td>
                    <td>{{ date('d.m.Y', strtotime($semester->startdate)) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h2 class="heading">Kurse</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
    
            <thead>
                
            </thead>
            <tbody>
                    @foreach($semester->courses as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    

{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"')) !!}
@stop
