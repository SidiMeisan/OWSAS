@extends('layouts.app')

@section('rightNav')
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Programme<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ url('programme/home') }}">
            {{ __('Programme') }}
        </a>
        <a class="nav-link" href="{{ url('programme/form') }}">
            {{ __('Add Programme') }}
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
                <div class="card-header">{{ __('Regis Programme') }}</div>

                <div class="card-body">
                    <form method="POST" action="/programme/store">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name of the Programme') }}</label>

                            <div class="col-md-6">
				                <input id="name" type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
					                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <input id="uniId" name="uniId" value="{{$UniId->university_id}}" type="hidden">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" 
                                class="col-md-4 col-form-label text-md-right">
                                {{ __('Description') }}
                            </label>

                            <div class="col-md-6">
                                <input id="desc" type="text" 
                                    class="form-control @error('desc') is-invalid @enderror" 
                                    name="desc" value="{{ old('desc') }}" required autocomplete="desc" autofocus>

                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" 
                                class="col-md-4 col-form-label text-md-right">
                                {{ __('Closing Date') }}
                            </label>

                            <div class="col-md-6">
                                <input id="date" type="date" 
                                    class="form-control @error('date') is-invalid @enderror" 
                                    name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
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
