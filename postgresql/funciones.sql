
create or replace function fxestadoprestamo()
returns trigger AS $$ 
declare
cantidad int;
begin
if(new.devuelto is not null) THEN --si esta devuelto

update ejemplares set estado='l' where idejemplar=old.ejemplar; --actualizar estado
	
new.activo='false'; --ya no esta activo
end if;
return new;
end; $$ language 'plpgsql';

---------------------------------------------------------------------------------
create or replace  function fxestadoejemplarprestamo()
returns trigger AS $$ 
DECLARE
codigo int;
cantidad1 int;
retiro boolean;
materialid int;
BEGIN




IF(tg_op ='INSERT') THEN
	
update ejemplares set estado='p' where idejemplar=new.ejemplar; --actualizar estado

select idmaterial from ejemplares where idejemplar=new.ejemplar INTO materialid;

select idres from reservas where nombre=new.nombre and material=materialid and activo='true' limit 1 INTO codigo;

IF(codigo is not null) THEN
select case when (fecha=current_date) then 'true' else 'false' end from reservas where idres=codigo and nombre=new.nombre INTO retiro;

	
if(retiro) then
		update reservas set retirado='true' where idres=codigo and nombre=new.nombre;
end if;
	update reservas set activo='false' where idres=codigo and nombre=new.nombre;
	
	
end if;
end if;
IF (tg_op='DELETE') THEN

select count(*) from prestamos where ejemplar=old.ejemplar and activo ='true' INTO cantidad1;
	
	if (cantidad1=0) then
	
			update ejemplares set estado='l' where idejemplar=old.ejemplar;
		
		end if;
	
end if;
return new;
end; $$ language 'plpgsql';
--------------------------------------------------------------------------------------------

create  or replace function fxinsertprestamos()
returns trigger AS $$ 
DECLARE
cantidad int;
BEGIN

select count(*) from prestamos where ejemplar=new.ejemplar and activo='true' INTO cantidad;
if(cantidad=1) then
	--raise
	return null;
else
	return new;
end if;
end; $$ language 'plpgsql';
---------------------------------------------------------------------------------

create or replace function fxmaterial()
returns trigger AS $$
begin

IF(tg_op ='INSERT') THEN
	new.fecha_creacion=current_timestamp -interval '3 hour';
	new.usuario_creacion=user;	
end if;
IF(tg_op ='UPDATE') THEN
	new.fecha_ult_modif=current_timestamp -interval '3 hour';
	new.usuario_ult_modif=user;
end if;
	return new;
end; $$ language 'plpgsql';
---------------------------------------------------------------------------------

create or replace function fxejemplar()
returns trigger AS $$
begin

IF(tg_op ='INSERT') THEN
	new.fecha_creacion=current_timestamp -interval '3 hour';
	new.usuario_creacion=user;	
end if;
IF(tg_op ='UPDATE') THEN
	new.fecha_ult_modif=current_timestamp -interval '3 hour';
	new.usuario_ult_modif=user;
end if;
	return new;
end; $$ language 'plpgsql';

---------------------------------------------------------------------------------

create or replace function fxprestamos()
returns trigger AS $$
begin

IF(tg_op ='INSERT') THEN
	new.fecha_creacion=current_timestamp -interval '3 hour';
	new.usuario_creacion=user;	
end if;
IF(tg_op ='UPDATE') THEN
	new.fecha_ult_modif=current_timestamp -interval '3 hour';
	new.usuario_ult_modif=user;
end if;
	return new;
end; $$ language 'plpgsql';
---------------------------------------------------------------------------------

create or replace function fxreservas()
returns trigger AS $$
begin

IF(tg_op ='INSERT') THEN
	new.fecha_creacion=current_timestamp -interval '3 hour';
	new.usuario_creacion=user;	
end if;
IF(tg_op ='UPDATE') THEN
	new.fecha_ult_modif=current_timestamp -interval '3 hour';
	new.usuario_ult_modif=user;
end if;
	return new;
end; $$ language 'plpgsql';
---------------------------------------------------------------------------------

create or replace function fxcuenta()
returns trigger AS $$
begin

IF(tg_op ='INSERT') THEN
	new.fecha_creacion=current_timestamp -interval '3 hour';
	new.usuario_creacion=user;	
end if;
IF(tg_op ='UPDATE') THEN
	new.fecha_ult_modif=current_timestamp -interval '3 hour';
	new.usuario_ult_modif=user;
end if;
	return new;
end; $$ language 'plpgsql';