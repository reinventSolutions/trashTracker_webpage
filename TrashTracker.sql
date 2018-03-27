DROP TABLE Drivers;
DROP TABLE Trucks;
DROP TABLE Routes;
DROP TABLE Bins;
DROP TABLE Weights;
DROP TABLE Houses;
DROP TABLE users;

CREATE TABLE users (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  password VARCHAR(200) NOT NULL,
  name VARCHAR(200) NOT NULL,
  email VARCHAR(200) NOT NULL,
  CONSTRAINT IDPK PRIMARY KEY (ID)
);
CREATE TABLE Houses (
  House INTEGER(20) NOT NULL,
  UsernameID INTEGER NOT NULL,
  Address VARCHAR(100) NOT NULL,
  St VARCHAR(100) NOT NULL,
  City VARCHAR(100) NOT NULL, 
  Zip INTEGER(7) NOT NULL,
  N1 VARCHAR(8) NOT NULL,
  N2 VARCHAR(8) NOT NULL,
  N3 VARCHAR(8) NOT NULL,
  N4 VARCHAR(8) NOT NULL,
  N5 VARCHAR(8) NOT NULL,
  CONSTRAINT HousePK PRIMARY KEY (House),
  CONSTRAINT UsernameFK FOREIGN KEY (UsernameID) REFERENCES users(ID)
);

CREATE TABLE Weights (
  Weight INTEGER(50) NOT NULL,
  HouseID INTEGER(20) NOT NULL,
  Con INTEGER(10) NOT NULL,
  BinType VARCHAR(200) NOT NULL,
  Wk VARCHAR(15) NOT NULL,
  Yr INTEGER(4) NOT NULL,
  Dte INTEGER(6) NOT NULL,
  Impute VARCHAR(15) NOT NULL,
  CONSTRAINT WeightPK PRIMARY KEY (Weight),
  CONSTRAINT HouseFK FOREIGN KEY (HouseID) REFERENCES Houses(House)
);
CREATE TABLE Bins (
 Bin INTEGER (10) NOT NULL AUTO_INCREMENT,
 WeightID INTEGER (50) NOT NULL,
 BinType VARCHAR (5) NOT NULL,
 Contamination INTEGER (5) NOT NULL,
 Number VARCHAR (10) NOT NULL,
 Size INTEGER (2) NOT NULL,
 Estimate INTEGER (200) NOT NULL,
 CONSTRAINT BinPK PRIMARY KEY (Bin),
 CONSTRAINT WeightFK FOREIGN KEY (WeightID) REFERENCES Weights(Weight)
);
CREATE TABLE Routes (
  RouteNumber INTEGER(10) NOT NULL,
  WeightID INTEGER(50) NOT NULL,
  Driver VARCHAR(10) NOT NULL,
  CONSTRAINT RouteNumberPK PRIMARY KEY (RouteNumber),
  CONSTRAINT WeightFK2 FOREIGN KEY(WeightID) REFERENCES Weights(Weight)
);
CREATE TABLE Trucks (
  LicensePlate VARCHAR(10) NOT NULL,
  TruckNumber VARCHAR(10) NOT NULL,
  RouteNumber INTEGER(10) NOT NULL,
  CONSTRAINT LicensePlatePK PRIMARY KEY (LicensePlate),
  CONSTRAINT RouteFK FOREIGN KEY (RouteNumber) REFERENCES Routes(RouteNumber)
);
CREATE TABLE Drivers (
  EmployeeID VARCHAR(15) NOT NULL,
  Name VARCHAR(50) NOT NULL,
  TruckID VARCHAR(10) NOT NULL,
  CONSTRAINT EmployeePK PRIMARY KEY (EmployeeID),
  CONSTRAINT TruckFK FOREIGN KEY(TruckID) REFERENCES Trucks(LicensePlate)
);

INSERT INTO `users` (`ID`, `password`, `email`) VALUES
(12345, '12345', '12345');
INSERT INTO `users` (`ID`, `password`, `email`, `name`) VALUES
(11111, 'password', 'Scotty@gmail.com', 'Scotty');
INSERT INTO `Houses` (`UsernameID`, `House`, `Address`, `City`, `St`, `Zip`) VALUES
(11111, 099878, '123 Blah Ln', 'San Marcos', 'CA', '92078');
INSERT INTO `Weights` (`HouseID`, `Weight`, `Con`,`BinType`,`Wk`,`Yr`,`Dte`) VALUES
(99878, 123, 1, 1, 1, 2018, 1);
INSERT INTO `Bins` (`Bin`,`WeightID`, `BinType`,`Contamination`,`Number`,`Size`,`Estimate`) VALUES
(1, 123, '1', 0, 12345, 10, 65);
INSERT INTO `Bins` (`Bin`,`WeightID`, `BinType`,`Contamination`,`Number`,`Size`,`Estimate`) VALUES
(2, 123, '2', 0, 67890, 10, 85);
INSERT INTO `Bins` (`Bin`,`WeightID`, `BinType`,`Contamination`,`Number`,`Size`,`Estimate`) VALUES
(3, 123, '3', 0, 11121, 10, 95);
