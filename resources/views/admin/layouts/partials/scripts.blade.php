<script>
    var hostUrl = "assets/";
</script>

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!-- izitoast JS -->
<script src="{{ asset('js/iziToast.js') }}"></script>

<script>
    // logout.js
    document.addEventListener("DOMContentLoaded", function() {
        const logoutLink = document.getElementById("logout-link");
        const logoutForm = document.getElementById("logout-form");

        if (logoutLink && logoutForm) {
            logoutLink.addEventListener("click", function(event) {
                event.preventDefault();
                logoutForm.submit();
            });
        }
    });
</script>

<!-- Page Specific JavaScript -->