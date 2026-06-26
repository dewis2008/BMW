@extends('layouts.admin')

@section('title', 'Admin Login | R&S Auto Works')

@section('content')
    <section class="login-panel" aria-labelledby="login-heading">
        <div>
            <p class="eyebrow">Protected area</p>
            <h1 id="login-heading">Admin login</h1>
            <p>Sign in to view and manage R&S Auto Works enquiries.</p>
        </div>

        <form method="post" action="{{ route('admin.login.store') }}" class="admin-form">
            @csrf

            <div class="field">
                <label for="email">Email <span class="required-marker" aria-hidden="true">*</span></label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                @error('email')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password <span class="required-marker" aria-hidden="true">*</span></label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>
                @error('password')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <label class="checkbox-field">
                <input type="checkbox" name="remember" value="1">
                <span>Remember this device</span>
            </label>

            <button class="button button-primary" type="submit">Log in</button>
        </form>
    </section>
@endsection
