<div class="table-responsive">
    <table class="table table-striped data-tables">
        <thead>
        <tr>
            <th>{{ trans('content.name') }}</th>
            <th>{{ trans('content.unique_name') }}</th>
            <th>{{ trans('content.phone_no') }}</th>
            <th>{{ trans('content.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->unique_name }}</td>
                <td>{{ $teacher->phone_no }}</td>

                <td class="centralized-text">
                    <a href="{{ route('teacher.edit', [$teacher->id]) }}" class="no-text-decoration" title="{{ trans('content.edit_teacher') }}">
                        <i class="fa fa-lg fa-pencil"></i>
                    </a>
                    <a href="{{ route('teacher.destroy', [$teacher->id]) }}" class="no-text-decoration" title="{{ trans('content.delete_teacher') }}">
                        <i class="fa fa-lg fa-trash"></i>
                    </a>

                    <a href="{{ route('teacher.show', [$teacher->id]) }}" class="no-text-decoration" title="{{ trans('content.view_detail') }}">
                        <i class="fa fa-lg fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

