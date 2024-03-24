@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Password</div>

                    <div class="card-body">
                        <form method="POST" action="#">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input id="current_password" type="password" class="form-control" name="current_password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
