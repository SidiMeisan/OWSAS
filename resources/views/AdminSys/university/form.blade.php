@extends('layouts.app')

@section('rightNav')
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('university/home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        University<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ url('admin/home') }}">
            {{ __('University') }}
        </a>
        <a class="nav-link" href="{{ url('admin/university/form') }}">
            {{ __('Add University') }}
        </a>
    </div>
</li>


<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('university/home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Quallification<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ url('admin/qualification') }}">
            {{ __('Quallification') }}
        </a>
        <a class="nav-link" href="{{ url('admin/qualification/form') }}">
            {{ __('Add Quallification') }}
        </a>
    </div>
</li>

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
                <div class="card-header">{{ __('Regis university') }}</div>

                <div class="card-body">
                    <form method="POST" action="/university/store">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name of the University') }}</label>

                            <div class="col-md-6">
				                <input id="name" type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
					                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('New University') }}
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
