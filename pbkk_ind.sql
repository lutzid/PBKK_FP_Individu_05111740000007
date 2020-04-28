
DROP TABLE IF EXISTS dbo.pemijat
DROP TABLE IF EXISTS dbo.pelanggan
DROP TABLE IF EXISTS dbo.pemesanan
CREATE TABLE pemijat (
 id varchar (60) primary key,
 nama varchar (200) NOT NULL,
 ktp varchar (17) unique NOT NULL,
 jenis_kelamin varchar (2) NOT NULL,
 alamat varchar (100) NOT NULL,
 email varchar (200) NOT NULL,
 password text NOT NULL,
 reset_pass varchar (32) NOT NULL,
 gambar varchar (200) default NULL,
 status varchar (20) NOT NULL,
 tarif int NOT NULL,
 created_at datetime default null
)

INSERT INTO pemijat
(id, nama, ktp, jenis_kelamin, alamat, email, password, reset_pass, gambar, status, tarif, created_at)
VALUES
('asdasdasdsadsa', 'Pemijat1', '0000000000000000', 'L', 'Surabaya', 'pemijat@gmail.com', 'password', 'null', 'gambar', 'Tidak Aktif', 50000, '2020-04-21 22:18:44'),
('eqwewqdasdasdd', 'Pemijat2', '0000000000000001', 'L', 'Surabaya', 'pemijat@gmail.com', 'password', 'null', 'gambar', 'Aktif', 50000, '2020-04-21 22:18:44')

CREATE TABLE pelanggan (
 id varchar (60) primary key,
 nama varchar (200) NOT NULL,
 ktp varchar (17) unique NOT NULL,
 jenis_kelamin varchar (2) NOT NULL,
 alamat varchar (100) NOT NULL,
 email varchar (200) NOT NULL,
 password text NOT NULL,
 reset_pass varchar (32) NOT NULL,
 gambar varchar (200) default NULL,
 created_at datetime default null
)

INSERT INTO pelanggan
(id, nama, ktp, jenis_kelamin, alamat, email, password, reset_pass, gambar, created_at)
VALUES 
('easdqweqdasdasdd', 'Pelanggan1', '0000000000000000', 'L', 'Surabaya', 'pemijat@gmail.com', '$2y$12$M0hCaXN3Tlh0dmE5cWZCe.tVP/FtBGE/92.ZUs08lo7PBBy.aLy7m', 'null', 'gambar', '2020-04-21 22:18:44'),
('wi6BMroM11Di2nfIaR8zA1A5', 'Pelanggan', '321313', 'L', 'Surabaya', 'plg23@test.com', '$2y$12$M0hCaXN3Tlh0dmE5cWZCe.tVP/FtBGE/92.ZUs08lo7PBBy.aLy7m', 'null', NULL, null)
OPTION (QUERYTRACEON 460);

-- ('eqwewqdasdasdd', 'Pelanggan1', '0000000000000000', 'L', 'Surabaya', 'pemijat@gmail.com', '$2y$12$M0hCaXN3Tlh0dmE5cWZCe.tVP/FtBGE/92.ZUs08lo7PBBy.aLy7m', 'null', 'gambar', '2020-04-21 22:18:44'),

CREATE TABLE pemesanan (
 id varchar (60) primary key,
 pemijat_id varchar (60) NOT NULL,
 pelanggan_id varchar (60) NOT NULL,
 status varchar (20) NOT NULL,
 created_at datetime default null
)

INSERT INTO pemesanan
(id, pemijat_id, pelanggan_id, status)
VALUES
('sadqwnasldlasdn', 'eqwewqdasdasdd', 'eqwewqdasdasdd', 'Pending')