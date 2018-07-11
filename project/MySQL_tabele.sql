
-- Creare tabel admin

CREATE TABLE IF NOT EXISTS `admin` (
  `nume` char(30) NOT NULL,
  `parola` char(40) NOT NULL,
  `email` char(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Adaugare date

INSERT INTO `admin` VALUES ('GGA', MD5('1234'), 'someemail@yahoo.com');

-- Tabel pentru retinerea persoanelor inscrise

CREATE TABLE IF NOT EXISTS persoana (
	id_p int(11) NOT NULL AUTO_INCREMENT,
	nume char(30) NOT NULL,
	prenume char(30) NOT NULL,
	email char(30) NOT NULL,
	telefon char(15) NOT NULL,
	ocupatie char(30) NOT NULL,
    PRIMARY KEY (id_p)
);

-- INSERT INTO persoana(nume,prenume,email,telefon,ocupatie) VALUES('Popa','Maria','someemail@yahoo.com','0712345678','student');

-- Tabel pentru retinerea cursurilor disponibile

CREATE TABLE IF NOT EXISTS curs (
	id_c int(11)  NOT NULL,
	nume_curs char(100) NOT NULL,
	data_inceperii DATE,
    PRIMARY KEY (id_c)
);

-- Tabel pentru creare conexiunii dintre persoanele inscrise si cursurile alese de acestia

CREATE TABLE IF NOT EXISTS persoana_curs (
	id_p int(11) NOT NULL,
	id_c int(11) NOT NULL,
    FOREIGN KEY (id_p) REFERENCES persoana(id_p),
    FOREIGN KEY (id_c) REFERENCES curs(id_c)
);

-- Nume cursuri
-- Modern C++ Programming
-- Building 'A Modern Web Application'
-- Modern Windows Deployment Technologies: MSI AppX
-- Face Recognition In .NET/C# Application

INSERT INTO curs VALUES (1, 'Modern C++ Programming', '2018-06-25');
INSERT INTO curs VALUES (2, 'Building A Modern Web Application', '2018-07-03');
INSERT INTO curs VALUES (3, 'Modern Windows Deployment Technologies: MSI AppX', '2018-07-09');
INSERT INTO curs VALUES (4, 'Face Recognition In .NET/C# Application', '2018-06-29');

-- Inserare persoana

INSERT INTO persoana VALUES (1, 'Popa', 'Ion', 'someemail@yahoo.com', '0712345678', 'student');
INSERT INTO persoana VALUES (2, 'Popa', 'Maria', 'someemail@yahoo.com', '0712345678', 'student');
INSERT INTO persoana VALUES (3, 'Voican', 'Andra', 'someemail@yahoo.com', '0712345678', 'student');
INSERT INTO persoana VALUES (4, 'Gherghe', 'Geani', 'someemail@yahoo.com', '0712345678', 'student');
INSERT INTO persoana VALUES (5, 'Gitan', 'Georgiana', 'someemail@yahoo.com', '0712345678', 'student');

-- Inserare in legatura id-ul persoanei si id-ul cursului alese

INSERT INTO persoana_curs VALUES (1,1);
INSERT INTO persoana_curs VALUES (1,4);


INSERT INTO persoana_curs VALUES (2,1);
INSERT INTO persoana_curs VALUES (2,2);
INSERT INTO persoana_curs VALUES (2,3);

INSERT INTO persoana_curs VALUES (3,1);
INSERT INTO persoana_curs VALUES (3,2);

INSERT INTO persoana_curs VALUES (4,1);

INSERT INTO persoana_curs VALUES (5,1);

