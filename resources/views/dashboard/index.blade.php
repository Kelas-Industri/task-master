@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to ') . config('app.name') }}</div>

                    <div class="card-body">
                        <p>Welcome to {{ config('app.name') }}! This is a platform designed to help you manage your tasks effectively and efficiently. Whether you're working solo or in a team, Your App has all the features you need to stay organized and productive.</p>
                        <p>Get started by exploring the Task List to see all the tasks assigned to you, or navigate to My Task to manage your own tasks. You'll also receive notifications for important updates, and you can customize your profile to reflect your preferences and details.</p>
                        <p>We hope you enjoy using the application and find it useful for your daily tasks and projects. If you have any questions or feedback, feel free to reach out to us. Happy task managing!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
