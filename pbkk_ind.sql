DROP TABLE IF EXISTS dbo.pemijat

CREATE TABLE pemijat (
 id int primary key identity,
 nama varchar (200) NOT NULL,
 ktp varchar (17) NOT NULL,
 jenis_kelamin varchar (2) NOT NULL,
 alamat varchar (100) NOT NULL,
 email varchar (50) NOT NULL,
 password varchar (20) NOT NULL,
 reset_pass varchar (32) NOT NULL,
 gambar varchar (200) default NULL,
 status varchar (20) NOT NULL,
 tarif int NOT NULL,
 created_at datetime default null
)

INSERT INTO pemijat
(nama, ktp, jenis_kelamin, alamat, email, password, reset_pass, gambar, status, tarif, created_at)
VALUES
('Pemijat1', '0000000000000000', 'L', 'Surabaya', 'pemijat@gmail.com', 'password', 'null', 'gambar', 1, 50000, '2020-04-21 22:18:44'),
('Pemijat2', '0000000000000000', 'L', 'Surabaya', 'pemijat@gmail.com', 'password', 'null', 'gambar', 1, 50000, '2020-04-21 22:18:44')


DROP TABLE IF EXISTS dbo.pelanggan

CREATE TABLE pelanggan (
 id int primary key identity,
 nama varchar (200) NOT NULL,
 ktp varchar (17) NOT NULL,
 jenis_kelamin varchar (2) NOT NULL,
 alamat varchar (100) NOT NULL,
 email varchar (50) NOT NULL,
 password varchar (20) NOT NULL,
 reset_pass varchar (32) NOT NULL,
 gambar varchar (200) default NULL,
 created_at datetime default null
)

INSERT INTO pelanggan
(nama, ktp, jenis_kelamin, alamat, email, password, reset_pass, gambar, created_at)
VALUES
('Pemijat1', '0000000000000000', 'L', 'Surabaya', 'pemijat@gmail.com', 'password', 'null', 'gambar', '2020-04-21 22:18:44')

CREATE TABLE pemesanan (
 id int primary key identity,
 pemijat_id int NOT NULL,
 pelanggan_id int NOT NULL,
 status varchar (20) NOT NULL
)

INSERT INTO pemesanan
(pemijat_id, pelanggan_id, status)
VALUES
(1, 1, 'Pending')