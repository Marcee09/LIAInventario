{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <!--
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                -->

                <x-button class="ms-4" type="button" onclick="location.href='{{ route('register') }}'">
                    {{ __('Registrarse') }}
                </x-button>

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #1a237e;
            --primary-hover: #4F46E5;
            --background-color: #F9FAFB;
            --card-background: #FFFFFF;
            --text-primary: #111827;
            --text-secondary: #6B7280;
            --success-color: #10B981;
            --dark-bg: #1F2937;
            --dark-card: #374151;
            --dark-text: #E5E7EB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background-color: var(--background-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .dark body {
            background-color: var(--dark-bg);
            color: var(--dark-text);
        }

        .auth-card {
            background-color: rgb(195, 192, 204);
            border-radius: 1rem;
            border-color: #1a237e;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 28rem;
            padding: 2rem;
            animation: fadeIn 0.5s ease-out;
        }

        .dark .auth-card {
            background-color: var(--dark-card);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .logo {
            width: 64px;
            height: 64px;
            background-color: var(--primary-color);
            border-radius: 1rem;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .status-message {
            background-color: #ECFDF5;
            color: var(--success-color);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .dark .status-message {
            background-color: rgba(16, 185, 129, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            color: var(--text-primary);
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .dark label {
            color: var(--dark-text);
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.5rem;
            font-size: 1rem;
            color: var(--text-primary);
            background-color: white;
            transition: all 0.2s ease;
        }

        .dark input[type="email"],
        .dark input[type="password"] {
            background-color: var(--dark-bg);
            border-color: #4B5563;
            color: var(--dark-text);
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .checkbox {
            width: 1rem;
            height: 1rem;
            border-radius: 0.25rem;
            border: 1px solid #D1D5DB;
            margin-right: 0.5rem;
            cursor: pointer;
        }

        .dark .checkbox {
            border-color: #4B5563;
        }

        .checkbox:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .remember-text {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .dark .remember-text {
            color: var(--dark-text);
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .button {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .button:active {
            transform: translateY(0);
        }

        .link {
            color: var(--text-secondary);
            text-decoration: underline;
            font-size: 0.875rem;
            transition: color 0.2s ease;
        }

        .dark .link {
            color: var(--dark-text);
        }

        .link:hover {
            color: var(--text-primary);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 640px) {
            .auth-card {
                padding: 1.5rem;
            }

            .button-container {
                flex-direction: column;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="logo-container">
            <img src="images/Kairos-EXACTAS-corel.svg" alt="Logo" class="h-14 w-auto mb-3 ml-8 mt-3">
        </div>

        <div class="status-message" style="display: none;">
            <!-- Status message will be shown here -->
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="Enter your email"
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="Enter your password"
                >
            </div>

            <div class="checkbox-container">
                <input 
                    type="checkbox" 
                    id="remember_me" 
                    name="remember"
                    class="checkbox"
                >
                <label for="remember_me" class="remember-text">
                    Remember me
                </label>
            </div>

            <div class="button-container">
                <button type="button" class="button" onclick="location.href='{{ route('register') }}'">
                    Register
                </button>
                <button type="submit" class="button">
                    Log in
                </button>
            </div>
        </form>
    </div>
</body>
</html>