@extends('backend.layout.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('dashboard.machine') }}">Автоматы</a>
                <i class="fa fa-circle"></i>
            </li>
            @if($machine->exists)
                <li>Редактирование автомата</li>
            @else
                <li>Создание автомата</li>
            @endif
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="portlet light bordered ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cog font-green"></i>
                            @if($machine->exists)
                                <span class="caption-subject font-green bold uppercase">Редактирование автомата ({{ $machine->unique_number }})</span>
                            @else
                                <span class="caption-subject font-green bold uppercase">Создание нового автомата</span>
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
                    {{ Form::model($machine, [
                        'route' => [ $machine->exists ? 'dashboard.machine.update' : 'dashboard.machine.create', $machine->id],
                        'class' => 'table table-responsive'
                    ]) }}
                    <div class="form-group form-group-custom">
                        {{ Form::label('unique_number', 'Уникальный номер:', ['class' => 'control-label']) }}
                        {{ Form::text('unique_number', $machine->unique_number, [
                            'class' => 'form-control',
                            'placeholder' => '#123123',
                            ]) }}
                    </div>
                    <div class="form-group form-group-custom">
                        {{ Form::label('address', 'Адрес:', ['class' => 'control-label']) }}
                        {{ Form::text('address', $machine->address, [
                            'class' => 'form-control',
                            'placeholder' => 'Адрес',
                        ]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('user_id', 'Владелец:', ['class' => 'control-label']) }}
                        {{ Form::select('user_id', \App\src\helpers\UserHelper::convertForSelect($users), null, [
                                'class' => 'form-control form-control-max-content',
                        ]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('price', 'Цена:', ['class' => 'control-label']) }}
                        {{ Form::number('price', $machine->price, ['class' => 'form-control', 'placeholder' => 'Цена',]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('status', 'Статус:', ['class' => 'control-label']) }}
                        {{ Form::select('status', [
                            \App\src\entities\Machine::STATUS_ACTIVE => 'Активный',
                            \App\src\entities\Machine::STATUS_BLOCKED => 'Заблокирован',
                        ], $machine->status, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('water_up', 'Верхний уровень (в литрах):', ['class' => 'control-label']) }}
                        {{ Form::number('water_up', $machine->water_up, ['class' => 'form-control', 'placeholder' => '',]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('water_down', 'Нижний уровень (в литрах):', ['class' => 'control-label']) }}
                        {{ Form::number('water_down', $machine->water_up, ['class' => 'form-control', 'placeholder' => '',]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('max_banknotes', 'Максимум купюр:', ['class' => 'control-label']) }}
                        {{ Form::number('max_banknotes', $machine->max_banknotes, ['class' => 'form-control', 'placeholder' => '',]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('max_coins', 'Максимум монет:', ['class' => 'control-label']) }}
                        {{ Form::number('max_coins', $machine->max_coins, ['class' => 'form-control', 'placeholder' => '',]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('timing_connect', 'Выход на связь: (в минутах)', ['class' => 'control-label']) }}
                        {{ Form::number('timing_connect', $machine->timing_connect, ['class' => 'form-control', 'placeholder' => '',]) }}
                    </div>
                    <div class="form-group form-group-custom custom-select">
                        {{ Form::label('calibration', 'Калибровка:', ['class' => 'control-label']) }}
                        {{ Form::number('calibration', $machine->calibration, ['class' => 'form-control', 'placeholder' => '',]) }}
                    </div>
                    <br>
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Дополнительная информация</span>
                        </div>
                    </div>

                    {{ Form::close() }}</div>
            </div>
        </div>


@endsection
