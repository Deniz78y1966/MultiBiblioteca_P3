-- Tablas del proyecto.
drop database P3;
create 	database P3;

create table Usuarios ( -- ✅
ID_Usuarios int primary key auto_increment, 
Nombre varchar(200),
Direccion varchar(200),
Correo varchar(200),
Contrasena varchar(200),
Usuario varchar(200) UNIQUE,
Cantidad_Leidos varchar(200) UNIQUE, -- para saber cuáles libros ha leído.
-- No_Lista int, -- para saber cuantos libros tiene encargado. !OPCIONAL!
Preferencias varchar(200), -- para poder sugerir de acuerdo a los gustos.
Tipo_de_usuario varchar(200) -- usuario basico, usuario premium(membresia).
);
-- drop table Usuarios;
-- SELECT * FROM Usuarios;

create table Libros ( -- ✅
ID_Libros int primary key auto_increment,
ID_Usuarios int,
Titulo varchar(200),
Autor varchar(200),
Ano varchar(200),
Accesibilidad varchar(200), -- si es un libro que necesita comprarse con membresía o no.
Disponibilidad tinyint (1) -- es lo mismo que boolean.
);	
-- drop table Libros;

create table Categoria ( -- ✅
ID_Categoria int primary key auto_increment,
ID_Libros int,
Genero varchar(200),  
Editorial varchar(200), 
Clasificacion varchar (200) -- edad (PG-13 o qué jeso).
);
-- drop Categoria;

create table Historial ( -- ✅
ID_Historial int primary key auto_increment,
ID_Usuarios int, -- FK hacer conexion con tabla Usuarios (ID_Usuario).
Cantidad_Leidos varchar(200) -- FK con la tabla de Usuarios (Cantidad_Leidos) y así ya tener acceso a la info.
);  
-- drop table Historial;

create table Recomendacion ( -- ✅
ID_Recomendacion int primary key auto_increment,
ID_Usuarios int, -- FK hacer conexion con tabla usuario (ID_Usuario).
ID_Libros int, -- FK hacer conexion con tabla libro (ID_Libro).
Cantidad_Leidos varchar(200), -- FK con la tabla de Usuarios (Cantidad_Leidos) y así ya tener acceso a la info.
Genero varchar(200) -- FK con la tabla Categoria (Genero) para mayor facilidad.
);
-- drop table Recomendacion;

create table Reservacion (-- ✅
ID_Reservacion int primary key auto_increment,
ID_Usuarios int, -- FK hacer conexion con tabla usuario (ID_Usuario).
ID_Libros int, -- FK hacer conexion con tabla libro (ID_Libro).
Estado varchar(200), -- si está activa, desactivada o cancelada.
Fecha varchar(200)
);
-- drop table Reservacion;

create table Prestamos ( -- ✅
ID_Prestamos int primary key auto_increment,
ID_Usuarios int UNIQUE, -- FK hacer conexion con tabla usuario (ID_Usuario).
ID_Libros int UNIQUE,
Metodo_Acceso varchar(200), -- basicamente por medio de un ticket/intercambio.
Fecha date -- incluye cuándo sale y cuándo entra; para que la gente sepa cuando esta disponible o no.
);
-- drop table Prestamos;

create table Devoluciones ( -- ✅
ID_Devoluciones int primary key auto_increment,
ID_Prestamos int UNIQUE,
Estado varchar(200),
Monto_Devuelto decimal(10,2),
Fecha date,
Comentarios text
);
-- drop table Devoluciones;

create table Roles ( -- ✅
ID_Roles int primary key auto_increment,
ID_Usuarios int,
Nombre varchar(200),   -- ya el tipo de rol que tiene.
Descripcion text,
Estado enum('activo', 'inactivo') default 'activo' 
);
-- drop table Roles;

create table TipoDeUsuarios ( -- ✅
ID_TipoDeUsuarios int primary key auto_increment,
ID_Usuarios int, -- FK hacer conexion con tabla usuario (ID_Usuario).
Plan_Basico varchar (200), 
Plan_Premium varchar(200)
);
-- drop table TipoDeUsuarios;


-- Los unique para poder relacionar las columnas, sean PK o no.
ALTER TABLE Usuarios ADD UNIQUE (ID_Usuarios, Cantidad_Leidos);
ALTER TABLE Libros ADD UNIQUE (ID_Libros);
ALTER TABLE Libros ADD UNIQUE (ID_Usuarios);
ALTER TABLE TipoDeUsuarios ADD UNIQUE (ID_Usuarios);
ALTER TABLE Categoria ADD UNIQUE (ID_Libros);
ALTER TABLE Prestamos ADD UNIQUE (ID_Libros);
-- describe Usuarios;


		/*	 LLAVES FORÁNEAS  */
    
-- Conectar el ID_Usuario con del Historial con el ID_Usuario de la tabla Usuario.
alter table Historial
add constraint FK_Historial_IdUsuariosToHistorial 
foreign key (ID_Usuarios, Cantidad_Leidos) references Usuarios(ID_Usuarios, Cantidad_Leidos);
-- alter table Historial
-- drop foreign key FK_Historial_IdUsuariosToHistorial; 


-- Conectar el ID_Usuario y Cantidad_Leidos de Recomendacion con los mismo valores de la tabla Usuarios.
alter table Recomendacion
add constraint FK_Recomendacion_IdUsuariosCantidadLeidosToUsuarios
foreign key (ID_Usuarios, Cantidad_Leidos) references Usuarios (ID_Usuarios, Cantidad_Leidos);
-- alter table Recomendacion 
-- drop foreign key FK_Recomendacion_IdUsuariosCantidadLeidosToUsuarios;

	/* continuacion */
alter table Recomendacion
add constraint FK_Recomendacion_IdLibrosToLibros
foreign key (ID_Libros) references Libros (ID_Libros);
-- alter table Recomendacion
-- drop foreign key FK_Recomendacion_IdLibrosToLibros;


--
alter table TipoDeUsuarios
add constraint FK_TipoDeUsuarios_IdUsuariosToUsuarios
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table TipoDeUsuarios
-- drop foreign key FK_TipoDeUsuarios_IdUsuariosToUsuarios;


--
alter table Libros
add constraint  FK_Libros_IdUsuariosToLibros
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table Libros
-- drop foreign key FK_Libros_IdUsuariosToLibros;


alter table Reservacion
add constraint  FK_Reservacion_IdUsuariosToUsuarios
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table Reservacion
-- drop foreign key FK_Reservacion_IdUsuariosToUsuarios;

	/* continuacion */
alter table Reservacion
add constraint  FK_Reservacion_IdLibrosToLibros
foreign key (ID_Libros) references Libros (ID_Libros);
-- alter table Reservacion
-- drop foreign key FK_Reservacion_IdLibrosToLibros;


alter table Categoria 
add constraint FK_Categoria_IdLibrosToLibros
foreign key (ID_Libros) references Libros (ID_Libros);
-- alter table Categoria
-- drop foreign key FK_Categoria_IdLibrosToLibros;


alter table Prestamos
add constraint FK_Prestamos_IdUsuariosToUsuarios
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table Prestamos
-- drop foreign key FK_Prestamos_IdUsuariosToUsuarios; 


alter table Roles
add constraint FK_Roles_IdRolesToUsuarios
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table Roles
-- drop foreign key FK_Roles_IdRolesToUsuarios;



