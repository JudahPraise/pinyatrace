@extends('pages.resident.layouts.main')

@section('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css') }}" type="text/css">
@endsection

@section('main')
<div class="container-fluid mt-3">
  @component('components.alert')@endcomponent
  <div class="row">
    <div class="card shadow-none w-100 m-3">
      <div class="card-header mb-2">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Profile</h3>
          </div>
          <div class="col-4 text-right">
            <button type="submit" value="Submit Form" class="btn btn-sm btn-primary" onclick="document.getElementById('updateForm').submit()">Update</a>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center p-2 mb-2">
        <a href="#">
          <img src="{{ asset('argon/img/theme/team-4.jpg') }}" class="rounded-circle" height="200" width="200">
        </a>
      </div>
      <div class="card-body pt-0">
        <form action="{{ route('profile.update', Auth::user()->id) }}" id="updateForm" method="POST">
          @method('PUT')
          @csrf
          <h6 class="heading-small text-muted mb-4 text-center">Personal information</h6>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="first_name">First name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $resident->profile->first_name }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="middle_name">Middle name</label>
              <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $resident->profile->middle_name }}"  required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="surname">Last name</label> 
              <input type="text" class="form-control" id="surname" name="surname" value="{{ $resident->profile->surname }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="dob">Date of birth</label>
              <input type="date" class="form-control" id="dob" name="dob" value="{{ $resident->profile->dob }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="age">Age</label>
              <input type="text" class="form-control" id="age" name="age" value="{{ $resident->profile->age }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="sex">Sex</label>
              <select class="custom-select" id="sex" name="sex" required>
                <option class="{{ $resident->profile->sex === 'Male' ? 'selected' : ''}}">Male</option>
                <option class="{{ $resident->profile->sex === 'Female' ? 'selected' : ''}}">Female</option>
              </select>
            </div>
          </div>
          <h6 class="heading-small text-muted mb-4 text-center">Contact information</h6>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="address">Street</label>
              <input type="text" class="form-control" id="address" name="street" value="{{ $resident->profile->street }}"  required>
            </div>
            <div class="col-md-4 mb3">
              <label for="address">Barangay</label>
              <select class="form-control" id="address" name="barangay">
                @foreach ($barangays as $barangay)
                  <option {{ $barangay->barangay === $resident->profile->barangay ? 'selected' : '' }}>{{ $barangay->barangay }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="address">Minicipality and Province</label>
              <input type="text" class="form-control" id="barangay" name="city" value="{{ $resident->profile->city }}"  required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="cp_number">Cellphone number</label>
              <input type="text" class="form-control" id="cp_number" name="cp_number" value="{{ $resident->profile->cp_number }}"  required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cp_number">Telephone number</label>
              <input type="text" class="form-control" id="cp_number" name="tel_number" value="{{ $resident->profile->tel_number }}"  required>
            </div>
          </div>
          <h6 class="heading-small text-muted mb-4 text-center">Emergency Contact</h6>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="emergency_contact">Name</label>
              <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="{{ $resident->contact->emergency_contact }}"  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="relationship">Relationship</label>
              <select class="custom-select" id="relationship" name="relationship" required>
                <option class="{{ $resident->contact->relationship === 'Wife' ? 'selected' : '' }}">Wife</option>
                <option class="{{ $resident->contact->relationship === 'Child' ? 'selected' : '' }}">Child</option>
                <option class="{{ $resident->contact->relationship === 'Mother' ? 'selected' : '' }}">Mother</option>
                <option class="{{ $resident->contact->relationship === 'Father' ? 'selected' : '' }}">Father</option>
                <option class="{{ $resident->contact->relationship === 'Relative' ? 'selected' : '' }}">Relative</option>
                <option class="{{ $resident->contact->relationship === 'Neighbor' ? 'selected' : '' }}">Neighbor</option>
              </select>
              <div class="invalid-tooltip">
                Please select a valid state.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="cp_number">Cellphone number</label>
              <input type="text" class="form-control" id="cp_number" name="ec_cp_number" value="{{ $resident->contact->ec_cp_number }}"  required>
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

