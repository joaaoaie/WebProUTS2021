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
  konten VARCHAR(255) NOT NULL,
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
  ("admin", "admin@admin.com", "3b41bf6b2d28163ee961d24d88c12bb5", "admin", NULL, "my", "admin", "2021-09-25", "male");