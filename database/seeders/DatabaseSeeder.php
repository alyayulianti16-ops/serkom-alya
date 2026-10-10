<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'id_user' => 1,
                'username' => 'aldyama',
                'password' => '$2y$12$/W2b49Pk7gyA7TTWljW7AuqGWC6J1eVc1An.0wqJOmAdVWFpU5/hm',
                'role' => 'Admin',
                'created_at' => '2026-09-23 01:13:09',
                'updated_at' => '2026-09-23 01:48:28',
            ],
            [
                'id_user' => 2,
                'username' => 'nanay',
                'password' => '$2y$12$Ez7NkX0pNhQdN2ojeLkR1OiE7uivQzEFIRlyKxBaHjTkNQGBUWrr6',
                'role' => 'Operator',
                'created_at' => '2026-09-23 01:13:46',
                'updated_at' => '2026-09-23 01:13:46',
            ],
            [
                'id_user' => 5,
                'username' => 'alya',
                'password' => '$2y$12$NDIgWjvFaQ1WbYYryqH4lO1yQ/VZdS5kqpHAHpS69xS9orhNC1fWS',
                'role' => 'Admin',
                'created_at' => '2026-09-23 01:35:26',
                'updated_at' => '2026-09-23 01:35:26',
            ],
            [
                'id_user' => 6,
                'username' => 'nabila',
                'password' => '$2y$12$p/CJUr2MVkAWTgRePVkYxepxcGtEWnUQeJ8xGWqERuD4Blu1oCTnO',
                'role' => 'Admin',
                'created_at' => '2026-09-23 01:48:05',
                'updated_at' => '2026-09-23 01:48:05',
            ],
            [
                'id_user' => 9,
                'username' => 'bill',
                'password' => '$2y$12$TfzuLpGGyc5WAE6bXhxD9umTUyCn4FOfZKwMd3WG/ohaN/HlW1FAy',
                'role' => 'Admin',
                'created_at' => '2026-10-05 20:30:27',
                'updated_at' => '2026-10-05 20:30:27',
            ],
            [
                'id_user' => 10,
                'username' => 'bila',
                'password' => '$2y$12$QVOOntPZ7ZdMKJWZ11D25uSEPgoajTLPm3yteDlLtwt7SkTq3bk6W',
                'role' => 'Operator',
                'created_at' => '2026-10-05 20:33:00',
                'updated_at' => '2026-10-05 20:33:00',
            ],
        ]);

        DB::table('profile_sekolahs')->insert([
            [
                'id_profil' => 1,
                'nama_sekolah' => 'SMPN 1 Sukarame',
                'kepala_sekolah' => 'Drs. H. Ise Koswara, M.Pd.',
                'foto' => 'wsoMkFAskZzIWNDRwgv10brqPCEIAxxB8YyqjCiK.jpg',
                'logo' => 'RJHKJbwKi29IiSWeIYntQTMo7Svd37aaH8Oz0OaA.jpg',
                'npsn' => '20210798',
                'alamat' => 'Jl. Lapang Bola No. 117, Kec. Sukarame, Kab. Tasikmalaya, Prov. Jawa Barat',
                'kontak' => '0265545483',
                'visi_misi' => "Visi\r\nMewujudkan peserta didik yang religius, berbudi pekerti luhur, berprestasi, cerdas, terampil, serta berwawasan lingkungan.\r\n\r\nMisi\r\nMeningkatkan penghayatan dan pengamalan ajaran agama untuk membentuk akhlak mulia dan budi pekerti luhur.\r\nMenyelenggarakan proses pembelajaran dan bimbingan yang efektif, kreatif, inovatif, serta menyenangkan agar potensi siswa berkembang secara optimal.\r\nMengembangkan potensi kemandirian, kecerdasan, keterampilan, dan daya saing siswa dalam bidang akademik maupun non-akademik.\r\nMenciptakan lingkungan sekolah yang kondusif, bersih, sehat, dan berwawasan lingkungan.\r\nMembangun kerja sama yang harmonis antara pihak sekolah, orang tua siswa, dan masyarakat sekitar.",
                'tahun_berdiri' => '1984',
                'deskripsi' => 'SMPN 1 Sukarame adalah lembaga pendidikan menengah pertama yang berkomitmen untuk membentuk generasi yang religius, cerdas, berprestasi, dan berwawasan lingkungan. Didukung oleh tenaga pendidik yang profesional serta lingkungan sekolah yang kondusif, sekolah ini berfokus pada pengembangan potensi akademik maupun non-akademik siswa agar menjadi pribadi yang terampil, berakhlak mulia, dan siap bersaing di masa depan.',
                'created_at' => '2026-09-24 20:16:11',
                'updated_at' => '2026-10-05 22:45:18',
            ]
        ]);

        DB::table('gurus')->insert([
            ['id_guru' => 1, 'nama_guru' => 'nabila', 'nip' => '875834', 'mapel' => 'matematika', 'foto' => 'guru/EC1h81FjyB0HfStwFSdkcI7MeJws0KworwYUbSDa.jpg', 'created_at' => '2026-09-25 00:20:56', 'updated_at' => '2026-10-04 22:35:02'],
            ['id_guru' => 2, 'nama_guru' => 'aldyama', 'nip' => '23435', 'mapel' => 'bengkel', 'foto' => 'guru/bXNKCmQ3UHQA5pUJszid8aCYS9hvdT1tdCdinwru.jpg', 'created_at' => '2026-09-25 00:22:15', 'updated_at' => '2026-10-04 22:34:51'],
            ['id_guru' => 3, 'nama_guru' => 'raditia', 'nip' => '686757', 'mapel' => 'bk', 'foto' => 'guru/LlrdX1Ef4zXT9zn60wKbOxbuIgeDl4BqcdRfNGLs.jpg', 'created_at' => '2026-09-25 00:23:00', 'updated_at' => '2026-10-04 22:35:13'],
            ['id_guru' => 6, 'nama_guru' => 'siti', 'nip' => '11111', 'mapel' => 'ppkn', 'foto' => 'guru/dZar3t96QVsJ6Y7v73lBBglCqP5da1Dr6Ek0w3Qq.jpg', 'created_at' => '2026-10-05 18:41:14', 'updated_at' => '2026-10-05 18:41:14'],
            ['id_guru' => 7, 'nama_guru' => 'caca', 'nip' => '974663', 'mapel' => 'bahasa indnesia', 'foto' => 'guru/RQRzxI3hvLmAnfUCBuIqyRYFwV2z1bOGRYRRAM77.jpg', 'created_at' => '2026-10-05 18:42:02', 'updated_at' => '2026-10-05 18:42:02'],
            ['id_guru' => 8, 'nama_guru' => 'aditya', 'nip' => '3244565', 'mapel' => 'kelistrikan', 'foto' => 'guru/UPVms18uVta9BrlmFzvC2bUArc0Gz4YlLhySzTXy.jpg', 'created_at' => '2026-10-05 18:42:34', 'updated_at' => '2026-10-05 18:42:34'],
            ['id_guru' => 9, 'nama_guru' => 'aca', 'nip' => '198306182008011', 'mapel' => 'pbo', 'foto' => 'guru/qMTEpjyIPBVTcTjHATsmPD17TyTywXdjFxSwwhnT.jpg', 'created_at' => '2026-10-05 18:44:56', 'updated_at' => '2026-10-07 00:01:20'],
            ['id_guru' => 10, 'nama_guru' => 'syifa', 'nip' => '869854', 'mapel' => 'bahasa inggris', 'foto' => 'guru/CZsGUxTbzTdqPzNyXeDviYbV7xwuT4AhqjABdGJC.jpg', 'created_at' => '2026-10-05 18:45:27', 'updated_at' => '2026-10-05 18:45:27'],
            ['id_guru' => 11, 'nama_guru' => 'alya yulianti', 'nip' => '10368', 'mapel' => 'mtk', 'foto' => 'guru/dOG7r4qkPUCWDZNzuCdvP4fxjlwyQNPX53rybKbv.jpg', 'created_at' => '2026-10-06 01:30:07', 'updated_at' => '2026-10-06 01:30:07'],
        ]);

        DB::table('siswas')->insert([
            ['id_siswa' => 1, 'nisn' => '0099676592', 'nama_siswa' => 'Alya yulianti', 'jens_kelamin' => 'perempuan', 'tahun_masuk' => '2026', 'created_at' => '2026-09-24 23:45:53', 'updated_at' => '2026-09-24 23:45:53'],
            ['id_siswa' => 2, 'nisn' => '0088767654', 'nama_siswa' => 'Nabila', 'jens_kelamin' => 'perempuan', 'tahun_masuk' => '2025', 'created_at' => '2026-09-24 23:46:28', 'updated_at' => '2026-09-24 23:46:28'],
            ['id_siswa' => 3, 'nisn' => '0066572543', 'nama_siswa' => 'Aldyama Akbar', 'jens_kelamin' => 'laki-laki', 'tahun_masuk' => '2026', 'created_at' => '2026-09-24 23:53:44', 'updated_at' => '2026-09-24 23:53:44'],
            ['id_siswa' => 4, 'nisn' => '00998986', 'nama_siswa' => 'Radut ramijud', 'jens_kelamin' => 'laki-laki', 'tahun_masuk' => '2024', 'created_at' => '2026-09-24 23:54:11', 'updated_at' => '2026-09-25 00:33:15'],
        ]);

        DB::table('beritas')->insert([
            [
                'id_berita' => 1,
                'judul' => 'Tim Futsal SMPN 1 Sukarame Sukses Raih Juara di Tu',
                'isi' => 'Prestasi membanggakan kembali dipersembahkan oleh tim ekstrakurikuler futsal SMPN 1 Sukarame...',
                'tanggal' => '2026-10-05',
                'gambar' => 'berita/LkVy1f2iifhsJWMk70WGKLjhD5Mn0l0ZdilirUWC.jpg',
                'id_user' => 1,
                'status' => 'publish',
                'created_at' => '2026-10-04 20:33:37',
                'updated_at' => '2026-10-06 23:31:19',
            ],
            [
                'id_berita' => 2,
                'judul' => 'Latih Kemandirian dan Kepemimpinan, Pramuka SMPN 1',
                'isi' => 'Gugus Depan Pramuka SMPN 1 Sukarame sukses melaksanakan kegiatan perkemahan akhir pekan...',
                'tanggal' => '2026-10-06',
                'gambar' => 'berita/qRR4GEz6dAwmIzmiNyFSaRRbu6jYm7Wu8WoQOmq6.jpg',
                'id_user' => 1,
                'status' => 'publish',
                'created_at' => '2026-10-05 19:35:33',
                'updated_at' => '2026-10-06 23:35:13',
            ],
            [
                'id_berita' => 3,
                'judul' => 'Perkuat Karakter Religius, SMPN 1 Sukarame Selengg',
                'isi' => 'Membentuk generasi muda yang berakhlak mulia dan berkarakter kuat menjadi komitmen utama...',
                'tanggal' => '2026-10-06',
                'gambar' => 'berita/qs3djURofn369VK5z0fYg9Z0V5wIskSmQrhLUsp6.jpg',
                'id_user' => 1,
                'status' => 'publish',
                'created_at' => '2026-10-05 19:38:41',
                'updated_at' => '2026-10-06 23:34:26',
            ],
            [
                'id_berita' => 4,
                'judul' => 'Semarak HUT Kemerdekaan RI, SMPN 1 Sukarame Gelar',
                'isi' => 'Dalam rangka memperingati Hari Kemerdekaan Republik Indonesia, SMPN 1 Sukarame mengadakan...',
                'tanggal' => '2026-10-06',
                'gambar' => 'berita/eJ7OnxHmSqutRpDY8Rfh0zEsQst1G6tFPHh3Z84W.jpg',
                'id_user' => 9,
                'status' => 'publish',
                'created_at' => '2026-10-05 20:31:17',
                'updated_at' => '2026-10-06 23:33:09',
            ],
            [
                'id_berita' => 5,
                'judul' => 'Siswa SMPN 1 Sukarame Kembali Ukir Prestasi Gemila',
                'isi' => 'Kebanggaan kembali dirasakan oleh keluarga besar SMPN 1 Sukarame...',
                'tanggal' => '2026-10-04',
                'gambar' => 'berita/chpVU7tA3kATiYEPWUNKGR1PUO4kF3pzqTxUEFFt.jpg',
                'id_user' => 10,
                'status' => 'publish',
                'created_at' => '2026-10-05 20:33:41',
                'updated_at' => '2026-10-06 23:27:01',
            ],
        ]);

        DB::table('ekstrakulikulers')->insert([
            ['id_eskul' => 1, 'nama_ekskul' => 'pramuka', 'pembina' => 'nabila', 'jadwal_latihan' => '09.00', 'deskripsi' => 'asdfghlkuytdxcv', 'gambar' => 'ekstrakurikuler/MsYp6OZzmlKO1Aq4Lnm6UROKhrmd3ZWWQGHLWsmS.jpg', 'created_at' => '2026-10-04 20:47:17', 'updated_at' => '2026-10-05 18:57:28'],
            ['id_eskul' => 2, 'nama_ekskul' => 'tari', 'pembina' => 'caca', 'jadwal_latihan' => 'jumat 15.00 WIB', 'deskripsi' => 'aaaaaaaaaaaaaaaaa', 'gambar' => 'ekstrakurikuler/2IZtH8PFw3lEEGvfmuHXteStR2HinPD8XXMALsn6.jpg', 'created_at' => '2026-10-05 18:58:35', 'updated_at' => '2026-10-05 18:58:35'],
            ['id_eskul' => 3, 'nama_ekskul' => 'futsal', 'pembina' => 'aldyama', 'jadwal_latihan' => '09.00', 'deskripsi' => 'jhgffdsghjmkhyhtfgvb', 'gambar' => 'ekstrakurikuler/CduGHQAoNESb6QJEgTLBDkxqep5mnmWoI5DEUrPl.jpg', 'created_at' => '2026-10-05 18:59:16', 'updated_at' => '2026-10-05 18:59:16'],
            ['id_eskul' => 4, 'nama_ekskul' => 'zzzz', 'pembina' => 'cc', 'jadwal_latihan' => '09.00', 'deskripsi' => 'jhcgnbcvjgncbf', 'gambar' => 'ekstrakurikuler/lptTxdd9x9eDyTX4eaoWe5vsBZJu669GiD6aeCHK.jpg', 'created_at' => '2026-10-05 19:00:09', 'updated_at' => '2026-10-05 19:00:09'],
            ['id_eskul' => 5, 'nama_ekskul' => 'perisai diri', 'pembina' => 'ntasya', 'jadwal_latihan' => 'senin 08.00', 'deskripsi' => 'terwfdsrgtrhntdff', 'gambar' => 'ekstrakurikuler/0aJ89TQJPIaQmo1VjjW9uEGALLglpkcUFgWSGv3N.jpg', 'created_at' => '2026-10-06 01:27:11', 'updated_at' => '2026-10-06 01:27:11'],
            ['id_eskul' => 6, 'nama_ekskul' => 'voly', 'pembina' => 'adit', 'jadwal_latihan' => 'selasa 12.00', 'deskripsi' => 'ewfgerhyjhgdf', 'gambar' => 'ekstrakurikuler/AbhBVCt1IElGzJe5YKJY6IqI0qxv4ItrYoAliUCE.jpg', 'created_at' => '2026-10-06 01:28:07', 'updated_at' => '2026-10-06 01:28:07'],
            ['id_eskul' => 7, 'nama_ekskul' => 'berenang', 'pembina' => 'bila', 'jadwal_latihan' => 'jumat 15.00 WIB', 'deskripsi' => 'eerdhgfcbgvnbvbbn', 'gambar' => 'ekstrakurikuler/wPDlD5G2Iv0SCQZfqO0iKAqQbfTkeojcUIMcKzqp.jpg', 'created_at' => '2026-10-06 01:28:29', 'updated_at' => '2026-10-06 01:28:29'],
            ['id_eskul' => 8, 'nama_ekskul' => 'osis', 'pembina' => 'sni', 'jadwal_latihan' => 'kamis 15.00', 'deskripsi' => 'rgfchfrtgjysf,mng', 'gambar' => 'ekstrakurikuler/NCHJ05NsAlte5M31FdaKzRPnZXowPxXuSdmIhSF3.jpg', 'created_at' => '2026-10-06 01:29:00', 'updated_at' => '2026-10-06 01:29:00'],
        ]);

        DB::table('galeris')->insert([
            ['id_galeri' => 1, 'judul' => 'kegiatan olahraga', 'keterangan' => 'olah raga setiap hari jumat', 'file' => 'galeri/jRVREglfPXIA0TuHVJC6Y7UfbXQdH0dW6srraDwD.mp4', 'kategori' => 'video', 'tanggal' => '2026-10-06', 'created_at' => '2026-10-05 20:37:39', 'updated_at' => '2026-10-05 20:37:39'],
            ['id_galeri' => 2, 'judul' => 'aaa', 'keterangan' => 'aaaaaaaaaaaaaaaaaaa', 'file' => 'galeri/ey3KVZN9FtsQQY72YnP4OeiNdOyeYWafOBG3V0VA.jpg', 'kategori' => 'foto', 'tanggal' => '2026-10-06', 'created_at' => '2026-10-05 23:49:54', 'updated_at' => '2026-10-05 23:49:54'],
            ['id_galeri' => 3, 'judul' => 'fhbfgb', 'keterangan' => 'dfnxb cv', 'file' => 'galeri/hlcP9pIkOFRVt1lhpPHdBmjhurJ8evJMTcdaBYtm.jpg', 'kategori' => 'foto', 'tanggal' => '2026-10-06', 'created_at' => '2026-10-06 01:24:52', 'updated_at' => '2026-10-06 01:24:52'],
            ['id_galeri' => 4, 'judul' => 'rrrrrr', 'keterangan' => 'SBzdvftydfhf', 'file' => 'galeri/ynDIEbmSwFv82Go3j9mbrFsw3uIOWWArEG1Udy58.webp', 'kategori' => 'foto', 'tanggal' => '2026-10-06', 'created_at' => '2026-10-06 01:25:12', 'updated_at' => '2026-10-06 01:25:12'],
            ['id_galeri' => 5, 'judul' => 'aaaafthg', 'keterangan' => 'wertyuyresrdtgghjmgcfxvbn', 'file' => 'galeri/dl0PixzL8zeQrdylIMZ3otqnfenGq5dgLlYhOUiK.jpg', 'kategori' => 'foto', 'tanggal' => '2026-10-06', 'created_at' => '2026-10-06 01:25:37', 'updated_at' => '2026-10-06 01:25:37'],
            ['id_galeri' => 6, 'judul' => 'pppppppp', 'keterangan' => 'yxtfhcgvbftrxdfsgh', 'file' => 'galeri/dFlcZo1e5P3TXi8hBQyHUOa4dQyL5e4M41tglXwC.jpg', 'kategori' => 'foto', 'tanggal' => '2026-10-06', 'created_at' => '2026-10-06 01:25:53', 'updated_at' => '2026-10-06 01:25:53'],
            ['id_galeri' => 7, 'judul' => 'zzzzzzzzzzzzz', 'keterangan' => 'ghjkgjfxdfgnhjmm', 'file' => 'galeri/Gn9DV4DPLQJTaEKdXU44AOdjt7jIvpXkeGFW4ZUi.jpg', 'kategori' => 'foto', 'tanggal' => '2026-10-06', 'created_at' => '2026-10-06 01:26:07', 'updated_at' => '2026-10-06 01:26:07'],
        ]);
    }
}
