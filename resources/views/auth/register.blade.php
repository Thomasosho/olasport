<x-guest-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
              <div class="d-flex flex-row align-items-center justify-content-start">
                <div><img src="{{asset('images/logo_2.png')}}" alt=""></div>
              </div>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone number')" />

                <x-input id="phone" class="block mt-1 w-full form-control" type="tel" name="phone" :value="old('phone')" required />
            </div>

            <script>
                $("input[name=phone").on("blur", function(e){
                    var myval = $(this).val();
                
                    if(myval.length < 11) {
                        alert("Value must contain 11 characters.");
                        $(this).focus();
                    }
                });
            </script>

            <script>
                jQuery(document).ready(function($){
                    $("input[name=phone]").attr("maxlength", "11");
                });
            </script>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
