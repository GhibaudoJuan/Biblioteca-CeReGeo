PGDMP         	                z         
   biblioteca %   12.11 (Ubuntu 12.11-0ubuntu0.20.04.1) %   12.11 (Ubuntu 12.11-0ubuntu0.20.04.1) B    ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    16490 
   biblioteca    DATABASE     |   CREATE DATABASE biblioteca WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';
    DROP DATABASE biblioteca;
                juan    false            ?            1255    49422    fxestadoejemplareserva()    FUNCTION     ?  CREATE FUNCTION public.fxestadoejemplareserva() RETURNS trigger
    LANGUAGE plpgsql
    AS $$ 
DECLARE
cantidad int;
cantidad1 int;
ver varchar(1);
BEGIN

IF(tg_op ='INSERT') THEN
	select estado from ejemplares where idmaterial=new.material and idejemplar=new.ejemplar INTO ver;
	if(ver='l') then
		update ejemplares set estado='r' where idmaterial=new.material and idejemplar=new.ejemplar;
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
end; $$;
 /   DROP FUNCTION public.fxestadoejemplareserva();
       public          juan    false            ?            1255    49430    fxestadoejemplarprestamo()    FUNCTION        CREATE FUNCTION public.fxestadoejemplarprestamo() RETURNS trigger
    LANGUAGE plpgsql
    AS $$ 
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
end; $$;
 1   DROP FUNCTION public.fxestadoejemplarprestamo();
       public          juan    false            ?            1255    49425    fxestadoprestamo()    FUNCTION     8  CREATE FUNCTION public.fxestadoprestamo() RETURNS trigger
    LANGUAGE plpgsql
    AS $$ 
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
end; $$;
 )   DROP FUNCTION public.fxestadoprestamo();
       public          juan    false            ?            1255    49471    fxinsertprestamos()    FUNCTION     H  CREATE FUNCTION public.fxinsertprestamos() RETURNS trigger
    LANGUAGE plpgsql
    AS $$ 
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
end; $$;
 *   DROP FUNCTION public.fxinsertprestamos();
       public          juan    false            ?            1255    49434    fxinsertreserva()    FUNCTION     [  CREATE FUNCTION public.fxinsertreserva() RETURNS trigger
    LANGUAGE plpgsql
    AS $$ 
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
end; $$;
 (   DROP FUNCTION public.fxinsertreserva();
       public          juan    false            ?            1259    82174    backup    TABLE     k   CREATE TABLE public.backup (
    id integer NOT NULL,
    nombre character varying(100),
    fecha date
);
    DROP TABLE public.backup;
       public         heap    juan    false            ?            1259    33022    cuenta    TABLE     ?   CREATE TABLE public.cuenta (
    idcuenta integer NOT NULL,
    nombreuser character varying(50),
    contrasenia character varying(150),
    nombre character varying(100),
    email character varying(150),
    tipo integer
);
    DROP TABLE public.cuenta;
       public         heap    juan    false            ?            1259    16499 
   ejemplares    TABLE       CREATE TABLE public.ejemplares (
    idmaterial character varying(100) NOT NULL,
    idejemplar character varying(100) NOT NULL,
    propietario character varying(100),
    disponibilidad boolean,
    codigo_externo character varying(100),
    estado character varying(1)
);
    DROP TABLE public.ejemplares;
       public         heap    juan    false            ?            1259    24830    keywords    TABLE     ?   CREATE TABLE public.keywords (
    mat_id character varying(100) NOT NULL,
    word_id integer NOT NULL,
    descri character varying(100)
);
    DROP TABLE public.keywords;
       public         heap    juan    false            ?            1259    16532    libros    TABLE     ?   CREATE TABLE public.libros (
    idlibro character varying(100) NOT NULL,
    autor character varying(150),
    edicion integer,
    tomo integer,
    editorial character varying(30),
    isbn character varying(30)
);
    DROP TABLE public.libros;
       public         heap    juan    false            ?            1259    16612    mapas    TABLE       CREATE TABLE public.mapas (
    idmapa character varying(100) NOT NULL,
    hoja character varying(30),
    escala character varying(30),
    localidad character varying(150),
    provincia character varying(150),
    pais character varying(150),
    tipom character varying(50)
);
    DROP TABLE public.mapas;
       public         heap    juan    false            ?            1259    82227    material    TABLE     7  CREATE TABLE public.material (
    idmat character varying(100) NOT NULL,
    titulo character varying(300),
    tipo character varying(40),
    descripcion character varying(1000),
    portada character varying(300),
    idcatalogo character varying(100),
    anio integer,
    idioma character varying(50)
);
    DROP TABLE public.material;
       public         heap    juan    false            ?            1259    73982    multas    TABLE     ?   CREATE TABLE public.multas (
    idmulta integer NOT NULL,
    idcuenta integer,
    desmultado date,
    multa_estado boolean
);
    DROP TABLE public.multas;
       public         heap    juan    false            ?            1259    82283 	   prestamos    TABLE     ?   CREATE TABLE public.prestamos (
    idpre integer NOT NULL,
    nombre character varying(100) NOT NULL,
    material character varying(100),
    ejemplar character varying(100),
    desde date,
    hasta date,
    activo boolean,
    devuelto date
);
    DROP TABLE public.prestamos;
       public         heap    juan    false            ?            1259    41214    reportes    TABLE     ?   CREATE TABLE public.reportes (
    id integer NOT NULL,
    nombre character varying(100),
    fecha date,
    descripcion character varying(500)
);
    DROP TABLE public.reportes;
       public         heap    juan    false            ?            1259    16590    reservas    TABLE     ?   CREATE TABLE public.reservas (
    idres integer NOT NULL,
    nombre character varying(100) NOT NULL,
    material character varying(100),
    ejemplar character varying(100),
    fecha date,
    activo boolean,
    retirado boolean
);
    DROP TABLE public.reservas;
       public         heap    juan    false            ?            1259    16542    revistas    TABLE     ?   CREATE TABLE public.revistas (
    idrevista character varying(100) NOT NULL,
    issn character varying(30),
    volumen integer,
    ejemplar integer,
    reveditorial character varying(30),
    coleccion character varying(100),
    num integer
);
    DROP TABLE public.revistas;
       public         heap    juan    false            ?            1259    16575 
   tipocuenta    TABLE     d   CREATE TABLE public.tipocuenta (
    id integer NOT NULL,
    nombrecuenta character varying(50)
);
    DROP TABLE public.tipocuenta;
       public         heap    juan    false            ?            1259    16625    tt    TABLE       CREATE TABLE public.tt (
    idtt character varying(100) NOT NULL,
    tipott character varying(50),
    autores character varying(300),
    directores character varying(300),
    universidad character varying(100),
    lugar character varying(100),
    numpag integer
);
    DROP TABLE public.tt;
       public         heap    juan    false            ?          0    82174    backup 
   TABLE DATA           3   COPY public.backup (id, nombre, fecha) FROM stdin;
    public          juan    false    213   ?\       ?          0    33022    cuenta 
   TABLE DATA           X   COPY public.cuenta (idcuenta, nombreuser, contrasenia, nombre, email, tipo) FROM stdin;
    public          juan    false    210   ?\       ?          0    16499 
   ejemplares 
   TABLE DATA           q   COPY public.ejemplares (idmaterial, idejemplar, propietario, disponibilidad, codigo_externo, estado) FROM stdin;
    public          juan    false    202   ?]       ?          0    24830    keywords 
   TABLE DATA           ;   COPY public.keywords (mat_id, word_id, descri) FROM stdin;
    public          juan    false    209   ?^       ?          0    16532    libros 
   TABLE DATA           P   COPY public.libros (idlibro, autor, edicion, tomo, editorial, isbn) FROM stdin;
    public          juan    false    203   u_       ?          0    16612    mapas 
   TABLE DATA           X   COPY public.mapas (idmapa, hoja, escala, localidad, provincia, pais, tipom) FROM stdin;
    public          juan    false    207   *`       ?          0    82227    material 
   TABLE DATA           g   COPY public.material (idmat, titulo, tipo, descripcion, portada, idcatalogo, anio, idioma) FROM stdin;
    public          juan    false    214   ?`       ?          0    73982    multas 
   TABLE DATA           M   COPY public.multas (idmulta, idcuenta, desmultado, multa_estado) FROM stdin;
    public          juan    false    212   ?d       ?          0    82283 	   prestamos 
   TABLE DATA           f   COPY public.prestamos (idpre, nombre, material, ejemplar, desde, hasta, activo, devuelto) FROM stdin;
    public          juan    false    215   ?d       ?          0    41214    reportes 
   TABLE DATA           B   COPY public.reportes (id, nombre, fecha, descripcion) FROM stdin;
    public          juan    false    211   f       ?          0    16590    reservas 
   TABLE DATA           ^   COPY public.reservas (idres, nombre, material, ejemplar, fecha, activo, retirado) FROM stdin;
    public          juan    false    206   ?f       ?          0    16542    revistas 
   TABLE DATA           d   COPY public.revistas (idrevista, issn, volumen, ejemplar, reveditorial, coleccion, num) FROM stdin;
    public          juan    false    204   h       ?          0    16575 
   tipocuenta 
   TABLE DATA           6   COPY public.tipocuenta (id, nombrecuenta) FROM stdin;
    public          juan    false    205   Ih       ?          0    16625    tt 
   TABLE DATA           [   COPY public.tt (idtt, tipott, autores, directores, universidad, lugar, numpag) FROM stdin;
    public          juan    false    208   ?h       @           2606    82178    backup backup_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.backup
    ADD CONSTRAINT backup_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.backup DROP CONSTRAINT backup_pkey;
       public            juan    false    213            8           2606    33028    cuenta cuenta_nombreuser_key 
   CONSTRAINT     ]   ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_nombreuser_key UNIQUE (nombreuser);
 F   ALTER TABLE ONLY public.cuenta DROP CONSTRAINT cuenta_nombreuser_key;
       public            juan    false    210            :           2606    33026    cuenta cuenta_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_pkey PRIMARY KEY (idcuenta);
 <   ALTER TABLE ONLY public.cuenta DROP CONSTRAINT cuenta_pkey;
       public            juan    false    210            (           2606    16503    ejemplares ejemplares_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.ejemplares
    ADD CONSTRAINT ejemplares_pkey PRIMARY KEY (idmaterial, idejemplar);
 D   ALTER TABLE ONLY public.ejemplares DROP CONSTRAINT ejemplares_pkey;
       public            juan    false    202    202            6           2606    24834    keywords keywords_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.keywords
    ADD CONSTRAINT keywords_pkey PRIMARY KEY (mat_id, word_id);
 @   ALTER TABLE ONLY public.keywords DROP CONSTRAINT keywords_pkey;
       public            juan    false    209    209            *           2606    16536    libros libros_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_pkey PRIMARY KEY (idlibro);
 <   ALTER TABLE ONLY public.libros DROP CONSTRAINT libros_pkey;
       public            juan    false    203            2           2606    16619    mapas mapas_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.mapas
    ADD CONSTRAINT mapas_pkey PRIMARY KEY (idmapa);
 :   ALTER TABLE ONLY public.mapas DROP CONSTRAINT mapas_pkey;
       public            juan    false    207            B           2606    82234    material material_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.material
    ADD CONSTRAINT material_pkey PRIMARY KEY (idmat);
 @   ALTER TABLE ONLY public.material DROP CONSTRAINT material_pkey;
       public            juan    false    214            >           2606    73986    multas multas_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.multas
    ADD CONSTRAINT multas_pkey PRIMARY KEY (idmulta);
 <   ALTER TABLE ONLY public.multas DROP CONSTRAINT multas_pkey;
       public            juan    false    212            D           2606    82287    prestamos prestamos_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_pkey PRIMARY KEY (idpre, nombre);
 B   ALTER TABLE ONLY public.prestamos DROP CONSTRAINT prestamos_pkey;
       public            juan    false    215    215            <           2606    41221    reportes reportes_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.reportes
    ADD CONSTRAINT reportes_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.reportes DROP CONSTRAINT reportes_pkey;
       public            juan    false    211            0           2606    16594    reservas reservas_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (idres, nombre);
 @   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_pkey;
       public            juan    false    206    206            ,           2606    16546    revistas revistas_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.revistas
    ADD CONSTRAINT revistas_pkey PRIMARY KEY (idrevista);
 @   ALTER TABLE ONLY public.revistas DROP CONSTRAINT revistas_pkey;
       public            juan    false    204            .           2606    16579    tipocuenta tipocuenta_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.tipocuenta
    ADD CONSTRAINT tipocuenta_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.tipocuenta DROP CONSTRAINT tipocuenta_pkey;
       public            juan    false    205            4           2606    16632 
   tt tt_pkey 
   CONSTRAINT     J   ALTER TABLE ONLY public.tt
    ADD CONSTRAINT tt_pkey PRIMARY KEY (idtt);
 4   ALTER TABLE ONLY public.tt DROP CONSTRAINT tt_pkey;
       public            juan    false    208            P           2620    82288 #   prestamos trgestadoejemplarprestamo    TRIGGER     ?   CREATE TRIGGER trgestadoejemplarprestamo AFTER INSERT OR DELETE ON public.prestamos FOR EACH ROW EXECUTE FUNCTION public.fxestadoejemplarprestamo();
 <   DROP TRIGGER trgestadoejemplarprestamo ON public.prestamos;
       public          juan    false    232    215            O           2620    65805 !   reservas trgestadoejemplarreserva    TRIGGER     ?   CREATE TRIGGER trgestadoejemplarreserva AFTER INSERT OR DELETE ON public.reservas FOR EACH ROW EXECUTE FUNCTION public.fxestadoejemplareserva();
 :   DROP TRIGGER trgestadoejemplarreserva ON public.reservas;
       public          juan    false    206    229            Q           2620    82290    prestamos trgestadoprestamo    TRIGGER     |   CREATE TRIGGER trgestadoprestamo BEFORE UPDATE ON public.prestamos FOR EACH ROW EXECUTE FUNCTION public.fxestadoprestamo();
 4   DROP TRIGGER trgestadoprestamo ON public.prestamos;
       public          juan    false    228    215            R           2620    82291    prestamos trginsertreserva    TRIGGER     |   CREATE TRIGGER trginsertreserva BEFORE INSERT ON public.prestamos FOR EACH ROW EXECUTE FUNCTION public.fxinsertprestamos();
 3   DROP TRIGGER trginsertreserva ON public.prestamos;
       public          juan    false    230    215            L           2606    33029    cuenta cuenta_tipo_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_tipo_fkey FOREIGN KEY (tipo) REFERENCES public.tipocuenta(id);
 A   ALTER TABLE ONLY public.cuenta DROP CONSTRAINT cuenta_tipo_fkey;
       public          juan    false    205    210    2862            E           2606    82239 %   ejemplares ejemplares_idmaterial_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.ejemplares
    ADD CONSTRAINT ejemplares_idmaterial_fkey FOREIGN KEY (idmaterial) REFERENCES public.material(idmat);
 O   ALTER TABLE ONLY public.ejemplares DROP CONSTRAINT ejemplares_idmaterial_fkey;
       public          juan    false    214    2882    202            K           2606    82244    keywords keywords_mat_id_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.keywords
    ADD CONSTRAINT keywords_mat_id_fkey FOREIGN KEY (mat_id) REFERENCES public.material(idmat);
 G   ALTER TABLE ONLY public.keywords DROP CONSTRAINT keywords_mat_id_fkey;
       public          juan    false    214    2882    209            F           2606    82249    libros libros_idlibro_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_idlibro_fkey FOREIGN KEY (idlibro) REFERENCES public.material(idmat);
 D   ALTER TABLE ONLY public.libros DROP CONSTRAINT libros_idlibro_fkey;
       public          juan    false    214    203    2882            I           2606    82254    mapas mapas_idmapa_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.mapas
    ADD CONSTRAINT mapas_idmapa_fkey FOREIGN KEY (idmapa) REFERENCES public.material(idmat);
 A   ALTER TABLE ONLY public.mapas DROP CONSTRAINT mapas_idmapa_fkey;
       public          juan    false    2882    214    207            M           2606    73987    multas multas_idcuenta_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.multas
    ADD CONSTRAINT multas_idcuenta_fkey FOREIGN KEY (idcuenta) REFERENCES public.cuenta(idcuenta);
 E   ALTER TABLE ONLY public.multas DROP CONSTRAINT multas_idcuenta_fkey;
       public          juan    false    210    2874    212            N           2606    82292 *   prestamos prestamos_material_ejemplar_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_material_ejemplar_fkey FOREIGN KEY (material, ejemplar) REFERENCES public.ejemplares(idmaterial, idejemplar);
 T   ALTER TABLE ONLY public.prestamos DROP CONSTRAINT prestamos_material_ejemplar_fkey;
       public          juan    false    215    215    202    2856    202            H           2606    16595 (   reservas reservas_material_ejemplar_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_material_ejemplar_fkey FOREIGN KEY (material, ejemplar) REFERENCES public.ejemplares(idmaterial, idejemplar);
 R   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_material_ejemplar_fkey;
       public          juan    false    202    2856    202    206    206            G           2606    82259     revistas revistas_idrevista_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.revistas
    ADD CONSTRAINT revistas_idrevista_fkey FOREIGN KEY (idrevista) REFERENCES public.material(idmat);
 J   ALTER TABLE ONLY public.revistas DROP CONSTRAINT revistas_idrevista_fkey;
       public          juan    false    204    214    2882            J           2606    82264    tt tt_idtt_fkey    FK CONSTRAINT     q   ALTER TABLE ONLY public.tt
    ADD CONSTRAINT tt_idtt_fkey FOREIGN KEY (idtt) REFERENCES public.material(idmat);
 9   ALTER TABLE ONLY public.tt DROP CONSTRAINT tt_idtt_fkey;
       public          juan    false    214    2882    208            ?   !   x?3?L?4202?50?56?2?LD???qqq x9      ?     x?=??r?0 @?u???B???ǈ???j?<	/???T??;wu$?2???????????Y???j?J?j:???\͙Z??XvRK*9ڙ??a?ģ??%(????n?!'??z9?\?ۖE?!???J??L?N???;?]?iv?????? ?rdU?^?Qm[??M???lt??z?????U???jno???`?r??????*??]???$???JtGFM6!}?:?ԯeR??>??VB?P?????O?(?[????i'      ?   ?   x?m???0??ݻhl;%???ƍFIH?$???v??@Å?k??_?pa???|???????i??!??`?*-???8Tb?ו??%\ +`??̢<7??~?n?3Ty?D]'PT??l?f???=?ʥ??^ZE?T???b??????????B4????	??d???ƳU?9NMsu????g?$A1?V??s?q?z+      ?   ?   x?M???0E??. BZ?`.&????$B?8?sa?,?%??????????|Mn?xW??Ѭ??2??#?1??(?C???"??KG'??6h?W?_?ZN???w
F?r??=?Z?:U???g/s??i?@???F???4??????I?      ?   ?   x?]?M
?0F?ߜ??8E?-]???M4.l?)?}?c!?|???̈́?@??b????;??ƃC?}0<7??-&?T?yX|ƌo??I?@??0e7#??Ճvy?:?ݡW?#??ؒ?"?Ѭ?xF
hC?>q??v????.?????NF??A?????4@DP&?[?NV      ?      x?eM?
?0<?~E~??MЂ7?o^?$?a??o+????9?x??i0?.??3????8?*Y?I\???%ڬ???,?|?N???-?M|o}?*&E`:?%?Ş???6UsjiRzI???=D?Z?)?      ?   ?  x??U?n?6=?_?cT?Dٱ}?`?6h?Y?? ?1I?(R%%?ۿ???~?????l???mY$g?H?y3?k?Qc??h???f??[?*#?w?[?gs????MvQ?5??=???veӴ?b?{??????F???d??_????\G=e~???`????O&??C???8??`U2??i=W?O?I3/}k?<??-o???,\G>:?Ο?%?4????`??pw?&??????`?????????r?????ޏQs?x??u??恗E???r-?b??????????`?O???q?u8i7P????!?M????cL;ܕؤ?????Ϻ?-?0K(b?C 5ʄJ|??F?Q???H???n?ڞ?9|??c쵋 NZN?{_??V?we]g???h?{????&m?&?C*!!
??s??i??c
Sh??w-?a^cW?Gs????|??E??A?{????}eK?????	QOSR#+?վ??????@?c???^??gQ?????Ë??E?5?oQ$???3Z???? ???A??????2?~0?hi?L?
?"`????????6K??0?"?v?G?Go?e??$?D???R??uL??Z?d?Wv?????LI?UYb(?D?ea?e?	?q/Ǟ??S?? "??-GA8`#?)`?y&?G??ᨌ!4K???-?'gI8???LUŪ????~U?D1>?I7{`?m??+?yr?F??N%??zw???K?!Q)???y?>t?([d?$9{?XR?e?u?	?w?b?4?Rʲ??5??ش??g:??WK?G?M?J?r;ʣ]??N?;?7Z???A?hĶ?)Y?}????ϲlS$?w????????(YoEs?QԬwײ??F?z_n?ey??~??fQ??%?????<Գ>?9?|??¿*?P?-r;$)???D!??g?e?=*?r?&*????b???n[;????;???????t?Z???jmX      ?      x?????? ? ?      ?   J  x???Qn?0D??wq?]w?r~hQ
RC???ذ??R>???06?p}?=??!?&ӘK9BuVHg?\1s.?wӏ?]_?p?5?.dU??ހ??VK?R??B?H?? sm\L?mc??$?I?`l: ?roi2?g?t?IS#M?"?/????>>?????SfQ?zt????????i??4?>?ѡ;M????<????.?y?$qb<?ھ???4????]*???Ý՟??? Vp=?41S*?,~Iu??????D???&O?????Ɖ\S?B?-bо?^І?f S??K??4????I3^.?Q???ާ?????E??G      ?   ?   x???A
?0?ur?\ 'F?!
?tY(????F???7BK??
?0|?????[?ouSO?X??ӂ?%?U???A⟜>1cLWn???<Vc?.v~2?? Æ?m[c7ل?*?????????$??=uT?B????[=?S,????4?|?=?]????Z?X?*yV.`???kB)}p??      ?     x?}?Mr?0???.?X?1p?n?f?I?"??5?-?O??󓞞??x??' ?%2?6T?c??7?????O?????9?????F?/X???	????0??=??kQ?n?Щ?ג???B(??3lyE?
%/?QIXl?1d*???|s?"2?VÚ?7????d?d??F?????,:?ׄm'?T??
?F???>?O?A???3L??????2I??K???{?x??B?r??y???=r????!?&?&??\Hm?>e]ҥX?9????fN?L????????      ?   8   x?36?4FG\?F???f??iY?E???F????????\E????1~ ??b???? ???      ?   A   x?3?tL????,.)JL?/?2?t?L???/IMN,???2?t?ON?+I?2?t-.)M?Lqb???? dg      ?   2   x?K??K?1?I-?,?J,́??)?E??E?
a?E)????\1z\\\ r??     