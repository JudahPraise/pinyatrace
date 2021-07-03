@extends('pages.resident.layouts.main')

@section('css')
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css') }}" type="text/css">
@endsection

@section('main')
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 94.5vh; width: 100%">
    <div id="qr-reader" style="width:600px; margin-bottom: 6rem"></div>
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
                "qr-reader", { fps: 15, qrbox: 250, disableFlip: true, aspectRatio: 1.0 });
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