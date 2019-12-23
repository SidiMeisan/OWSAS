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
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('/') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Subject<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ url('admin/subject') }}">
            {{ __('Subject') }}
        </a>
        <a class="nav-link" href="{{ url('admin/subject/form') }}">
            {{ __('Add Subject') }}
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
                <div class="card-header">{{ __('Add Qualification') }}</div>

                <div class="card-body">
                    <form method="POST" action="/QuaAdmin/Edit">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" 
                                    class="form-control" 
                                    name="name" value="{{ $data->qulificationName }}" required autocomplete="name" autofocus>
                                <input id="IDEdit" name="IDEdit" value="{{$edit->id}}" type="hidden">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="minscore" class="col-md-4 col-form-label text-md-right">{{ __('Minimum Score') }}</label>

                            <div class="col-md-6">
                                <input id="minscore" type="text" 
                                    class="form-control " 
                                    name="minscore" value="{{ $data->minimumScore }}" required autocomplete="minscore" autofocus>

                                @error('minscore')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maxscore" class="col-md-4 col-form-label text-md-right">{{ __('Maximum Score') }}</label>

                            <div class="col-md-6">
                                <input id="maxscore" type="text" 
                                    class="form-control" 
                                    name="maxscore" value="{{ $data->maximumScore }}" required autocomplete="maxscore" autofocus>

                                @error('maxscore')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pscore" class="col-md-4 col-form-label text-md-right">{{ __('Posible Score (Grade List)') }}</label>

                            <div class="col-md-6">
                                <textarea id="pscore" type="text" 
                                    class="form-control" 
                                    name="pscore" value="{{ $data->gradelist }}" required autocomplete="pscore" autofocus>
                                </textarea>
                                @error('pscore')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Rule" class="col-md-4 col-form-label text-md-right">{{ __('Calculate overall score') }}</label>

                            <div class="col-md-6">
                                <textarea id="Rule" type="text" 
                                    class="form-control" 
                                    name="Rule" value="{{ $data->resultCalcDescription }}" required autocomplete="Rule" autofocus>
                                </textarea>
                                @error('Rule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('New Qualification') }}
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
