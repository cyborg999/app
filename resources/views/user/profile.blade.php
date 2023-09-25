@extends("layouts.inventorydashboard")
@section('title', 'Profile')
@section('page', 'profile')
@section("content")
  <div class="container">
    <div class="row">
        <h1 class="h1">Profile</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="row">
        <div class="col">
            <form action="/profile/update" class="form" method="post">
                @csrf
                <div class="row mb-3">    
                    <label for="">Firstname:
                        <input type="text" class="form-control" value="{{ isset($profile->firstname) ? $profile->firstname : old('firstname') }}" name="firstname"/>
                    </label>
                </div>
                <div class="row mb-3">
                    <label for="">Lastname:
                        <input type="text" class="form-control" value="{{ isset($profile->lastname) ? $profile->lastname : old('lastname') }}" name="lastname"/>
                    </label>
                </div>
                <div class="row mb-3">
                    <label for="">Mobile #:
                        <input type="text" class="form-control" value="{{ isset($profile->mobile) ? $profile->mobile : old('mobile') }}" name="mobile"/>
                    </label>
                </div>
                <div class="row mb-3">
                    <label for="">Address:
                        <input type="text" class="form-control" value="{{ isset($profile->address) ? $profile->address : old('address') }}" name="address"/>
                    </label>
                </div>
                <div class="row mb-3">
                    <label for="">Date of Birth:
                        <input type="date" class="form-control" value="{{ isset($profile->dob) ? $profile->dob : old('dob') }}" name="dob"/>
                    </label>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-lg btn-success" value="Update">
                </div>
            </form>
        </div>
    </div>
  </div>
@stop
  </body>
</html>