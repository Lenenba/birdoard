@extends('layouts.app')

@section('content')

<div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shwadow">
   
        <h1 class="text-2xl font-normal mb-10 text-center"
        >
        LOGIN PAGE
        </h1>

        <form action="{{ route('login') }}"
            method="POST" 
        >
        @csrf
            <div class="field mb-6">
                <label for="email" class="lable text-sm mb-2 block">{{ __('E-Mail Address') }}</label>
                <div class="control">

                    <input  id="email" type="email" 
                            class="input bg-transparent border border-gray-100 rounded p-2 text-xs w-full" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required autocomplete="email" 
                            placeholder="entrer votre address email"
                            autofocus>  
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
            </div>  
            <div class="field mb-6">
                <label for="password" class="lable text-sm mb-2 block">{{ __('Password') }}</label>
                <div class="control">

                    <input  id="password" type="password" 
                            class="input bg-transparent border border-gray-100 rounded p-2 text-xs w-full" 
                            name="password" 
                            value="{{ old('password') }}" 
                            required autocomplete="password" 
                            placeholder="entrer votre mot de passe"
                            autofocus>  
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
            </div>    
                      <div class="field mb-6">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

            <div class="field text-center">
                    <div class="control">
                    <button type="submit"  class="buttonV is-link mr-6">Login</button>

                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif
                    </div>
            </div>       
         
        
        </form>

    </div>
@endsection
