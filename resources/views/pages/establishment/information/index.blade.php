@extends('pages.establishment.layouts.main')

@section('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css') }}" type="text/css">
@endsection

@section('main')
<div class="container-fluid mt-3">
  @component('components.alert')@endcomponent
  <div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        <div class="row d-flex justify-content-center pt-3">
          <a href="#">
            <img src="{{  asset('argon/img/theme/team-4.jpg')  }}" class="rounded-circle" height="200" width="200">
          </a>
        </div>
        <div class="card-body pt-3">
          <div class="text-center mb-3">
            @if ($company === null)
              <h5 class="h3">
                {{ Auth::guard('establishment')->user()->name }}
              </h5>
              <div class="h5 font-weight-300">
                {{ Auth::guard('establishment')->user()->email }}
              </div>
            @else
              <h5 class="h3">
                {{ $company->information->company_name }}
              </h5>
              <div class="h5 font-weight-300">
                {{ $company->information->company_address }}
              </div>
              <h1 class="p-3" style="font-size: 4rem">{{ $company->information->acronym }}</h1>
              <div class="mt-3">
                <h5 class="h3">
                  {{ $company->information->cp_number.' '.'|'.' '.$company->information->tel_number }}
                </h5>
                <div class="h5 font-weight-300">
                  {{ Auth::guard('establishment')->user()->email }}
                </div>
              </div>
            @endif
          </div>
          <div class="row d-flex flex-column align-items-center justify-content-center">
            <div class="visible-print text-center mb-3">
              {!! QrCode::size(200)->generate(route('redirect')); !!}
            </div>
            <h3>Your company QR code</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card w-100">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Company Information</h3>
            </div>
            <div class="col-4 text-right">
              <button type="submit" value="Submit Value" class="btn btn-sm btn-primary" onclick="document.getElementById('updateForm').submit()">Update</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('information.update', Auth::guard('establishment')->user()->id) }}" id="updateForm" method="POST">
            @method('PUT')
            @csrf
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="first_name">Company name</label>
                <input type="text" class="form-control" id="first_name" name="company_name" value="{{ $company->information->company_name }}" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="company_address">Address</label>
                <input type="txt" class="form-control" id="company_address" name="company_address" value="{{ $company->information->company_address }}" required>
                <div class="invalid-tooltip">
                  Please provide a valid city.
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="cp_number">Cellphone</label>
                <input type="txt" class="form-control" id="cp_number" name="cp_number" value="{{ $company->information->cp_number }}" required>
                <div class="invalid-tooltip">
                  Please provide a valid city.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="tel_number">Telephone</label>
                <input type="txt" class="form-control" id="tel_number" name="tel_number" value="{{ $company->information->tel_number }}" required>
                <div class="invalid-tooltip">
                  Please provide a valid city.
                </div>
              </div>
            </div>
            <h6 class="heading-small text-muted mb-4 text-center">Representative</h6>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $company->representative->name }}"  required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ $company->representative->position }}"  required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $company->representative->address }}"  required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="cp_number">Email</label>
                <input type="text" class="form-control" id="cp_number" name="email" value="{{ $company->representative->email }}"  required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cp_number">Cellphone number</label>
                <input type="text" class="form-control" id="cp_number" name="number" value="{{ $company->representative->number }}"  required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
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

