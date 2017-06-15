@extends('layouts.app')

<?php $semesters = [1,2,3,4,5,6,7,8] ?>
@section('content')
<div class="container">
    <div class="row">
       <table class="table">
           <thead>
                <th>Semesters</th>
                <th>Subjects</th>
                <th colspan="2">Students</th>
           </thead>
           @foreach($semesters as $semester)
           <tr>
               <th>
                   Semester{{ $semester}}
               </th>
               <td>
                   <a title="Subjects of Semester" href="{{ route('subject.list', [$semester]) }}">Subjects</a>
               </td>
               <td>
                   <a title="Students of Section A" href="{{ route('student.list', [$semester, 'A']) }}">Section A</a>
               </td>
               <td>
                   <a title="Students of Section B" href="{{ route('student.list', [$semester, 'B']) }}">Section B</a>
               </td>
           </tr>
           @endforeach
       </table>
    </div>
</div>
@endsection
