@extends('auth.layout')

@section('content')
    <div class="content">

        <form class="login-form" action="{{ route('login') }}" method="post">
            @csrf
            <h3 class="form-title font-green">{{ __('Login') }}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">{{ __('E-Mail Address') }}</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                       placeholder="Email" value="{{ old('email') }}" name="email"/>
            </div>

            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix  is-invalid  "  type="password" autocomplete="off"
                       placeholder="Password" name="password"/>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Login</button>
                <label class="rememberme check">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>Remember </label>

            </div>

        </form>

    </div>
@endsection

