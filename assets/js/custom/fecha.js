var today = new Date();
var manana=new Date(today.getTime() + 1*60*60*1000);
$(document).ready(function () {
    // $('#datetimepicker6').datetimepicker({
    //     maxDate:today,
    // });
    // $('#datetimepicker7').datetimepicker({
    //     minDate:$('#datetimepicker6').date,
    //     maxDate:today,
    //   //  useCurrent: false, //Important! See issue #1075
    // });
    //
    // $("#datetimepicker6").on("dp.change", function (e) {
    //
    //     $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    //
    // });
    // $("#datetimepicker7").on("dp.change", function (e) {
    //     $('#datetimepicker7').data("DateTimePicker").maxDate(today);
    //    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    //
    // });

    var today = new Date();
    var manana=new Date(today.getTime() + 1*60*60*1000);
    $(document).ready(function () {
        $('#datetimepicker6').datetimepicker({
            minDate:today,
        });

    });

    if(document.getElementById("inicio") != null){
        $('#datetimepicker6').datetimepicker({
            date: new Date(document.getElementById("inicio").value)
        });
    }


    


});



