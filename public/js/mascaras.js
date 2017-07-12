
$(document).ready(function(){
    $(".data").datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR"
    });
    $('.real').maskMoney({prefix: "R$ ", precision: 2, thousands: '.', decimal: ','});
});

