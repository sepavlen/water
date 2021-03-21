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
                                            <th>Адрес</th>
                                            <th>Время выхода на связь</th>
                                            <th>Статус</th>
                                            <th class="none">Описание проблемы</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>21-02-2021</td>
                                            <td><span class="label label-sm label-success">Активный</span></td>
                                            <td><span class="text text-info">Проблем нет</span></td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>21-02-2021</td>
                                            <td><span class="label label-sm label-success">Активный</span></td>
                                            <td><span class="text text-info">Проблем нет</span></td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>21-02-2021</td>
                                            <td><span class="label label-sm label-success">Активный</span></td>
                                            <td><span class="text text-info">Проблем нет</span></td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>21-02-2021</td>
                                            <td><span class="label label-sm label-warning">Есть проблемы</span></td>
                                            <td><span class="text text-danger">Автомат давно не выходил на связь</span></td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>21-02-2021</td>
                                            <td><span class="label label-sm label-warning">Есть проблемы</span></td>
                                            <td><span class="text text-danger">Автомат давно не выходил на связь</span></td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>21-02-2021</td>
                                            <td><span class="label label-sm label-warning">Есть проблемы</span></td>
                                            <td><span class="text text-danger">Автомат давно не выходил на связь</span></td>
                                        </tr>
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
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Номер автомата</th>
                                            <th>Адрес</th>
                                            <th>Среднесуточные продажи за 30 дней</th>
                                            <th>Продажи за вчера</th>
                                            <th>Продажи за сегодня</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                        </tr>
                                        <tr>
                                            <td>123123</td>
                                            <td>Алекс 128/45</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                            <td>333грн</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="/assets/global/table-datatables-responsive.min.js" type="text/javascript"></script>
@endpush
