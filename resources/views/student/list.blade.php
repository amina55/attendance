<div class="table-responsive">
    <table class="table table-striped data-tables">
        <thead>
        <tr>
            <th>{{ trans('content.name') }}</th>
            <th>{{ trans('content.roll_no') }}</th>
            <th>{{ trans('content.enroll_no') }}</th>
            <th>{{ trans('content.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->roll_no }}</td>
                <td>{{ $student->enroll_no }}</td>

                <td class="centralized-text">
                    <a href="{{ route('student.edit', [$student->id]) }}" class="no-text-decoration" title="{{ trans('content.edit_student') }}">
                        <i class="fa fa-lg fa-pencil"></i>
                    </a>
                    <a href="{{ route('student.destroy', [$student->id]) }}" class="no-text-decoration" title="{{ trans('content.delete_student') }}">
                        <i class="fa fa-lg fa-trash"></i>
                        {{ method_field('DELETE') }}
                    </a>

                    <a href="{{ route('student.show', [$student->id]) }}" class="no-text-decoration" title="{{ trans('content.view_detail') }}">
                        <i class="fa fa-lg fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

