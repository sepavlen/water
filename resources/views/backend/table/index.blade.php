@extends('backend.layout.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                Таблицы
            </li>
        </ul>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-table font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Таблицы</span>
            </div>
        </div>
        <div class="portlet-body">
            @if ($machines)
                <ul class="nav nav-pills">
                    <li class="active">
                        <a href="#tab_2_1" data-toggle="tab"> Выход на связь </a>
                    </li>
                    <li>
                        <a href="#tab_2_2" data-toggle="tab"> Статистика </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_2_1">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Тайминг выхода на связь </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Номер автомата</th>
                                            <th>Статус</th>
                                            <th>Адрес</th>
                                            <th>Время выхода на связь</th>
                                            <th class="none">Описание проблемы</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($machines as $machine)
                                                <tr>
                                                    <td>{{ $machine->unique_number }}</td>
                                                    <td>{!! \App\src\helpers\MachineHelper::getStatusForTable($machine, $errors) !!}</td>
                                                    @if (isDriver())
                                                        <td>{{ $machine->address_full }}</td>
                                                    @else
                                                        <td>{{ $machine->address }}</td>
                                                    @endif
                                                    <td>{{ $machine->contact_time }}</td>
                                                    <td>
                                                        @foreach(\App\src\helpers\MachineHelper::getProblems($machine, $errors) as $problem)
                                                            {!! $problem  !!}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_2_2">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Функционал по логистике </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="statistics_table" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Адрес</th>
                                            <th>Остаток воды (л)</th>
                                            <th>Продажи за сегодня</th>
                                            <th>Продажи за вчера</th>
                                            <th>Среднесуточные продажи за 30 дней</th>
                                            <th>Номер автомата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($machines_statistic as $machine)
                                                <tr>
                                                    @if (isDriver())
                                                        <td>{{ $machine['address_full'] }}</td>
                                                    @else
                                                        <td>{{ $machine['address'] }}</td>
                                                    @endif
                                                    <td>{{ $machine['water_amount'] }}</td>
                                                    <td>{{ $machine['orders_sum_today'] }}грн / {{ $machine['water_given_today'] }}л</td>
                                                    <td>{{ $machine['orders_sum_yesterday'] }}грн / {{ $machine['water_given_yesterday'] }}л</td>
                                                    <td>{{ $machine['orders_sum_month'] }}грн / {{ $machine['water_given_month'] }}л</td>
                                                    <td>{{ $machine['unique_number'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </div>
            @else
                <h5>Данные автоматов отсутствуют!</h5>
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/global/table-datatables-responsive.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var e = $("#statistics_table");
        e.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                },
                "emptyTable": "Данные отсутствуют в таблице",
                "info": "Показано от _START_ до _END_ из _TOTAL_ автоматов",
                "infoEmpty": "Записей не найдено",
                "infoFiltered": " ",
                "lengthMenu": "Показать:   _MENU_",
                "search": "Поиск: ",
                "zeroRecords": "Совпадающих записей не найдено",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },
            buttons: [{extend: "print", className: "btn default"}, {
                extend: "pdf",
                className: "btn default"
            }, {extend: "csv", className: "btn default"}],
            responsive: {details: {
                }},
            order: [[5, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
        })
    </script>
@endpush
