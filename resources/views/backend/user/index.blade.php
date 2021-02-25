@extends('backend.layout.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Пользователи</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Список пользователей
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.user.create') }}" id="sample_editable_1_new" class="btn sbold green"> Добавить нового пользователя
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th> Имя пользователя</th>
                            <th> Email</th>
                            <th> Роль</th>
                            <th> Статус</th>
                            <th> Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($users)
                            @foreach($users as $user)
                                <tr class="odd gradeX">
                                    <td> {{ $user->name }}</td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com">{{ $user->email }} </a>
                                    </td>
                                    <td class="center"> {{ \App\src\helpers\UserHelper::getRole($user->role) }}</td>
                                    <td>
                                        {!! \App\src\helpers\UserHelper::getStatus($user->status) !!}
                                    </td>
                                    <td class="text-center custom-icons">
                                        <span class="fa fa-edit"> </span>
                                        <span class="fa fa-times"> </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
