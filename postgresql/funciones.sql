
create or replace function fxestadoprestamo()
returns trigger AS $$ 
declare
cantidad int;
begin
if(new.devuelto is not null) THEN

select count(*) from reservas r where r.material=old.material and r.ejemplar=old.ejemplar and r.activo='true' INTO cantidad;

	if(cantidad=0) then
		update ejemplares set estado='l' where idmaterial=old.material and idejemplar=old.ejemplar;
	else
		update ejemplares set estado='r' where idmaterial=old.material and idejemplar=old.ejemplar;
	end if;
new.activo='false';
end if;
return new;
end; $$ language 'plpgsql';
------------------------------------------------------------------------------
create or replace  function fxestadoejemplareserva()
returns trigger AS $$ 
DECLARE
cantidad int;
cantidad1 int;
ver varchar(1);
BEGIN

IF(tg_op ='INSERT') THEN

	if (new.ejemplar!='') then
	select estado from ejemplares where idmaterial=new.material and idejemplar=new.ejemplar INTO ver;
	if(ver='l') then
		update ejemplares set estado='r' where idmaterial=new.material and idejemplar=new.ejemplar;
	end if;
	end if;
	
end if;
IF(tg_op ='UPDATE') THEN
	if (new.ejemplar!='') then
	select estado from ejemplares where idmaterial=new.material and idejemplar=new.ejemplar INTO ver;
	if(ver='l') then
		update ejemplares set estado='r' where idmaterial=new.material and idejemplar=new.ejemplar;
	end if;
	end if;
end if;
IF (tg_op='DELETE') THEN

	select 	count(*) from reservas where material=old.material and ejemplar=old.ejemplar and activo ='true' INTO cantidad;
	select count(*) from prestamos where material=old.material and ejemplar=old.ejemplar and activo ='true' INTO cantidad1;

	if (cantidad1=0) then
		if(cantidad=0) then
			update ejemplares set estado='l' where idmaterial=old.material and 		idejemplar=old.ejemplar;
		else
			update ejemplares set estado='r' where idmaterial=old.material and 		idejemplar=old.ejemplar;
		end if;
	end if;
end if;
return new;
end; $$ language 'plpgsql';
---------------------------------------------------------------------------------
create or replace  function fxestadoejemplarprestamo()
returns trigger AS $$ 
DECLARE
cantidad int;
cantidad1 int;
retiro boolean;
BEGIN

IF(tg_op ='INSERT') THEN
	
	update ejemplares set estado='p' where idmaterial=new.material and idejemplar=new.ejemplar;

select count(*) from reservas where nombre=new.nombre and material=new.material and ejemplar=new.ejemplar and activo='true' INTO cantidad;

select case when (fecha=current_date) then 'true' else 'false' end from reservas where nombre=new.nombre and material=new.material and ejemplar=new.ejemplar and activo='true' INTO retiro;

if(cantidad<>0) then
	if(retiro) then
	update reservas set retirado='true' where nombre=new.nombre and material=new.material and ejemplar=new.ejemplar and activo='true';
	end if;
update reservas set activo='false' where nombre=new.nombre and material=new.material and ejemplar=new.ejemplar and activo='true';
	
end if;

end if;
IF (tg_op='DELETE') THEN

select 	count(*) from reservas where material=old.material and ejemplar=old.ejemplar and activo ='true' INTO cantidad;
select count(*) from prestamos where material=old.material and ejemplar=old.ejemplar and activo ='true' INTO cantidad1;
	
	if (cantidad1=0) then
		if (cantidad=0) then
			update ejemplares set estado='l' where idmaterial=old.material and 		idejemplar=old.ejemplar;
		else
			update ejemplares set estado='r' where idmaterial=old.material and 		idejemplar=old.ejemplar;
		end if;
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

select count(*) from prestamos where material=new.material and ejemplar=new.ejemplar and activo='true' INTO cantidad;
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