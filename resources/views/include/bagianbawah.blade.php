<script src="{{ asset('template/dist/assets') }}/static/js/components/dark.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/compiled/js/app.js"></script>
<script src="{{ asset('template/dist/assets') }}/static/js/themeSwitcher.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



<!-- Theme -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


{{-- Home Template --}}

<!-- Scripts -->
<script src="{{ asset('templatemo') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('templatemo') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('templatemo') }}/assets/js/owl-carousel.js"></script>
<script src="{{ asset('templatemo') }}/assets/js/animation.js"></script>
<script src="{{ asset('templatemo') }}/assets/js/imagesloaded.js"></script>
<script src="{{ asset('templatemo') }}/assets/js/popup.js"></script>
<script src="{{ asset('templatemo') }}/assets/js/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    @if (session('add'))
        Toastify({
            text: "{{ session('add') }}",
            duration: 12000, // Durasi toast dalam milidetik (3 detik)
            close: true, // Menampilkan tombol close
            gravity: "top", // Posisi toast (top, bottom, atau center)
            position: "right", // Posisi toast (left, right, atau center)
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            stopOnFocus: true, // Tidak menutup toast saat di-hover
        }).showToast();
    @endif
</script>
<script>
    @if (session('update'))
        Toastify({
            text: "{{ session('update') }}",
            duration: 12000, // Durasi toast dalam milidetik (3 detik)
            close: true, // Menampilkan tombol close
            gravity: "top", // Posisi toast (top, bottom, atau center)
            position: "right", // Posisi toast (left, right, atau center)
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            stopOnFocus: true, // Tidak menutup toast saat di-hover
        }).showToast();
    @endif
</script>
<script>
    @if (session('destroy'))
        Toastify({
            text: "{{ session('destroy') }}",
            duration: 12000, // Durasi toast dalam milidetik (3 detik)
            close: true, // Menampilkan tombol close
            gravity: "top", // Posisi toast (top, bottom, atau center)
            position: "right", // Posisi toast (left, right, atau center)
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            stopOnFocus: true, // Tidak menutup toast saat di-hover
        }).showToast();
    @endif
</script>
