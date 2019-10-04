$(document).ready(function() {
    $("#sum_vklada").bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    $("#sum_refill_vklad").bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    // $("#rate").bind("change keyup input click", function() {
    //     if (this.value.match(/[^0-9\.]/g)) {
    //         this.value = this.value.replace(/[^0-9\.]/g, '');
    //     }
    // });
});

$("#calcc").on("click", function() {
    let sum_vklada = $("#sum_vklada").val().trim();
    let sum_refill_vklad = $("#sum_refill_vklad").val().trim();
    let radio;
    let years =$("#years").val();
    let date = $("#datepicker").val();

    let rad=document.getElementsByName('inlineRadioOptions');
    for (var i=0;i<rad.length; i++) {
        if (rad[i].checked) {
            radio = i;
        }
    }
    if (radio == 0) {
        sum_refill_vklad = 0;
    }
    while (true) {
        if ((sum_vklada === '') || (sum_vklada < 10000) || (sum_vklada >  3000000)) {
            $("#result").text("Сумма вклада может быть от 10000 до 3000000");
            return false;
        } else if ((date === '')) {
            $("#result").text("Вы не выставили дату");
            return false;
        } else if (sum_refill_vklad === 0) {
            break;
        } else if ((sum_refill_vklad === '') || (sum_refill_vklad < 10000) || (sum_refill_vklad > 3000000)) {
            $("#result").text("Сумма поплонения вклада может быть от 1000 до 3000000");
            return false;
        }
        break;
    }

    $.ajax ({
        url: '../ajax/calc.php',
        type: 'post',
        cache: false,
        data: { 'sum_vklada': sum_vklada, 'sum_refill_vklad': sum_refill_vklad,'years': years,'date': date},
        dataType: 'html',
        beforeSend: function () {
            $("#calc").prop("disabled",true)
        },
        success: function (data)
        {
            $("#result").text(data);
            $("#calc").prop("disabled",false);
        }
    });
});