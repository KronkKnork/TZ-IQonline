<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Калькулятор</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">
    <link href="src/css/calc.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <img class="logo" src="src/img/Слой%202.png" alt="logo">
    <img class="phone" src="src/img/8-800-100-5005%20+7%20(3452)%20522-000_.png" alt="phone">

    <nav class="navbar navbar-expand menu">
        <ul class="navbar-nav menu-ul">
            <li class="nav-item menu-li"><a class="nav-link" href="#">Кредитные карты</a></li>
            <li class="nav-item menu-li dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                    Вклады
                </a>
                <ul class="dropdown-menu bg-menu">
                    <li><a class="dropdown-item" href="#">Калькулятор</a></li>
                </ul>
            </li>
            <li class="nav-item menu-li"><a class="nav-link" href="#">Дебетовая карта</a></li>
            <li class="nav-item menu-li"><a class="nav-link" href="#">Страхование</a></li>
            <li class="nav-item menu-li"><a class="nav-link" href="#">Друзья</a></li>
            <li class="nav-item menu-li"><a class="nav-link" href="#">Интернет-банк</a></li>
        </ul>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item"><a href="#">Вклады</a></li>
            <li class="breadcrumb-item active" aria-current="page">Калькулятор</li>
        </ol>
    </nav>
    <div class="bg-calc">
        <span class="name-calc">Калькулятор</span>
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="form">
                    <div class="form-group label-input">
                        <label class="label text-right" for="datepicker">Дата оформления вклада</label>
                        <input type="text" class="form-control col-2" id="datepicker" placeholder="мм.дд.гггг">
                    </div>
                    <div class="form-group label-input">
                        <label class="label text-right" for="sum_vklada">Сумма вклада</label>
                        <input type="text" class="form-control col-2" id="sum_vklada" value="10000" oninput="CheckRange()">
                        <input type="range"  min="10000" max="3000000" value="10000" class="form-control-range custom-range" id="formControlRange1" oninput="CheckRange()">
                    </div>
                    <div class="form-group label-input">
                        <label class="label text-right" for="years">Срок вклада</label>
                        <select class="form-control col-2" id="years">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group label-input">
                        <label class="label text-right" for="refill_vklad">Пополнение вклада</label>
                        <div class="radio">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" checked>
                                <label class="form-check-label" for="inlineRadio1">Нет</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">Да</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group label-input">
                        <label class="label text-right" for="sum_refill_vklad">Сумма пополнения вклада</label>
                        <input type="text" class="form-control col-2" id="sum_refill_vklad"  value="10000">
                        <input type="range" min="10000" max="3000000" value="10000" class="form-control-range custom-range" id="formControlRange2">
                    </div>
                    <div>
                        <button type="button" class="btn col-2" id="calcc">Рассчитать</button>
                        <div id="answer" class="form-control float-right col-8"><span>Результат: </span><div id="result"></div></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <footer class="navbar fixed-bottom navbar-light bg-menu">
            <ul class="list-group list-group-horizontal col-12 footer">
                <li><a href="#">Кредитные карты</a></li>
                <li><a href="#">Вклады</a></li>
                <li><a href="#">Дебютовая карта</a></li>
                <li><a href="#">Страхование</a></li>
                <li><a href="#">Друзья</a></li>
                <li><a href="#">Интернет-банк</a></li>
            </ul>
        </footer>

    </div>

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/popper.js/dist/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
        const
            xxx = document.querySelector('#sum_vklada'),
            yyy = document.querySelector('#formControlRange1');
        xxx.oninput = () => yyy.value = xxx.value;
        yyy.oninput = () => xxx.value = yyy.value;
        const
            xx = document.querySelector('#sum_refill_vklad'),
            yy = document.querySelector('#formControlRange2');
        xx.oninput = () => yy.value = xx.value;
        yy.oninput = () => xx.value = yy.value;
    </script>
    <script type="text/javascript" src="src/main.js"></script>
</body>
</html>