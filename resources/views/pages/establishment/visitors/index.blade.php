@extends('pages.establishment.layouts.main')

@section('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css') }}" type="text/css">
@endsection

@section('main')
<div class="container-fluid p-4">
    <div class="row w-100 m-0">
      <div class="card w-100">
        <div class="card-header border-0">
          <div class="row align-items-center justify-content-between px-2">
            <h3 class="mb-0">Visitors</h3>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr class="border" style="color: black">
                <th>Name</th>
                <th>Date</th>
                <th>In</th>
                <th>Out</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($visitors as $visitor)
                <tr class="{{ $visitor->out === null ? 'bg-gradient-success text-white' : 'border'}}" style="color: black;"> 
                    <td>{{ $visitor->res_name }}</td>
                    <td>{{ Carbon\Carbon::parse($visitor->date)->format('M, d Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($visitor->in)->format('h:m a') }}</td>
                    <td>{{ $visitor->out === null ? 'Still inside' : Carbon\Carbon::parse($visitor->out)->format('h:m a') }}</td>
                </tr>
              @empty
                <tr>
                  <td class="text-center" colspan="4">You do not have schedule</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row w-100 d-flex justify-content-center">
        {{ $visitors->links() }}
      </div>
  </div>
@endsection

@section('js')
  <!-- Core -->
  <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
   <!-- Argon JS -->
  <script src="{{ asset('argon/js/argon.js') }}"></script>
@endsection