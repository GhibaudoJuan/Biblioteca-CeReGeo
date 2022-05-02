--
-- PostgreSQL database dump
--

-- Dumped from database version 12.6 (Ubuntu 12.6-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.6 (Ubuntu 12.6-0ubuntu0.20.04.1)

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
    nombreuser character varying(50) NOT NULL,
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
    anio integer,
    idioma character varying(50),
    propietario character varying(100),
    disponibilidad boolean
);


ALTER TABLE public.ejemplares OWNER TO juan;

--
-- Name: libros; Type: TABLE; Schema: public; Owner: juan
--

CREATE TABLE public.libros (
    idlibro character varying(100) NOT NULL,
    autores character varying(150),
    edicion integer,
    tomo integer,
    editorial character varying(30)
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
    idcatalogo character varying(100)
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
    activo boolean
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
    activo boolean
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
    editorial character varying(30),
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

COPY public.cuenta (nombreuser, contrasenia, nombre, email, tipo) FROM stdin;
juan	$2y$12$HT6bD86lJnwxfXcW3J8fqeyduucRgIEqNSQVwVIkI.YDqJ00hNcpu	juan	juan@juan.com	0
y	$2y$12$ikLsbjBAAvzMoBATr7Vg/uZ83Uev7B3OCPi1u.tcT9SRl/XjUTNA6	y	y@y	0
h	$2y$12$Aydrh5oUW7zVVTZHIQIeiOQzleIRp5lvZqzJK4NkMj3KqXaM9PKXK	h	h@h	3
admin	$2y$12$AZYKKGlj9EQHGaSZOv0mdOrNd/p8wAQXCe6pIizmt0sTn1YUA.7Re	admin	admin@admin	0
docente	$2y$12$zFDxtgi1Z5lj.Kf4eaDBqe7qRiu6T.iUYGizMKdzTnHxOhSkboHfm	docente	d@f	2
bibli	$2y$12$7ROWC528rY0EM61a8lAjj.TMJ2GOaKVZdBZGpncPo7VNxKoaVrnJO	bibli	b@h	1
\.


--
-- Data for Name: ejemplares; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.ejemplares (idmaterial, idejemplar, anio, idioma, propietario, disponibilidad) FROM stdin;
1-Libro	1	1990	español	Uader	t
2	1	123	est	y	t
32	1	2021	español	Uader	t
77	1	1	español	Uader	t
77	2	2	español	Uader	t
77	3	1	español	Uader	f
\.


--
-- Data for Name: libros; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.libros (idlibro, autores, edicion, tomo, editorial) FROM stdin;
1-Libro	juan	1	0	juan
2		\N	\N	
3		\N	\N	
4		\N	\N	
5		\N	\N	
6		\N	\N	
7		\N	\N	
8		\N	\N	
9		\N	\N	
10		\N	\N	
11		\N	\N	
12		\N	\N	
13		\N	\N	
14		\N	\N	
15		\N	\N	
33	33	33	33	33
\.


--
-- Data for Name: mapas; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.mapas (idmapa, hoja, escala, localidad, provincia, pais, tipom) FROM stdin;
2	2	2	2	2	2	2
16	1	1:100	parana	rosario	entre rios	politico
77	E2-3E	1:1	Sector 13	Galaxia 3	Universo 15	Universal
\.


--
-- Data for Name: material; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.material (idmat, titulo, tipo, descripcion, portada, idcatalogo) FROM stdin;
1-Libro	primer libro	Libro	primer registro cargado	Mafia-Edicion-Definitiva.jpg	1-Libro
2		Libro			
3		Libro			
4		Libro			
5		Libro			
6		Libro			
7		Libro			
8		Libro			
10		Libro			
11		Libro			
12		Libro			
13		Libro			
14		Libro			
15		Libro			
9	segundo libro	Libro			
33	33	Libro	33		33
34	34	Revista	34		34
234	cambiado	Final	cambiado		cambiado
16	planicie	Mapa	nose		nose
32	ieee	Revista	normas de calidad 3		32
77	un titulo demaciado largo como para poder mostrarlo en la tabla de reserva y de prestamo para observ	Mapa	un titulo demaciado largo como para poder mostrarlo en la tabla de reserva y de prestamo para observar lo que sucede en este preciso caso donde los 100 caracteres del titulo estan ocupados por un nombre ridiculamente grando como lo es un tilulo demaciado largo como para poder mostrarlo en la tabla d		77
final1	Análisis multivariado de datos	Final			
\.


--
-- Data for Name: prestamos; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.prestamos (idpre, nombre, material, ejemplar, desde, hasta, activo) FROM stdin;
1	juan	1-Libro	\N	2021-04-27	2021-04-22	t
1	h	1-Libro	\N	2021-05-16	2021-05-23	t
2	h	1-Libro	\N	2021-09-20	2021-09-20	t
3	h	1-Libro	\N	2021-09-20	2021-09-20	t
4	h	1-Libro	\N	2021-09-20	2021-09-27	t
2	juan	1-Libro	\N	2021-09-20	2021-09-27	t
3	juan	32	\N	2021-09-20	2021-09-27	t
4	juan	32	1	2021-09-20	2021-09-20	t
5	juan	32	1	2021-09-20	2021-09-20	t
1	docente	77	2	2021-09-20	2021-09-24	t
\.


--
-- Data for Name: reservas; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.reservas (idres, nombre, material, ejemplar, fecha, activo) FROM stdin;
1	juan	1-Libro	1	2021-04-28	t
2	juan	1-Libro	1	2021-04-14	t
1	h	1-Libro	1	2021-05-20	t
2	h	1-Libro	1	2021-05-22	t
3	juan	32	1	2021-09-20	t
1	bibli	77	1	2021-09-23	t
\.


--
-- Data for Name: revistas; Type: TABLE DATA; Schema: public; Owner: juan
--

COPY public.revistas (idrevista, issn, volumen, ejemplar, editorial, coleccion, num) FROM stdin;
34	34	34	34	34	34	34
32	176g-fjer	1	2	ieee	0	3
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
234	cambiado	cambiado	cambiado	cambiado	cambiado	7
final1						\N
\.


--
-- Name: cuenta cuenta_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_pkey PRIMARY KEY (nombreuser);


--
-- Name: ejemplares ejemplares_pkey; Type: CONSTRAINT; Schema: public; Owner: juan
--

ALTER TABLE ONLY public.ejemplares
    ADD CONSTRAINT ejemplares_pkey PRIMARY KEY (idmaterial, idejemplar);


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

