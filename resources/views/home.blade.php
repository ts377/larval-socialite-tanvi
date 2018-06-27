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


@php(
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
$userSocial = Socialite::driver('facebook')->stateless()->user();
                        dd($userSocial);)
                    <div>You are logged in!</div>
                  @endphp
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
