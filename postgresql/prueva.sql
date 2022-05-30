select idmaterial, idejemplar,activo      ,CASE WHEN activo='true' THEN min(fecha) END    
 


from ejemplares e left join reservas r on (r.material=e.idmaterial) and(r.ejemplar=e.idejemplar) 
        where idmaterial = '2' 
        group by idmaterial, idejemplar, activo;



/*
select count(*) from reservas where material = '2' and activo='true';
cast((select count(*) from ejemplares e inner join reservas r on (r.material=e.idmaterial) and(r.ejemplar=e.idejemplar) 
        where idmaterial = '2' and activo='true') as integer)=1




*/

