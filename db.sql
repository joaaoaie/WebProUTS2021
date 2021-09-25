CREATE DATABASE IF NOT EXISTS webuts;

USE webuts;

CREATE TABLE user (
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  salt VARCHAR(255) NOT NULL,
  foto VARCHAR(255),
  firstName VARCHAR(50) NOT NULL,
  lastName VARCHAR(50),
  tanggalLahir DATE NOT NULL,
  jenisKelamin VARCHAR(6) NOT NULL,
  PRIMARY KEY (username, email)
);

CREATE TABLE berita (
  idBerita CHAR(5) NOT NULL,
  judul VARCHAR(255) NOT NULL,
  kategori VARCHAR(100) NOT NULL,
  gambar VARCHAR(255),
  penulis VARCHAR(100) NOT NULL,
  tanggal DATE NOT NULL,
  konten TEXT NOT NULL,
  PRIMARY KEY (idBerita)
);

CREATE TABLE komentar (
 idBerita CHAR(5) NOT NULL,
 idKomentar CHAR(5) NOT NULL,
 username VARCHAR(255) NOT NULL,
 tanggal DATE NOT NULL,
 isi VARCHAR(255) NOT NULL,
 suka INTEGER DEFAULT 0,
 PRIMARY KEY (idBerita, idKomentar),
 FOREIGN KEY (idBerita) REFERENCES berita(idBerita),
 FOREIGN KEY (username) REFERENCES user(username),
 INDEX(idBerita)
);

INSERT INTO user VALUES
  ("admin", "admin@admin.com", "3b41bf6b2d28163ee961d24d88c12bb5", "admin", NULL, "my", "admin", "2021-09-25", "male"); /* iamadminadmin */

INSERT INTO berita VALUES
  ("B0001", "Resep Cilok Kanji Tanpa Daging Pakai Bumbu Kacang, Empuk dan Tidak Alot", "Food", NULL, "Yuharrani Aisyah", "2021-09-25",
  "<p><strong>KOMPAS.com</strong> - Cilok adalah kepanjangan aci dicolok tentunya dengan bahan utama aci atau tapioka yang disebut juga tepung kanji. Biasanya disajikan bersama bumbu kacang.</p>
  <p>Penjual cilok biasanya ada yang menjajakan cilok daging dan cilok kanji tanpa daging.</p>
  <p>Kamu dapat membuat sendiri cilok kanji yang ekonomis mengikuti resep dari Sobat Cookpad Nanik Cahyani Hernowo @dapurmamagembul berikut ini.</p>
  <h2>Resep cilok kanji tanpa daging</h2>
  <h3>Bahan biang</h3>
  <ul>
    <li>150 gram tepung terigu</li>
    <li>300 ml air</li>
    <li>2 siung bawang putih, haluskan</li>
    <li>1/2 sdt garam</li>
    <li>1/4 sdt kaldu bubuk</li>
    <li>1/2 sdt ketumbar bubuk</li>
    <li>1/4 sdt lada bubuk</li>
    <li>Gula sejumput</li>
  </ul>
  <h3>Bahan kering</h3>
  <ul>
    <li>150-200 gram tepung kanji</li>
    <li>2 batang daun bawang, cincang</li>
  </ul>
  <h3>Bahan bumbu kacang</h3>
  <ul>
    <li>100 gram kacang tanah goreng</li>
    <li>3 buah cabai merah</li>
    <li>4 siung bawang merah</li>
    <li>4 siung bawang putih</li>
    <li>2 lembar daun jeruk</li>
    <li>2 sdm gula merah sisir</li>
    <li>2 sdm kecap manis</li>
    <li>Garam, gula pasir, dan kaldu bubuk jamur secukupnya</li>
    <li>Air secukupnya</li>
  </ul>
  <h2>Cara membuat cilok kanji tanpa daging</h2>
  <ol>
    <li><strong>Biang</strong>: campur semua bahan biang di wajan antilengket, aduk rata.</li>
    <li>Masak biang dengan api kecil sambil terus diaduk sampai adonan padat. Angkat dan dinginkan.</li>
    <li>Tambahkan daun bawang, aduk menggunakan tangan. Tuang tepung kanji secara bertahap sampai adonan kalis atau tidak lengket di tangan.</li>
    <li>Bentuk adonan menjadi bulat sesuai selera sampai semua adonan habis.</li>
    <li>Rebus cilok di dalam air mendidih plus sedikit minyak goreng agar tidak menempel. Masak sampai mengapung. Angkat dan tiriskan.</li>
    <li><strong>Bumbu kacang</strong>: goreng semua bawang dan cabai merah sampai layu. Blender kacang tanah goreng dengan bumbu dan air secukupnya. Masak di wajan.</li>
    <li>Tambahkan gula merah, gula pasir, garam, dan daun jeruk. Aduk rata. Koreksi rasa. Masak sampai bumbu meletup-letup. Tambahkan sedikit kecap. Aduk.</li>
    <li>Sajikan cilok kanji dengan bumbu kacang.</li>
  </ol>");