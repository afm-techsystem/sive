-- creacion de estructura
CREATE DATABASE if not exists bd_sive;

use bd_sive;

CREATE TABLE Usuario (
  correo varchar(40) NOT NULL,
  password varchar(20) NOT NULL,
  nombre varchar(20) NOT NULL,
  apellido varchar(20) NOT NULL,
  fechaNac date NOT NULL,
  documento varchar(20) NOT NULL,
  calle varchar(15) NOT NULL,
  numero int NOT NULL,
  esquina varchar(15)	NOT NULL,
  PRIMARY KEY(correo),
  UNIQUE(Documento)
);

CREATE TABLE telefono (
  correo varchar(40) NOT NULL,
  telefono varchar(10) NOT NULL,
  PRIMARY KEY(correo, telefono),
  FOREIGN KEY(correo) REFERENCES Usuario(correo)
);

CREATE TABLE Cliente(
  correo varchar(40) NOT NULL,
  reputacion int NOT NULL,
  PRIMARY KEY(correo), 
  FOREIGN KEY(correo) REFERENCES Usuario(correo)
);



CREATE TABLE vendedor(
  correo varchar(40) NOT NULL,
  idVendedor int NOT NULL,
  PRIMARY KEY(correo),
  UNIQUE(idVendedor), 
  FOREIGN KEY(correo) REFERENCES Usuario(correo)
);

CREATE TABLE Administrador(
  correo varchar(40) NOT NULL,
  idAdministrador int NOT NULL,
  PRIMARY KEY(correo),
  UNIQUE(idAdministrador), 
  FOREIGN KEY(correo) REFERENCES Usuario(correo)
);

CREATE TABLE Catalogo(
  idCatalogo int NOT NULL, 
  nombre varchar(20) NOT NULL,
  PRIMARY KEY(idCatalogo)
);

CREATE TABLE Categoria(
  idCategoria int NOT NULL, 
  nombre varchar(20) NOT NULL,
  PRIMARY KEY(idCategoria)
);

CREATE TABLE Producto(
  codProducto int NOT NULL, 
  nombre varchar(20) NOT NULL, 
  precio int NOT NULL, 
  stock int NOT NULL,
  estadoProducto varchar(10) NOT NULL,
  procedencia varchar(15) NOT NULL,
  descripcion varchar(70) NOT NULL, 
  detalle varchar(60) NOT NULL,
  PRIMARY KEY(codProducto)
);

CREATE TABLE Compras(
  idOrden int NOT NULL, 
  fechaCompra date NOT NULL, 
  pagoAprobado boolean NOT NULL, 
  total int NOT NULL, 
  correo varchar(40) NOT NULL, 
  codProducto int NOT NULL,
  PRIMARY KEY(idOrden),
  FOREIGN KEY(correo) REFERENCES Cliente(correo),
  FOREIGN KEY(codProducto) REFERENCES Producto(codProducto)
);

CREATE TABLE MetodoDePago(
  idMetodoPago int NOT NULL, 
  nombre varchar(20) NOT NULL,
  PRIMARY KEY(idMetodoPago)
);

CREATE TABLE Tarjeta(
  idMetodoPago int NOT NULL, 
  idTarjeta int NOT NULL, 
  PRIMARY KEY(idMetodoPago),
  UNIQUE(idTarjeta),
  FOREIGN KEY(idMetodoPago) REFERENCES MetodoDePago(idMetodoPago)
);

CREATE TABLE PayPal(
  idMetodoPago int NOT NULL, 
  confirmacion boolean NOT NULL,
  PRIMARY KEY(idMetodoPago),
  FOREIGN KEY(idMetodoPago) REFERENCES MetodoDePago(idMetodoPago)
);

CREATE TABLE CentroDePagos(
  idMetodoPago int NOT NULL, 
  idCentroDePago int NOT NULL,
  PRIMARY KEY(idMetodoPago),
  UNIQUE(idCentroDePago),
  FOREIGN KEY(idMetodoPago) REFERENCES MetodoDePago(idMetodoPago)
);

