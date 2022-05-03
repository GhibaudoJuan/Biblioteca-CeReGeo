create trigger trgestadoprestamo() before update on prestamos
	for each row
execute procedure fxestadoprestamo();


create function fxestadoprestamo()
returns trigger AS $$ begin
if((old.activo=='true')&&(new.devuelto!='')) THEN
new.activo='false';
end if;
return new:
end; $$ lenguage 'plqgsql';