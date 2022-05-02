--
-- PostgreSQL database dump
--

-- Dumped from database version 12.9 (Ubuntu 12.9-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.9 (Ubuntu 12.9-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cuenta; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.cuenta (
    idcuenta integer NOT NULL,
    nombreuser character varying(50),
    contrasenia character varying(150),
    nombre character varying(100),
    email character varying(150),
    tipo integer
);


ALTER TABLE public.cuenta OWNER TO juan;

--
-- Name: ejemplares; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.ejemplares (
    idmaterial character varying(100) NOT NULL,
    idejemplar character varying(100) NOT NULL,
    propietario character varying(100),
    disponibilidad boolean,
    codigo_externo character varying(100),
    estado character varying(1)
);


ALTER TABLE public.ejemplares OWNER TO juan;

--
-- Name: keywords; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.keywords (
    mat_id character varying(100) NOT NULL,
    word_id integer NOT NULL,
    descri character varying(100)
);


ALTER TABLE public.keywords OWNER TO juan;

--
-- Name: libros; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.libros (
    idlibro character varying(100) NOT NULL,
    autor character varying(150),
    edicion integer,
    tomo integer,
    editorial character varying(30),
    isbn character varying(30)
);


ALTER TABLE public.libros OWNER TO juan;

--
-- Name: mapas; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.mapas (
    idmapa character varying(100) NOT NULL,
    hoja character varying(30),
    escala character varying(30),
    localidad character varying(150),
    provincia character varying(150),
    pais character varying(150),
    tipom character varying(50)
);


ALTER TABLE public.mapas OWNER TO juan;

--
-- Name: material; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.material (
    idmat character varying(100) NOT NULL,
    titulo character varying(300),
    tipo character varying(40),
    descripcion character varying(1000),
    portada character varying(300),
    idcatalogo character varying(100),
    anio integer,
    idioma character varying(50)
);


ALTER TABLE public.material OWNER TO juan;

--
-- Name: prestamos; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.prestamos (
    idpre integer NOT NULL,
    nombre character varying(100) NOT NULL,
    material character varying(100),
    ejemplar character varying(100),
    desde date,
    hasta date,
    activo boolean,
    devuelto date
);


ALTER TABLE public.prestamos OWNER TO juan;

--
-- Name: reservas; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.reservas (
    idres integer NOT NULL,
    nombre character varying(100) NOT NULL,
    material character varying(100),
    ejemplar character varying(100),
    fecha date,
    activo boolean,
    retirado boolean
);


ALTER TABLE public.reservas OWNER TO juan;

--
-- Name: revistas; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.revistas (
    idrevista character varying(100) NOT NULL,
    issn character varying(30),
    volumen integer,
    ejemplar integer,
    reveditorial character varying(30),
    coleccion character varying(100),
    num integer
);


ALTER TABLE public.revistas OWNER TO juan;

--
-- Name: tipocuenta; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.tipocuenta (
    id integer NOT NULL,
    nombrecuenta character varying(50)
);


ALTER TABLE public.tipocuenta OWNER TO juan;

--
-- Name: tt; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.tt (
    idtt character varying(100) NOT NULL,
    tipott character varying(50),
    autores character varying(300),
    directores character varying(300),
    universidad character varying(100),
    lugar character varying(100),
    numpag integer
);


ALTER TABLE public.tt OWNER TO juan;

--
-- Data for Name: cuenta; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.cuenta (idcuenta, nombreuser, contrasenia, nombre, email, tipo) FROM stdin;
0	admin	$2y$12$AZYKKGlj9EQHGaSZOv0mdOrNd/p8wAQXCe6pIizmt0sTn1YUA.7Re	admin	admin@admin	0
1	juan	$2y$12$ft2HiYEpv.qqJIqKEDDT2e5288wh3P0zWAh9R8f873KFUd7oTg5xy	juan	juan@juan	0
2	docente	$2y$12$c6ssJq2RsGnkizHJM6ZvpudqYk963oMJpqESDatv7NW6qE2Pz4Aq.	docente	d@d	2
\.


--
-- Data for Name: ejemplares; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.ejemplares (idmaterial, idejemplar, propietario, disponibilidad, codigo_externo, estado) FROM stdin;
1-Libro	1	Uader	t	\N	l
32	1	Uader	t	\N	l
77	1	Uader	t	\N	l
77	2	Uader	t	\N	l
77	3	Uader	f	\N	l
9	2		f	\N	l
34	1		f	\N	l
34	2		f	\N	l
final1	3	Uader	t	\N	l
final1	6	Uader	f	\N	l
final1	5		f	\N	l
final1	7		f	\N	l
final1	8		f	\N	l
23	1		f	\N	l
2	1	y	t	\N	p
10	1	Uader	t	\N	r
3-Libro	1	y	t	\N	p
33	3	Uader	t	3	l
33	2	yo	t	2	r
final1	1	Uader	f	2	l
final1	11		f	1	l
final1	12		f	\N	l
33	1	Uader	t	1	r
\.


--
-- Data for Name: keywords; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.keywords (mat_id, word_id, descri) FROM stdin;
1-Libro	1	detective
1-Libro	2	masacre
1-Libro	3	policial
1-Libro	4	triller
1-Libro	5	misterio
1-Libro	6	as
3l	2	as
3l	3	detective
3l	1	como
final1	1	analisis
final1	2	ayer
final1	3	yo
3-Libro	1	geografia
final1	4	año
final1	5	yìá
\.


--
-- Data for Name: libros; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.libros (idlibro, autor, edicion, tomo, editorial, isbn) FROM stdin;
33	33	33	33	33	\N
13	desconocido	1	1	desconocido	\N
4	juan	\N	\N		\N
1-Libro	juan	1	0	mario	\N
9	asd	\N	\N		\N
3-Libro	asd	1	0	labando	\N
2	asd	\N	\N		\N
7	asd	\N	\N		\N
2-Libro	juan	\N	\N	\N	\N
3l	juan	\N	\N	k	\N
3453545345353		\N	\N	34535	\N
libro-1		\N	\N		\N
libro-2		5	5	juan	\N
10	Dan Brown	1	1	Doubleday	1
freds		\N	\N		12324-78678
\.


--
-- Data for Name: mapas; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.mapas (idmapa, hoja, escala, localidad, provincia, pais, tipom) FROM stdin;
2	2	2	2	2	2	2
77	E2-3E	1:1	Sector 13	Galaxia 3	Universo 15	Universal
23	23	23	23	23	23	23
22	223	223	223	223	223	223
16	1	1:100	parana	rosario	Argentina	politico
mapa-1						
\.


--
-- Data for Name: material; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.material (idmat, titulo, tipo, descripcion, portada, idcatalogo, anio, idioma) FROM stdin;
33	mafia	Libro	33	Mafia-Edicion-Definitiva.jpg	33	2003	Español
3453545345353	3535345345	Libro	4534534534		345345345	3535	53345353
libro-1	libro-1	Libro				\N	
libro-2	libro-2	Libro	asdadad		asda	2012	Español
mapa-1	mapa-1	Mapa				\N	
r-1	r-1	Revista				\N	
f-1	f-1	Final				\N	
final1	Análisis multivariado de datos	Final	afgdfgdfgdfg	descarga.png	asdkjfhada	2003	Español
freds	fred	Libro				\N	
16	planicie	Mapa	nose	nsamerica-pol_bg.jpg	nose	2003	\N
9	segundo libro	Libro				2003	\N
34	34	Revista	34		34	2003	\N
32	ieee	Revista	normas de calidad 3		32	2003	\N
77	un titulo demaciado largo como para poder mostrarlo en la tabla de reserva y de prestamo para observ	Mapa	un titulo demaciado largo como para poder mostrarlo en la tabla de reserva y de prestamo para observar lo que sucede en este preciso caso donde los 100 caracteres del titulo estan ocupados por un nombre ridiculamente grando como lo es un tilulo demaciado largo como para poder mostrarlo en la tabla d		77	2003	\N
13	como lo ves	Libro	ninguna			2003	\N
2-Libro	Runner	Libro	un grupo de chico atrapados en un laberinto intentan escapar		2-Libro	2003	\N
23	23	Mapa	23		23	2003	\N
3-Libro	Blade	Libro	un vampiro mata mas vampitos		3-Libro	2003	\N
2	fischl	Libro				2003	\N
4	rhfhfghfh	Libro				2003	\N
7	hghscvbdjdtyd	Libro				2003	\N
1-Libro	primer libro	Libro	primer registro cargado ma		1-Libro	2003	\N
3l	Nightmare	Libro	3l	Little-Nightmares-II-Deluxe-Edition.jpg	2h	2003	\N
22	223	Mapa	223	mapa-geografico-de-entre-rios.jpg	223	2003	\N
10	codigo da vinci	Libro	El código Da Vinci es una novela de misterio escrita por Dan Brown y publicada por primera vez por Random House en 2003 (ISBN 0-385-50420-9). Se ha convertido en un superventas mundial, con más de 80 millones de ejemplares vendidos y traducido a 44 idiomas.  Al combinar los géneros de suspenso detec	libro_1307298033.jpg		2003	Español
\.


--
-- Data for Name: prestamos; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.prestamos (idpre, nombre, material, ejemplar, desde, hasta, activo, devuelto) FROM stdin;
1	jose	3-Libro	1	2022-04-05	2022-04-13	t	\N
\.


--
-- Data for Name: reservas; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.reservas (idres, nombre, material, ejemplar, fecha, activo, retirado) FROM stdin;
1	koko	10	1	2022-04-12	t	f
1	admin	final1	1	2022-04-12	t	f
1	jose	33	2	2022-05-07	t	f
2	jose	33	1	2022-10-12	t	f
1	juan	33	1	2022-04-12	t	f
2	admin	33	1	2022-04-26	t	f
\.


--
-- Data for Name: revistas; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.revistas (idrevista, issn, volumen, ejemplar, reveditorial, coleccion, num) FROM stdin;
34	34	34	34	34	34	34
32	176g-fjer	1	2	ieee	0	3
r-1		\N	\N			\N
\.


--
-- Data for Name: tipocuenta; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.tipocuenta (id, nombrecuenta) FROM stdin;
0	Administrador
1	Bibliotecario
2	Docente
3	Estudiante
\.


--
-- Data for Name: tt; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.tt (idtt, tipott, autores, directores, universidad, lugar, numpag) FROM stdin;
f-1						\N
final1	Tesis	Raul	Raul	Uader	Oro Verde	5
\.


--
-- Name: cuenta cuenta_nombreuser_key; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_nombreuser_key UNIQUE (nombreuser);


--
-- Name: cuenta cuenta_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_pkey PRIMARY KEY (idcuenta);


--
-- Name: ejemplares ejemplares_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.ejemplares
    ADD CONSTRAINT ejemplares_pkey PRIMARY KEY (idmaterial, idejemplar);


--
-- Name: keywords keywords_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.keywords
    ADD CONSTRAINT keywords_pkey PRIMARY KEY (mat_id, word_id);


--
-- Name: libros libros_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_pkey PRIMARY KEY (idlibro);


--
-- Name: mapas mapas_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.mapas
    ADD CONSTRAINT mapas_pkey PRIMARY KEY (idmapa);


--
-- Name: material material_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.material
    ADD CONSTRAINT material_pkey PRIMARY KEY (idmat);


--
-- Name: prestamos prestamos_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_pkey PRIMARY KEY (idpre, nombre);


--
-- Name: reservas reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (idres, nombre);


--
-- Name: revistas revistas_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.revistas
    ADD CONSTRAINT revistas_pkey PRIMARY KEY (idrevista);


--
-- Name: tipocuenta tipocuenta_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.tipocuenta
    ADD CONSTRAINT tipocuenta_pkey PRIMARY KEY (id);


--
-- Name: tt tt_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.tt
    ADD CONSTRAINT tt_pkey PRIMARY KEY (idtt);


--
-- Name: cuenta cuenta_tipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_tipo_fkey FOREIGN KEY (tipo) REFERENCES public.tipocuenta(id);


--
-- Name: ejemplares ejemplares_idmaterial_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.ejemplares
    ADD CONSTRAINT ejemplares_idmaterial_fkey FOREIGN KEY (idmaterial) REFERENCES public.material(idmat);


--
-- Name: keywords keywords_mat_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.keywords
    ADD CONSTRAINT keywords_mat_id_fkey FOREIGN KEY (mat_id) REFERENCES public.material(idmat);


--
-- Name: libros libros_idlibro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_idlibro_fkey FOREIGN KEY (idlibro) REFERENCES public.material(idmat);


--
-- Name: mapas mapas_idmapa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.mapas
    ADD CONSTRAINT mapas_idmapa_fkey FOREIGN KEY (idmapa) REFERENCES public.material(idmat);


--
-- Name: prestamos prestamos_material_ejemplar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_material_ejemplar_fkey FOREIGN KEY (material, ejemplar) REFERENCES public.ejemplares(idmaterial, idejemplar);


--
-- Name: reservas reservas_material_ejemplar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_material_ejemplar_fkey FOREIGN KEY (material, ejemplar) REFERENCES public.ejemplares(idmaterial, idejemplar);


--
-- Name: revistas revistas_idrevista_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.revistas
    ADD CONSTRAINT revistas_idrevista_fkey FOREIGN KEY (idrevista) REFERENCES public.material(idmat);


--
-- Name: tt tt_idtt_fkey; Type: FK CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.tt
    ADD CONSTRAINT tt_idtt_fkey FOREIGN KEY (idtt) REFERENCES public.material(idmat);


--
-- PostgreSQL database dump complete
--

