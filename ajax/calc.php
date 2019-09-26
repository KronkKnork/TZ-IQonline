<?php
    $sum_vklada = $_POST['sum_vklada'];
    $sum_refill_vklad = $_POST['sum_refill_vklad'];
    $years = $_POST['years'];
    $date = $_POST['date'];
    $date = (string)$date[3] . (string)$date[4];

    $percent = 10;                  //процентная ставка банка - 10%
    $daysy = 365;                   //количество дней в году
    $summn1 = $sum_vklada;          //сумма на счете на конец прошлого месяца
    $summadd = $sum_refill_vklad;   //сумма ежемесячного пополнения
    $daysn = (int)$date;                     //количество дней в данном месяце, на которые приходился вклад


    $summn = $summn1 + ($summn1 + $summadd)*$daysn*($percent / $daysy);

    echo round($summn);
?>