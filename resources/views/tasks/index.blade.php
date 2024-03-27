@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Tasks') }}

                        @if (auth()->user()->role == 'Manager')
                            <a href="{{ route('task.create') }}" class="btn btn-sm btn-success">Create Task</a>
                        @endif
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        @if (auth()->user()->role == 'Manager')
                                            <th>Employee</th>
                                        @endif
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Date Start</th>
                                        <th>Date End</th>
                                        <th>Evidence</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            @if (auth()->user()->role == 'Manager')
                                                <td>{{ $task->employeeDetail->name }}</td>
                                            @endif
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->category }}</td>
                                            <td>{{ $task->sub_category }}</td>
                                            <td>{{ $task->date_start }}</td>
                                            <td>{{ $task->date_end }}</td>
                                            <td>
                                                @if ($task->evidence)
                                                    <a href="{{ url($task->evidence) }}" target="_blank">
                                                        Dokumen {{ $task->title }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $task->status }}</td>
                                            <td>{{ $task->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('task.show', ['task' => $task->id]) }}" class="btn btn-sm me-1 btn-primary">View</a>
                                                @if (auth()->user()->role == 'Manager')
                                                    <button class="btn btn-sm ms-1 btn-danger delete-task" data-id="{{ $task->id }}">Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if (count($tasks) == 0)
                                        <tr>
                                            <td colspan="9" class="text-center bg-dark text-white">Data empty</td>
                                        </tr>
                                    @endif
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
        @if (auth()->user()->role == 'Manager')
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
                        axios.delete(`{{ route('task.index') }}/${taskId}`).then(response => {
                            location.reload();
                        }).catch(error => {
                            console.error(error);
                        });
                    }
                });
            });
        @endif
    </script>
@endpush