CREATE TABLE Despacho(
  idEntrega int NOT NULL, 
  estadoEntrega varchar(20) NOT NULL, 
  fechaEntrega date NOT NULL, 
  lugar varchar(10) NOT NULL,
  PRIMARY KEY(idEntrega)
);

CREATE TABLE Esta(
  idCatalogo int NOT NULL, 
  codProducto int NOT NULL,
  PRIMARY KEY(idCatalogo, codProducto),
  FOREIGN KEY(idCatalogo) REFERENCES Catalogo(idCatalogo),
  FOREIGN KEY(codProducto) REFERENCES Producto(codProducto)
);

CREATE TABLE Administra(
  correo varchar(40) NOT NULL, 
  idCatalogo int NOT NULL,
  PRIMARY KEY(correo, idCatalogo),
  FOREIGN KEY(correo) REFERENCES vendedor(correo),
  FOREIGN KEY(idCatalogo) REFERENCES Catalogo(idCatalogo)
);

CREATE TABLE Gestiona(
  idCategoria int NOT NULL, 
  correo varchar(40) NOT NULL,
  PRIMARY KEY(idCategoria),
  FOREIGN KEY(idCategoria) REFERENCES Categoria(idCategoria),
  FOREIGN KEY(correo) REFERENCES Administrador(correo)
);

CREATE TABLE Tiene(
  codProducto int NOT NULL, 
  idCategoria int NOT NULL, 
  PRIMARY KEY(codProducto), 
  FOREIGN KEY(codProducto) REFERENCES  Producto(codProducto),
  FOREIGN KEY(idCategoria) REFERENCES Categoria(idCategoria)
);

CREATE TABLE Surge(
  idOrden int NOT NULL, 
  idEntrega int NOT NULL,
  PRIMARY KEY(idOrden), 
  FOREIGN KEY(idOrden) REFERENCES Compras(idOrden),
  FOREIGN KEY(idEntrega) REFERENCES Despacho(idEntrega)
);

CREATE TABLE Utiliza(
  idOrden int NOT NULL, 
  idMetodoPago int NOT NULL,
  PRIMARY KEY(idOrden),
  FOREIGN KEY(idOrden) REFERENCES Compras(idOrden),
  FOREIGN KEY(idMetodoPago) REFERENCES MetodoDePago(idMetodoPago)
);

CREATE TABLE Carrito(
  codProducto int NOT NULL, 
  correo varchar(40) NOT NULL, 
  idOrden int NOT NULL, 
  idCarrito int NOT NULL, 
  cantidad int NOT NULL, 
  subtotal int NOT NULL,
  PRIMARY KEY(codProducto, idCarrito),
  FOREIGN KEY(codProducto) REFERENCES Producto(codProducto),
  FOREIGN KEY(correo) REFERENCES Cliente(correo),
  FOREIGN KEY(idOrden) REFERENCES Compras(idOrden)
);

CREATE TABLE Vende(
  idCarrito int NOT NULL, 
  codProducto int NOT NULL, 
  correo varchar(40) NOT NULL,
  PRIMARY KEY(idCarrito, codProducto),
  FOREIGN KEY(codProducto) REFERENCES Producto(codProducto),
  FOREIGN KEY(correo) REFERENCES vendedor(correo)
);

-- creacion de usuarios
create user 'dba'@'localhost' identified by 'dba-Sive.21';
create user 'app'@'%' identified by 'app-Sive.21';
create user 'respaldo'@'localhost' identified by 'respaldo-Sive.21';


-- creacion y asignacion permisos a los roles
CREATE ROLE IF NOT EXISTS DBA, APP, BACKUP;
GRANT SELECT, UPDATE, INSERT, DELETE ON bd_sive.* TO APP;

-- asigancion de permisos
GRANT DBA TO 'dba'@'localhost';
GRANT APP TO 'app'@'%';
GRANT BACKUP TO 'respaldo'@'localhost';

-- GRANT EVENT, LOCK TABLES, SELECT ON bd_sive.* TO respaldo;
