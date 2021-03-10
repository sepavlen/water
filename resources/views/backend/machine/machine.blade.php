@extends('backend.layout.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Автоматы</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Список автоматов
    </h3>
    @if (session('success'))
        <div class="alert  alert-success" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            {{ session('errors') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn btn-group">
                                    <a href="{{ route('dashboard.machine.create') }}" id="sample_editable_1_new"
                                       class="btn custom_bth sbold green"> Добавить новый автомат
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($machines))
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
                            @foreach($machines as $machine)
                                <tr class="odd gradeX">
                                    <td> {{ $machine->name }}</td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com">{{ $machine->email }} </a>
                                    </td>
                                    <td class="center"> {{ \App\src\helpers\UserHelper::getRole($machine->role) }}</td>
                                    <td>
                                        {!! \App\src\helpers\UserHelper::getStatus($machine->status) !!}
                                    </td>
                                    <td class="text-center custom-icons">
                                        <a href="{{ route('dashboard.user.edit', ['id' => $machine->id]) }}"><span
                                                    class="fa fa-edit"> </span></a>
                                        <a href="{{ route('dashboard.user.delete', ['id' => $machine->id]) }}"
                                           onclick="return confirm('Вы уверены?')"><span
                                                    class="fa fa-times"> </span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        Нет автоматов!
                    @endif
                </div>
            </div>
        </div>
@endsection
