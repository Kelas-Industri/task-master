@extends('layouts.app')

@push('style')
    <style>
        body {
            background: pink;
        }
    </style>
@endpush

@section('content')
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            alert('test')
        })
    </script>
@endpush
