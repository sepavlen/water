<!doctype html>
<html lang="en">
<head>
    <title>Онлайн платежі</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/paying.css') }}">
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <br/>
                    <div class="img" style="background-image: url({{ asset('assets/images/logo.png') }});"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <hr width="100%">
                        @if (!$error = \App\src\services\ErrorService::machineHaveErrors($machine))
                            <div class="d-flex">
                                <div class="w-100">

                                    <h3 class="mb-1">Номер: <span class="sp-1">{{ $machine->unique_number }}</span></h3>
                                    <h3 class="mb-1">Адрес: <span class="sp-1">{{ $machine->address }}</span></h3>
                                    <h3 class="mb-1">Статус автомата: <span class="sp-1">Online</span></h3>
                                    <h3 class="mb-1">Наявність води:
                                    @if ($machine->water_amount > 100)
                                        <span class="sp-1">Більше 100 літрів</span>
                                    @else
                                        <span class="sp-1">Меньше 100 літрів</span>
                                    @endif
                                    </h3>
                                    <h3 class="mb-1">Система наливу: <span class="sp-1">Ок</span></h3>
                                </div>
                            </div>
                            <br/>
                            {{ Form::open([
                                'method' => 'POST',
                                'class' => 'signin-form',
                                'url' => route('paying.pay')
                            ]) }}
                            <div class="form-group mt-3">
                                {{ Form::number('amount', null, ['class' => 'form-control', 'required' => true, 'min' => '1.00', 'step' => '0.01', 'max' => '60.00']) }}
                                {{ Form::label('amount', 'Сумма поповнення', ['class' => 'form-control-placeholder']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Поповнити', ['class' => 'form-control btn btn-primary rounded submit px-3']) }}
                                {{ Form::hidden('machine_id', $machine->unique_number) }}
                            </div>
                            {{ Form::close() }}
                            <br/>
                            <p class="text-center"><img alt="WebForPay" src="{{ asset('assets/images/logopay.png') }}"></p>
                        @else
                            <h3 class="mb-1 text-center">{{ $error }}</h3>
                        @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

