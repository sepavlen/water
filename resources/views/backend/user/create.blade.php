@extends('backend.layout.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('dashboard.users') }}">Пользователи</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>Создание пользователя</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="portlet light bordered ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-user font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Создание нового пользователя</span>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="col-sm-12">
                            <div class="alert  alert-success" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
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
                    <form action="{{ route('dashboard.user.create') }}" method="post" class="table table-responsive">
                        @csrf
                        <div class="form-group form-group-custom">
                            <label for="default" class="control-label">Имя пользователя:</label>
                            <input value="{{old('name')}}" name="name" type="text" class="form-control"
                                   placeholder="Имя">
                        </div>
                        <div class="form-group form-group-custom">
                            <label for="default" class="control-label"><span class="text-danger">*</span> Email </label>
                            <input name="email" type="email" class="form-control" value="{{old('email')}}"
                                   placeholder="Email">
                        </div>
                        <div class="form-group form-group-custom custom-select">
                            <label class="control-label"><span class="text-danger">*</span> Статус </label>
                            <select name="status" class="bs-select form-control">
                                <option value="{{ \App\User::STATUS_ACTIVE }}">Активный</option>
                                <option value="{{ \App\User::STATUS_BLOCKED }}">Заблокирован</option>
                            </select>
                        </div>
                        <div class="form-group form-group-custom custom-select">
                            <label class="control-label"><span class="text-danger">*</span> Роль </label>
                            <select name="role" class="bs-select form-control">
                                <option value="{{ \App\User::ROLE_ADMIN }}">Админ</option>
                                <option value="{{ \App\User::ROLE_MANAGER }}">Менеджер</option>
                            </select>
                        </div>
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
                        <input type="submit" value="Создать" class="btn btn-circle green btn-sm">
                    </form>
                </div>
            </div>
        </div>


@endsection
