create trigger trgestadoprestamo before update on prestamos
	for each row
execute procedure fxestadoprestamo();

create trigger trgestadoejemplarreserva after insert or update or delete on reservas
	for each row
execute procedure fxestadoejemplareserva();

create trigger trgestadoejemplarprestamo after insert or delete on prestamos
	for each row
execute procedure fxestadoejemplarprestamo();


create trigger trginsertreserva before insert on prestamos
	for each row
execute procedure fxinsertprestamos();

create trigger trgmaterial before insert or update on material
	for each row
execute procedure fxmaterial();

create trigger trgmaterial before insert or update on ejemplares
	for each row
execute procedure fxmaterial();

create trigger trgmaterial before insert or update on prestamos
	for each row
execute procedure fxmaterial();

create trigger trgmaterial before insert or update on reservas
	for each row
execute procedure fxmaterial();

create trigger trgmaterial before insert or update on cuenta
	for each row
execute procedure fxmaterial();