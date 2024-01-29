$(document).ready(function () {
  //Admin login submit alert
  $('body').on('submit', '#admin_alert', function (e) {
    e.preventDefault();

    $.ajax({
      url: $(this).attr('action'),
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        if (data.status == 200) {
          Swal.fire({
            icon: "success",
            title: data.msg,
            text: "Thanks",
            timer: 1500,
            showConfirmButton: false,
            customClass: 'swalstyle',
          });

          location.reload()
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


  // profile page show and hiddin button
  $("#cement").show();
  $("#rod").hide();

  $('#category').on('change', function (e) {
    var valueSelected = this.value;

    if (valueSelected == 'rod') {
      console.log(true)
      $("#rod").show();
      $("#cement").hide();
    } else if (valueSelected == 'cement') {
      $("#cement").show();
      $("#rod").hide();
    }

  })



  if ($("#category_value").val() == 'rod') {
    $("#cement_update").hide();
  } else if ($("#category_value").val() == 'cement') {
    $("#rod_update").hide();
  }

  // $('#category_update').on('change', function (e) {
  //   var valueSelected = this.value;
  //   console.log(valueSelected)
  //   if (valueSelected == 'rod') {
  //     $("#rod_update").show();
  //     $("#cement_update").hide();
  //   } else if (valueSelected == 'cement') {
  //     $("#cement_update").show();
  //     $("#rod_update").hide();
  //   }

  // })



    //custome alert
    $('body').on('submit','#product',function(e){
      e.preventDefault();
  
      $.ajax({
      url: $(this).attr('action'),
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData: false,
      success: function(data){
          if (data.status == 200) {
             Swal.fire({
              icon: "success",
              title: data.msg,
              text: "Thanks",
              timer: 1500,
              showConfirmButton: false,
              customClass: 'swalstyle',
            });

            window.location.href = '/admin/dashboard/product';
          }else{
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
    $('body').on('submit','#gallery',function(e){
      e.preventDefault();
  
      $.ajax({
      url: $(this).attr('action'),
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData: false,
      success: function(data){
          if (data.status == 200) {
             Swal.fire({
              icon: "success",
              title: data.msg,
              text: "Thanks",
              timer: 1500,
              showConfirmButton: false,
              customClass: 'swalstyle',
            });

            window.location.href = '/admin/dashboard/gallery';
          }else{
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
    $('body').on('submit','#employee',function(e){
      e.preventDefault();
  
      $.ajax({
      url: $(this).attr('action'),
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData: false,
      success: function(data){
          if (data.status == 200) {
             Swal.fire({
              icon: "success",
              title: data.msg,
              text: "Thanks",
              timer: 1500,
              showConfirmButton: false,
              customClass: 'swalstyle',
            });

            window.location.href = '/admin/dashboard/employee';
          }else{
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
    $('body').on('submit','#slider',function(e){
      e.preventDefault();
  
      $.ajax({
      url: $(this).attr('action'),
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData: false,
      success: function(data){
          if (data.status == 200) {
             Swal.fire({
              icon: "success",
              title: data.msg,
              text: "Thanks",
              timer: 1500,
              showConfirmButton: false,
              customClass: 'swalstyle',
            });

            window.location.href = '/admin/dashboard/slider';
          }else{
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
    $('body').on('submit','#aboutus',function(e){
      e.preventDefault();
  
      $.ajax({
      url: $(this).attr('action'),
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData: false,
      success: function(data){
          if (data.status == 200) {
             Swal.fire({
              icon: "success",
              title: data.msg,
              text: "Thanks",
              timer: 1500,
              showConfirmButton: false,
              customClass: 'swalstyle',
            });

            window.location.reload()
          }else{
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


})