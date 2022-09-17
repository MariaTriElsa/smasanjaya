create database ppl_barang;
use ppl_barang;

create table barang(
    id_barang int not null primary key auto_increment,
    nama_barang varchar(200) not null,
    harga_barang int,
    jumlah_barang int
)