@extends('pages.resident.layouts.main')

@section('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css') }}" type="text/css">
@endsection

@section('main')

<div class="container-fluid mt-3">
  <div class="row d-flex justify-content-center">
    @if (session('message'))
      <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  </div>
  <div class="row">
    <div class="card shadow-none w-100 m-3">
      <div class="row d-flex justify-content-center p-2">
        <a href="#">
          <img src="{{ asset('argon/img/theme/team-4.jpg') }}" class="rounded-circle" height="200" width="200">
        </a>
      </div>
      <div class="card-body pt-0">
        <form action="{{ route('profile.store') }}" method="POST">
          @csrf
          <h6 class="heading-small text-muted mb-4 text-center">Personal information</h6>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="first_name">First name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="middle_name">Middle name</label>
              <input type="text" class="form-control" id="middle_name" name="middle_name"  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="surname">Last name</label>
              <input type="text" class="form-control" id="surname" name="surname" required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dob">Date of birth</label>
              <input type="date" class="form-control" id="dob" name="dob" required>
              <div class="invalid-tooltip">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="age">Age</label>
              <input type="text" class="form-control" id="age" name="age" required>
              <div class="invalid-tooltip">
                Please provide a valid zip.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="sex">Sex</label>
              <select class="custom-select" id="sex" name="sex" required>
                <option selected disabled value="">Choose...</option>
                <option>Male</option>
                <option>Female</option>
              </select>
              <div class="invalid-tooltip">
                Please select a valid state.
              </div>
            </div>
          </div>
          <h6 class="heading-small text-muted mb-4 text-center">Contact information</h6>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="address">Street</label>
              <input type="text" class="form-control" id="address" name="street" required>
            </div>
            <div class="col-md-4 mb3">
              <label for="address">Barangay</label>
              <select class="form-control" id="address" name="barangay">
                @foreach ($barangays as $barangay)
                  <option>{{ $barangay->barangay }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="address">Minicipality and Province</label>
              <input type="text" class="form-control" id="barangay" name="city"  required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="cp_number">Cellphone number</label>
              <input type="text" class="form-control" id="cp_number" name="cp_number" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cp_number">Telephone number</label>
              <input type="text" class="form-control" id="cp_number" name="tel_number"  required>
            </div>
          </div>
          <h6 class="heading-small text-muted mb-4 text-center">Emergency Contact</h6>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="emergency_contact">Name</label>
              <input type="text" class="form-control" id="emergency_contact" name="emergency_contact"  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="relationship">Relationship</label>
              <select class="custom-select" id="relationship" name="relationship" required>
                <option selected disabled value="">Choose...</option>
                <option>Wife</option>
                <option>Child</option>
                <option>Mother</option>
                <option>Father</option>
                <option>Relative</option>
                <option>Neighbor</option>
              </select>
              <div class="invalid-tooltip">
                Please select a valid state.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="cp_number">Cellphone number</label>
              <input type="text" class="form-control" id="cp_number" name="ec_cp_number"  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
          </div>
          <button class="btn btn-primary" type="submit" value="Submit Form">Submit form</button>
        </form>
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

