create database ppl_projek;
use ppl_projek;

create table aboutUs(
    id_aboutus int not null primary key auto_increment,
    nama varchar(200) not null,
    logo varchar(200) not null,
    visi varchar(200) not null,
    misi varchar(200) not null,
    alamat varchar(200) not null,
    sejarah varchar(200) not null,
    kontak varchar(200) not null
);

create table staff(
    id_staff int not null primary key auto_increment,
    nama_staff varchar(200) not null,
    jabatan varchar(200) not null,
    foto varchar(200),
    deskripsi varchar(200)
);

create table jurusan(
id_jurusan int primary key not null auto_increment,
nama_jurusan varchar(200) not null,
deskripsi_jurusan varchar(200),
keunggulan_jurusan varchar (200)
);

create table fasilitas(
id_fasilitas int primary key not null auto_increment,
nama_fasilitas Varchar(200) not null,
deskripsi_fasilitas varchar(200),
gambar_fasilitas varchar (200)
);

create table estrakurikuler (
id_estakulikuler int primary key not null auto_increment,
nama varchar(200),
deskripsi varchar(200),
gambar varchar(200)
);

create table berita(
id_berita int primary key not null auto_increment,
nama_berita varchar(200) not null,
deskripsi_berita varchar(200),
gambar_berita varchar(200), 
tanggal date
);

create table psb(
    id_psb int primary key not null auto_increment,
    deskripsi_psb varchar(200),
    gambar_psb varchar(200)
);

create table pengumuman(
    id_pengumuman int primary key not null auto_increment,
    nama varchar(200),
    deskripsi varchar(200),
    tanggal date,
    file varchar(200)
);

create table organisasi(
    id_organisasi int primary key not null auto_increment,
    nama varchar(200),
    deskripsi varchar(200),
    gambar varchar(200) 
);

create table unduhBerkas(
    id_berkas int primary key not null auto_increment,
    nama_berkas varchar(200),
    kategori varchar(200),
    file_berkas varchar(200) 
);

create table testimoni(
    id_testimoni int primary key not null auto_increment,
    nama varchar(200),
    peran varchar(200),
    testimoni varchar(200)
);

create table prestasi(
    id_prestasi int primary key auto_increment not null,
    nama varchar(200),
    deskripsi varchar(200),
    gambar varchar(200)
);


create table beasiswa(
    id_beasiswa int primary key auto_increment not null,
    nama varchar(200),
    deskripsi varchar(200)
);
