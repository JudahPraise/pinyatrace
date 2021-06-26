@extends('pages.resident.layouts.main')

@section('main')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 border p-0">
    <div class="row flex-column align-items-center">
        <h1>Resident App</h1>
        <h2>{{ Auth::user()->name }}</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
</div>
@endsection