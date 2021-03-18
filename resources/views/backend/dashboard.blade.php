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
                    <small>Доходы и статистика</small>
                </h3>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue">
                            <div class="visual">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="125">0</span> ₴
                                </div>
                                <div class="desc"> Доход за сегодня </div>
                            </div>
                            <a class="more" href="javascript:;"> View more
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
                                    <span data-counter="counterup" data-value="350">0</span> ₴</div>
                                <div class="desc"> Доход за месяц </div>
                            </div>
                            <a class="more" href="javascript:;"> View more
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
                                    <span data-counter="counterup" data-value="549">0</span> ₴
                                </div>
                                <div class="desc"> Доход за год </div>
                            </div>
                            <a class="more" href="javascript:;"> View more
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
                                    <span data-counter="counterup" data-value="8900"></span> ₴</div>
                                <div class="desc"> Доход за все время </div>
                            </div>
                            <a class="more" href="javascript:;"> View more
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
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
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
                text: 'Доход и затраты за последние 30 дней'
            },

            yAxis: {
                title: {
                    text: false
                }
            },

            xAxis: {
                title: {
                    text: 'ДД.ММ'
                },
                categories: [
                    '18.02',
                    '19.02',
                    '20.02',
                    '21.02',
                    '22.02',
                    '23.02',
                    '24.02',
                    '25.02',
                    '26.02',
                    '27.02',
                    '28.02',
                    '01.03',
                    '01.03',
                    '03.03',
                    '04.03',
                    '05.03',
                    '06.03',
                    '07.03',
                    '08.03',
                    '09.03',
                    '10.03',
                    '11.03',
                    '12.03',
                    '13.03',
                    '14.03',
                    '15.03',
                    '16.03',
                    '17.03',
                    '18.03',
                    '19.03',
                ]
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
                text: 'Water',
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
                    name: 'Доход',
                    data: [ 533, 443, 451, 414,449, 524, 533, 443, 451, 394,449, 524,  533, 443, 451, 414,449, 524, 533, 343, 451, 414,449, 524, 533, 443, 451, 364,449, 524, ],
                    color: colors[2],
                }, {
                    name: 'Затраты',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 850, 0, 0, 0, 0, 0, 0, 0],
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
