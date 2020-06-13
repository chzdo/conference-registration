$(document).ready(function () {

    $(document).ajaxStart(function () {
        Pace.restart();
    });
    $("#idalert").hide();

    $("#memberno").change(function () {
        $("#register").prop("disabled", true);
        if ($(this).val() != ' ') {
            $("#load").addClass('loader');
            var request
            if (request) {
                request.abort();
            }
            var form = new FormData();
            form.append("memberno", $(this).val());
            request = $.ajax({
                url: "axproc.php",
                type: "post",
                data: form,
                cache: false,
                contentType: false, //must, tell jQuery not to process the data
                processData: false

            });
            request.done(function (response, textStatus, jqXHR) {

                var obj = jQuery.parseJSON(response);

                if (obj['code'] === 1) {

                    $("#idalert").html(obj['fname'] + '  ' + obj['lname']);

                } else {

                    $("#idalert").text("not found");
                    $("#memberno").val('');
                }
                $("#load").removeClass('loader');
                $("#idalert").show();
                $("#register").prop("disabled", false);
                //  window.location.reload();
            });
        }

    });

$("#register").click(function(){
    $("#register").prop("disabled",true);
})


    $("#spin").hide();
    $("#subs").hide();
    $("#error").hide();
    $("#uploadabs").submit(function (e) {

        $("#absbtn").prop("disabled", true);
     //   $("#absbtn").html($("#spin"));
      //  $("#spin").show();
        e.preventDefault();
        var request;
        var form = new FormData(document.getElementById('uploadabs'));

        var file_data = $('#paper_pdf').prop('files')[0];

        form.append('file', file_data);
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: "../axproc.php",
            type: "post",
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false

        });
        request.done(function (response, textStatus, jqXHR) {

            var obj = jQuery.parseJSON(response);
            if (obj['code'] === 1) {
                $("#subs").show();
                $("#up").hide();

            } else {
                $("#error").show();
                $("#error").html(obj['msg']);
            }
          // $("#spin").hide();
            $("#absbtn").prop("disabled", false);
           // $("#absbtn").text("Submit Abstract");

        });
    });


    $("#absactbtn").click(function (e) {
        e.preventDefault();
       $("#absactbtn").prop("disabled", true);
        var request;
        var form = new FormData();
        var email = $("#useremail").val();

        form.append("aemail", email);

        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: "../axproc.php",
            type: "post",
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false

        });
        request.done(function (response, textStatus, jqXHR) {
               // alert(response);
             window.location.reload();


        });
    });



    $("#absfailbtn").click(function (e) {

        e.preventDefault();
        $("#absactbtn").prop("disabled", true);
        var request;
        var form = new FormData();
        var email = $("#useremail").val();

        form.append("femail", email);

        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: "../axproc.php",
            type: "post",
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false

        });
        request.done(function (response, textStatus, jqXHR) {

            var obj = jQuery.parseJSON(response);
            window.location.reload();


        });
    });


    $("#uploadConf").submit(function (e) {

        $("#uplbtn").prop("disabled", true);
        // $("#uplbtn").html($("#spin"));
        // $("#spin").show();
        e.preventDefault();
        var request;
        var form = new FormData(document.getElementById('uploadConf'));

        var file_data = $('#file').prop('files')[0];

        form.append('file', file_data);
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: "../axproc.php",
            type: "post",
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false

        });
        request.done(function (response, textStatus, jqXHR) {
          
            $("#uplbtn").prop("disabled", false);
           window.location.reload();

        });
    });
    
       $("#add").submit(function (e) {

        $("#addbtn").prop("disabled", true);
    
        e.preventDefault();
        var request;
        var form = new FormData(document.getElementById('add'));

        var file_data = $('#passp').prop('files')[0];

        form.append('file', file_data);
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: "../axproc.php",
            type: "post",
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false

        });
        request.done(function (response, textStatus, jqXHR) {

      alert(response);
          
            $("#addbtn").prop("disabled", false);
         
            window.location.reload();
        });
    });
});