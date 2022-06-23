<!DOCTYPE html>
<html lang="en" style="background-image: url({{ asset('assets/frontend/images/background.svg') }}); background-size: 0px;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <title>Здоровєнька</title>
</head>

<body id="content-load" style="display:none;">
<div class="header-flag">
    <p class="header-flag_p">15% віддаємо на підтримку ЗСУ</p>
</div>
<div class="header" style="display: flex;">
    <a href=""><img class="header-img" src="{{ asset('assets/frontend/images/logo_desktop.svg') }}" alt=""></a>
    <nav id="headerNav">
        <ul class="header-list">
            <li class="header-item"><a href="#aboutUs">Про нас</a></li>
            <li class="header-item"><a href="#aboutWater">Про воду</a></li>
            <li class="header-item"><a href="#waterMachine">Водомати</a></li>
            <li class="header-item"><a href="#mission">Наші цінності</a></li>
            <li class="header-item"><a href="#support">Підтримуємо ЗСУ</a></li>
            <li class="header-item"><a href="#cooperation">Співпраця</a></li>
        </ul>
    </nav>

    <div class="header-box_link">
        <div class="header-box_icons">
            <div class="header-box_icon">
                <img class="header-box_icon_tel" src="{{ asset('assets/frontend/images/phone.svg') }}" alt="">
                <div class="phone__box">
                    <a class="header-box_tel" href="tel:+380962630253">+380962630253</a>
                    <a class="header-box_link" href="{{ route('dashboard') }}">Online Моніторинг</a>
                </div>

            </div>
            <div class="header-box__social">
                <a class="header-inst" href="https://instagram.com/zdorovenka_ua">
                    <div class="header-inst__icon"></div>
                </a>
                <a class="header-facebook" href="https://www.facebook.com/groups/1639395006442813/">
                    <div class="header-facebook__icon"></div>
                </a>
            </div>
        </div>

        <header>
            <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <div class="menu">
            <nav id="burgerNav" class="menu-burger_nav">
                <li><a class="burger_link" href="#aboutUs">Про нас</a></li>
                <li><a class="burger_link" href="#aboutWater">Про воду</a></li>
                <li><a class="burger_link" href="#waterMachine">Водомати</a></li>
                <li><a class="burger_link" href="#mission">Наші цінності</a></li>
                <li><a class="burger_link" href="#support">Підтримуємо ЗСУ</a></li>
                <li><a class="burger_link" href="#cooperation">Співпраця</a></li>
            </nav>
            <div class="menu-burger_social">

                <div class="header-box_icon__burger">
                    <div class="phone__box">
                        <a class="burger-tel" href="tel:+380962630253">+380962630253</a>
                        <a class="header-box_link" href="{{ route('dashboard') }}">Online Моніторинг</a>
                    </div>
                </div>
                <div class="menu-burger_icon__wrap">
                    <a class="header-inst" href="https://instagram.com/zdorovenka_ua">
                        <div class="header-inst__icon"></div>
                    </a>
                    <a class="header-facebook" href="https://www.facebook.com/groups/1639395006442813/">
                        <div class="header-facebook__icon"></div>
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="wrapper">
    <section class="hero-screen">
        <div class="hero-screen__banner">
            <img class="hero-screen_banner__img" src="{{ asset('assets/frontend/images/banner_home.jpg') }}" alt="">
            <img class="hero-screen_banner__tablet" src="{{ asset('assets/frontend/images/banner_tablet.jpg') }}" alt="">
            <img class="hero-screen_banner__mobile" src="{{ asset('assets/frontend/images/banner_mobile.jpg') }}" alt="">
            <img class="hero-screen_banner__mobile_320" src="{{ asset('assets/frontend/images/banner_mobile__320.jpg') }}" alt="">

            <div class="hero-screen__wrap">
                <h1 class="hero-screen__title">рідного краю</h1>
                <p class="hero-screen__description">Продаж артезіанської води через вендінгові автомати</p>
            </div>

            <div class="hero-screen_info__wrap">
                <div class="hero-screen_info__block">
                    <img class="hero-screen_info__icon" src="{{ asset('assets/frontend/images/water-banner_icon.svg') }}" alt="">
                    <p class="hero-screen_info__p">Якісна вода</p>
                </div>
                <div class="hero-screen_info__block">
                    <img class="hero-screen_info__icon" src="{{ asset('assets/frontend/images/delivery-banner_icon.svg') }}" alt="">
                    <p class="hero-screen_info__p">Якісна доставка</p>
                </div>
                <div class="hero-screen_info__block">
                    <img class="hero-screen_info__icon" src="{{ asset('assets/frontend/images/hands-banner_icon.svg') }}" alt="">
                    <p class="hero-screen_info__p">Якісний продаж</p>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us">
        <div class="about-us_wrapper">
            <div id="aboutUs" class="about-us_block about-us_block_left">
                <div class="about-us_text about-us_text__one">
                    <div class="about-us_text__box">
                        <h2 class="about-us_title">Про нас</h2>
                        <img class="about-us__wave_img" src="{{ asset('assets/frontend/images/text_wave.svg') }}" alt="">
                    </div>
                    <div class="about-us_description">
                        <p class="about-us_description__p">Ми займаємось продажем артезіанської води через
                            вендингові автомати і точно знаємо як для здоров’я важливо споживати чисту та якісну
                            питну воду. </p>
                        <p class="about-us_description__p">Тому пропонуємо Вам смачну воду видобувану із
                            артезіанської свердловини Лука-Мелешківського родовища добуту на глибині 130 метрів.
                        </p>
                        <p class="about-us_description__p">Ми серйозно підходимо до вибору постачальника води,
                            котрий також цінує збереження свіжості води. З цією метою ми виробляємо вендингові
                            автомати з продажу артезіанської води, щоб ви мали можливість купувати очищену воду з
                            первинною структурою, якою її створила сама природа.</p>
                    </div>
                </div>
                <div class="about-us_wrap__img about-us_wrap__img_team">
                </div>

            </div>
            <div id="aboutWater" class="about-us_block about-us_block__two">
                <div class="about-us_text about-us_text__two">
                    <div class="about-us_text__box">
                        <h2 class="about-us_title">Про воду</h2>
                        <img class="about-us__wave_img" src="{{ asset('assets/frontend/images/text_wave.svg') }}" alt="">
                    </div>
                    <div class="about-us_description">
                        <p class="about-us_description__p">З давніх давен відомо про цілющі властивості води. У
                            своєму складі вона має унікальні хімічні компоненти, які є незамінними для кожного
                            живого організму. </p>
                        <p class="about-us_description__p">Наша вода відповідає усім нормам МОЗ України і дозволяє
                            вам покращувати настрій не тільки споживаючи, а й купуючи її через наші вендингові
                            автомати. </p>
                    </div>
                </div>
                <div class="about-us_wrap__img about-us_wrap__img_drink">
                </div>
            </div>

        </div>
        <div class="wave-img">
            <img class="wave-img wave-img__svg" src="{{ asset('assets/frontend/images/wave.svg') }}" alt="">
        </div>

    </section>
    <section class="values_water">
        <h3 class="h3_class h3_class__values h3_val">корисні властивості води</h3>
        <div class="wrap_imgAndIcons">
            <div class="icon_left"></div>
            <div class="glas">
                <a href="#openModal" class="openModalButton">Дізнатись більше</a>
            </div>

            <div id="openModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#close" title="Close" class="close">
                                <div class="menu-btnModal">
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/lips.svg') }}" alt="" />
                                <p class="modal-icon__text">Смачна</p>
                            </div>
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/digestion.svg') }}" alt="" />
                                <p class="modal-icon__text">Покращує травлення</p>

                            </div>
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/energy.svg') }}" alt="" />
                                <p class="modal-icon__text">Відновлює енергію</p>
                            </div>
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/immunity.svg') }}" alt="" />
                                <p class="modal-icon__text">Підвищує імунітет</p>
                            </div>
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/cleaned.svg') }}" alt="" />
                                <p class="modal-icon__text">Очищується природою</p>
                            </div>
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/smile.svg') }}" alt="" />
                                <p class="modal-icon__text">Покращує самопочуття</p>

                            </div>
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/emaciation.svg') }}" alt="" />
                                <p class="modal-icon__text">Бере участь у процесі спалювання жиру</p>

                            </div>
                            <div class="values_water-icon">
                                <img src="{{ asset('assets/frontend/images/modal/atom.svg') }}" alt="" />
                                <p class="modal-icon__text">Складається з корисних мікроелементів</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="icon_right"></div>
        </div>
    </section>
    <section class="indicators-water">
        <h3 class="h3_class h3_class__values">Фізико-хімічні та мікробіологічні показники</h3>
        <div class="indicators-water__wrapper">
            <div class="indicators-water__box">
                <p class="indicators-water__title title_one">Назва показника</p>
                <p class="indicators-water__title title_two">Фактичне значення</p>
                <p class="indicators-water__title title_three">Норма по НД</p>
            </div>
            <div class="indicators-water__background">
                <div class="indicators-water__item val_one">
                    <p class="title_one__mobile">Назва показника</p>
                    <p class="indicators__text">Загальна лужність, ммоль/м&sup3;</p>
                </div>
                <div class="indicators-water__item values values_two">
                    <p class="title_one__mobile">Фактичне значення</p>
                    <p class="indicators__number">4,1</p>
                </div>
                <div class="indicators-water__item values val_three">
                    <p class="title_one__mobile">Норма по НД</p>
                    <p class="indicators__number">1,5-5,5</p>
                </div>
            </div>
            <div class="indicators-water__background">
                <div class="indicators-water__item val_one">
                    <p class="title_one__mobile">Назва показника</p>
                    <p class="indicators__text">Водневий показник, рН</p>
                </div>
                <div class="indicators-water__item values values_two">
                    <p class="title_one__mobile">Фактичне значення</p>
                    <p class="indicators__number">7,5</p>
                </div>
                <div class="indicators-water__item values val_three">
                    <p class="title_one__mobile">Норма по НД</p>
                    <p class="indicators__number">6,5-8,5</p>
                </div>
            </div>
            <div class="indicators-water__background">
                <div class="indicators-water__item val_one">
                    <p class="title_one__mobile">Назва показника</p>
                    <p class="indicators__text">Сульфати, мг/дм&sup3;</p>
                </div>
                <div class="indicators-water__item values values_two">
                    <p class="title_one__mobile">Фактичне значення</p>
                    <p class="indicators__number">36</p>
                </div>
                <div class="indicators-water__item values val_three">
                    <p class="title_one__mobile">Норма по НД</p>
                    <p class="indicators__number">&#60;250</p>
                </div>
            </div>
            <div class="indicators-water__background">
                <div class="indicators-water__item val_one">
                    <p class="title_one__mobile">Назва показника</p>
                    <p class="indicators__text">Залізо, мг/дм&sup3;</p>
                </div>
                <div class="indicators-water__item values values_two">
                    <p class="title_one__mobile">Фактичне значення</p>
                    <p class="indicators__number">&#60;0,05</p>
                </div>
                <div class="indicators-water__item values val_three">
                    <p class="title_one__mobile">Норма по НД</p>
                    <p class="indicators__number">&#60;0,1</p>
                </div>
            </div>
            <div class="indicators-water__background">
                <div class="indicators-water__item val_one">
                    <p class="title_one__mobile">Назва показника</p>
                    <p class="indicators__text">Фтор, мг/дм&sup3;</p>
                </div>
                <div class="indicators-water__item values values_two">
                    <p class="title_one__mobile">Фактичне значення</p>
                    <p class="indicators__number">0,52</p>
                </div>
                <div class="indicators-water__item values val_three">
                    <p class="title_one__mobile">Норма по НД</p>
                    <p class="indicators__number">&#60;70</p>
                </div>
            </div>
            <div class="indicators-water__background">
                <div class="indicators-water__item val_one">
                    <p class="title_one__mobile">Назва показника</p>
                    <p class="indicators__text">Нітрити, мг/дм&sup3;</p>
                </div>
                <div class="indicators-water__item values values_two">
                    <p class="title_one__mobile">Фактичне значення</p>
                    <p class="indicators__number">0,0048</p>
                </div>
                <div class="indicators-water__item values val_three">
                    <p class="title_one__mobile">Норма по НД</p>
                    <p class="indicators__number">1,2</p>
                </div>
            </div>
            <div class="indicators-water__background">
                <div class="indicators-water__item val_one">
                    <p class="title_one__mobile">Назва показника</p>
                    <p class="indicators__text">Амоній, мг/дм&sup3;</p>
                </div>
                <div class="indicators-water__item values values_two">
                    <p class="title_one__mobile">Фактичне значення</p>
                    <p class="indicators__number">0,09</p>
                </div>
                <div class="indicators-water__item values val_three">
                    <p class="title_one__mobile">Норма по НД</p>
                    <p class="indicators__number">&#60;0,9</p>
                </div>
            </div>


        </div>

        <div class="wrapper_link">
            <a class="water-machine__pdf" href="">Щоб отримати більш детальну інформацію щодо якості води,
                ознайомтесь з нашими документами</a>
        </div>
    </section>
    <div class="section-background about-us">
        <section id="waterMachine" class="water-machine">
            <img class="wave_ind" src="{{ asset('assets/frontend/images/wave_ind.svg') }}" alt="">
            <div class="water-machine-wrapper">
                <div class="about-us_text__box cooperation-text__box">
                    <h2 class="about-us_title">Водомати</h2>
                    <img class="about-us__wave_img" src="{{ asset('assets/frontend/images/text_wave.svg') }}" alt="">
                </div>
                <div class="water-machine_box">
                    <div class="water-machine__list water-machine__list__img">
                        <img class="water-machine__img" src="{{ asset('assets/frontend/images/water-machine.jpg') }}" alt="">
                    </div>
                    <div class="water-machine__list water-machine__list__left">
                        <div class="water-machine_item water-machine__marginR">
                            <img class="water-machine__switch img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                            <p class="water-machine__p">Наші вендингові автомати зберігають смак, якість та свіжість
                                артезіанської води</p>
                        </div>
                        <div class="water-machine_item water-machine_item__right water-machine__marginR">
                            <img class="water-machine__switch img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                            <p class="water-machine__p">Купуючи в нас воду, ви не тільки оздоровлюєте організм, а й
                                економите свій час.</p>
                        </div>
                        <div class="water-machine_item water-machine__marginR">
                            <img class="water-machine__switch img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                            <p class="water-machine__p">Ми наливаємо 6 літрів води за 40 секунд, а це на 15 секунд
                                швидше за інших.</p>
                        </div>
                    </div>
                    <div class="water-machine__list">
                        <div class="water-machine_item">
                            <img class="water-machine__switch img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                            <p class="water-machine__p">Наша мета зробити доступною якісну артезіанську воду для
                                кожного мешканця Вінниці. </p>
                        </div>
                        <div class="water-machine_item water-machine_item__right">
                            <img class="water-machine__switch img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                            <p class="water-machine__p">По наповненню води наші водомати найшвидші.</p>
                        </div>
                        <div class="water-machine_item">
                            <img class="water-machine__switch img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                            <p class="water-machine__p">Ми надзвичайні перфекционісти, тому вода у вашу тару
                                поступає найрівнішим потоком.</p>
                        </div>
                    </div>
                </div>
                <h3 class="h3_class h3_pay">Розраховуйтесь як вам зручно</h3>
                <div class="water-machine_pay__list">
                    <div class="water-machine_pay__item">
                        <img class="water-machine__icon" src="{{ asset('assets/frontend/images/uah.svg') }}" alt="">
                        <p class="water-machine_pay__text">Купюри
                            від 1 грн до 50 грн</p>
                    </div>

                    <div class="water-machine_pay__item">
                        <img class="water-machine__icon" src="{{ asset('assets/frontend/images/coin.svg') }}" alt="">
                        <p class="water-machine_pay__text">Монети
                            від 50 коп. до 10 грн</p>
                    </div>

                    <div class="water-machine_pay__item">
                        <img class="water-machine__icon" src="{{ asset('assets/frontend/images/QR_Code.svg') }}" alt="">
                        <p class="water-machine_pay__text">QR-код</p>
                    </div>

                    <div class="water-machine_pay__item">
                        <img class="water-machine__icon" src="{{ asset('assets/frontend/images/visa_mc.svg') }}" alt="">
                        <p class="water-machine_pay__text">VISA/MasterCard</p>
                    </div>
                    <div class="water-machine_pay__item">
                        <img class="water-machine__icon" src="{{ asset('assets/frontend/images/apple_google.svg') }}" alt="">
                        <p class="water-machine_pay__text">Google Pay/Apple Pay</p>
                    </div>
                    <div class="water-machine_pay__item">
                        <img class="water-machine__icon" src="{{ asset('assets/frontend/images/id_card.svg') }}" alt="">
                        <p class="water-machine_pay__text">Картка постійного покупця</p>
                    </div>
                </div>
                <div class="wrapper_link">
                    <a class="water-machine__pdf" href="">Як користуватися автоматом?</a>
                </div>
            </div>
        </section>
        <section id="mission" class="mission">
            <div class="mission-wrapper">
                <div class="about-us_text__box mission_text__desktop">
                    <h2 class="about-us_title about-us_title__none">Наші цінності</h2>
                    <img class="about-us__wave_img" src="{{ asset('assets/frontend/images/text_wave.svg') }}" alt="">
                </div>
                <div class="mission-background">
                    <div class="about-us_text__box mission_text__box">
                        <h2 class="about-us_title mission-us_title">Наші цінності</h2>
                        <img class="about-us__wave_img" src="{{ asset('assets/frontend/images/text_wave.svg') }}" alt="">
                    </div>
                    <div class="mission-background__wrap">
                        <div class="mission-background__block">
                            <div class="mission-background__cap">
                                <img class="mission-background__icon" src="{{ asset('assets/frontend/images/quality.svg') }}" alt="">
                                <h3 class="mission-background__title">якість</h3>
                            </div>
                            <div class="mission-background_wrap__description">
                                <p class="mission-background__description">Якісна, смачна та свіжа вода.</p>
                                <p class="mission-background__description">Швидка, чемна, привітна та чітка
                                    доставка.</p>
                                <p class="mission-background__description">Якісний продаж: зручний автомат продажу
                                    води, мінімальна кількість дій, зручні способи оплати.</p>
                            </div>
                        </div>

                        <div class="mission-background__block">
                            <div class="mission-background__cap">
                                <img class="mission-background__icon" src="{{ asset('assets/frontend/images/taste.svg') }}" alt="">
                                <h3 class="mission-background__title">смак</h3>
                            </div>
                            <div class="mission-background_wrap__description">
                                <p class="mission-background__description">Першу оцінку ми отримуємо від нового
                                    клієнта: смачна вода чи ні. Потім ми зможемо багато чого запропонувати понад це,
                                    але смак - це перше, за чим до нас приходять і заради чого повертаються.</p>
                            </div>
                        </div>

                        <div class="mission-background__block">
                            <div class="mission-background__cap">
                                <img class="mission-background__icon" src="{{ asset('assets/frontend/images/accessibility.svg') }}" alt="">
                                <h3 class="mission-background__title">доступність</h3>
                            </div>
                            <div class="mission-background_wrap__description">
                                <p class="mission-background__description">Ми хочему бути доступні для кожного. Ми
                                    повинні надати нашим клієнтам найкращу якість за найкращою ціною та зробити
                                    процес обслуговування максимально простим.</p>
                            </div>
                        </div>

                        <div class="mission-background__block">
                            <div class="mission-background__cap">
                                <img class="mission-background__icon" src="{{ asset('assets/frontend/images/confidence.svg') }}" alt="">
                                <h3 class="mission-background__title">відкритість</h3>
                            </div>
                            <div class="mission-background_wrap__description">
                                <p class="mission-background__description">Ми вважаємо, що відкритість робить світ
                                    кращим. Відкриватися - значить довіряти людям, вірити в їхна найкращі наміри.
                                    Завдяки відкритості ми постійно отримуємо підказки та зовнішні стимули.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </section>
        <section id="support" class="support">
            <div class="support-background">
                <div class="support-background__wrap">
                    <div class="support-wrap__title">
                        <img class="support-img__icon" src="{{ asset('assets/frontend/images/flag_circle.svg') }}" alt="">
                        <div class="about-us_text__box support_text__box">
                            <h2 class="about-us_title support_title">Підтримуємо ЗСУ</h2>
                            <img class="about-us__wave_img" src="{{ asset('assets/frontend/images/text_wave.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="support-wrap__description">
                        <p class="support-description">15% з продажів ми віддаємо ЗСУ. Долучайтесь до нас! Купуйте
                            воду та допомагайте збройним силам, підтримаймо Україну разом!</p>
                    </div>
                    <div class="support-wrap__data">
                        <p class="support-wrap_data__text">Станом на</p>
                        <p class="support-wrap_data__value">01.06.2022</p>
                        <p class="support-wrap_data__text">вже передано</p>
                    </div>
                    <div class="support-wrap__list">

                        <div class="support-list__box">
                            <p class="support-list__figure">1000</p>
                            <p class="support-list__description">літрів води</p>
                        </div>

                        <div class="support-list__box">
                            <p class="support-list__figure">3</p>
                            <p class="support-list__description">одиниці екипірування</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section id="cooperation" class="cooperation">
            <div class="cooperation-wrap">
                <div class="cooperation-wrap__box">
                    <div class="about-us_text__box cooperation-text__box">
                        <h2 class="about-us_title">Співпраця</h2>
                        <img class="about-us__wave_img" src="{{ asset('assets/frontend/images/text_wave.svg') }}" alt="">
                    </div>
                    <p class="cooperation-wrap__description">Пропонуємо Вам розміщення вендінгового автомату з
                        продажу питної води. Від вас вимагається лише:</p>
                </div>
                <div class="cooperation-box">
                    <div class="cooperation-box__item">
                        <img class="cooperation-img_icon" src="{{ asset('assets/frontend/images/cooperation/like.svg') }}" alt="">
                        <p class="cooperation-box__p">Бажання встановити вендінговий автомат</p>
                    </div>
                    <div class="cooperation-box__item">
                        <img class="cooperation-img_icon" src="{{ asset('assets/frontend/images/cooperation/area.svg') }}" alt="">
                        <p class="cooperation-box__p">Метр площі.
                            Площа вендінгового автомату 1,25 м2</p>
                    </div>
                    <div class="cooperation-box__item">
                        <img class="cooperation-img_icon" src="{{ asset('assets/frontend/images/cooperation/socket.svg') }}" alt="">
                        <p class="cooperation-box__p">Вільна розетка або доступ до електрощітку</p>
                    </div>
                </div>
                <div class="cooperation-choose">
                    <h3 class="h3_class h3_choose">Чому варто обрати нас?</h3>
                    <p class="cooperation-wrap__description">Всі витрати, пов'язані з розміщенням та обслуговуванням
                        автоматів, ми беремо на себе.</p>
                    <div class="cooperation-choose__box">
                        <div class="support-list__box cooperation-list__box">
                            <p class="support-list__figure cooperation-figure">63</p>
                            <p class="support-list__description cooperation_description">розміщених водоматів</p>
                        </div>
                        <div class="support-list__box cooperation-list__box">
                            <p class="support-list__figure cooperation-figure">5000</p>
                            <p class="support-list__description cooperation_description">задоволених клієнтів</p>
                        </div>
                        <div class="support-list__box cooperation-list__box">
                            <p class="support-list__figure cooperation-figure">15</p>
                            <p class="support-list__description cooperation_description">відсотків з продажу води
                                передаємо ЗСУ</p>
                        </div>
                        <div class="support-list__box cooperation-list__box">
                            <p class="support-list__figure cooperation-figure">1500</p>
                            <p class="support-list__description cooperation_description">літрів безкоштовно для
                                дегустації води при
                                встановлені автомату</p>
                        </div>

                    </div>
                </div>
                <div class="cooperation-choose__switch">
                    <div class="cooperation-switch__item">
                        <img class="img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                        <p class="cooperation-switch__text">Ми дбаємо про навколишнє середовище, тому робимо
                            облаштування та облагородження прилеглих
                            територій</p>
                    </div>

                    <div class="cooperation-switch__item">
                        <img class="img_switch" src="{{ asset('assets/frontend/images/switch.svg') }}" alt="">
                        <p class="cooperation-switch__text">Щомісяця проводимо розіграші та акції для мешканців
                            квартир</p>
                    </div>

                </div>

                <div class="cooperation-guarantees">
                    <h3 class="h3_class">Наші гарантії</h3>
                    <div class="cooperation-guarantees__box">
                        <div class="cooperation-guarantees__item">
                            <img class="cooperation-guarantees__icon" src="{{ asset('assets/frontend/images/cooperation/deal.svg') }}" alt="">
                            <p class="cooperation-guarantees__text">Чесне партнерство</p>
                        </div>

                        <div class="cooperation-guarantees__item">
                            <img class="cooperation-guarantees__icon" src="{{ asset('assets/frontend/images/cooperation/water.svg') }}" alt="">
                            <p class="cooperation-guarantees__text">Якість питної води</p>
                        </div>

                        <div class="cooperation-guarantees__item">
                            <img class="cooperation-guarantees__icon" src="{{ asset('assets/frontend/images/cooperation/repair.svg') }}" alt="">
                            <p class="cooperation-guarantees__text">Заправка та технічна підтримка автомата</p>
                        </div>

                        <div class="cooperation-guarantees__item">
                            <img class="cooperation-guarantees__icon" src="{{ asset('assets/frontend/images/cooperation/check.svg') }}" alt="">
                            <p class="cooperation-guarantees__text">Дотримання суворих стандартів чистоти</p>
                        </div>

                        <div class="cooperation-guarantees__item">
                            <img class="cooperation-guarantees__icon" src="{{ asset('assets/frontend/images/cooperation/bush.svg') }}" alt="">
                            <p class="cooperation-guarantees__text">Утримання в порядку прилеглої території</p>
                        </div>

                        <div class="cooperation-guarantees__item">
                            <img class="cooperation-guarantees__icon" src="{{ asset('assets/frontend/images/cooperation/clock.svg') }}" alt="">
                            <p class="cooperation-guarantees__text">Своєчасна оплата оренди</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wave-img">
                <img class="wave-img wave-img__svg" src="{{ asset('assets/frontend/images/wave_cooperation.svg') }}" alt="">
            </div>
        </section>
    </div>
    <footer class="footer">
        <div class="footer-wrap">
            <div class="footer-wrap__box">
                <a href=""><img class="header-img footer-img" src="{{ asset('assets/frontend/images/logo_desktop.svg') }}" alt=""></a>
                <div class="footer-motto__box">
                    <p class="footer-motto">Пийте воду рідного краю, де ви народились</p>
                </div>

                <div class="footer-box_social">
                    <a class="header-inst" href="https://instagram.com/zdorovenka_ua">
                        <div class="header-inst__icon"></div>
                    </a>
                    <a class="header-facebook" href="https://www.facebook.com/groups/1639395006442813/">
                        <div class="header-facebook__icon"></div>
                    </a>
                </div>
            </div>
            <ul id="footerNav" class="footer-menu">
                <li class="footer-menu__item"><a href="#aboutUs">Про нас</a></li>
                <li class="footer-menu__item"><a href="#aboutWater">Про воду</a></li>
                <li class="footer-menu__item"><a href="#waterMachine">Водомати</a></li>
                <li class="footer-menu__item"><a href="#mission">Наші цінності</a></li>
                <li class="footer-menu__item"><a href="#support">Підтримуємо ЗСУ</a></li>
                <li class="footer-menu__item"><a href="#cooperation">Співпраця</a></li>
            </ul>

            <div class="footer-contacts_box">
                <div class="contacts_box_title">
                    <p class="footer-contacts__text">Гаряча лінія:</p>
                    <a class="footer-contacts__tel" href="tel:+380962630253">+380962630253</a>
                </div>
                <div class="contacts_box_list">
                    <div class="contacts_box_icon">
                        <a class="footer_link" href="">
                            <div class="contacts_box_ellipse">
                                <img src="{{ asset('assets/frontend/images/facebook_m.svg') }}" alt="" class="footer-icon__messenger">
                            </div>
                        </a>
                        <a class="footer_link" href="">
                            <div class="contacts_box_ellipse">
                                <img src="{{ asset('assets/frontend/images/phone_footer.svg') }}" alt="" class="footer-icon__messenger">
                            </div>
                        </a>
                        <a class="footer_link" href="">
                            <div class="contacts_box_ellipse">
                                <img src="{{ asset('assets/frontend/images/viber.svg') }}" alt="" class="footer-icon__messenger">
                            </div>
                        </a>
                        <a class="footer_link" href="">
                            <div class="contacts_box_ellipse">
                                <img src="{{ asset('assets/frontend/images/skype.svg') }}" alt="" class="footer-icon__messenger">
                            </div>
                        </a>
                        <a class="footer_link" href="">
                            <div class="contacts_box_ellipse">
                                <img src="{{ asset('assets/frontend/images/whatsapp.svg') }}" alt="" class="footer-icon__messenger">
                            </div>
                        </a>
                    </div>

                </div>
                <p class="footer-copyright">2022 © Всі права захищені</p>
            </div>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('assets/frontend/js/index.js') }}"></script>
</body>

</html>