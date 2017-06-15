<div class="table-responsive">
    <table class="table table-striped data-tables">
        <thead>
        <tr>
            <th>{{ trans('content.name') }}</th>
            <th>{{ trans('content.short_key') }}</th>
            <th>{{ trans('content.credit_hour') }}</th>
            <th>{{ trans('content.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->short_key }}</td>
                <td>{{ $subject->credit_hour }}</td>

                <td class="centralized-text">
                    <a href="{{ route('subject.edit', [$subject->id]) }}" class="no-text-decoration" title="{{ trans('content.edit_subject') }}">
                        <i class="fa fa-lg fa-pencil"></i>
                    </a>
                    <a href="{{ route('subject.destroy', [$subject->id]) }}" class="no-text-decoration" title="{{ trans('content.delete_subject') }}">
                        <i class="fa fa-lg fa-trash"></i>
                        {{ method_field('DELETE') }}
                    </a>

                    <a href="{{ route('subject.show', [$subject->id]) }}" class="no-text-decoration" title="{{ trans('content.view_detail') }}">
                        <i class="fa fa-lg fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

