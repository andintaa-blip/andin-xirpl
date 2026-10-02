// ======================================
// DATA MATA PELAJARAN
// ======================================

const mapel = [
    "Pemrograman Web",
    "Basis Data",
    "Pemrograman Berorientasi Objek",
    "Matematika",
    "Bahasa Indonesia",
    "Bahasa Inggris",
    "Informatika"
];


// ======================================
// DATA HOBI
// ======================================

let hobi = [
    "Memasak",
    "Mendengarkan Musik",
    "Jogging",
    "Membaca",
    "Fotografi"
];


// ======================================
// MENAMPILKAN MAPEL
// ======================================

function tampilkanMapel() {

    const daftar = document.getElementById("daftarMapel");

    daftar.innerHTML = "";

    mapel.forEach(function(item) {

        const li = document.createElement("li");

        li.textContent = item;

        daftar.appendChild(li);

    });
}


// ======================================
// MENAMPILKAN HOBI
// ======================================

function tampilkanHobi() {

    const daftar = document.getElementById("daftarHobi");

    daftar.innerHTML = "";

    hobi.forEach(function(item) {

        const li = document.createElement("li");

        li.textContent = item;

        daftar.appendChild(li);

    });
}


// ======================================
// MENAMBAH HOBI
// ======================================

function tambahHobi() {

    const input = document.getElementById("inputHobi");

    const namaHobi = input.value.trim();


    if (namaHobi === "") {

        alert("Silakan masukkan nama hobi.");

        return;
    }


    hobi.push(namaHobi);

    tampilkanHobi();

    input.value = "";

}


// ======================================
// DATA KUTIPAN
// ======================================

const kutipan = [

    "Belajar sedikit demi sedikit akan membawa perubahan besar.",

    "Jangan takut mencoba sesuatu yang baru.",

    "Kesalahan adalah bagian dari proses belajar.",

    "Tetap semangat untuk mencapai cita-cita.",

    "Setiap hari adalah kesempatan untuk belajar."

];


// ======================================
// KUTIPAN ACAK
// ======================================

function acakKutipan() {

    const index = Math.floor(
        Math.random() * kutipan.length
    );

    document.getElementById("quote").textContent =
        '"' + kutipan[index] + '"';

}


// ======================================
// API CUACA
// ======================================

async function cekCuaca() {

    const kota =
        document.getElementById("kota").value.trim();

    const hasil =
        document.getElementById("hasilCuaca");


    if (kota === "") {

        hasil.innerHTML =
            "<p>Silakan masukkan nama kota.</p>";

        return;
    }


    hasil.innerHTML =
        "<p>⏳ Sedang mengambil data cuaca...</p>";


    try {

        const response = await fetch(
            "backend/cuaca.php?kota=" +
            encodeURIComponent(kota)
        );


        const data = await response.json();


        if (!response.ok || data.error) {

            throw new Error(
                data.error || "Gagal mengambil data cuaca."
            );

        }


        hasil.innerHTML = `

            <div class="weather-result">

                <h3>
                    ${data.suhu}°C
                </h3>

                <p>
                    📍 Kota: ${data.kota}
                </p>

                <p>
                    ☁️ Kondisi: ${data.kondisi}
                </p>

                <p>
                    💧 Kelembapan: ${data.kelembapan}%
                </p>

                <p>
                    💨 Kecepatan Angin:
                    ${data.angin} m/s
                </p>

            </div>

        `;


    } catch (error) {

        hasil.innerHTML = `

            <p>
                ❌ Terjadi kesalahan:
                ${error.message}
            </p>

        `;

    }

}


// ======================================
// OPEN-METEO
// ======================================

async function rekomendasiHobi() {

    const hasil =
        document.getElementById("hasilRekomendasi");


    hasil.innerHTML =
        "<p>⏳ Mengambil informasi cuaca...</p>";


    try {

        // Koordinat Karanganyar
        const latitude = -7.6011;

        const longitude = 110.9517;


        const url =
            "https://api.open-meteo.com/v1/forecast" +
            "?latitude=" + latitude +
            "&longitude=" + longitude +
            "&current=temperature_2m,precipitation,rain";


        const response = await fetch(url);


        if (!response.ok) {

            throw new Error(
                "API Open-Meteo gagal diakses."
            );

        }


        const data = await response.json();


        const suhu =
            data.current.temperature_2m;

        const hujan =
            data.current.rain;


        let rekomendasi = "";


        if (hujan > 0) {

            rekomendasi =
                "🍳 Memasak, membaca, menonton film, atau mendengarkan musik.";

        } else if (suhu >= 30) {

            rekomendasi =
                "🎵 Mendengarkan musik, menggambar, atau bermain game.";

        } else {

            rekomendasi =
                "🏃 Jogging, bersepeda, fotografi, atau bermain voli.";

        }


        hasil.innerHTML = `

            <h3>Rekomendasi Hobi</h3>

            <p>
                🌡️ Suhu saat ini:
                ${suhu}°C
            </p>

            <p>
                🌧️ Hujan:
                ${hujan} mm
            </p>

            <br>

            <p>
                <strong>
                    Hobi yang cocok:
                </strong>
            </p>

            <p>
                ${rekomendasi}
            </p>

        `;


    } catch (error) {

        hasil.innerHTML = `

            <p>
                ❌ Terjadi kesalahan:
                ${error.message}
            </p>

        `;

    }

}


// ======================================
// JALANKAN SAAT WEBSITE DIBUKA
// ======================================

tampilkanMapel();

tampilkanHobi();