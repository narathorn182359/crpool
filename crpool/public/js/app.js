$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#gallery").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "/data_gallery",
            dataType: "json",
            type: "POST",
            data: { _token: $("#token").val() },
        },
        columns: [{ data: "img" }, { data: "category" }, { data: "options" }],
    });
    

    $("#products").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "/data_productget",
            dataType: "json",
            type: "POST",
            data: { _token: $("#token").val() },
        },
        columns: [{ data: "img" }, { data: "name" }, { data: "options" }],
    });


    $("body").on("click", ".delete_product", function () {
      var id = $(this).data("id");
      //confirm("Are You sure want to delete !");
      Swal.fire({
          title: "ยืนยันการลบข้อมูล?",
          text: "กรุณาตรวจสอบก่อนยืนยัน!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "ตกลง",
          cancelButtonText: "ยกเลิก",
      }).then((result) => {
          if (result.value) {
              $.ajax({
                  type: "POST",
                  url: "/delete_product",
                  data: {
                      id: id,
                  },
                  success: function (data) {
                      Swal.fire(
                          "ลบข้อมูลสำเร็จ!",
                          "หากสงสัยข้อมูลกรุณาติดต่อทีมพัฒนา",
                          "success"
                      ).then(function () {
                          window.location.reload();
                      });
                  },
                  error: function (data) {
                      Swal.fire({
                          icon: "error",
                          title: "ผิดพลาด",
                          text: "ไม่สามารถลบได้กรุณาติดต่อทีมพัฒนา",
                          confirmButtonText: "ตกลง",
                      });
                  },
              });
          }
      });
  });
    $("body").on("click", ".delete_gallery", function () {
        var id = $(this).data("id");
        //confirm("Are You sure want to delete !");
        Swal.fire({
            title: "ยืนยันการลบข้อมูล?",
            text: "กรุณาตรวจสอบก่อนยืนยัน!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ตกลง",
            cancelButtonText: "ยกเลิก",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/delete_gallery",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        Swal.fire(
                            "ลบข้อมูลสำเร็จ!",
                            "หากสงสัยข้อมูลกรุณาติดต่อทีมพัฒนา",
                            "success"
                        ).then(function () {
                            window.location.reload();
                        });
                    },
                    error: function (data) {
                        Swal.fire({
                            icon: "error",
                            title: "ผิดพลาด",
                            text: "ไม่สามารถลบได้กรุณาติดต่อทีมพัฒนา",
                            confirmButtonText: "ตกลง",
                        });
                    },
                });
            }
        });
    });
});
