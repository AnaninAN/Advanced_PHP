$(document).ready(function(){

    $(".action").on('click', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: "/basket/AddBasket/",
            type: "POST",
            dataType : "json",
            data:{
                id: id
            },
            error: function() {
                alert('error');
            },
            success: function(answer) {
                $("#basketCount").html(answer.count);
                $("#mainCount").html(answer.count);
            }

        })
    });

    $(".delProdBasket").on('click', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: "/basket/delete/",
            type: "POST",
            dataType : "json",
            data:{
                id: id
            },
            error: function() {
                alert('error');
            },
            success: function(answer){
                {
                    $("#main" + id).remove();
                    $("#basket" + id).remove();
                    $("#basketCount").html(answer.count);
                    $("#mainCount").html(answer.count);
                    $("#mainTotal").html(answer.total);
                }
            }

        })
    });

});