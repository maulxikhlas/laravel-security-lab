# Cyber Academy - SQL Injection Security Lab

Project ini adalah lab simulasi keamanan web untuk mendemonstrasikan perbedaan antara implementasi login yang rentan (**Insecure**) dengan implementasi login yang aman (**Secure**) terhadap serangan **SQL Injection (SQLi)**.

---

## 📌 Ringkasan Implementasi: Insecure vs. Secure

| Fitur | `insecureLogin` (Vulnerable) | `secureLogin` (Secure/Patched) |
|---|---|---|
| **Metode Kueri** | Menggabungkan input langsung (*String Concatenation*) | Menggunakan *Parameter Binding* (`?`) |
| **Keamanan** | ❌ **Sangat Rentan (Bahaya)** |  **Sangat Aman (Rekomendasi)** |
| **Validasi Input** | Tidak ada validasi format input | Menerapkan validasi wajib format email & password |
| **Dampak Serangan** | Bypass login tanpa mengetahui password asli | Akses ditolak kecuali kredensial benar-benar valid |

---

## 🔍 Penjelasan Teknis & Keamanan

### 1. Rute Rentan: `insecureLogin`

**Potongan Kode:**
```php
$user = DB::select("SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'");
```

* **Mengapa Berbahaya?**
  Input dari user (`$email` dan `$password`) langsung ditempelkan ke dalam string kueri SQL. Hal ini memungkinkan database engine menginterpretasikan input user sebagai bagian dari perintah eksekusi SQL, bukan data biasa.
* **Skenario Serangan (Bypass Autentikasi):**
  Jika penyerang memasukkan input berikut pada kolom email:
  `admin@siswa.com' OR '1'='1`
  Maka kueri SQL yang dieksekusi di database berubah menjadi:
  ```sql
  SELECT * FROM users WHERE email = 'admin@siswa.com' OR '1'='1' AND password = '...'
  ```
  Karena kondisi `'1'='1'` selalu bernilai **TRUE**, query tersebut akan selalu mengembalikan baris data pengguna pertama (biasanya admin/operator) dan melompati pengecekan password. Penyerang pun berhasil masuk ke dashboard!

---

### 2. Rute Aman: `secureLogin`

**Potongan Kode:**
```php
$user = DB::select("SELECT * FROM users WHERE email = ? AND password = ?", [$email, $password]);
```

* **Mengapa Aman?**
  Implementasi ini menggunakan **Parameter Binding** (diwakili oleh karakter tanda tanya `?`). 
* **Cara Kerjanya:**
  1. Struktur kueri SQL dikirim dan dikompilasi terlebih dahulu oleh database engine tanpa menyertakan input data.
  2. Input data (`$email` dan `$password`) dikirim secara terpisah.
  3. Database engine memperlakukan input ini **murni sebagai literal data** (teks string biasa), sehingga karakter berbahaya seperti kutip tunggal (`'`) atau sintaks `OR '1'='1` tidak akan pernah dieksekusi sebagai perintah SQL.
* **Hasil:**
  Meskipun peretas mencoba menginput payload SQL Injection, database tetap menganggapnya sebagai string email biasa, sehingga login akan gagal karena tidak ada user dengan email aneh tersebut.

---

## 🛠️ Cara Menguji di Lab

1. **Uji Coba SQL Injection (Insecure):**
   * Masuk ke halaman login insecure.
   * Masukkan email: `' OR '1'='1` atau `admin@siswa.com' OR '1'='1`
   * Masukkan password acak / kosong.
   * Tekan tombol login. Anda akan berhasil login dan masuk ke Dashboard.

2. **Uji Coba Proteksi (Secure):**
   * Masuk ke halaman login secure.
   * Masukkan payload SQL Injection yang sama.
   * Sistem akan menolak akses dan menampilkan pesan error merah yang elegan: `ACCESS DENIED: Credentials Invalid.`
