@extends('layouts.app')

@section('rightNav')

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('/') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Application<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ url('/') }}">
            {{ __('Application') }}
        </a>
        <a class="nav-link" href="{{ url('applicant/programme') }}">
            {{ __('Applay') }}
        </a>
    </div>
</li>


<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('/') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Quallification<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ url('/') }}">
            {{ __('Quallification') }}
        </a>
        <a class="nav-link" href="{{ url('/') }}">
            {{ __('Qualification Obtain') }}
        </a>
    </div>
</li>

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('/') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Result<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ url('applicant/result') }}">
            {{ __('Result') }}
        </a>
        <a class="nav-link" href="{{ url('applicant/result/Form') }}">
            {{ __('Result form') }}
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
                <div class="card-header">{{ __('Regis Subject') }}</div>

                <div class="card-body">
                    <form method="POST" action="/applicant/ResultProg">
                        @csrf
                        <div class="form-group row">
                            <label for="Subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <select name="Subject"
                                    class="form-control" name="Subject">
                                    @foreach ($data as $p)
                                    <option value="{{$p->id}}">{{$p->subjectName}}</option>
                                    @endforeach
                                </select>


                                @error('typeScore')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Score') }}</label>

                            <div class="col-md-6">
                                <input id="score" type="text" 
                                    class="form-control @error('score') is-invalid @enderror" 
                                    name="score" value="{{ old('score') }}" required autocomplete="score" autofocus>

                                @error('score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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
