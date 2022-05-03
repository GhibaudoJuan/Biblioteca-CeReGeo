
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
BEGIN

IF(tg_op ='INSERT') THEN
	update ejemplares set estado='r' where idmaterial=new.material and idejemplar=new.ejemplar;
end if;
IF (tg_op='DELETE') THEN

select 	count(*)+(select count(*) from prestamos where material=old.material and ejemplar=old.ejemplar and activo ='true') from reservas where material=old.material and ejemplar=old.ejemplar and activo ='true'
INTO cantidad;

	if (cantidad=0) then
		update ejemplares set estado='l' where idmaterial=old.material and 		idejemplar=old.ejemplar;
	end if;
end if;
return new;
end; $$ language 'plpgsql';
---------------------------------------------------------------------------------
create or replace  function fxestadoejemplarprestamo()
returns trigger AS $$ 
DECLARE
cantidad int;
BEGIN

IF(tg_op ='INSERT') THEN
	
	update ejemplares set estado='p' where idmaterial=new.material and idejemplar=new.ejemplar;

select count(*) from reservas where nombre=new.nombre and material=new.material and ejemplar=new.ejemplar and activo='true' INTO cantidad;
if(cantidad!=0) then
update reservas set activo='false', retirado='true' where nombre=new.nombre and material=new.material and ejemplar=new.ejemplar and activo='true';
end if;

end if;
IF (tg_op='DELETE') THEN

select 	count(*)+(select count(*) from prestamos where material=old.material and ejemplar=old.ejemplar and activo ='true') from reservas where material=old.material and ejemplar=old.ejemplar and activo ='true'
INTO cantidad;

	if (cantidad=0) then
		update ejemplares set estado='l' where idmaterial=old.material and 		idejemplar=old.ejemplar;
	end if;
end if;
return new;
end; $$ language 'plpgsql';
-----------------------------------------------------------------------------------
create  or replace function fxinsertreserva()
returns trigger AS $$ 
DECLARE
cantidad int;
BEGIN

select count(*) from reservas where nombre=new.nombre and material=new.material and ejemplar=new.ejemplar and activo='true' INTO cantidad;
if(cantidad=1) then
	--raise
	return null;
else
	return new;
end if;
end; $$ language 'plpgsql';
---------------------------------------------------------------------------------

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
create trigger trgestadoprestamo before update on prestamos
	for each row
execute procedure fxestadoprestamo();

create trigger trgestadoejemplarreserva after insert or delete on reservas
	for each row
execute procedure fxestadoejemplareserva();

create trigger trgestadoejemplarprestamo after insert or delete on prestamos
	for each row
execute procedure fxestadoejemplarprestamo();

create trigger trginsertreserva before insert on reservas
	for each row
execute procedure fxinsertreserva();

create trigger trginsertreserva before insert on prestamos
	for each row
execute procedure fxinsertprestamos();