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



















                    You are logged in!
                        {{ nl2br(e('   Your Name:   ')) }}
                       {{ Auth::user()->name}}
                        {{ nl2br(e('   Your Email ID:  ')) }}
                        {{ Auth::user()->email }}
                        {{ nl2br(e('Your Facebook Avatar: ')) }}
                        {{ Auth::user()->avatar }}
                        {{ nl2br(e('Your Facebook Profile: ')) }}
                        {{ Auth::user()->facebook_profile }}
                        <img src="{{ Auth::user()->avatar_url }}" alt="Facebook Avatar" height="64" width="64">





                </div>


            </div>
        </div>
    </div>
</div>
@endsection
