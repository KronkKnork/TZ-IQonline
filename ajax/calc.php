<?php
    $sum_vklada = $_POST['sum_vklada'];
    $sum_refill_vklad = $_POST['sum_refill_vklad'];
    $years = $_POST['years'];
    $date = $_POST['date'];
    $date = (string)$date[3] . (string)$date[4];

    $percent = 0.1;             //процентная ставка банка - 10%
    $m = 12;                    //период капитализации и дополнительных взносов
    $n = $years;                //вклад на кол-во лет
    $s = $sum_vklada;           //сумма на счете на конец прошлого месяца
    $sv = $sum_refill_vklad;    //сумма ежемесячного пополнения
    $daysn = (int)$date;        //количество дней в данном месяце, на которые приходился вклад

    $result = $sv * ($m / $percent) * (pow((1 + $percent / $m),($m * $n)) - 1) + $s * (pow((1 + $percent / $m),($m * $n )));
    echo round($result, 2);
?>