
create table material(
idmat varchar(100),
titulo varchar(300),
anio int,
idioma varchar (50),
tipo varchar (40),
descripcion varchar (1000),
portada varchar(300),
primary key (idmat)
);
alter table material add column idCatalogo varchar(100);
alter table material add column fecha_creacion timestamp;
alter table material add column usuario_creacion varchar(100);
alter table material add column fecha_ult_modif timestamp;
alter table material add column usuario_ult_modif varchar(100);

create table keywords(
mat_id varchar(100),
word_id int,
descri varchar(100),
primary key (mat_id, word_id),
foreign key (mat_id) references material(idmat)
);


create table ejemplares(
idmaterial varchar(100),
idejemplar varchar(100),
codigo_externo(100);
propietario varchar (100),
disponibilidad boolean,
estado varchar(1),
primary key (idmaterial, idejemplar),
foreign key (idmaterial) references material(idmat));
alter table ejemplares add column fecha_creacion timestamp;
alter table ejemplares add column usuario_creacion varchar(100);
alter table ejemplares add column fecha_ult_modif timestamp;
alter table ejemplares add column usuario_ult_modif varchar(100);

create table mapas(
idmapa varchar(100),
hoja varchar (30),
escala varchar(30),
localidad varchar (150),
provincia varchar (150),
pais varchar (150),
tipom varchar (50),
primary key (idmapa),
foreign key (idmapa) references material(idmat));

create table libros(
idlibro varchar(100),
autor varchar (150),
edicion int,
tomo int,
editorial varchar (30),
isbn varchar(30),
primary key (idlibro),
foreign key (idlibro) references material(idmat));

create table revistas(
idrevista varchar(100),
issn varchar (30),
volumen int,
ejemplar int,
reveditorial varchar (30),
coleccion varchar (100),
num int,
primary key (idrevista),
foreign key (idrevista) references material(idmat));



create table TT(
idtt varchar(100),
tipott varchar (50),
Autores varchar(300),
Directores varchar(300),
Universidad varchar (100),
Lugar varchar (100),
numpag int,
primary key (idtt),
foreign key (idtt) references material(idmat));

create table tipocuenta(
id int primary key,
nombrecuenta varchar(50)
);

create table cuenta(
idcuenta int primary key,
nombreuser varchar(50) unique,
contrasenia varchar(150),
nombre varchar(100) unique,
email varchar(150),
tipo int,
foreign key (tipo) references tipocuenta(id));
alter table cuenta add column fecha_creacion timestamp;
alter table cuenta add column usuario_creacion varchar(100);
alter table cuenta add column fecha_ult_modif timestamp;
alter table cuenta add column usuario_ult_modif varchar(100);

insert into tipocuenta values (0,'Administrador'),(1,'Bibliotacario'),(2,'Docente'),(3,'Estudiante');

create table multas(
idmulta int primary key,
idcuenta int,
desmultado date,
multa_estado boolean,
foreign key (idcuenta) references cuenta(idcuenta)
);


create table reservas (
idres int,
nombre varchar(100),
material varchar(100),
fecha date,
activo boolean,
retirado boolean,
primary key (idres, nombre),
foreign key (material) references material(idmat)
);
alter table reservas add column fecha_creacion timestamp;
alter table reservas add column usuario_creacion varchar(100);
alter table reservas add column fecha_ult_modif timestamp;
alter table reservas add column usuario_ult_modif varchar(100);

create table prestamos(
idpre int,
nombre varchar(100),
material varchar(100),
ejemplar varchar(100),
desde date,
hasta date,
devuelto date,
activo boolean,
primary key (idpre, nombre),
foreign key (material,ejemplar) references ejemplares(idmaterial,idejemplar)
);
alter table prestamos add column fecha_creacion timestamp;
alter table prestamos add column usuario_creacion varchar(100);
alter table prestamos add column fecha_ult_modif timestamp;
alter table prestamos add column usuario_ult_modif varchar(100);

create table reportes(
id int primary key,
nombre varchar(100),
fecha timestamp,
descripcion varchar(500)
);

create table backup(
id int primary key,
nombre varchar(100),
fecha date
);
