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
Rol enum('usuario', 'admin', 'bibliotecario', 'premium') not null, 
-- FotoPerfil varchar(200) default 'default.png', !OPCIONAL!
Cantidad_Leidos varchar(200) UNIQUE, -- para saber cuáles libros ha leído.
-- No_Lista int, -- para saber cuantos libros tiene encargado. !OPCIONAL!
Preferencias varchar(200), -- para poder sugerir de acuerdo a los gustos.
Tipo_de_usuario varchar(200) -- usuario basico, usuario premium(membresia).
);
-- drop table Usuarios;

ALTER TABLE Usuarios ADD COLUMN Rol enum('admin', 'usuario', 'bibliotecario', 'premium') not null;

create table Libros ( -- ✅
	ID_Libros int primary key auto_increment,
	ID_Usuarios int UNIQUE,
	Titulo varchar(200),
	Autor varchar(200),
	Ano varchar(200),
	Accesibilidad varchar(200), -- si es un libro que necesita comprarse con membresía o no.
	Disponibilidad tinyint (1) -- es lo mismo que boolean.
);	
-- drop table Libros;

create table Categoria ( -- 
	ID_Categoria int primary key auto_increment,
	ID_Libros int UNIQUE,
	Genero varchar(200),  
	Editorial varchar(200), 
	Clasificacion varchar (200) -- edad (PG-13 o qué jeso).
);
-- drop Categoria;

create table Historial ( -- ✅
	ID_Historial int primary key auto_increment,
	ID_Usuarios int, 
	Cantidad_Leidos varchar(200), -- FK con la tabla de Usuarios (Cantidad_Leidos) y así ya tener acceso a la info.
	Calificacion int,
	Comentario varchar (200),
	FechaLectura datetime not null -- Fecha en la que el usuario leyó el libro
);  
-- drop table Historial;

create table Recomendacion ( -- ✅
	ID_Recomendacion int primary key auto_increment,
	ID_Usuarios int, 
	ID_Libros int,
	Cantidad_Leidos varchar(200), -- FK con la tabla de Usuarios (Cantidad_Leidos) y así ya tener acceso a la info.
	Genero varchar(200) -- FK con la tabla Categoria (Genero) para mayor facilidad.
);
-- drop table Recomendacion;

create table Reservacion (-- ✅
	ID_Reservacion int primary key auto_increment,
	ID_Usuarios int, -- FK hacer conexion con tabla usuario (ID_Usuario).
	ID_Libros int, -- FK hacer conexion con tabla libro (ID_Libro).
	Estado varchar(200), -- si está activa, desactivada o cancelada.
	Fecha datetime not null
);
-- drop table Reservacion;

create table Prestamos ( -- ✅
	ID_Prestamos int primary key auto_increment,
	ID_Usuarios int UNIQUE, -- FK hacer conexion con tabla usuario (ID_Usuario).
    ID_Libros int UNIQUE,
	Metodo_Acceso varchar(200), -- basicamente por medio de un ticket/intercambio.
	Fecha date -- incluye cuándo sale y cuándo entra; para que la gente sepa cuando esta disponible o no.
);
-- drop table Prestamos

create table Chat ( --  ✅
	ID_Chat int primary key auto_increment,
    ID_Usuarios int UNIQUE,
    Rol enum('usuario', 'admin', 'bibliotecario', 'premium') not null,
    Mensaje text not null,
    Fecha datetime default current_timestamp
);
-- drop table Chat;

-- Indices para que funcione la FK de fecha between Reservacion y Historial
CREATE INDEX idx_fecha_lectura ON Historial(FechaLectura);
CREATE INDEX idx_rol ON Chat(Rol); 

