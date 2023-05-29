<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
@livewireScripts

<script type="text/javascript">
window.livewire.on('closeModal', () => {
    $('#createDataModal').modal('hide');
    $('#generarModal').modal('hide');
    $('#updateModal').modal('hide');
});
</script>

<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>

<script>
Livewire.on('alert', function(title, message, icon) {
    var timerInterval;
    Swal.fire({
        title: title,
        text: message,
        icon: icon,
        timer: 2000,
        customClass: {
            confirmButton: 'btn btn-info'
        },
        buttonsStyling: false,
        willOpen: function() {
            timerInterval = setInterval(function() {
            }, 100);
        },
        willClose: function() {
            clearInterval(timerInterval);
        }
    }).then(function(result) {
        if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.timer
        ) {
            console.log('I was closed by the timer');
        }
    });
})
</script>
@stack('scripts')

