// Fungsi untuk mengecek apakah format nomor identitas yang dimasukkan valid
function checkNomorIdentitas() {
    var input = document.getElementById('nomorIdentitas');
    var value = input.value;
    if (!Number.isInteger(Number(value)) || value.length !== 16) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk mengecek apakah format tanggal yang dimasukkan valid
function checkDateFormat() {
    var input = document.getElementById('tanggalPesan');
    var value = input.value;
    var datePattern = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(19|20)\d\d$/;
    if (!datePattern.test(value)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk mengecek apakah durasi menginap yang dimasukkan valid
function checkDurasiMenginap() {
    var input = document.getElementById('durasiMenginap');
    var value = input.value;
    if (!Number.isInteger(Number(value))) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function () {
    // Fungsi untuk mengecek apakah format nomor identitas yang dimasukkan valid
    $('#nomorIdentitas').on('input', function () {
        var input = $(this);
        var re = /^\d{16}$/;
        if (!re.test(input.val())) {
            input.addClass('is-invalid');
            input.removeClass('is-valid');
        } else {
            input.removeClass('is-invalid');
            input.addClass('is-valid');
        }
    });

    // Fungsi untuk mengecek apakah format tanggal yang dimasukkan valid
    $('#tanggalPesan').on('input', function () {
        var input = $(this);
        var re = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(19|20)\d\d$/;
        if (!re.test(input.val())) {
            input.addClass('is-invalid');
            input.removeClass('is-valid');
        } else {
            input.removeClass('is-invalid');
            input.addClass('is-valid');
        }
    });

    // Fungsi untuk mengecek apakah format durasi menginap yang dimasukkan valid
    $('#durasiMenginap').on('input', function () {
        var input = $(this);
        var re = /^\d+$/;
        if (!re.test(input.val())) {
            input.addClass('is-invalid');
            input.removeClass('is-valid');
        } else {
            input.removeClass('is-invalid');
            input.addClass('is-valid');
        }
    });

    // Fungsi yang dijalankan ketika tombol 'Hitung Total Bayar' ditekan
    $('#hitungTotal').click(function () {
        var namaPemesan = document.getElementById('namaPemesan').value;
        var jenisKelamin = document.querySelector('input[name="jenisKelamin"]:checked');
        var nomorIdentitas = document.getElementById('nomorIdentitas').value;
        var tipeKamar = document.getElementById('tipeKamar').value;
        var tanggalPesan = document.getElementById('tanggalPesan').value;
        var durasiMenginap = document.getElementById('durasiMenginap').value;

        if (!nomorIdentitas || !durasiMenginap || !namaPemesan || !jenisKelamin || !tipeKamar || !tanggalPesan) {
            alert('Mohon isi semua kolom yang diperlukan');
        } else {
            // Cek apakah data yang dimasukkan sudah sesuai format
            if (checkNomorIdentitas() || checkDateFormat() || checkDurasiMenginap()) {
                alert('Pastikan data yang dimasukkan sudah sesuai format');
                return;
            }

            // Menghitung total bayar
            var tipeKamar = $('#tipeKamar').val();
            var durasiMenginap = parseInt($('#durasiMenginap').val());
            var breakfast = $('#breakfast').is(':checked');
            var harga;

            switch (tipeKamar) {
                case 'standar':
                    harga = 500000;
                    break;
                case 'deluxe':
                    harga = 600000;
                    break;
                case 'family':
                    harga = 700000;
                    break;
            }

            var total = harga * durasiMenginap;

            if (durasiMenginap >= 3) {
                total *= 0.9; // Apply 10% discount
            }

            if (breakfast) {
                total += (80000 * durasiMenginap);
            }

            total = total.toLocaleString('id-ID');
            $('#totalBayar').val(total);
        }

    });

    // Fungsi yang dijalankan ketika tombol 'Simpan' ditekan
    $('#simpan').click(function (e) {
        var totalBayar = $('#totalBayar').val();

        if (!totalBayar) {
            alert('Mohon hitung total harga bayar');
        } else {
            alert('Data berhasil disimpan');
        }
    })

    // Fungsi yang dijalankan ketika tombol 'Batal' ditekan
    $('#batal').click(function (e) {
        $('#bookingForm')[0].reset(); // Reset form
        document.getElementById('nomorIdentitas').setCustomValidity(''); // Reset custom validity
        document.getElementById('durasiMenginap').setCustomValidity(''); // Reset custom validity

        // Remove 'is-invalid' class
        $('#nomorIdentitas').removeClass('is-invalid');
        $('#durasiMenginap').removeClass('is-invalid');
    })
});
