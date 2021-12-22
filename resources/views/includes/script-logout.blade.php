<script>
  $(document).ready(function() {
    $(".keluar").on("click", function(e) {
      e.preventDefault();
      let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      Swal.fire({
        title: 'Apakah anda yakin ingin keluar?'
        , text: "Sesi login anda akan berkahir."
        , icon: 'warning'
        , showCancelButton: true
        , confirmButtonColor: '#3085d6'
        , cancelButtonColor: '#d33'
        , reverseButtons: true
        , cancelButtonText: 'Tetap di laman Ini'
        , confirmButtonText: 'Ya, Keluar Sekarang'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.post("{{ route('logout') }}", {
              _token: CSRF_TOKEN
            })
            .then((response) => {
              if (response.status == 204) {
                Swal.fire({
                  position: 'center'
                  , icon: 'success'
                  , title: 'Anda telah keluar, silahkan login kembali nanti.'
                  , showConfirmButton: false
                  , timer: 3000
                })
                setTimeout(() => {
                  window.location.reload()
                }, 2000);
              }
            }, (error) => {
              console.log(error);
            });
        }
      })

    });
  })

</script>
