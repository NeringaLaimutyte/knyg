CREATE TABLE Autorius
(
	id integer NOT NULL AUTO_INCREMENT NOT NULL AUTO_INCREMENT,
	vardas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	pavard� varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	biografija varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PRIMARY KEY(id)
);

CREATE TABLE Knyga
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	i�leidimo_metai int,
	kalba varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	paveiksl�lio_nuoroda varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	apra�ymas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	puslapi�_skai�ius int,
	ISBN_kodas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	vir�elio_tipas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	recenzija varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PRIMARY KEY(id)
);

CREATE TABLE Leidykla
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	miestas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	el_pa�to_adresas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	gatv� varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	namo_numeris int,
	PRIMARY KEY(id)
);

CREATE TABLE Naujienos
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas char,
	tekstas char,
	para�ymo_data date,
	publikavimo_data date,
	PRIMARY KEY(id)
);

CREATE TABLE Pa�tas
(
	id integer NOT NULL AUTO_INCREMENT,
	Cksum varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	updateDate date,
	checkedDate date,
	PRIMARY KEY(id)
);

CREATE TABLE Sand�lis
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	gatv� varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	miestas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	namo_numeris int,
	PRIMARY KEY(id)
);

CREATE TABLE Vartotojas
(
	id integer NOT NULL AUTO_INCREMENT,
	vardas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	pavard� varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	el_pa�tas char,
	adresas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	rol� int,
	i�leista_pinig� double precision,
	nupirkta_knyg� int,
	bonus_pinigai double precision,
	nuolaida int,
	bonus_narys boolean,
	PRIMARY KEY(id)
);

CREATE TABLE �anras
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PRIMARY KEY(id)
);

CREATE TABLE Kaina
(
	id integer NOT NULL AUTO_INCREMENT,
	kaina double,
	pastaba varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PrData date,
	PaData date,
	fk_Knyga integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT turi FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Knyg�_sand�lyje
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis int,
	fk_Sand�lis integer NOT NULL,
	fk_Knyga integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT turi1 FOREIGN KEY(fk_Sand�lis) REFERENCES Sand�lis (id),
	CONSTRAINT yra FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Knyg�_s�ra�as
(
	id integer NOT NULL AUTO_INCREMENT,
	data date,
	fk_Leidykla integer NOT NULL,
	fk_Sand�lis integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT u�sako_i� FOREIGN KEY(fk_Leidykla) REFERENCES Leidykla (id),
	CONSTRAINT sudaro FOREIGN KEY(fk_Sand�lis) REFERENCES Sand�lis (id)
);

CREATE TABLE Kuponas
(
	id integer NOT NULL AUTO_INCREMENT,
	suma double precision,
	galiojimo_data date,
	ar_panaudotas boolean,
	fk_Vartotojas integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT perka FOREIGN KEY(fk_Vartotojas) REFERENCES Vartotojas (id)
);

CREATE TABLE Logas
(
	id integer NOT NULL AUTO_INCREMENT,
	data date,
	IP varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	URL varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	laikas date,
	fk_Vartotojas integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT padaro FOREIGN KEY(fk_Vartotojas) REFERENCES Vartotojas (id)
);

CREATE TABLE Preki�_s�ra�as
(
	id integer NOT NULL AUTO_INCREMENT,
	data date,
	fk_Vartotojas integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT pateikia FOREIGN KEY(fk_Vartotojas) REFERENCES Vartotojas (id)
);

CREATE TABLE �anrai
(
	fk_Knyga integer,
	fk_�anras integer,
	PRIMARY KEY(fk_Knyga, fk_�anras),
	CONSTRAINT priklauso FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Autoriai
(
	fk_Knyga integer,
	fk_Autorius integer,
	PRIMARY KEY(fk_Knyga, fk_Autorius),
	CONSTRAINT para�� FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE U�sakymas
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis integer,
	fk_Knyga integer NOT NULL,
	fk_Knyg�_s�ra�as integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT u�sako FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id),
	CONSTRAINT �trauktas_� FOREIGN KEY(fk_Knyg�_s�ra�as) REFERENCES Knyg�_s�ra�as (id)
);

CREATE TABLE Vartotojo_u�sakymas
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis int,
	u�sakymo_id int,
	fk_Preki�_s�ra�as integer NOT NULL,
	fk_Knyga integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT �trauktas_�_u�sakym� FOREIGN KEY(fk_Preki�_s�ra�as) REFERENCES Preki�_s�ra�as (id),
	CONSTRAINT u�sako_prek� FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);
