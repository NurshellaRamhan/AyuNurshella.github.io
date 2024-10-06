// Mengambil elemen form
const form = document.getElementById('form-pendaftaran');

// Event listener saat form disubmit
form.addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form terkirim otomatis

    // Mendapatkan nilai dari field yang diperlukan
    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const nomorHp = document.getElementById('nomor-hp').value;
    const umur = document.getElementById('umur').value;

    // Validasi simple
    if (nama === "" || email === "" || nomorHp === "" || umur === "") {
        // Menggunakan SweetAlert untuk menampilkan peringatan
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi semua kolom yang diperlukan!'
        });
    } else {
        // Menampilkan pesan konfirmasi sebelum submit
        Swal.fire({
            title: "Apa kamu sudah yakin dengan jawabannya?",
            text: "Jawaban yang sudah dikirim tidak bisa di cancel",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, sudah betul!"
        }).then((result) => {
            if (result.isConfirmed) {
              form.submit()

              Swal.fire({
                title: "Tersimpan!",
                text: "Jawaban kamu sudah tersimpan.",
                icon: "Sukses"
              });
            }
          });
        }
      });

     