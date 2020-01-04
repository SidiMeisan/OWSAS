@extends('layouts.app')

@section('rightNav')
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('university/home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{Auth::user()->name}}<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ url('logout') }}">
            {{ __('Logout') }}
        </a>
    </div>
</li>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/applicant/store">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="IDType" class="col-md-4 col-form-label text-md-right">{{ __('ID Type') }}</label>

                            <div class="col-md-6">
                                
                                <select name="IDType"
                                    class="form-control" name="IDNumber">
                                    <option value="MyKad">MyKad</option>
                                    <option value="passport">passport</option>
                                </select>

                                @error('IDType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="IDNumber," class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                            <div class="col-md-6">
                                <input id="IDNumber" type="text" 
                                    class="form-control @error('IDNumber') is-invalid @enderror" 
                                    name="IDNumber" value="{{ old('IDNumber') }}" required autocomplete="IDNumber" autofocus>

                                @error('IDNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="MNumber," class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="MNumber" type="text" 
                                    class="form-control @error('MNumber') is-invalid @enderror" 
                                    name="MNumber" value="{{ old('MNumber') }}" required autocomplete="MNumber" autofocus>

                                @error('MNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DOB," class="col-md-4 col-form-label text-md-right">{{ __('Date of Berth') }}</label>

                            <div class="col-md-6">
                                <input id="DOB" type="Date" 
                                    class="form-control @error('DOB') is-invalid @enderror" 
                                    name="DOB" value="{{ old('DOB') }}" required autocomplete="DOB" autofocus>

                                @error('DOB')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<a href="/home"></a>
