CREATE TABLE Autorius
(
	id integer NOT NULL AUTO_INCREMENT NOT NULL AUTO_INCREMENT,
	vardas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	pavarde varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	biografija varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PRIMARY KEY(id)
);

CREATE TABLE Knyga
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	isleidimo_metai int,
	kalba varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	paveikslelio_nuoroda varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	aprasymas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	puslapiu_skaicius int,
	ISBN_kodas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	virselio_tipas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	recenzija varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PRIMARY KEY(id)
);

CREATE TABLE Leidykla
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	miestas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	el_pasto_adresas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	gatve varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	namo_numeris int,
	PRIMARY KEY(id)
);

CREATE TABLE Naujienos
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	tekstas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	parasymo_data date,
	publikavimo_data date,
	PRIMARY KEY(id)
);

CREATE TABLE Pastas
(
	id integer NOT NULL AUTO_INCREMENT,
	Cksum varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	updateDate date,
	checkedDate date,
	PRIMARY KEY(id)
);

CREATE TABLE Sandelis
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	gatve varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	miestas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	namo_numeris int,
	PRIMARY KEY(id)
);

CREATE TABLE Vartotojas
(
	id integer NOT NULL AUTO_INCREMENT,
	vardas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	pavarde varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	el_pastas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	adresas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	role int,
	isleista_pinigu double precision,
	nupirkta_knygu int,
	bonus_pinigai double precision,
	nuolaida int,
	bonus_narys boolean,
	PRIMARY KEY(id)
);

CREATE TABLE zanras
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

CREATE TABLE Knygu_sandelyje
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis int,
	fk_Sandelis integer NOT NULL,
	fk_Knyga integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT turi1 FOREIGN KEY(fk_Sandelis) REFERENCES Sandelis (id),
	CONSTRAINT yra FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Knygu_sarasas
(
	id integer NOT NULL AUTO_INCREMENT,
	data date,
	fk_Leidykla integer NOT NULL,
	fk_Sandelis integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT uzsako_is FOREIGN KEY(fk_Leidykla) REFERENCES Leidykla (id),
	CONSTRAINT sudaro FOREIGN KEY(fk_Sandelis) REFERENCES Sandelis (id)
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

CREATE TABLE Prekiu_sarasas
(
	id integer NOT NULL AUTO_INCREMENT,
	data date,
	fk_Vartotojas integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT pateikia FOREIGN KEY(fk_Vartotojas) REFERENCES Vartotojas (id)
);

CREATE TABLE zanrai
(
	fk_Knyga integer,
	fk_zanras integer,
	PRIMARY KEY(fk_Knyga, fk_zanras),
	CONSTRAINT priklauso FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
	CONSTRAINT priklauso FOREIGN KEY(fk_zanras) REFERENCES zanras(id)
);

CREATE TABLE Autoriai
(
	fk_Knyga integer,
	fk_Autorius integer,
	PRIMARY KEY(fk_Knyga, fk_Autorius),
	CONSTRAINT parase FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Uzsakymas
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis integer,
	fk_Knyga integer NOT NULL,
	fk_Knygu_sarasas integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT uzsako FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id),
	CONSTRAINT itrauktas_i FOREIGN KEY(fk_Knygu_sarasas) REFERENCES Knygu_sarasas (id)
);

CREATE TABLE Vartotojo_uzsakymas
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis int,
	uzsakymo_id int,
	fk_Prekiu_sarasas integer NOT NULL,
	fk_Knyga integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT itrauktas_i_uzsakyma FOREIGN KEY(fk_Prekiu_sarasas) REFERENCES Prekiu_sarasas (id),
	CONSTRAINT uzsako_preke FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);