-- Los unique para poder relacionar las columnas, sean PK o no.
ALTER TABLE Usuarios ADD UNIQUE (ID_Usuarios, Cantidad_Leidos);
ALTER TABLE Usuarios ADD UNIQUE (Rol);
ALTER TABLE Libros ADD UNIQUE (ID_Libros);
ALTER TABLE Libros ADD UNIQUE (ID_Usuarios);
ALTER TABLE TipoDeUsuarios ADD UNIQUE (ID_Usuarios);
ALTER TABLE Categoria ADD UNIQUE (ID_Libros);
ALTER TABLE Prestamos ADD UNIQUE (ID_Libros);
ALTER TABLE Reservacion ADD UNIQUE (Fecha);
-- ALTER TABLE Historial ADD UNIQUE (FechaLectura);

-- Llaves foráneas.
-- Conectar el ID_Usuario con del Historial con el ID_Usuario de la tabla Usuario.
alter table Historial
add constraint FK_Historial_IdUsuariosToHistorial 
foreign key (ID_Usuarios, Cantidad_Leidos) references Usuarios(ID_Usuarios, Cantidad_Leidos);
-- Aparentemente debo redobleAsegurarme de que la P3 sea la shema por default y luego alter table por acá.
/*
alter table Historial
drop foreign key FK_IdUsuarioToHistorial; 
*/

-- Conectar el ID_Usuario y Cantidad_Leidos de Recomendacion con los mismo valores de la tabla Usuarios.
alter table Recomendacion
add constraint FK_Recomendacion_IdUsuariosCantidadLeidosToUsuarios
foreign key (ID_Usuarios, Cantidad_Leidos) references Usuarios (ID_Usuarios, Cantidad_Leidos);
-- alter table Recomendacion drop foreign key FK_Recomendacion_IdUsuariosCantidadLeidosToUsuarios;
-- continuacion
alter table Recomendacion
add constraint FK_Recomendacion_IdLibrosToLibros
foreign key (ID_Libros) references Libros (ID_Libros);
-- alter table Recomendacion drop foreign key FK_Recomendacion_IdLibrosToLibros;


alter table TipoDeUsuarios
add constraint FK_TipoDeUsuarios_IdUsuariosToUsuarios
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table TipoDeUsuarios drop foreign key FK_TipoDeUsuarios_IdUsuariosToUsuarios;
	
    
alter table Libros
add constraint  FK_Libros_IdUsuariosToLibros
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table Libros drop foreign key FK_Libros_IdUsuariosToLibros;


alter table Reservacion
add constraint  FK_Reservacion_IdUsuariosToUsuarios
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table Reservacion drop foreign key FK_Reservacion_IdUsuariosToUsuarios
-- continuacion
alter table Reservacion
add constraint  FK_Reservacion_IdLibrosToLibros
foreign key (ID_Libros) references Libros (ID_Libros);
-- alter table Reservacion drop foreign key FK_Reservacion_IdLibrosToLibros


alter table Categoria 
add constraint FK_Categoria_IdLibrosToLibros
foreign key (ID_Libros) references Libros (ID_Libros);
-- alter table Categoria drop foreign key FK_Categoria_IdLibrosToLibros;


alter table Prestamos
add constraint FK_Prestamos_IdUsuariosToUsuarios
foreign key (ID_Usuarios) references Usuarios (ID_Usuarios);
-- alter table Prestamos drop foreign key FK_Prestamos_IdUsuariosToUsuarios; 


alter table Prestamos
add constraint FK_Prestamos_IdLibrosToLibros
foreign key (ID_Libros) references Libros (ID_Libros);
-- alter table Prestamos drop foreign key FK_Prestamos_IdUsuariosToUsuarios; 


alter table Reservacion
add constraint FK_Reservacion_FechaToFechaLectura
foreign key (Fecha) references Historial (FechaLectura);
-- alter table Reservacion drop foreign key FK_Reservacion_FechaToFechaLectura;


alter table Chat
add constraint FK_Chat_IdUsuariosToUsuarios
foreign key (ID_Usuarios) references Usuarios(ID_Usuarios);
-- alter table Chat drop foreign key FK_Chat_IdUsuariosToUsuarios;
