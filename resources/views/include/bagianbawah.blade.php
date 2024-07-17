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
   @if(session('add'))
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
    @if(session('update'))
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
    @if(session('destroy'))
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

{{-- Search --}}
<script>
    $(document).ready(function() {
        // Fungsi untuk mengambil dan menampilkan daftar santri
        function fetchSantri(query = '', sortBy = 'nama_santri', sortOrder = 'asc') {
            $.ajax({
                url: '{{ route('santri.search') }}',
                type: 'GET',
                data: { 
                    query: query,
                    sort_by: sortBy,
                    sort_order: sortOrder 
                },
                success: function(data) {
                    let list = '';
                    data.santris.forEach(santri => {
                        list += `
                        <div class="first-thumb active table-card">
                            <div class="thumb">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <p class="teks1 rating">4.8</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                                        <p class="teks1 mt-2">${santri.angkatan_santri}</p>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <h4>${santri.nama_santri}</h4>
                                        <p class="teks1 date">${santri.tgllahir_santri}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                    $('#santri-list').html(list); // Menyisipkan daftar santri ke dalam elemen '#santri-list'
                    $('#result-count').text(`Hasil Pencarian: ${data.count}`); // Menampilkan jumlah hasil pencarian
                }
            });
        }

        // Event handler untuk pencarian berdasarkan input
        $('#search').on('keyup', function() {
            let query = $(this).val();
            fetchSantri(query);
        });

        // Event handler untuk pengurutan
        $('.sort-button').on('click', function() {
            $('.sort-button').removeClass('active');
            $(this).addClass('active');

            let sortBy = $(this).data('sort-by');
            let sortOrder = $(this).data('sort-order');

            if (sortOrder === 'asc') {
                $(this).data('sort-order', 'desc');
                $(this).find('i').removeClass('fa-sort-alpha-down fa-sort-numeric-down fa-sort-amount-down').addClass('fa-sort-alpha-up fa-sort-numeric-up fa-sort-amount-up');
            } else {
                $(this).data('sort-order', 'asc');
                $(this).find('i').removeClass('fa-sort-alpha-up fa-sort-numeric-up fa-sort-amount-up').addClass('fa-sort-alpha-down fa-sort-numeric-down fa-sort-amount-down');
            }

            let query = $('#search').val();
            fetchSantri(query, sortBy, sortOrder);
        });

        // Event handler untuk penghapusan semua data santri
        $('#delete-all').on('click', function() {
            if (confirm('Apakah Anda yakin ingin menghapus semua data santri?')) {
                $.ajax({
                    url: '{{ route('santri.deleteAll') }}',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        alert(data.message);
                        fetchSantri(); // Memuat ulang daftar santri setelah penghapusan berhasil
                    }
                });
            }
        });

        // Memuat daftar santri pertama kali saat halaman dimuat
        fetchSantri();
    });
</script>

