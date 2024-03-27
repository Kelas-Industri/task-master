@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Create Task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Employee -->
                            <div class="mb-3">
                                <label for="employee" class="form-label">{{ __('Employee') }}</label>
                                <select id="employee" class="form-select @error('employee') is-invalid @enderror" name="employee" required>
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->email }}" {{ old('employee') == $employee->email ? 'selected' : '' }}>
                                            {{ $employee->name }} ({{ $employee->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('employee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">{{ __('Category') }}</label>
                                <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Sub Category -->
                            <div class="mb-3">
                                <label for="sub_category" class="form-label">{{ __('Sub Category') }}</label>
                                <input id="sub_category" type="text" class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" value="{{ old('sub_category') }}" required>
                                @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <!-- Date Start -->
                                <div class="col-6">
                                    <label for="date_start" class="form-label">{{ __('Date Start') }}</label>
                                    <input id="date_start" type="date" class="form-control @error('date_start') is-invalid @enderror" name="date_start" value="{{ old('date_start') }}" required>
                                    @error('date_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Date End -->
                                <div class="col-6">
                                    <label for="date_end" class="form-label">{{ __('Date End') }}</label>
                                    <input id="date_end" type="date" class="form-control @error('date_end') is-invalid @enderror" name="date_end" value="{{ old('date_end') }}" required>
                                    @error('date_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Evidence -->
                            <div class="mb-5">
                                <label for="evidence" class="form-label">{{ __('Evidence') }}</label>
                                <input id="evidence" type="file" class="form-control @error('evidence') is-invalid @enderror" name="evidence">
                                @error('evidence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">{{ __('Create Task') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
