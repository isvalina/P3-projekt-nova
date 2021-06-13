create database isvalina_20_20 default character set utf8;

use isvalina_20_20;

create table ontologija(
    sifra int not null primary key auto_increment,
    film varchar(255),
    glumac varchar(255),
    zanr varchar(255),
    nagrada varchar(255),
    godinaIzlaska int,
    trajanje varchar(255)
);


drop table ontologija;

insert into ontologija(sifra, film, glumac, zanr, nagrada, godinaIzlaska, trajanje) values (1, "Testni Film", "Glumac", "SF", "Nagrada", 2021, "100min");

select * from ontologija 

DELETE FROM ontologija
WHERE sifra = 1;