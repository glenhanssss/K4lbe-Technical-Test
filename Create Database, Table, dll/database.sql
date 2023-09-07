CREATE DATABASE kalbe;

CREATE TABLE Produk (
    intProductID int AUTO_INCREMENT,
    txtProductCode varchar(255) NOT NULL,
    txtProductName varchar(255) NOT NULL,
    intQty int NOT NULL,
    decPrice decimal(10, 2),
    dtInserted datetime,
    PRIMARY KEY (intProductID)
);

CREATE TABLE Customer (
    intCustomerID int AUTO_INCREMENT,
    txtCustomerName varchar(255) NOT NULL,
    txtCustomerAddress varchar(255) NOT NULL,
    bitGender TINYINT(1) NOT NULL,
    dtmBirthDate datetime,
    Inserted datetime,
    PRIMARY KEY (intCustomerID)
);

CREATE TABLE Penjualan (
    intSalesOrderID int AUTO_INCREMENT,
    intCustomerID int,
    intProductID int,
    dtSalesOrder datetime,
    intQty DOUBLE,
    PRIMARY KEY (intSalesOrderID)
);

-- Tambahkan relasi antara Penjualan dan Customer
ALTER TABLE Penjualan
ADD FOREIGN KEY (intCustomerID)
REFERENCES Customer(intCustomerID);

-- Tambahkan relasi antara Penjualan dan Produk
ALTER TABLE Penjualan
ADD FOREIGN KEY (intProductID)
REFERENCES Produk(intProductID);



