@extends('layouts.layout')

@section('content')
    <div>
        <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase bg-white">
            {{ __('Login') }}
        </div>

        <form method="POST" action="{{ route('login') }}" class="bg-gray-100">
            @csrf

            <div class="px-6 pt-6">
                <label for="email" class="block text-gray-700 text-sm font-bold">{{ __('E-mail Address') }}</label>
                <input id="email" type="email"
                       class="form-input mt-1 block w-full @error('email') border-red-500 @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="text-red-500 text-xs">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="px-6 py-6">
                <label for="password" class="block text-gray-700 text-sm font-bold">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="form-input mt-1 block w-full @error('password') border-red-500 @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                <span class="text-red-500 text-xs">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="border-t p-6 bg-white">
                <div class="flex justify-between items-center">
                    <button type="submit" class="button-blue">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
