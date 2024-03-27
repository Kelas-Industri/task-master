@component('mail::message')
    # You have new task

    Please complete the task.

    @component('mail::button', ['url' => route('task.show', ['task' => $task])])
        Visit our website
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
