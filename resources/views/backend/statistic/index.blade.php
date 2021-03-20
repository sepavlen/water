@extends('backend.layout.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                Графики
            </li>
        </ul>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bar-chart font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Графики</span>
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
                categories: [
                    '01:00',
                    '02:00',
                    '03:00',
                    '04:00',
                    '05:00',
                    '06:00',
                    '07:00',
                    '08:00',
                    '09:00',
                    '10:00',
                    '11:00',
                    '12:00',
                    '13:00',
                    '14:00',
                    '15:00',
                    '16:00',
                    '17:00',
                    '18:00',
                    '19:00',
                    '20:00',
                    '21:00',
                    '22:00',
                    '23:00',
                    '24:00',
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
                    data: [ 533, 443, 451, 414,449, 524, 533, 443, 451, 394,449, 524,  533, 443, 451, 414,449, 524, 533, 343, 451, 414,449, 524,],
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
                categories: [
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
                    '20.03',
                    '21.03',
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
                    data: [ 533, 443, 451, 414,449, 524, 533, 443, 394,449, 524,  533, 443, 451, 414,449, 524, 533, 343, 300],
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
                categories: [
                    '01.02',
                    '02.02',
                    '04.02',
                    '05.02',
                    '06.02',
                    '07.02',
                    '08.02',
                    '09.02',
                    '10.02',
                    '11.02',
                    '12.02',
                    '13.02',
                    '14.02',
                    '15.02',
                    '16.02',
                    '17.02',
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
                    data: [ 533, 443, 451, 414,449, 524, 533, 443, 451,449, 524, 533, 443, 451, 300, 394,449, 524,  533, 443, 451, 414,449, 524, 533, 343, 300],
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
                    data: [
                        {
                            name: "Октябрь 2020",
                            y: 62.74,
                            drilldown: "Октябрь 2020"
                        },
                        {
                            name: "Ноябрь 2020",
                            y: 10.57,
                            drilldown: "Ноябрь 2020"
                        },
                        {
                            name: "Декабрь 2020",
                            y: 7.23,
                            drilldown: "Декабрь 2020"
                        },
                        {
                            name: "Январь 2021",
                            y: 5.58,
                            drilldown: "Январь 2021"
                        },
                        {
                            name: "Февраль 2021",
                            y: 4.02,
                            drilldown: "Февраль 2021"
                        },
                        {
                            name: "Март 2021",
                            y: 1.92,
                            drilldown: "Март 2021"
                        },
                        {
                            name: "Other",
                            y: 7.62,
                            drilldown: null
                        }
                    ]
                }
            ],
            drilldown: {
                series: [
                    {
                        name: "Ноябрь 2020",
                        id: "Ноябрь 2020",
                        data: [
                            [
                                "v65.0",
                                0.1
                            ],
                            [
                                "v64.0",
                                1.3
                            ],
                            [
                                "v63.0",
                                53.02
                            ],
                            [
                                "v62.0",
                                1.4
                            ],
                            [
                                "v61.0",
                                0.88
                            ],
                            [
                                "v60.0",
                                0.56
                            ],
                            [
                                "v59.0",
                                0.45
                            ],
                            [
                                "v58.0",
                                0.49
                            ],
                            [
                                "v57.0",
                                0.32
                            ],
                            [
                                "v56.0",
                                0.29
                            ],
                            [
                                "v55.0",
                                0.79
                            ],
                            [
                                "v54.0",
                                0.18
                            ],
                            [
                                "v51.0",
                                0.13
                            ],
                            [
                                "v49.0",
                                2.16
                            ],
                            [
                                "v48.0",
                                0.13
                            ],
                            [
                                "v47.0",
                                0.11
                            ],
                            [
                                "v43.0",
                                0.17
                            ],
                            [
                                "v29.0",
                                0.26
                            ]
                        ]
                    },
                    {
                        name: "Октябрь 2020",
                        id: "Октябрь 2020",
                        data: [
                            [
                                "v58.0",
                                1.02
                            ],
                            [
                                "v57.0",
                                7.36
                            ],
                            [
                                "v56.0",
                                0.35
                            ],
                            [
                                "v55.0",
                                0.11
                            ],
                            [
                                "v54.0",
                                0.1
                            ],
                            [
                                "v52.0",
                                0.95
                            ],
                            [
                                "v51.0",
                                0.15
                            ],
                            [
                                "v50.0",
                                0.1
                            ],
                            [
                                "v48.0",
                                0.31
                            ],
                            [
                                "v47.0",
                                0.12
                            ]
                        ]
                    },
                    {
                        name: "Декабрь 2020",
                        id: "Декабрь 2020",
                        data: [
                            [
                                "v11.0",
                                6.2
                            ],
                            [
                                "v10.0",
                                0.29
                            ],
                            [
                                "v9.0",
                                0.27
                            ],
                            [
                                "v8.0",
                                0.47
                            ]
                        ]
                    },
                    {
                        name: "Январь 2021",
                        id: "Январь 2021",
                        data: [
                            [
                                "v11.0",
                                3.39
                            ],
                            [
                                "v10.1",
                                0.96
                            ],
                            [
                                "v10.0",
                                0.36
                            ],
                            [
                                "v9.1",
                                0.54
                            ],
                            [
                                "v9.0",
                                0.13
                            ],
                            [
                                "v5.1",
                                0.2
                            ]
                        ]
                    },
                    {
                        name: "Февраль 2021",
                        id: "Февраль 2021",
                        data: [
                            [
                                "v16",
                                2.6
                            ],
                            [
                                "v15",
                                0.92
                            ],
                            [
                                "v14",
                                0.4
                            ],
                            [
                                "v13",
                                0.1
                            ]
                        ]
                    },
                    {
                        name: "Март 2021",
                        id: "Март 2021",
                        data: [
                            [
                                "v50.0",
                                0.96
                            ],
                            [
                                "v49.0",
                                0.82
                            ],
                            [
                                "v12.1",
                                0.14
                            ]
                        ]
                    }
                ]
            }
        });
        Highcharts.chart('container5', {
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
                    data: [
                        {
                            name: "Октябрь 2020",
                            y: 62.74,
                            drilldown: "Октябрь 2020"
                        },
                        {
                            name: "Ноябрь 2020",
                            y: 10.57,
                            drilldown: "Ноябрь 2020"
                        },
                        {
                            name: "Декабрь 2020",
                            y: 7.23,
                            drilldown: "Декабрь 2020"
                        },
                        {
                            name: "Январь 2021",
                            y: 5.58,
                            drilldown: "Январь 2021"
                        },
                        {
                            name: "Февраль 2021",
                            y: 4.02,
                            drilldown: "Февраль 2021"
                        },
                        {
                            name: "Март 2021",
                            y: 1.92,
                            drilldown: "Март 2021"
                        },
                        {
                            name: "Other",
                            y: 7.62,
                            drilldown: null
                        }
                    ]
                }
            ],
            drilldown: {
                series: [
                    {
                        name: "Ноябрь 2020",
                        id: "Ноябрь 2020",
                        data: [
                            [
                                "v65.0",
                                0.1
                            ],
                            [
                                "v64.0",
                                1.3
                            ],
                            [
                                "v63.0",
                                53.02
                            ],
                            [
                                "v62.0",
                                1.4
                            ],
                            [
                                "v61.0",
                                0.88
                            ],
                            [
                                "v60.0",
                                0.56
                            ],
                            [
                                "v59.0",
                                0.45
                            ],
                            [
                                "v58.0",
                                0.49
                            ],
                            [
                                "v57.0",
                                0.32
                            ],
                            [
                                "v56.0",
                                0.29
                            ],
                            [
                                "v55.0",
                                0.79
                            ],
                            [
                                "v54.0",
                                0.18
                            ],
                            [
                                "v51.0",
                                0.13
                            ],
                            [
                                "v49.0",
                                2.16
                            ],
                            [
                                "v48.0",
                                0.13
                            ],
                            [
                                "v47.0",
                                0.11
                            ],
                            [
                                "v43.0",
                                0.17
                            ],
                            [
                                "v29.0",
                                0.26
                            ]
                        ]
                    },
                    {
                        name: "Октябрь 2020",
                        id: "Октябрь 2020",
                        data: [
                            [
                                "v58.0",
                                1.02
                            ],
                            [
                                "v57.0",
                                7.36
                            ],
                            [
                                "v56.0",
                                0.35
                            ],
                            [
                                "v55.0",
                                0.11
                            ],
                            [
                                "v54.0",
                                0.1
                            ],
                            [
                                "v52.0",
                                0.95
                            ],
                            [
                                "v51.0",
                                0.15
                            ],
                            [
                                "v50.0",
                                0.1
                            ],
                            [
                                "v48.0",
                                0.31
                            ],
                            [
                                "v47.0",
                                0.12
                            ]
                        ]
                    },
                    {
                        name: "Декабрь 2020",
                        id: "Декабрь 2020",
                        data: [
                            [
                                "v11.0",
                                6.2
                            ],
                            [
                                "v10.0",
                                0.29
                            ],
                            [
                                "v9.0",
                                0.27
                            ],
                            [
                                "v8.0",
                                0.47
                            ]
                        ]
                    },
                    {
                        name: "Январь 2021",
                        id: "Январь 2021",
                        data: [
                            [
                                "v11.0",
                                3.39
                            ],
                            [
                                "v10.1",
                                0.96
                            ],
                            [
                                "v10.0",
                                0.36
                            ],
                            [
                                "v9.1",
                                0.54
                            ],
                            [
                                "v9.0",
                                0.13
                            ],
                            [
                                "v5.1",
                                0.2
                            ]
                        ]
                    },
                    {
                        name: "Февраль 2021",
                        id: "Февраль 2021",
                        data: [
                            [
                                "v16",
                                2.6
                            ],
                            [
                                "v15",
                                0.92
                            ],
                            [
                                "v14",
                                0.4
                            ],
                            [
                                "v13",
                                0.1
                            ]
                        ]
                    },
                    {
                        name: "Март 2021",
                        id: "Март 2021",
                        data: [
                            [
                                "v50.0",
                                0.96
                            ],
                            [
                                "v49.0",
                                0.82
                            ],
                            [
                                "v12.1",
                                0.14
                            ]
                        ]
                    }
                ]
            }
        });
        Highcharts.chart('container6', {
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
                    data: [
                        {
                            name: "Октябрь 2020",
                            y: 62.74,
                            drilldown: "Октябрь 2020"
                        },
                        {
                            name: "Ноябрь 2020",
                            y: 10.57,
                            drilldown: "Ноябрь 2020"
                        },
                        {
                            name: "Декабрь 2020",
                            y: 7.23,
                            drilldown: "Декабрь 2020"
                        },
                        {
                            name: "Январь 2021",
                            y: 5.58,
                            drilldown: "Январь 2021"
                        },
                        {
                            name: "Февраль 2021",
                            y: 4.02,
                            drilldown: "Февраль 2021"
                        },
                        {
                            name: "Март 2021",
                            y: 1.92,
                            drilldown: "Март 2021"
                        },
                        {
                            name: "Other",
                            y: 7.62,
                            drilldown: null
                        }
                    ]
                }
            ],
            drilldown: {
                series: [
                    {
                        name: "Ноябрь 2020",
                        id: "Ноябрь 2020",
                        data: [
                            [
                                "v65.0",
                                0.1
                            ],
                            [
                                "v64.0",
                                1.3
                            ],
                            [
                                "v63.0",
                                53.02
                            ],
                            [
                                "v62.0",
                                1.4
                            ],
                            [
                                "v61.0",
                                0.88
                            ],
                            [
                                "v60.0",
                                0.56
                            ],
                            [
                                "v59.0",
                                0.45
                            ],
                            [
                                "v58.0",
                                0.49
                            ],
                            [
                                "v57.0",
                                0.32
                            ],
                            [
                                "v56.0",
                                0.29
                            ],
                            [
                                "v55.0",
                                0.79
                            ],
                            [
                                "v54.0",
                                0.18
                            ],
                            [
                                "v51.0",
                                0.13
                            ],
                            [
                                "v49.0",
                                2.16
                            ],
                            [
                                "v48.0",
                                0.13
                            ],
                            [
                                "v47.0",
                                0.11
                            ],
                            [
                                "v43.0",
                                0.17
                            ],
                            [
                                "v29.0",
                                0.26
                            ]
                        ]
                    },
                    {
                        name: "Октябрь 2020",
                        id: "Октябрь 2020",
                        data: [
                            [
                                "v58.0",
                                1.02
                            ],
                            [
                                "v57.0",
                                7.36
                            ],
                            [
                                "v56.0",
                                0.35
                            ],
                            [
                                "v55.0",
                                0.11
                            ],
                            [
                                "v54.0",
                                0.1
                            ],
                            [
                                "v52.0",
                                0.95
                            ],
                            [
                                "v51.0",
                                0.15
                            ],
                            [
                                "v50.0",
                                0.1
                            ],
                            [
                                "v48.0",
                                0.31
                            ],
                            [
                                "v47.0",
                                0.12
                            ]
                        ]
                    },
                    {
                        name: "Декабрь 2020",
                        id: "Декабрь 2020",
                        data: [
                            [
                                "v11.0",
                                6.2
                            ],
                            [
                                "v10.0",
                                0.29
                            ],
                            [
                                "v9.0",
                                0.27
                            ],
                            [
                                "v8.0",
                                0.47
                            ]
                        ]
                    },
                    {
                        name: "Январь 2021",
                        id: "Январь 2021",
                        data: [
                            [
                                "v11.0",
                                3.39
                            ],
                            [
                                "v10.1",
                                0.96
                            ],
                            [
                                "v10.0",
                                0.36
                            ],
                            [
                                "v9.1",
                                0.54
                            ],
                            [
                                "v9.0",
                                0.13
                            ],
                            [
                                "v5.1",
                                0.2
                            ]
                        ]
                    },
                    {
                        name: "Февраль 2021",
                        id: "Февраль 2021",
                        data: [
                            [
                                "v16",
                                2.6
                            ],
                            [
                                "v15",
                                0.92
                            ],
                            [
                                "v14",
                                0.4
                            ],
                            [
                                "v13",
                                0.1
                            ]
                        ]
                    },
                    {
                        name: "Март 2021",
                        id: "Март 2021",
                        data: [
                            [
                                "v50.0",
                                0.96
                            ],
                            [
                                "v49.0",
                                0.82
                            ],
                            [
                                "v12.1",
                                0.14
                            ]
                        ]
                    }
                ]
            }
        });
    </script>
@endpush