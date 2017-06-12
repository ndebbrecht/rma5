@extends('layouts.main')

@section('footer')
    <h1>Nyehehe</h1>
@stop


@section('content')
    <h2 class="heading">Note von {{ $grade->user->lastname}}, {{ $grade->user->firstname }} (ID {{ $grade->user_id }})</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>Kurs</td>
                    <td>{!! $grade->course->title !!}</td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td>{!! $grade->grade !!}</td>
                </tr>
            </tbody>
        </table>
    </div>

{!! Html::link('#', 'Zurück', array('class' => 'btn btn-success', 'onClick="javascript:history.back();return false;"')) !!}
@stop
