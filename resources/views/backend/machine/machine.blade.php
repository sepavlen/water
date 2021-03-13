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
                @if (count($machines))
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
                    <table  class="table table-striped table-bordered table-hover order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th> Действие</th>
                            <th> Владелец</th>
                            <th> Номер автомата</th>
                            <th> Адрес</th>
                            <th> Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($machines as $machine)
                            <tr class="odd gradeX">
                                <td class="text-center custom-icons">
                                    <a href="{{ route('dashboard.machine.delete', ['machine' => $machine->id]) }}"
                                       onclick="return confirm('Вы уверены?')"><span
                                                class="fa fa-times"> </span></a>
                                    <a href="{{ route('dashboard.machine.edit', ['machine' => $machine->id]) }}"><span
                                                class="fa fa-edit"> </span></a>
                                </td>
                                <td> {{ $machine->user->email }} ({{ $machine->user->name }})</td>
                                <td>{{ $machine->unique_number }}</td>
                                <td>{{ $machine->address }}</td>
                                <td>
                                    {!! \App\src\helpers\MachineHelper::getStatus($machine->status) !!}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>                </div>
                @else
                    Нет автоматов!
                @endif
            </div>
        </div>
@endsection
