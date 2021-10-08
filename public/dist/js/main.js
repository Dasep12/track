$(function () {
    //input data service 
    $("#inputService").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url : $(this).attr('action') ,
            method : $(this).attr('method') ,
            data : new FormData(this) ,
            processData : false ,
            contentType : false ,
            beforeSend : function(){
                $(".btn").attr('disabled',true);
                $(document).find('span.error-text').text('');
            },
            success : function(data){
                if(data.status == 0){
                    $.each(data.error ,function(prefix , val){
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                }else {
                    console.log(data.pesan);
                    swal(data.pesan);
                    $("#inputService")[0].reset();
                   // window.reload();
                }
            },
            complete : function(){
                $(".btn").attr('disabled',false);
            }
        })
    })
})


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
      beforeSend: function() {
        $("loadingModal").append('sedang mengambil data . . . ');
      },
      success: function(response) {
        // $('#bodymodal_userDetail').empty();
        $('#contentModal').empty();
        $('#contentModal').append(response);
      },
      complete() {
        $("loadingModal").append('');
      }
    });
  }
// end


  //update data status barang atau approved barang 
  //page app/http/controllers/BarangController
  //page views/daftarbarang.blade.php
  function update(id , url, stat) {
    swal({
        title: "Rubah Status Permintaan Service",
        text: "Sarana akan segera dikirim jika sudah approved",
        icon: "warning",
        buttons: [true, "Iya"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: url ,
            method: "GET",
            data: 'id=' + id + "&status=" + stat ,
            success: function(response) {
              swal({
                icon: "success",
                title: response
              }).then(function() {
                location.reload();
              })
            }

          })
        }
      });
  }
//   end

  //hapus data barang
  //page app/http/controllers/BarangController
  //page views/daftarbarang.blade.php
  function hapus(id , url , token ) {
    swal({
        title: "Hapus Permintaan Service",
        text: "Barang tidak jadi di  service",
        icon: "warning",
        buttons: [true, "Iya"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: url,
            method: "POST",
            data: 'id=' + id + "&_token=" + token,
            success: function(response) {
              swal({
                icon: "success",
                title: response
              }).then(function() {
                location.reload();
              })
            }

          })
        }
      });
  }
//   end