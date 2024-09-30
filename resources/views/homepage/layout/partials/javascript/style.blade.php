<script src="{{ url('/homepage') }}/js/jquery.min.js"></script>
<script src="{{ url('/homepage') }}/js/bootstrap.min.js"></script>
<script src="{{ url('/homepage') }}/js/owl.carousel.min.js"></script>
<script src="{{ url('/homepage') }}/js/jquery.prettyPhoto.js"></script>
<script src="{{ url('/homepage') }}/js/slick.min.js"></script>
<script src="{{ url('/homepage') }}/js/isotope.pkgd.min.js"></script> 
<script src="{{ url('/homepage') }}/js/custom.js"></script>
<script src="{{ asset('landingpage/js/sweetalert/sweetalert.min.js') }}"></script>
<script>
    let type = false;

    if (`{{ session()->has('success') }}` == true) type = 'success';
    if (`{{ session()->has('error') }}` == true) type = 'error';

    if (type) {
        Swal.fire({
            title: type == 'success' ? "Success !" : 'Error !',
            html: type == 'success' ? "{{ session()->get('success') }}" : "{!! session()->get('error') !!}",
            icon: `${type}`,
            confirmButtonColor: "#556ee6"
        })
    }
</script>