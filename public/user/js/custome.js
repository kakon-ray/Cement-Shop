$(document).ready(function(){ 
    $('body').on('submit', '#contactmessage', function(e) {
        e.preventDefault();
    
        $.ajax({
            url: $(this).attr('action'),
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.status == 200) {
                    Swal.fire({
                        icon: "success",
                        title: data.msg,
                        text: "Thanks",
                        timer: 1500,
                        showConfirmButton: false,
                        customClass: 'swalstyle',
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: data.msg,
                        text: "Thanks",
                        timer: 1500,
                        showConfirmButton: false,
                        customClass: 'swalstyle',
                    });
                }
            }
        })
    })

    $('#price-quantity').on('input',function(e){
        var amount =  parseFloat($('#product-price').val());
        var quantity =  parseFloat($(this).val());
        var totalprice = (quantity * amount);
        $("#show-price").text("৳ " + totalprice + " কেজি");
       });
})
