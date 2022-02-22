@extends('backend.layout.app')
@push('css')
    <style>
        a.dt-button.buttons-csv.buttons-html5.btn.default {
            margin-top: -5px;
        }
    </style>
@endpush
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                Pnl за месяц
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Pnl за месяц </h3>
    <form id="searchForm">
        <div class="col-md-8">
            <div class="form-group form-group-custom custom-select-medium">
                {{ Form::label('', 'Месяц', ['class' => 'control-label']) }}
                <input type="text" id="searchDate" readonly class="form-control" autocomplete="off" @if(request()->get('date')) value="{{ request()->get('date') }}"  @endif name="date" placeholder="{{ request()->get('date') ?: 'Выбрать дату' }}" />
            </div>
            <div class="form-group form-group-custom custom-select-medium">
                <span class="text-danger">*</span>
                {{ Form::label('water_price', 'Цена закупочная воды', ['class' => 'control-label']) }}
                {{ Form::number('water_price', request()->get('water_price'), ['class' => 'form-control', 'placeholder' => '',]) }}
            </div>
            <div class="form-group form-group-custom custom-select-medium">
                <span class="text-danger">*</span>
                {{ Form::label('delivery_price', 'Стоимость доставки', ['class' => 'control-label']) }}
                {{ Form::number('delivery_price', request()->get('delivery_price'), ['class' => 'form-control', 'placeholder' => '',]) }}
            </div>
            <div class="form-group form-group-custom custom-select-medium">
                <span class="text-danger">*</span>
                {{ Form::label('fuel_price', 'Стоимость ГСМ', ['class' => 'control-label']) }}
                {{ Form::number('fuel_price', request()->get('fuel_price'), ['class' => 'form-control', 'placeholder' => '',]) }}
            </div>
            <div class="form-group form-group-custom custom-select-medium">
                <span class="text-danger">*</span>
                {{ Form::label('communication_price', 'Стоимость связи', ['class' => 'control-label']) }}
                {{ Form::number('communication_price', request()->get('communication_price'), ['class' => 'form-control', 'placeholder' => '',]) }}
            </div>
            <div class="form-group form-group-custom custom-select-medium">
                <button type="submit" id="pnl_submit">Поиск</button>
                <button id="reset">Сброс</button>
            </div>
        </div>
    </form>

    @if ($machines)
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-archive"></i> Pnl за месяц </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="__pnl_table">
                        <thead>
                        <tr>
                            <th> Номер </th>
                            <th> Адрес </th>
                            <th> Собственность автомата </th>
                            <th> Продажи, грн </th>
                            <th> Ценообразование </th>
                            <th> Продажи литраж/литров </th>
                            <th> Валовая прибыль </th>
                            <th> Аренда места </th>
                            <th> Коммунальные расходы  </th>
                            <th> Цена закупочная воды </th>
                            <th> Сумма закупки воды </th>
                            <th> Заработная плата </th>
                            <th> Связь GSM </th>
                            <th> ГСМ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th> Сумма дивидентов </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total = [
                                'put_amount' => 0,
                                'pricing' => 0,
                                'sold_amount' => 0,
                                'gross_profit' => 0,
                                'rental' => 0,
                                'water_price' => 0,
                                'water_purchase_amount' => 0,
                                'wage' => 0,
                                'communication_price' => 0,
                                'fuel_price' => 0,
                                'amount_dividends' => 0,
                            ];
                        @endphp
                            @foreach($machines as $machine)
                                @php
                                $total['put_amount'] += (float)$machine['put_amount'];
                                $total['pricing'] += (float)$machine['pricing'];
                                $total['sold_amount'] += (float)$machine['sold_amount'];
                                $total['gross_profit'] += (float)$machine['gross_profit'];
                                $total['rental'] += (float)$machine['rental'];
                                $total['water_price'] += (float)$machine['water_price'];
                                $total['water_purchase_amount'] += (float)$machine['water_purchase_amount'];
                                $total['wage'] += (float)$machine['wage'];
                                $total['communication_price'] += (float)$machine['communication_price'];
                                $total['fuel_price'] += (float)$machine['fuel_price'];
                                $total['amount_dividends'] += (float)$machine['amount_dividends'];
                                @endphp
                                <tr>
                                    <td> {{ $machine['machine_unique_number'] }} </td>
                                    <td> {{ $machine['address'] }} </td>
                                    <td> {{ $machine['userName'] }}</td>
                                    <td> {{ $machine['put_amount'] }}</td>
                                    <td> {{ $machine['pricing'] }}</td>
                                    <td> {{ $machine['sold_amount'] }}</td>
                                    <td> {{ $machine['gross_profit'] }}</td>
                                    <td> {{ $machine['rental'] }}</td>
                                    <td> - </td>
                                    <td> {{ $machine['water_price'] }}</td>
                                    <td> {{ $machine['water_purchase_amount'] }}</td>
                                    <td> {{ $machine['wage'] }}</td>
                                    <td> {{ $machine['communication_price'] }}</td>
                                    <td> {{ $machine['fuel_price'] }}</td>
                                    <td> {{ $machine['amount_dividends'] }}</td>
                                </tr>
                            @endforeach
                        <tr>
                            <td> Всего </td>
                            <td> - </td>
                            <td> - </td>
                            <td> {{ $total['put_amount'] }} </td>
                            <td> {{ $total['pricing'] }} </td>
                            <td> {{ $total['sold_amount'] }} </td>
                            <td> {{ $total['gross_profit'] }} </td>
                            <td> {{ $total['rental'] }} </td>
                            <td> - </td>
                            <td> {{ $total['water_price'] }} </td>
                            <td> {{ $total['water_purchase_amount'] }} </td>
                            <td> {{ $total['wage'] }} </td>
                            <td> {{ $total['communication_price'] }} </td>
                            <td> {{ $total['fuel_price'] }} </td>
                            <td> {{ $total['amount_dividends'] }} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif


