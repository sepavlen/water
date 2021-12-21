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
        <form id="searchForm">
            <button type="submit">Поиск</button>
            <a href="{{ route('dashboard.machine.show-statistic', $machine->id) }}" class="button">Сброс</a>
            <div>
                <input type="text" id="datefilter" autocomplete="off" value="{{ request('date') }}" name="date" placeholder="{{ request()->get('date') ?: 'Выбрать дату' }}" />
            </div>
        </form>
        <div class="portlet-body">
            <ul class="nav nav-pills">
                @if (request('date'))
                    <li>
                        <a href="#tab_2_1" data-toggle="tab"> Текущий день </a>
                    </li>
                @else
                    <li class="active">
                        <a href="#tab_2_1" data-toggle="tab"> Текущий день </a>
                    </li>
                @endif
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

                @if (request()->get('date'))
                    {{ $class = '' }}
                    <div class="tab-pane fade active in" id="tab_2_7">
                        <figure class="highcharts-figure">
                            <div id="container7"></div>
                        </figure>
                    </div>
                @else
                    @php($class = ' active in')
                @endif
                <div class="tab-pane fade {{ $class }}" id="tab_2_1">
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
        $(function() {

            $('#datefilter').daterangepicker({
                autoUpdateInput: false,
                format: 'YYYY/MM/DD',
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
                $(this).val(picker.startDate.format('YYYY/MM/DD') + '-' + picker.endDate.format('YYYY/MM/DD'));
            });

            $('#datefilter').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });

        var colors = Highcharts.getOptions().colors;
        Highcharts.chart('container', {
            chart: {
                type: 'areaspline'
            },

            legend: false,

            title: {
                text: 'Продажи за сегодняшний день (по часам)'
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
                    name: 'Продажи',
                    data: {!! $dataStatisticCurrentDay !!},
                    color: colors[2],
                }
            ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 300
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
                text: 'Продажи за текущий месяц'
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
                    name: 'Продажи',
                    data: {!! $dataStatisticCurrentMonth !!},
                    color: colors[2],
                }
            ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 300
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
                text: 'Продажи зы прошлый месяц'
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
                    name: 'Продажи',
                    data: {!! $dataStatisticLastMonth !!},
                    color: colors[2],
                }
            ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 300
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
                text: 'Продажи за последние пол года'
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
                    name: "Продажи",
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
                text: 'Продажи за последний год'
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
                    name: "Продажи",
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
                text: 'Продажи за все время'
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
                    name: "Продажи",
                    colorByPoint: true,
                    data: {!! $dataStatisticAllTime !!}
                }
            ]
        });

        Highcharts.chart('container7', {
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
                text: 'Продажи  {!! request('date') !!}'
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
                    name: "Продажи",
                    colorByPoint: true,
                    data: {!! $dataRequestForChart !!}
                        // {
                        //     name: "Октябрь 2020",
                        //     y: 62.74,
                        //     drilldown: "Октябрь 2020"
                        // },
                }
            ]
        });
    </script>
@endpush