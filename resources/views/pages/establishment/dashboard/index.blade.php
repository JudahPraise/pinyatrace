@extends('pages.establishment.layouts.main')

@section('main')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 border p-0">
    <div class="row flex-column align-items-center">
        <h1>Establishment App</h1>
        <form action="{{ route('establishment.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
</div>
@endsection