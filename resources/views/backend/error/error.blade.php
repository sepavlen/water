@extends('backend.layout.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                Ошибки
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Ошибки </h3>

    <form id="searchForm">
        <button type="submit">Поиск</button>
        <button id="reset">Сброс</button>
        <div>
            <input type="text" id="datefilter" @if(request()->get('date')) value="{{ request()->get('date') }}"  @endif autocomplete="off" name="date" placeholder="{{ request()->get('date') ?: 'Выбрать дату' }}" />
        </div>
        <div>
            <select id="demo" name="machine[]" multiple="multiple">
                @if($machines)
                    @foreach($machines as $machine)
                        <option {{ is_array(request()->get('machine')) && in_array($machine->id, request()->get('machine')) ? 'selected' : ' ' }} value="{{ $machine->id }}">{{ '(' . $machine->unique_number . ') ' . $machine->address }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div>
            <select id="errors_desc" name="errors[]" multiple="multiple">
                @foreach(\App\src\helpers\ErrorHelper::getDescriptionErrorsWithCode() as $key => $error)
                    <option {{ is_array(request()->get('errors')) && in_array($key, request()->get('errors')) ? 'selected' : ' ' }} value="{{ $key }}">{{ $error }}</option>
                @endforeach
            </select>
        </div>
    </form>
    @if ($errors->total())
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover ">
                                <thead>
                                <tr>
                                    <th> Номер автомата</th>
                                    <th> Адрес</th>
                                    <th> Владелец</th>
                                    <th> Ошибка</th>
                                    <th> Дата</th>
                                    <th> Статус</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($errors as $item)
                                    @if (!$item->machine)
                                        @dd($item)
                                    @endif
                                    <tr class="odd gradeX">
                                        <td>
                                            {{ $item->machine->unique_number }}
                                        </td>
                                        <td>
                                            @if (isDriver())
                                                {{ $item->machine->address_full ?: '-' }}
                                            @else
                                                {{ $item->machine->address ?: '-' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->machine->user->name }}
                                        </td>
                                        <td>
                                            @foreach(unserialize($item->description) as $desc)
                                                {{ $desc }} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            {!!  \App\src\helpers\ErrorHelper::getErrorLabel($item->status)  !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $errors->onEachSide(2)->appends(request()->all())->links() }}
                    </div>
                </div>

        </div>
    </div>
    @else
        Данных нет
    @endif


@endsection
@push('scripts')
    <script type="text/javascript">
        $('#reset').click(function (e){
            e.preventDefault()
            location.href = '{{ route('dashboard.error') }}'
        })
        $(function(){
            $('#demo').multiselect();
        });
        $(function(){
            $('#errors_desc').multiselect({
                nonSelectedText: 'Выберите тип ошибки'
            });
        });

        $(function() {

            $('#datefilter').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Очистить',
                    applyLabel: 'Принять',
                    fromLabel: "From",
                    toLabel: "To",
                    customRangeLabel: "Custom",
                    "daysOfWeek": [
                        "Вс",
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб"
                    ],
                    "monthNames": [
                        "Январь", // заменяем на Январь
                        "Февраль", // Февраль и т д
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ],
                    "firstDay": 1
                }
            });

            $('#datefilter').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + '---' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('#datefilter').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>
@endpush