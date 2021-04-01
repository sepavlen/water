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
            <li>
                {{ $machine->unique_number }} ({{ $machine->address }})
            </li>
        </ul>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bar-chart font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Автомат № <small>{{ $machine->unique_number }} ({{ $machine->address }})</small></span>
            </div>
        </div>
        <div class="portlet-body">
            <ul class="nav nav-pills">
                <li class="active">
                    <a href="#tab_2_1" data-toggle="tab"> Текущий день </a>
                </li>
                <li>
                    <a href="#tab_2_2" data-toggle="tab"> Текущий месяц </a>
                </li>
                <li>
                    <a href="#tab_2_3" data-toggle="tab"> Прошлый месяц </a>
                </li>
                <li>
                    <a href="#tab_2_4" data-toggle="tab"> Последние пол года </a>
                </li>
                <li>
                    <a href="#tab_2_5" data-toggle="tab"> Последний год </a>
                </li>
                <li>
                    <a href="#tab_2_6" data-toggle="tab"> За все время </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_2_1">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
                <div class="tab-pane fade" id="tab_2_2">
                    <figure class="highcharts-figure">
                        <div id="container2"></div>
                    </figure>
                </div>
                <div class="tab-pane fade" id="tab_2_3">
                    <figure class="highcharts-figure">
                        <div id="container3"></div>
                    </figure>
                </div>
                <div class="tab-pane fade" id="tab_2_4">
                    <figure class="highcharts-figure">
                        <div id="container4"></div>
                    </figure>
                </div>
                <div class="tab-pane fade" id="tab_2_5">
                    <figure class="highcharts-figure">
                        <div id="container5"></div>
                    </figure>
                </div>
                <div class="tab-pane fade" id="tab_2_6">
                    <figure class="highcharts-figure">
                        <div id="container6"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var colors = Highcharts.getOptions().colors;
        Highcharts.chart('container', {
            chart: {
                type: 'areaspline'
            },

            legend: false,

            title: {
                text: 'Доход за сегодняшний день (по часам)'
            },

            yAxis: {
                title: {
                    text: false
                }
            },

            xAxis: {
                categories: {!! $labelsStatisticCurrentDay !!}
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
                    name: 'Доход',
                    data: {!! $dataStatisticCurrentDay !!},
                    color: colors[2],
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
        Highcharts.chart('container2', {
            chart: {
                type: 'areaspline'
            },

            legend: false,

            title: {
                text: 'Доход за текущий месяц'
            },

            yAxis: {
                title: {
                    text: false
                }
            },

            xAxis: {
                categories: {!! $labelsStatisticCurrentMonth !!}
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
                    name: 'Доход',
                    data: {!! $dataStatisticCurrentMonth !!},
                    color: colors[2],
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
        Highcharts.chart('container3', {
            chart: {
                type: 'areaspline'
            },

            legend: false,

            title: {
                text: 'Доход зы прошлый месяц'
            },

            yAxis: {
                title: {
                    text: false
                }
            },

            xAxis: {
                categories: {!! $labelsStatisticLastMonth !!}
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
                    name: 'Доход',
                    data: {!! $dataStatisticLastMonth !!},
                    color: colors[2],
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

        Highcharts.chart('container4', {
            credits: {
                text: 'Zdorovenka',
                href: false,
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Доход за последние пол года'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: false
                }

            },
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ['downloadPNG', 'downloadPDF', 'downloadXLS']
                    }
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}грн'
                    }
                }
            },
            colors: ['#6771DC', '#8067DC', '#A367DC', '#C767DC', '#DC67CE', '#DC67AB', '#DC67CE', '#C767DC', '#A367DC', '#8067DC', '#6771DC'],

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}грн</b><br/>'
            },
            series: [
                {
                    name: "Доход",
                    colorByPoint: true,
                    data: {!! $dataStatisticHalfYear !!}
                }
            ],
            lang: {
                drillUpText: 'Назад'
            }
        });
        Highcharts.chart('container5', {
            credits: {
                text: 'Zdorovenka',
                href: false,
            },
            lang: {
                drillUpText: 'Назад'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Доход за последний год'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: false
                }

            },
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ['downloadPNG', 'downloadPDF', 'downloadXLS']
                    }
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}грн'
                    }
                }
            },
            colors: ['#6771DC', '#8067DC', '#A367DC', '#C767DC', '#DC67CE', '#DC67AB', '#DC67CE', '#C767DC', '#A367DC', '#8067DC', '#6771DC'],

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}грн</b><br/>'
            },

            series: [
                {
                    name: "Доход",
                    colorByPoint: true,
                    data: {!! $dataStatisticLastYear !!}
                }
            ]
        });
        Highcharts.chart('container6', {
            credits: {
                text: 'Zdorovenka',
                href: false,
            },
            lang: {
                drillUpText: 'Назад'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Доход за все время'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: false
                }

            },
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ['downloadPNG', 'downloadPDF', 'downloadXLS']
                    }
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}грн'
                    }
                }
            },
            colors: ['#6771DC', '#8067DC', '#A367DC', '#C767DC', '#DC67CE', '#DC67AB', '#DC67CE', '#C767DC', '#A367DC', '#8067DC', '#6771DC'],

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}грн</b><br/>'
            },

            series: [
                {
                    name: "Доход",
                    colorByPoint: true,
                    data: {!! $dataStatisticAllTime !!}
                }
            ]
        });
    </script>
@endpush