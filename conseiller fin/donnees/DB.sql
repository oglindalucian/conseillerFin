USE Conseiller
GO

CREATE TABLE Institutions (
id_institution INT IDENTITY(1,1) NOT NULL,
nom VARCHAR(100) UNIQUE NOT NULL
);
GO

CREATE TABLE Risque (
id_risque INT IDENTITY(1,1) NOT NULL,
explication VARCHAR(100) UNIQUE NOT NULL
);
GO

CREATE TABLE Produits (
  id_produit INT IDENTITY(1,1) NOT NULL,
  nom VARCHAR(100) UNIQUE NOT NULL,
  id_institution INT,
  prix MONEY,
  id_risque INT NOT NULL
);
GO

ALTER TABLE Institutions ADD CONSTRAINT pk_institution PRIMARY KEY(id_institution) 
GO

ALTER TABLE Produits ADD CONSTRAINT pk_produits PRIMARY KEY(id_produit) 
GO

ALTER TABLE Produits ADD CONSTRAINT fk_institution FOREIGN KEY(id_institution) REFERENCES Institutions(id_institution)
ALTER TABLE Produits ADD CONSTRAINT fk_risque FOREIGN KEY(id_risque) REFERENCES Risque(id_risque)
ALTER TABLE `produitsachetes` ADD CONSTRAINT fk_ach_institution FOREIGN KEY(id_institution) REFERENCES institutions(id_institution)


