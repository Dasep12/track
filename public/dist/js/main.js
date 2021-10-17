$(function () {
    //input data yang akan di kirim service
    //page views inputbarang.blade.php
    //controller InputController
    $("#inputService").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".btn").attr("disabled", true);
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                } else {
                    // console.log(data.pesan);
                    swal({
                        title: data.pesan,
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                    }).then(function () {
                        $("#inputService")[0].reset();
                        location.reload();
                    });
                }
            },
        });
    });

    //input data barang yang batal service dan ajukan musnah
    $("#usulkanMusnahBarang").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            processData: false,
            contentType: false,
            data: new FormData(this),
            beforeSend: function () {
                //$(".btn").attr('disabled',true);
                $(document).find("span.error-text").text("");
            },
            success: function (response) {
                // alert(response);
                if (response.msg == 0) {
                    $.each(response.error, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                } else if (response.msg == 1) {
                    swal({
                        title: response.pesan,
                        icon: "success",
                        closeOnClickOutside: false,
                    }).then(function () {
                        location.reload();
                    });
                }
            },
        });
    });
});

//tampilkan detail data barang service di modal lewat ajax request
//page app/http/controllers/BarangController
//page views/daftarbarang.blade.php
function showuserdetail(id, url) {
    $.ajax({
        type: "post",
        method: "get",
        url: url,
        data: "id=" + id,
        dataType: "html",
        beforeSend: function () {
            $("loadingModal").append("sedang mengambil data . . . ");
        },
        success: function (response) {
            // $('#bodymodal_userDetail').empty();
            $("#contentModal").empty();
            $("#contentModal").append(response);
        },
        complete() {
            $("loadingModal").append("");
        },
    });
}
// end

//update data status barang atau approved barang
//page app/http/controllers/BarangController
//page views/daftarbarang.blade.php
function update(id, url, stat, info) {
    swal({
        title: info,
        icon: "warning",
        buttons: [true, "Iya"],
        dangerMode: true,
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                method: "GET",
                data: "id=" + id + "&status=" + stat,
                success: function (response) {
                    swal({
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        title: response,
                    }).then(function () {
                        location.reload();
                    });
                },
            });
        }
    });
}
//   end

//hapus data barang
//page app/http/controllers/BarangController
//page views/daftarbarang.blade.php
function hapus(id, url, token) {
    swal({
        title: "Hapus Permintaan Service",
        text: "Barang tidak jadi di  service",
        icon: "warning",
        buttons: [true, "Iya"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                method: "POST",
                data: "id=" + id + "&_token=" + token,
                success: function (response) {
                    swal({
                        icon: "success",
                        title: response,
                    }).then(function () {
                        location.reload();
                    });
                },
            });
        }
    });
}
//   end

//usulkan musnahkan sarana
//page app/http/controllers/MusnahController
//page views/barangMusnah.blade.php
function musnah(id, url, info) {
    swal({
        title: info,
        icon: "warning",
        buttons: [true, "Iya"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                method: "GET",
                data: "id=" + id,
                success: function (response) {
                    console.log(response);
                    swal({
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        title: response,
                    }).then(function () {
                        location.reload();
                    });
                },
            });
        }
    });
}
//end

//modal kirim alasan barang di musnahkan
//page app/http/controllers/BarangController
//page views/daftarbarang.blade.php
function showUsulanMusnah(id, url) {
    $.ajax({
        type: "post",
        method: "get",
        url: url,
        data: "id=" + id,
        dataType: "html",
        beforeSend: function () {
            $("loadingModal").append("sedang mengambil data . . . ");
        },
        success: function (response) {
            //$('#formUsulanMusnah').empty();
            //$('#formUsulanMusnah').append(response);
            document.getElementById("formUsulanMusnah").innerHTML = response;
        },
        complete() {
            $("loadingModal").append("");
        },
    });
}
// end

//musnahkan sarana
//page app/http/controllers/MusnahController
//page views/barangMusnah.blade.php
function accmusnah(id, url, info, token) {
    swal({
        title: info,
        icon: "warning",
        buttons: [true, "Iya"],
        dangerMode: true,
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                method: "POST",
                data: "id=" + id + "&_token=" + token,
                success: function (response) {
                    //console.log(response);
                    swal({
                      icon: "success",
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      title: response
                    }).then(function() {
                      location.reload();
                    })
                },
            });
        }
    });
}
//end



//tambah data sarana 
//page controller Addcontroller
//view addsarana.blade.php //route localhost/addsarana
$(function(){
  $("#addsarana").on('submit',function(e){
    e.preventDefault();
      $.ajax({
        url : $(this).attr('action') ,
        method : $(this).attr('method') ,
        data : new FormData(this) ,
        contentType : false ,
        processData : false ,
        beforeSend : function(){
            $(".btn").attr('disabled',true);
            $(document).find("span.error-text").text("");
          },
          success : function(result){

            if(result.msg == 0 ){
              $.each(result.error, function (prefix, val) {
                $("span." + prefix + "_error").html('<i class="fa fa-times-circle-o"></i> '  +val[0]);
              });
            }else if(result.msg == 1) {
                swal({
                  icon : "success" ,
                  title : result.pesan ,
                }).then(function(){
                  location.reload();
                })
            }else if(result.msg == 2){
              alert(result.error);
            }
          },
          complete : function(){
              $(".btn").attr('disabled',false);
          }
      })
  })
})


//validasi file yang di upload
function exe() {
    var file = document.getElementById("fileUpload");
    var path = file.value;
    var exe = /(\.csv|\.CSV)$/i;
    if (!exe.exec(path)) {
        swal({
            icon : "warning",
            title : "File di Tolak" , 
            dangerMode : [true,"Ok"]
        });
        file.value = "";
        return;
    }
}


//page addUser
// UserController.php
// view tambahuser
$(function(){
  $("#addUser").on('submit',function(e){
    e.preventDefault();
      $.ajax({
        url : $(this).attr('action') ,
        method : $(this).attr('method') ,
        data : new FormData(this) ,
        contentType : false ,
        processData : false ,
        beforeSend : function(){
            //$(".btn").attr('disabled',true);
            $(document).find("span.error-text").text("");
          },
          success : function(result){

            if(result.msg == 0 ){
              $.each(result.error, function (prefix, val) {
                $("span." + prefix + "_error").html('<i class="fa fa-times-circle-o"></i> '  +val[0]);
              });
            }else if(result.msg == 1) {
                swal({
                  icon : "success" ,
                  title : result.pesan ,
                }).then(function(){
                  location.reload();
                })
            }else if(result.msg == 2){
              alert(result.error);
            }
          },
          complete : function(){
              $(".btn").attr('disabled',false);
          }
      })
  })
})

// end of file 
