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
        <a class="nav-link" href="{{ url('applicant/qualification') }}">
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">University</div>

                <div class="card-body">
                    <!--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!-->
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Programme name</th>
                                <th scope="col">University Name</th>
                                <th scope="col">Number of Applications</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <a href="{{url('#')}}">
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <th>{{$data->programmename}}</th>
                                <th>{{$data->Uni->UniName}}</th>
                                <th>{{$data->Apply->count()}}</th>
                                <th>
                                    <a href="{{url('applicant/programme/applay/'.$data->id)}}">
                                        applay
                                    </a>
                                </th>
                            </tr>
                            </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
