<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
<!-- Tambahkan sebelum tag </body> -->
<script>
    // Check if the alert is set
    @if(session('alert') == 'wrong-password')
        // Display the alert
        $(document).Toasts('create', {
            title: 'Error',
            body: 'Password atau Email Salah. Coba Lagi.',
            class: 'bg-danger',
            delay: 3000
        });
    @endif
</script>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('new_password');
        var passwordType = passwordInput.getAttribute('type');

        if (passwordType === 'password') {
            passwordInput.setAttribute('type', 'text');
        } else {
            passwordInput.setAttribute('type', 'password');
        }
    });
</script>
