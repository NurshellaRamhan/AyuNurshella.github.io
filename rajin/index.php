<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Layanan Ambulans Gratis - Daftar Sekarang untuk Mendapatkan Layanan Ambulans Gratis">
    <title>Layanan Ambulans Gratis</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/829fdc7544.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>
    <!-- Navbar -->
     
    <nav>
        <div class="container">
            <ul id="nav-links">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#pendaftaran">Pendaftaran</a></li>
                <li><a href="#info-layanan">Informasi Layanan</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </div>
    </nav>
    
    

    <!-- Header -->
    <header id="home">
        <div class="container1">
            <img src="ambulancee.png" alt="logo instansi Rumah Sakit" style="width: 100px;">
            <h1>RSUD Spontan Peduli</h1>
            <h2>Layanan Ambulans Gratis</h2>
            <p>Memberikan pertolongan darurat tepat waktu dan gratis bagi masyarakat yang membutuhkan.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Form Pendaftaran -->
        <section id="pendaftaran">
            <div class="container2">
                <h2>FORMULIR PENDAFTARAN</h2>
                <h3>Data Pribadi</h3><br>
                <div class="hero">
                  <form action="data_pasien.php" method="POST" id="form-pendaftaran">

                    <div class="row">

                      <div class ="input-group">
                            <input type="text" id="nama" name="nama" >
                            <label for="nama"><i class="fa-solid fa-user"></i> Nama Lengkap:</label>
                        </div>

                        <div class ="input-group">
                            <input type="email" id="email" name="email"  >
                            <label for="email"><i class="fa-solid fa-envelope"></i> Email:</label>
                        </div>

                    </div>
                    
                    <div class ="input-group">
                      <input type="" id="nomor-hp" name="nomor-hp"  >
                      <label for="nomor-hp"><i class="fa-solid fa-phone"></i> Nomor Telepon:</label>
                    </div>
                    
                      <div class ="input-group">
                        <textarea id="alamat" name="alamat" rows="8"  ></textarea>
                        <label for="alamat"><i class="fa-solid fa-house"></i> Alamat Lengkap:</label>
                      </div>
                      
                      
                      <div class="row1">
                        
                        <div class ="input-group">
                          <input type="text" id="tempat" name="tempat" >
                          <label for="tempat"><i class="fa-solid fa-baby"></i> Tempat, tanggal lahir:</label>
                        </div>

                        <div class ="input-group">
                          <input type="date" id="ttl" name="ttl" >
                          <label for="ttl">
                          </div>
                        </div>
                        
                        <div class="input-group">
                          <input type="text" name="id" id="id" >
                          <label for="id"><i class="fa-solid fa-id-card"></i> NIK:</label>
                        </div>

                    <div class="input-group">
                      <select id="gender" name="gender">
                        <option value="laki">Laki- laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                      <label for="gender"><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin:</label>
                    </div>
                    
                    <div class="input-group">
                      <input type="number" id="umur" name="umur" >
                      <label for="umur"><i class="fa-solid fa-person"></i> Umur:</label>
                    </div>
                    
                    <div class="input-group">
                      <select id="kewarganegaraan" name="kewarganegaraan">
                        <option value="wni">Warga Negara Indonesia</option>
                        <option value="wna">Warga Negara Asing</option>
                      </select>
                      <label for="kewarganegaraan">kewarganegaraan:</label>
                    </div>
                    

                    <h3>Informasi Kebutuhan</h3><br>
                    
                    <div class="input-group">
                      <input type="text" id="nama_pasien" name="nama_pasien" >
                      <label for="nama_pasien"><i class="fa-solid fa-bed"></i> Nama Pasien:</label>
                    </div>

                    <div class="input-group">
                      <input type="text" name="id-pas" id="id-pas" >
                      <label for="id-pas"><i class="fa-solid fa-id-card"></i> NIK:</label>
                    </div>
                    
                    <div class="row4">

                      <div class ="input-group">
                        <input type="text" id="tempat" name="tempat" >
                        <label for="tempat"><i class="fa-solid fa-baby"></i> Tempat, tanggal lahir:</label>
                      </div>


                      <div class="input-group">
                        <input type="date" id="ttlp" name="ttlp" >
                          <label for="ttlp">
                      </div>
                    </div>

                    <div class="row2">
                      <div class ="input-group">
                        <input type="number" id="umurpas" name="umurpas" >
                        <label for="umurpas">Umur Pasien:</label>
                      </div>

                      <div class="input-group">
                        <select id="agama" name="agama">
                        <option value="" hidden></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Lainnya">Sambutan</option>
                        </select>
                        <label for="kebutuhan">Agama:</label>
                      </div>
                      
                        <div class="input-group">
                          <select id="gender" name="gender">
                            <option value="darurat">Laki- laki</option>
                            <option value="transportasi_medis">Perempuan</option>
                          </select>
                          <label for="gender">Jenis Kelamin:</label>
                        </div>
                    </div>
                    
                    <div class="row5">
                      
                      <div class="input-group">
                        <select id="kebutuhan" name="kebutuhan">
                          <option value="" hidden></option>
                          <option value="darurat">Darurat</option>
                          <option value="transportasi_medis">Transportasi Medis</option>
                          <option value="lainnya">Lainnya</option>
                        </select>
                        <label for="kebutuhan">Kebutuhan Ambulans:</label>
                      </div>

                      <div class ="input-group">
                        <input type="text" id="diagnosa" name="diagnosa" >
                        <label for="diagnosa">Diagnosa:</label>
                      </div>
                    </div>

                    <div class ="input-group">
                      <textarea id="keterangan" name="keterangan" rows="4" ></textarea>
                      <label for="keterangan"><i class="fa-regular fa-comments"></i> Tambahan atau Saran:</label>
                      
                      <br><br>

                      <div class ="input-group">
                        <input type="text" id="kondisi" name="kondisi" >
                        <label for="kondisi">Kondisi Pasien:</label>
                      </div>


              

                    <h3>Lokasi Penjemputan</h3><br>

                    <div class="input-group">
                      <textarea id="alamat-tujuan" name="alamat-tujuan" rows="8" ></textarea>
                      <td><label for="alamat-asal"><i class="fa-solid fa-house-user"></i> Alamat Asal Penjemputan:</label>
                    </div>

                    <div class="input-group">
                      <input type="text" id="lokasi-antar" name="lokasi-antar" >
                      <label for="lokasi-antar"><i class="fa-solid fa-map-pin"></i> Tujuan Antar:</label></td>
                    </div>

                    <div class="input-group">
                      <textarea id="alamat-tujuan" name="alamat-tujuan" rows="8" ></textarea>
                      <label for="alamat-tujuan"><i class="fa-solid fa-location-dot"></i> Alamat Tujuan:</label>
                    </div>

                    <div class="input-group">
                      <select id="kecamatan-asal" name="kecamatan-asal">
                      <option value="" hidden></option>
                      <option value="samarinda-kota">Samarinda Kota</option>
                      <option value="samarinda-utara">Samarinda Utara</option>
                      <option value="samarinda-ilir">Samarinda Ilir</option>
                      <option value="samarinda-ulu">Samarinda Ulu</option>
                      <option value="samarinda-seberang">Samarinda Seberang</option>
                      <option value="sambutan">Sambutan</option>
                      <option value="palaran">Palaran</option>
                      <option value="sungai-kunjang">Sungai Kunjang</option>
                      <option value="sungai-pinang">Sungai Pinang</option>
                      <option value="loa-janan">Loa Janan Ilir</option>
                      </select>
                      <label for="kebutuhan">Kecamatan Asal:</label>
                    </div>

                    <div class="input-group">
                      <select id="kecamatan" name="kecamatan">
                        <option value="" hidden></option>
                        <option value="samarinda-kota">Samarinda Kota</option>
                        <option value="samarinda-utara">Samarinda Utara</option>
                        <option value="samarinda-ilir">Samarinda Ilir</option>
                        <option value="samarinda-ulu">Samarinda Ulu</option>
                        <option value="samarinda-seberang">Samarinda Seberang</option>
                        <option value="sambutan">Sambutan</option>
                        <option value="palaran">Palaran</option>
                        <option value="sungai-kunjang">Sungai Kunjang</option>
                        <option value="sungai-pinang">Sungai Pinang</option>
                        <option value="loa-janan">Loa Janan Ilir</option>
                      </select>
                      <label for="kebutuhan">Kecamatan Tujuan:</label>
                    </div>

                    <div class="row3">
                      <div class ="input-group">
                        <label for="tanggal">Tanggal Penjemputan</label>
                        <input type="date" id="tanggal" name="tanggal" >
                      </div>
                      
                      <div class ="input-group">
                        <label for="waktu">Waktu Penjemputan</label>
                        <input type="time" id="waktu" name="waktu" >
                      </div>
                        
                    </div>

                    <!-- <h3>Keterangan Tambahan</h3><br> -->

                      <h3>Dokumen</h3><br>

                      <div class ="input-group">
                        <input type="file" id="asuransi" name="asuransi" accept=".jpg,.jpeg,.png,.pdf" multiple>
                        <label for="asuransi">Upload Asuransi Jiwa Pasien:</label>
                        <small>(contoh: BPJS, AXA, Aliianz)</small>
                      </div>
                      
                    <div class ="row6">
                      <div class ="input-group">
                        <input type="file" id="id" name="id" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="id" align="center">Upload KTP/ID Card Pasien:</label>
                      </div>
                      
                      <div class ="input-group">
                        <input type="file" id="idpen" name="idpen" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="idpen">Upload KTP/ID Card Pendaftar:</label>
                      </div>
                      </div>
                      
                      <div class ="input-group">
                        <input type="file" id="kk" name="kk" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="kk" >Upload Kartu Keluarga Pasien:</label><br><br>

                    <div class="row7">
                      <div class ="input-group">
                        <input type="file" id="akta" name="akta" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="akta">Akta Kelahiran Pasien:</label>
                      </div>
                    

                      <div class ="input-group">
                        <input type="file" id="sim" name="sim" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="sim">Upload SIM Pendaftar:</label>
                      </div>
                      
                    </div>

                      <div class ="input-group">
                        <input type="file" id="surat-dokter" name="surat-dokter" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="surat-dokter">Surat Rujukan Dokter:</label>
                      </div>

                    <div class="row8">
                      <div class ="input-group">
                        <input type="file" id="surat-bebas" name="surat-bebas" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="surat-bebas">Upload Surat Bebas Narkoba:</label>
                      </div>

                      <div class="input-group">
                        <input type="file" id="passport" name="passport" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="passport">Upload Passport pendaftar:</label>
                        <small>(jika pasien adalah warga negara asing)</small>
                      </div>
                    </div>

                    <div class="input-group">
                      <input type="file" id="foto-ronsen" name="foto-ronsen" accept=".jpg,.jpeg,.png,.pdf" multiple>
                      <label for="foto-ronsen">Upload Foto Ronsen/ Hasil Pemeriksaan Pasien:</label>
                    </div>


                      <button type="submit" class="bttn"><i class="fa-solid fa-paper-plane"></i> Kirim Jawaban</button>
                </form>
              </div>

                    
                    
            </div>
        </section>

        <br><br><br>
        <!-- Informasi Layanan -->
        <section id="info-layanan">
            <div class="container3">
                <h2>Informasi Layanan</h2>
                <p>Layanan ambulans gratis ini tersedia 24 jam / 7 hari untuk memberikan bantuan dalam kondisi darurat maupun kebutuhan transportasi medis. Kami juga bekerja sama dengan berbagai rumah sakit dan lembaga kesehatan lainnya untuk memastikan pelayanan yang cepat dan tepat.</p>
            </div>
        </section>

        <br><br>
        <!-- Kontak -->
        <section id="kontak">
            <div class="container4">
                <h2>Kontak Kami</h2>
                <p>Untuk informasi lebih lanjut, hubungi kami di:</p>
                <p>Email: <a href="shelladyahayunurshella@gmail.com">shella&nabila:info@RSUDSpontan.co</a></p>
                <p>Alamat: Jalan Krayan No.506, Kota Samarinda, Kalimantan Timur</p>
                <p>Telepon: +62 812 3456 7890</p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; Dibuat Oleh Dyah Ayu & Tengku Nabila. Semua hak dilindungi.</p>
        </div>
    </footer>
   
  <!-- Tambahkan link ke SweetAlert2 -->
    <script src="script.js"></script>
</body>
</html>
