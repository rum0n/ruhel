@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br><br>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('students.create') }}" class="btn btn-lg btn-block btn-primary">Enter Student</a>
                        </div>

                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('students.index') }}" class="btn btn-lg btn-block btn-primary">All Student</a>
                        </div>
                    </div>


                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
