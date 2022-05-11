create trigger trgestadoprestamo before update on prestamos
	for each row
execute procedure fxestadoprestamo();

create trigger trgestadoejemplarreserva after insert or delete on reservas
	for each row
execute procedure fxestadoejemplareserva();

create trigger trgestadoejemplarprestamo after insert or delete on prestamos
	for each row
execute procedure fxestadoejemplarprestamo();


create trigger trginsertreserva before insert on prestamos
	for each row
execute procedure fxinsertprestamos();