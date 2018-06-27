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

                        <?php

                        use Illuminate\View\Compilers\BladeCompiler;
                        use Socialite;
                        use App\User;
                        use Illuminate\Support\Facades\Auth;
                        use Illuminate\Support\Facades\Hash;

                        class NewBladeCompiler extends BladeCompiler
                        {
                            use AuthenticatesUsers;



                            /**
                             * Get the echo methods in the proper order for compilation.
                             *
                             * @return array
*/
                            function getEchoMethods()
                            {


                             $userSocial = Socialite::driver('facebook')->stateless()->user();
                            dd($userSocial);
                             }
                            /**
                            $methods = [
                                    'compileRawEchos'     => strlen(stripcslashes($this->rawTags[0])),
                                    'compileEscapedEchos' => strlen(stripcslashes($this->escapedTags[0])),
                                    'compileRegularEchos' => strlen(stripcslashes($this->contentTags[0])),
                                    'compilePhpEchos'     => strlen(stripcslashes("@{"))
                                ];

                                uksort($methods, function ($method1, $method2) use ($methods) {
                                    // Ensure the longest tags are processed first
                                    if( $methods[$method1] > $methods[$method2] )
                                    {
                                        return -1;
                                    }
                                    if( $methods[$method1] < $methods[$method2] )
                                    {
                                        return 1;
                                    }
                                    // Otherwise give preference to raw tags (assuming they've overridden)
                                    if( $method1 === 'compilePhpEchos' )
                                    {
                                        return -1;
                                    }
                                    if( $method2 === 'compilePhpEchos' )
                                    {
                                        return 1;
                                    }
                                    if( $method1 === 'compileRawEchos' )
                                    {
                                        return -1;
                                    }
                                    if( $method2 === 'compileRawEchos' )
                                    {
                                        return 1;
                                    }
                                    if( $method1 === 'compileEscapedEchos' )
                                    {
                                        return -1;
                                    }
                                    if( $method2 === 'compileEscapedEchos' )
                                    {
                                        return 1;
                                    }
                                });

                                return $methods;
                            }
                              */



                        }

                        ?>

















                    You are logged in!

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
