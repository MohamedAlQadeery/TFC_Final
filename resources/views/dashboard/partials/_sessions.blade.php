@if (session('success'))
    <script>

            swal({
  title: "تمت العمليه !",
  text: "تم اضافة البيانات بنجاح !",
  icon: "success",
  button: "حسنا !!",
});
    </script>
@endif


@if (session('success_edit'))
    <script>

            swal({
  title: "تمت العمليه !",
  text: "تم تحديث البيانات بنجاح !",
  icon: "success",
  button: "حسنا !!",
});
    </script>
@endif



@if (session('success_delete'))
    <script>

            swal({
  title: "تمت العمليه !",
  text: "تم حذف البيانات بنجاح !",
  icon: "success",
  button: "حسنا !!",
});
    </script>
@endif



@if (session('error_session'))
    <script>

            swal({
  title: " وقع خطأ !",
  text: "حدث خطأ في العمليه",
  icon: "error",
  button: "حسنا !!",
});
    </script>
@endif
