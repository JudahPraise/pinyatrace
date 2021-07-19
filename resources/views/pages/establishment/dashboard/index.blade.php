@extends('pages.establishment.layouts.main')

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
    <div class="col-md-8">
      @component('components.top-areas', ['top' => $top, 'title' => 'Areas with high number of active cases'])@endcomponent
    </div>
    <div class="col-md-4">
      <div class="card w-100" id="card">
        <div class="card-header border-0 d-flex justify-content-between">
         <strong>Qr Code</strong>
         <label class="custom-toggle">
          <input type="checkbox" checked>
          <span class="custom-toggle-slider rounded-circle" id="switch" data-label-off="Out" data-label-on="In" data-checked="True"></span>
        </label>
        </div>
        <div class="row d-flex justify-content-center p-3" id="qrContainer">
          <div id="carouselExampleIndicators" class="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="visible-print text-center mb-3" id="target">
                  {!! QrCode::size(200)->generate(route('in', Auth::guard('establishment')->user()->id)); !!}
                </div>
              </div>
              <div class="carousel-item">
                <div class="visible-print text-center mb-3">
                  {!! QrCode::color(255, 0, 0)->size(200)->generate(route('out', Auth::guard('establishment')->user()->id)); !!}
                </div>
              </div>
          </div>
          <div class="row d-flex flex-column align-items-center">
            <strong>Scan Me</strong>
            <strong>{{ Carbon\Carbon::now()->format('D M, Y - h:m:s a') }}</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script>
    $(document).ready(function() {
      $('.carousel').carousel({
        interval: false,
      });
      $("#switch").click(function() {
        if ($(this).data("checked") == "True") {
          $(this).data("checked", 'False');
          $("#carouselExampleIndicators").carousel("next");
        } else if ($(this).data("checked") == 'False') {
          $(this).data("checked", 'True');
          $("#carouselExampleIndicators").carousel("prev");
        }
      });
    });
  </script>
  <!-- Core -->
  <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
   <!-- Argon JS -->
  <script src="{{ asset('argon/js/argon.js') }}"></script>
@endsection
