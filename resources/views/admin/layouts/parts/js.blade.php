


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/admin/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/multiselect/js/jquery.multi-select.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });

        });

        // For select
        $('.selectpicker').selectpicker();

        // Create New User
        $('#new-user-form-submit').on('click', function(e) {
            e.preventDefault();
            var formData = $('#new-user-form').serializeArray();

            $.ajax({
                data: formData,
                url: '/manage-users/store',
                type: 'POST',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //console.log(response);
                    $('#responsive-modal').modal('hide')
                    document.getElementById("new-user-form").reset();
                    location.reload();
                }
            });

        });

        // Delete User
        $('.btn-remove').on('click', function(e) {
            e.preventDefault();
            var uid = $(this).data('uid');

            $.ajax({
                url: '/manage-users/destroy/'+uid,
                type: 'DELETE',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //console.log(response);
                    location.reload();
                }
            });

        });

    </script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/admin/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
