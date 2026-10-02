<?php

header("Content-Type: application/json");


// Memanggil API key
require_once "config.php";


// Mengecek apakah kota dikirim
if (!isset($_GET["kota"]) || empty($_GET["kota"])) {

    echo json_encode([
        "error" => "Nama kota belum dimasukkan."
    ]);

    exit;
}


$kota = $_GET["kota"];


// URL OpenWeatherMap
$url =
    "https://api.openweathermap.org/data/2.5/weather" .
    "?q=" . urlencode($kota) .
    "&appid=" . $apiKey .
    "&units=metric" .
    "&lang=id";


// Mengambil data dari API
$response = @file_get_contents($url);


// Jika API gagal
if ($response === false) {

    http_response_code(500);

    echo json_encode([
        "error" =>
        "Gagal menghubungi OpenWeatherMap."
    ]);

    exit;
}


// Mengubah JSON menjadi array
$data = json_decode($response, true);


// Mengecek error dari API
if (
    isset($data["cod"]) &&
    $data["cod"] != 200
) {

    http_response_code(400);

    echo json_encode([
        "error" =>
        $data["message"] ?? "Kota tidak ditemukan."
    ]);

    exit;
}


// Mengambil data yang diperlukan
$hasil = [

    "kota" =>
        $data["name"],

    "suhu" =>
        round($data["main"]["temp"]),

    "kondisi" =>
        $data["weather"][0]["description"],

    "kelembapan" =>
        $data["main"]["humidity"],

    "angin" =>
        $data["wind"]["speed"]

];


// Mengirim JSON ke JavaScript
echo json_encode($hasil);

?>