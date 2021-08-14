   <!-- Vendor js -->
   <script src="{{ asset('dashboard_files') }}/assets/js/vendor.min.js"></script>


   <!-- App js -->
   <script src="{{ asset('dashboard_files') }}/assets/js/app.min.js"></script>
   <script src="{{asset('dashboard_files/plugins/select2/select2.min.js')}}"></script>


   {{-- sweetalert --}}
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   @stack('js')


   <script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){

    $(document).on('click','.delete',function(e){

        e.preventDefault();
            var that = $(this);

        swal({
        title: "هل انت متأكد من الحذف ؟",
         text: "لن تستطيع ارجاع البيانات عند حذفها",
         icon: "warning",
         buttons: ['الغاء' , 'تأكيد'],
        dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    that.closest('form').submit()

  } else {
    swal("تم الغاء العمليه !", {
      icon: "error",
    });
  }

        });
    })



});

   </script>


