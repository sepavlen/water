@extends('backend.layout.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                Инкассация
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Инкассация </h3>
    <form id="searchForm">
        <button type="submit">Поиск</button>
        <button id="reset">Сброс</button>
        <div>
            <input type="text" id="datefilter" autocomplete="off" name="date" placeholder="{{ request()->get('date') ?: 'Выбрать дату' }}" />
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
    </form>

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
                                <th> Дата</th>
                                <th> Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($encashments as $encashment)
                                <tr class="odd gradeX">
                                    <td>
                                        {{ $encashment->machine->unique_number }}
                                    </td>
                                    <td>
                                        {{ $encashment->machine->address ?: '-' }}
                                    </td>
                                    <td>
                                        {{ $encashment->machine->user->name }}
                                    </td>
                                    <td>
                                    {{ $encashment->created_at }}
                                    </td>
                                    <td>
                                        {{ $encashment->getSum() }} грн
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $encashments->onEachSide(2)->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
@push('scripts')
<script type="text/javascript">
    $('#reset').click(function (e){
        e.preventDefault()
        location.href = '{{ route('dashboard.collection') }}'
    })
    $(function(){
        $('#demo').multiselect();
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
                    "Январь",
                    "Февраль"
                ],
                "firstDay": 1
            }
        });

        $('#datefilter').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('#datefilter').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
</script>
@endpush