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
                <br>
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
                                @foreach($machines_statistic as $machine)
                                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            @if (isDriver())
                                                <th colspan="2" class="text-center">{{ "({$machine['unique_number']})" . $machine['address_full'] }}</th>
                                            @else
                                                <th colspan="2" class="text-center">{{ "({$machine['unique_number']})" . $machine['address'] }}</th>
                                            @endif
                                        </tr>
                                        </thead>
                                    <tbody>
                                    <tr>
                                        <th width="50%">Выход на связь</th>
                                        <td>{{ $machine['contact_time'] }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Продажи за вчера</th>
                                        <td>{{ $machine['orders_sum_yesterday'] }}грн / {{ $machine['water_given_yesterday'] }}л</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Продажи за сегодня</th>
                                        <td>{{ $machine['orders_sum_today'] }}грн / {{ $machine['water_given_today'] }}л</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Долив дата / литров</th>
                                        <td>{{ $machine['waterAddition'] }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Остаток</th>
                                        <td>{{ $machine['water_amount'] }}л</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @endforeach
                            </div>
                        </div>
                    {{ $machines->onEachSide(2)->appends(request()->all())->links() }}
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            @else
                <h5>Данные автоматов отсутствуют!</h5>
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <script src="/assets/global/table-datatables-responsive.min.js" type="text/javascript"></script>
@endpush
