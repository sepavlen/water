@extends('backend.layout.app')
<style>
    #container {
        height: 420px;
    }

    .highcharts-figure, .highcharts-data-table table {
        min-width: 360px;
        /*max-width: 820px;*/
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

</style>
@section('content')

                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <span>Главная</span>
                        </li>
                    </ul>
                </div>
                <h3 class="page-title"> Главная
                    <small>Продажи и статистика</small>
                </h3>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue">
                            <div class="visual">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="{{ $profit_today }}">0</span> ₴
                                </div>
                                <div class="desc"> Продажи за сегодня </div>
                            </div>
                            <a class="more" href="{{ route('dashboard.statistic') }}"> Подробнее
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat red">
                            <div class="visual">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="{{ $profit_month }}">0</span> ₴</div>
                                <div class="desc"> Продажи за месяц </div>
                            </div>
                            <a class="more" href="{{ route('dashboard.statistic') }}"> Подробнее
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat green">
                            <div class="visual">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="{{ $profit_year }}">0</span> ₴
                                </div>
                                <div class="desc"> Продажи за год </div>
                            </div>
                            <a class="more" href="{{ route('dashboard.statistic') }}"> Подробнее
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat purple">
                            <div class="visual">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="{{ $profit_all_time }}">0</span> ₴</div>
                                <div class="desc"> Продажи за все время </div>
                            </div>
                            <a class="more" href="{{ route('dashboard.statistic') }}"> Подробнее
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>


@endsection
@push('scripts')
        <script>
            var colors = Highcharts.getOptions().colors;
            Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },

                legend: {
                    symbolWidth: 40
                },

                title: {
                    text: 'Продажи и затраты за последние 30 дней'
                },

                yAxis: {
                    title: {
                        text: false
                    }
                },

                xAxis: {
                    title: {
                        text: 'ММ.ДД'
                    },
                    categories: {!! $labelsForChart !!}
                },

                plotOptions: {
                    series: {
                        states: {

                            inactive: {
                                opacity: 1
                            }

                        },
                        cursor: 'pointer',
                    },

                },
                credits: {
                    text: 'Zdorovenka',
                    href: false,
                },
                tooltip: {
                    valueSuffix: ' грн.'
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            menuItems: ['downloadPNG', 'downloadPDF', 'downloadXLS']
                        }
                    }
                },

                series: [
                    {
                        name: 'Продажи',
                        data: {!! $dataForChart !!},
                        color: colors[2],
                    }, {
                        name: 'Затраты',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        color: colors[3],
                        dashStyle: 'ShortDash',
                    }
                ],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 550
                        },
                        chartOptions: {
                            chart: {
                                spacingLeft: 3,
                                spacingRight: 3
                            },
                            legend: {
                                itemWidth: 150
                            },
                            yAxis: {
                                visible: false
                            }
                        }
                    }]
                }
            });
        </script>
        @endpush
