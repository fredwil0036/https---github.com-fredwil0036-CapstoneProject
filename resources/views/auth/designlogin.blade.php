<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
  <title>Login</title>
  
  <link rel="stylesheet" href="{{ asset('css/logindesign.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  @Vite('resources/css/app.css')
  <!-- Stylesheet -->
</head>
<body>
 
  
  <form method="POST" action="{{ route('login') }}" class="login-form">
      @csrf
      <h3>Login Here</h3>
 
      <x-input-label class="text-white" for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
      @if ($errors->has('errorses'))
    <div class="mt-2 p-2 border border-red-600 text-red-600 bg-red-100 rounded">
        {{ $errors->first('errorses') }}
    </div>
    @endif
     
      @if ($errors->has('errr'))
    <div class="mt-2 p-2 border border-red-600 text-red-600 bg-red-100 rounded">
        {{ $errors->first('errr') }}
    </div>
@endif

      <x-input-label class="text-white " for="password" :value="__('Password')" />
      <x-text-input id="password" class="block mt-1 w-full"
          type="password"
          name="password"
          required autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />

      <div class="flex items-center justify-between mt-4">
          @if (Route::has('password.request'))
              <a class="underline text-sm  text-white hover:text-gray-900" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
              </a>
          @endif

      </div>
      <x-primary-button class="w-40 h-12 flex justify-center items-center mx-auto ml-20 mt-10">
    {{ __('Log in') }}
</x-primary-button>
  </form>
</body>
</html>
