<!DOCTYPE html>
<html>
<head>
    <title>Technical Test - Designcub3 ( PT. Desain Tiga Selaras )</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5 text-center">
        <h2>Find Location</h2>
    </div>

    <div class="container mt-5">
            <div class="col mt-3">
                <select id="provinces" class="form-control" >
                    <option value="">Pilih Province</option>
                </select>
            </div>
            <div class="col mt-3">
                    <select id="regencies" class="form-control" disabled>
                <option value="">Select City</option>
                </select>
            </div>
            <div class="col mt-3">
                <select id="districts" class="form-control" disabled>
                    <option value="">Select District</option>
                </select>
            </div>
            <div class="col mt-3">
                <select id="villages" class="form-control" disabled>
                    <option value="">Select Subdistrict</option>
                </select>
            </div>
            <div class="col mt-3">
                <!-- Tombol reset -->
                <submit id="resetButton" class="btn btn-secondary" disabled>Reset</submit>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat data provinsi dari server
            function loadProvinces() {
                $.getJSON('/provinces', function(data) {
                    var options = '<option value="">Select Provinsi</option>';
                    $.each(data, function(key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                        $('#provinces').html(options);
                });
            }

            // Fungsi untuk memuat data kota dari server berdasarkan provinsi yang dipilih
            function loadRegencies(province_id) {
                $.getJSON('/regencies/' + province_id, function(data) {
                var options = '<option value="">Select City</option>';
                $.each(data, function(key, value) {
                    options += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#regencies').html(options);
                });
            }

            // Fungsi untuk memuat data kecamatan dari server berdasarkan kota yang dipilih
            function loadDistricts(regency_id) {
                $.getJSON('/districts/' + regency_id, function(data) {
                var options = '<option value="">Select District</option>';
                $.each(data, function(key, value) {
                    options += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#districts').html(options);
                });
            }

            // Fungsi untuk memuat data kelurahan dari server berdasarkan kecamatan yang dipilih
            function loadVillages(district_id) {
                $.getJSON('/villages/' + district_id, function(data) {
                var options = '<option value="">Select Subdistrict</option>';
                $.each(data, function(key, value) {
                    options += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#villages').html(options);
                });
            }

            // Panggil fungsi loadProvinces saat halaman dimuat
            loadProvinces();

            // Fungsi untuk mengecek apakah semua dropdown telah terisi
            function checkAllDropdownsFilled() {
                return $('#provinces').val() && $('#regencies').val() && $('#districts').val() && $('#villages').val();
            }

            // Fungsi untuk mengaktifkan atau menonaktifkan tombol reset
            function toggleResetButton() {
                if (checkAllDropdownsFilled()) {
                $('#resetButton').hide()
                } else {
                $('#resetButton').show()
                }
            }

            // Ketika dropdown provinsi berubah, load data kota/kabupaten
            $('#provinces').change(function() {
                var province_id = $(this).val();
                loadRegencies(province_id);
                $('#regencies').prop('disabled', false);
                toggleResetButton();
            });

            // Ketika dropdown kota/kabupaten berubah, load data kecamatan
            $('#regencies').change(function() {
                var regency_id = $(this).val();
                loadDistricts(regency_id);
                $('#districts').prop('disabled', false);
                toggleResetButton();
            });

            // Ketika dropdown kecamatan berubah, load data kelurahan
            $('#districts').change(function() {
                var district_id = $(this).val();
                loadVillages(district_id);
                $('#villages').prop('disabled', false);
                toggleResetButton();
            });

            // Tombol reset akan mengembalikan dropdown ke keadaan awal
            $('#resetButton').click(function() {
                $('#provinces').val('');
                $('#regencies').val('');
                $('#districts').val('');
                $('#villages').val('');

                $('#regencies').prop('disabled', true);
                $('#districts').prop('disabled', true);
                $('#villages').prop('disabled', true);

                toggleResetButton();
            });
        });
    </script>
    
    
</body>
</html>