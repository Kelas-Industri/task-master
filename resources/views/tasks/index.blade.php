@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tasks') }}</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Date Start</th>
                                        <th>Date End</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task['title'] }}</td>
                                            <td>{{ $task['category'] }}</td>
                                            <td>{{ $task['sub_category'] }}</td>
                                            <td>{{ $task['date_start']->format('Y-m-d') }}</td>
                                            <td>{{ $task['date_end']->format('Y-m-d') }}</td>
                                            <td>{{ $task['status'] }}</td>
                                            <td>{{ $task['created_at']->format('Y-m-d H:i:s') }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('task.show', ['task' => $task['id']]) }}" class="btn btn-sm me-1 btn-primary">View</a>
                                                <button class="btn btn-sm ms-1 btn-danger delete-task" data-id="{{ $task['id'] }}">Delete</button>
                                            </td>
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

@push('script')
    <script>
        // Handle delete task button click
        $(document).on('click', '.delete-task', function() {
            let taskId = $(this).data('id');

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    alert(`Delete data ID ${taskId}`)
                }
            });
        });
    </script>
@endpush
