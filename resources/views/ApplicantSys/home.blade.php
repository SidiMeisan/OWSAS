@extends('layouts.app')

@section('rightNav')
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('university/home'') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{{ isset(Auth::user()->name) ? Auth::user()->name}}} <span class="caret"></span>
    </a>


    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Qualification Obtain</div>

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
                                <th scope="col">Qualification</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($qua as $p)
                            <tr>
                                <th>{{$p->qulificationName}}</th>
                                <td>#</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Application</div>

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
                                <th scope="col">Programme Name</th>
                                <th scope="col">University Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Applay as $p)
                            <tr>
                                <th>{{$p->programmename}}</th>
                                <th>{{$p->description}}</th>
                                <th>{{$p->UniName}}</th>
                                <th>{{$p->closingdate}}</th>
                                <td>#</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
