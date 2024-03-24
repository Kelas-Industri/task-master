@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Task Details') }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="card-title">{{ $task['title'] }}</h5>
                            <p class="card-text"><strong>Description:</strong> {{ $task['description'] }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $task['category'] }}</p>
                            <p class="card-text"><strong>Sub Category:</strong> {{ $task['sub_category'] }}</p>
                            <p class="card-text"><strong>Evidence:</strong> {{ $task['evidence']['filename'] }}</p>
                            <p class="card-text"><strong>Date Start:</strong> {{ $task['date_start']->format('Y-m-d') }}</p>
                            <p class="card-text"><strong>Date End:</strong> {{ $task['date_end']->format('Y-m-d') }}</p>
                        </div>

                        <div class="mb-3">
                            <h5 class="card-title">History Progress</h5>
                            <ul class="list-group">
                                @foreach ($historyProgress as $progress)
                                    <li class="list-group-item">{{ $progress['description'] }} - {{ $progress['created_at']->format('Y-m-d H:i:s') }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div>
                            <h5 class="card-title">History Approvals</h5>
                            <ul class="list-group">
                                @foreach ($historyApprovals as $approval)
                                    <li class="list-group-item">{{ $approval['status'] }} - {{ $approval['created_at']->format('Y-m-d H:i:s') }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
