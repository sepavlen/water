@extends('backend.layout.app')

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

@endsection
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif