CREATE TABLE Autorius
(
	id integer NOT NULL AUTO_INCREMENT NOT NULL AUTO_INCREMENT,
	vardas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	pavardë varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	biografija varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PRIMARY KEY(id)
);

CREATE TABLE Knyga
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	iðleidimo_metai int,
	kalba varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	paveikslëlio_nuoroda varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	apraðymas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	puslapiø_skaièius int,
	ISBN_kodas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	virðelio_tipas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	recenzija varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	PRIMARY KEY(id)
);

CREATE TABLE Leidykla
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	miestas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	el_paðto_adresas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	gatvë varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	namo_numeris int,
	PRIMARY KEY(id)
);

CREATE TABLE Naujienos
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas char,
	tekstas char,
	paraðymo_data date,
	publikavimo_data date,
	PRIMARY KEY(id)
);

CREATE TABLE Paðtas
(
	id integer NOT NULL AUTO_INCREMENT,
	Cksum varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	updateDate date,
	checkedDate date,
	PRIMARY KEY(id)
);

CREATE TABLE Sandëlis
(
	id integer NOT NULL AUTO_INCREMENT,
	pavadinimas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	gatvë varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	miestas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	namo_numeris int,
	PRIMARY KEY(id)
);

CREATE TABLE Vartotojas
(
	id integer NOT NULL AUTO_INCREMENT,
	vardas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	pavardë varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	el_paðtas char,
	adresas varchar (255)  CHARACTER SET utf8 COLLATE utf8_bin,
	rolë int,
	iðleista_pinigø double precision,
	nupirkta_knygø int,
	bonus_pinigai double precision,
	nuolaida int,
	bonus_narys boolean,
	PRIMARY KEY(id)
);

CREATE TABLE Þanras
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

CREATE TABLE Knygø_sandëlyje
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis int,
	fk_Sandëlis integer NOT NULL,
	fk_Knyga integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT turi1 FOREIGN KEY(fk_Sandëlis) REFERENCES Sandëlis (id),
	CONSTRAINT yra FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Knygø_sàraðas
(
	id integer NOT NULL AUTO_INCREMENT,
	data date,
	fk_Leidykla integer NOT NULL,
	fk_Sandëlis integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT uþsako_ið FOREIGN KEY(fk_Leidykla) REFERENCES Leidykla (id),
	CONSTRAINT sudaro FOREIGN KEY(fk_Sandëlis) REFERENCES Sandëlis (id)
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

CREATE TABLE Prekiø_sàraðas
(
	id integer NOT NULL AUTO_INCREMENT,
	data date,
	fk_Vartotojas integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT pateikia FOREIGN KEY(fk_Vartotojas) REFERENCES Vartotojas (id)
);

CREATE TABLE Þanrai
(
	fk_Knyga integer,
	fk_Þanras integer,
	PRIMARY KEY(fk_Knyga, fk_Þanras),
	CONSTRAINT priklauso FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Autoriai
(
	fk_Knyga integer,
	fk_Autorius integer,
	PRIMARY KEY(fk_Knyga, fk_Autorius),
	CONSTRAINT paraðë FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);

CREATE TABLE Uþsakymas
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis integer,
	fk_Knyga integer NOT NULL,
	fk_Knygø_sàraðas integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT uþsako FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id),
	CONSTRAINT átrauktas_á FOREIGN KEY(fk_Knygø_sàraðas) REFERENCES Knygø_sàraðas (id)
);

CREATE TABLE Vartotojo_uþsakymas
(
	id integer NOT NULL AUTO_INCREMENT,
	kiekis int,
	uþsakymo_id int,
	fk_Prekiø_sàraðas integer NOT NULL,
	fk_Knyga integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT átrauktas_á_uþsakymà FOREIGN KEY(fk_Prekiø_sàraðas) REFERENCES Prekiø_sàraðas (id),
	CONSTRAINT uþsako_prekæ FOREIGN KEY(fk_Knyga) REFERENCES Knyga (id)
);
