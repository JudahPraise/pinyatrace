@extends('pages.resident.layouts.main')

@section('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css') }}" type="text/css">
@endsection

@section('main')
<div class="container-fluid pt-3">
  @component('components.covid-updates', 
  ['active' => $active, 'recovered' => $recovered, 'mortality' => $mortality, 'total' => $total])
  @endcomponent
  <div class="row">
    <div class="col-md-4 order-md-5">
      <h3>Number of active cases in your area</h3>
      <div class="card w-100 p-5 mt-2" id="card">
        <div class="row d-flex flex-column align-items-center">
          <h1>{{ 'Brgy.'.' '.Auth::user()->profile->barangay }}</h1>
          <h2 style="font-size: 5rem; font-weight: bold;">{{ $residentArea->count }}</h2>
          <strong>{{ Carbon\Carbon::now()->format('D M, Y - h:m:s a') }}</strong>
        </div>
      </div>
    </div>
    <div class="col-md-8 order-md-0">
      @component('components.top-areas', ['top' => $top, 'title' => 'Areas with high number of active cases'])@endcomponent
    </div>
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