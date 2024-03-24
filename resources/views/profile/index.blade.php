@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        <form method="POST" action="#">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="Arif Niwang" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="arif.niwang@test.com" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
