@extends('pages.resident.layouts.main')

@section('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css') }}" type="text/css">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection

@section('main')
<div class="container-fluid mt-3">
  @component('components.alert')@endcomponent
  <div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        <div class="row d-flex justify-content-center pt-3">
          
        </div>
        <div class="card-body p-0 pb-4">
          <div class="d-flex flex-column justify-content-center align-items-center">
            <div id="qr-reader" style="width:500px"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card w-100">
        <div class="card-body">
         
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
<script type="text/javascript">
     function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete"
        || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);
                window.open(`${decodedText}`, '_newtab');
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250, disableFlip: false,  aspectRatio: 1.333334 });
        html5QrcodeScanner.render(onScanSuccess);
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
