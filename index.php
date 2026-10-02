<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DailyHobby</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <h2>DailyHobby</h2>
            <p>Belajar & Beraktivitas</p>
        </div>

        <nav>
            <a href="#home" class="menu active">
                🏠 Beranda
            </a>

            <a href="#mapel" class="menu">
                📚 Mapel & Hobi
            </a>

            <a href="#kutipan" class="menu">
                💬 Kutipan
            </a>

            <a href="#cuaca" class="menu">
                ☀️ API Cuaca
            </a>

            <a href="#rekomendasi" class="menu">
                🎨 Rekomendasi Hobi
            </a>
        </nav>

    </aside>


    <!-- KONTEN UTAMA -->
    <main class="content">

        <!-- BERANDA -->
        <section id="home" class="section hero">

            <div>
                <p class="small-title">SELAMAT DATANG</p>

                <h1>
                    Kenali Pelajaran,<br>
                    Temukan Hobimu.
                </h1>

                <p>
                    DailyHobby adalah website sederhana untuk
                    menampilkan mata pelajaran, hobi, kutipan,
                    informasi cuaca, dan rekomendasi hobi.
                </p>

                <a href="#mapel" class="button">
                    Mulai Sekarang
                </a>
            </div>

        </section>


        <!-- MAPEL DAN HOBI -->
        <section id="mapel" class="section">

            <div class="section-title">
                <p class="small-title">DAFTAR</p>
                <h2>Mapel & Hobi</h2>
                <p>
                    Data ditampilkan menggunakan JavaScript.
                </p>
            </div>

            <div class="cards">

                <div class="card">
                    <h3>📚 Mata Pelajaran</h3>

                    <ul id="daftarMapel"></ul>
                </div>


                <div class="card">
                    <h3>🎨 Hobi</h3>

                    <ul id="daftarHobi"></ul>

                    <div class="tambah-hobi">

                        <input
                            type="text"
                            id="inputHobi"
                            placeholder="Masukkan hobi"
                        >

                        <button onclick="tambahHobi()">
                            Tambah
                        </button>

                    </div>

                </div>

            </div>

        </section>


        <!-- KUTIPAN -->
        <section id="kutipan" class="section">

            <div class="section-title">
                <p class="small-title">MOTIVASI</p>
                <h2>Kutipan Hari Ini</h2>
            </div>

            <div class="quote-box">

                <p id="quote">
                    Klik tombol untuk mendapatkan kutipan.
                </p>

                <button
                    class="button"
                    onclick="acakKutipan()">
                    Kutipan Acak
                </button>

            </div>

        </section>


        <!-- API CUACA -->
        <section id="cuaca" class="section">

            <div class="section-title">

                <p class="small-title">API</p>

                <h2>Cek Cuaca</h2>

                <p>
                    Data cuaca diperoleh dari
                    OpenWeatherMap melalui backend PHP.
                </p>

            </div>


            <div class="weather-box">

                <input
                    type="text"
                    id="kota"
                    placeholder="Contoh: Karanganyar"
                >

                <button
                    class="button"
                    onclick="cekCuaca()">
                    Cek Cuaca
                </button>

            </div>


            <div id="hasilCuaca" class="result">

                <p>
                    Masukkan nama kota untuk melihat cuaca.
                </p>

            </div>

        </section>


        <!-- REKOMENDASI HOBI -->
        <section id="rekomendasi" class="section">

            <div class="section-title">

                <p class="small-title">API</p>

                <h2>Rekomendasi Hobi</h2>

                <p>
                    Rekomendasi berdasarkan kondisi cuaca.
                </p>

            </div>


            <div class="recommend-box">

                <button
                    class="button"
                    onclick="rekomendasiHobi()">

                    Cek Rekomendasi

                </button>

                <div id="hasilRekomendasi" class="result">

                    <p>
                        Klik tombol untuk mendapatkan
                        rekomendasi hobi.
                    </p>

                </div>

            </div>

        </section>


        <!-- FOOTER -->
        <footer>

            <h3>DailyHobby</h3>

            <p>
                Website proyek Fullstack dengan API.
            </p>

            <p>
                © 2026 DailyHobby
            </p>

        </footer>

    </main>


    <script src="script.js"></script>

</body>
</html>