@endsection
@push('scripts')
    <script src="{{ asset('assets/global/table-datatables-buttons.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        var e = $("#__pnl_table");
        e.dataTable({
            language: {
                aria: {
                    sortAscending: ": активировать для сортировки столбца по возрастанию",
                    sortDescending: ": активировать для сортировки столбца по убыванию"
                },
                emptyTable: "Данные отсутствуют в таблице",
                info: "Показано от _START_ до _END_ из _TOTAL_ автоматов",
                infoEmpty: "Данных пока нет",
                infoFiltered: " ",
                lengthMenu: "Показать:   _MENU_",
                search: "Поиск: ",
                zeroRecords: "Совпадающих записей не найдено"
            },
            buttons: [
                {
                    extend: "csv",
                    className: "btn default",
                    fieldSeparator: ';'
                }
            ],
            order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 1000,
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
        })

        $('#pnl_submit').click(function (e) {
            $('#searchForm input').each(function (index, elem) {
                if (!$(elem).val()){
                    e.preventDefault();
                    $(elem).addClass('border-red')
                }
            })
        })

        $(document).on('input', '#searchForm input', function () {
            $(this).removeClass('border-red')
        }).on('change', 'input.form-control', function () {
            $(this).removeClass('border-red')
        })


        $('#reset').click(function (e){
            e.preventDefault()
            location.href = '{{ route('pnl') }}'
        })

        $(function() {
            $.fn.datepicker.dates['ru'] = {
                days: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                daysShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                daysMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                months: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                    'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthsShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                    'Июл','Авг','Сен','Окт','Ноя','Дек'],
                today: "Today"
            };

            $('#searchDate').datepicker({
                autoUpdateInput: false,
                todayHighlight: true,
                format: "yyyy-mm",
                autocomplete: false,
                autoclose: true,
                language: 'ru',
                minViewMode: "months",
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                },
            });
        });
    </script>
@endpush