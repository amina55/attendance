@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <tbody>
                            @foreach($sections as $section)
                                <tr>
                                    <th>{{ $section->identifier }}</th>
                                    <td><a href="{{ route('student.index', [$section->id]) }}">Students</a></td>
                                    <td><a href="{{ route('subject.index', [$section->id]) }}">Subjects</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
