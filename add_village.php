<?php

$file = 'data/villages.csv';
$data = file($file, FILE_IGNORE_NEW_LINES);

// Data baru yang mau ditambahkan
$newLine = "3276040001,3276040,CURUG";

// Cek dulu apakah sudah ada
foreach ($data as $line) {
    if (strpos($line, '3276040001') === 0) {
        echo "Data sudah ada!\n";
        exit;
    }
}

// Tambahkan data baru
$data[] = $newLine;

// Sortir kembali agar urut ID-nya
sort($data);

// Tulis ulang file
file_put_contents($file, implode("\n", $data));

echo "Berhasil menambahkan CURUG ke villages.csv dan menyortir ulang.\n";
