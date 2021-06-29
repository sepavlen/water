@extends('backend.layout.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            @if (isAdmin())
                <li>
                    <a href="{{ route('dashboard.users') }}">Пользователи</a>
                    <i class="fa fa-circle"></i>
                </li>
                @if($user->exists)
                    <li>Редактирование пользователя</li>
                @else
                    <li>Создание пользователя</li>
                @endif
            @else
                <li>Личный кабинет</li>
            @endif
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="portlet light bordered ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-user font-green"></i>
                            @if (isAdmin())
                                @if($user->exists)
                                    <span class="caption-subject font-green bold uppercase">Редактирование пользователя ({{ $user->name }})</span>
                                @else
                                    <span class="caption-subject font-green bold uppercase">Создание нового пользователя</span>
                                @endif
                            @else
                                <span class="caption-subject font-green bold uppercase">Мой кабинет</span>
                            @endif

                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert  alert-success" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                    <form action="@if ($user->exists){{ route('dashboard.user.update') }} @else {{ route('dashboard.user.create') }}@endif"
                          method="post" class="table table-responsive">
                        @csrf
                        <div class="form-group form-group-custom">
                            <label for="default" class="control-label">Имя пользователя:</label>
                            <input value="@if (old('name')){{old('name')}}@else{{$user->name}}@endif" name="name"
                                   type="text" class="form-control"
                                   placeholder="Имя">
                        </div>
                        <div class="form-group form-group-custom">
                            <label for="default" class="control-label"><span class="text-danger">*</span> Email </label>
                            <input name="email" type="email" class="form-control"
                                   value="@if (old('email')){{old('email')}}@else{{$user->email}}@endif"
                                   placeholder="Email">
                        </div>
                        @can('update', $user)
                            <div class="form-group form-group-custom custom-select">
                                <label class="control-label"><span class="text-danger">*</span> Статус </label>
                                <select name="status" class="bs-select form-control">
                                    <option @if($user->status == \App\User::STATUS_ACTIVE) selected
                                            @endif value="{{ \App\User::STATUS_ACTIVE }}">Активный
                                    </option>
                                    <option @if($user->status == \App\User::STATUS_BLOCKED) selected
                                            @endif value="{{ \App\User::STATUS_BLOCKED }}">Заблокирован
                                    </option>
                                </select>
                            </div>
                            <div class="form-group form-group-custom custom-select">
                                <label class="control-label"><span class="text-danger">*</span> Роль </label>
                                <select name="role" class="bs-select form-control">
                                    <option @if($user->role == \App\User::ROLE_ADMIN) selected
                                            @endif value="{{ \App\User::ROLE_ADMIN }}">Админ
                                    </option>
                                    <option @if($user->role == \App\User::ROLE_MANAGER) selected
                                            @endif value="{{ \App\User::ROLE_MANAGER }}">Менеджер
                                    </option>
                                    <option @if($user->role == \App\User::ROLE_PARTNER) selected
                                            @endif value="{{ \App\User::ROLE_PARTNER }}">Партнер
                                    </option>
                                    <option @if($user->role == \App\User::ROLE_GENERAL_PARTNER) selected
                                            @endif value="{{ \App\User::ROLE_GENERAL_PARTNER }}">Главный партнер
                                    </option>
                                </select>
                            </div>
                        @endcan

                        <div class="form-group form-group-custom custom-select">
                            <label for="default" class="control-label"><span class="text-danger">*</span> Пароль
                            </label>
                            <input name="password" type="password" class="form-control" placeholder="Пароль">
                        </div>
                        <div class="form-group form-group-custom custom-select">
                            <label for="default" class="control-label"><span class="text-danger">*</span> Подтвердите
                                пароль </label>
                            <input name="password_confirmation" type="password" class="form-control">
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="submit" value="@if ($user->exists) Редактировать @else Создать @endif"
                               class="btn btn-circle green btn-sm">
                    </form>
                </div>
            </div>
        </div>


@endsection
