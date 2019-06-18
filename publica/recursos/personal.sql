--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3
-- Dumped by pg_dump version 10.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: DATABASE personal; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE personal IS 'El sistema Web de Personal';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: beneficiario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.beneficiario (
    id_beneficiario integer NOT NULL,
    cedula_b character(8),
    nombre_apellido_b character(30) NOT NULL,
    fecha_nacimiento_b date,
    parentesco character(10),
    semana_embarazo character(2),
    talla_zapato character(2),
    talla_pantalon character(2),
    talla_franela character(3)
);


ALTER TABLE public.beneficiario OWNER TO postgres;

--
-- Name: COLUMN beneficiario.id_beneficiario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.id_beneficiario IS 'Es el identificador de la tabla persona, es único, auto incrementable y clave primaria';


--
-- Name: COLUMN beneficiario.cedula_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.cedula_b IS 'La cedula del  beneficiario ';


--
-- Name: COLUMN beneficiario.nombre_apellido_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.nombre_apellido_b IS 'Los nombres del  beneficiario ';


--
-- Name: COLUMN beneficiario.parentesco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.parentesco IS 'El parentesco del beneficiario si pertenece alguna rama de la familia';


--
-- Name: COLUMN beneficiario.semana_embarazo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.semana_embarazo IS 'Semana de embarazo en caso de solicitud de canastilla ';


--
-- Name: beneficiario_id_beneficiario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.beneficiario_id_beneficiario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.beneficiario_id_beneficiario_seq OWNER TO postgres;

--
-- Name: beneficiario_id_beneficiario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.beneficiario_id_beneficiario_seq OWNED BY public.beneficiario.id_beneficiario;


--
-- Name: bitacora; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bitacora (
    id_bitacora integer NOT NULL,
    id_usuario integer,
    fecha_b date,
    accion character(10),
    descripcion character(45)
);


ALTER TABLE public.bitacora OWNER TO postgres;

--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bitacora_id_bitacora_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bitacora_id_bitacora_seq OWNER TO postgres;

--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bitacora_id_bitacora_seq OWNED BY public.bitacora.id_bitacora;


--
-- Name: familiar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.familiar (
    id_familiar integer NOT NULL,
    nombre_apellido_f character(30),
    fecha_nacimiento_f date,
    parentesco_f character(10),
    ocupacion_f character(50),
    ingreso_f character(7),
    peso_f character(3),
    talla_f character(4)
);


ALTER TABLE public.familiar OWNER TO postgres;

--
-- Name: familiar_id_familiar_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.familiar_id_familiar_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.familiar_id_familiar_seq OWNER TO postgres;

--
-- Name: familiar_id_familiar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.familiar_id_familiar_seq OWNED BY public.familiar.id_familiar;


--
-- Name: familiar_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.familiar_solicitud (
    id_familiar_solicitud integer NOT NULL,
    id_familiar integer,
    id_solicitud integer
);


ALTER TABLE public.familiar_solicitud OWNER TO postgres;

--
-- Name: familiar_solicitud_id_familiar_solicitud_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.familiar_solicitud_id_familiar_solicitud_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.familiar_solicitud_id_familiar_solicitud_seq OWNER TO postgres;

--
-- Name: familiar_solicitud_id_familiar_solicitud_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.familiar_solicitud_id_familiar_solicitud_seq OWNED BY public.familiar_solicitud.id_familiar_solicitud;


--
-- Name: permiso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permiso (
    id_permiso integer NOT NULL,
    nombre character(30) NOT NULL
);


ALTER TABLE public.permiso OWNER TO postgres;

--
-- Name: TABLE permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.permiso IS 'Aquí en donde se va almacenar los permisos para el usuario';


--
-- Name: COLUMN permiso.id_permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.permiso.id_permiso IS 'Es el identificador de la tabla permiso, es único, auto incrementable y clave primaria';


--
-- Name: COLUMN permiso.nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.permiso.nombre IS 'Es en donde se almacena el nombre del permiso';


--
-- Name: permiso_id_permiso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permiso_id_permiso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permiso_id_permiso_seq OWNER TO postgres;

--
-- Name: permiso_id_permiso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permiso_id_permiso_seq OWNED BY public.permiso.id_permiso;


--
-- Name: solicitante; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitante (
    id_solicitante integer NOT NULL,
    cedula character(8) NOT NULL,
    nombre_apellido character(30) NOT NULL,
    fecha_nacimiento date NOT NULL,
    sexo character(9) NOT NULL,
    direccion character(100) NOT NULL,
    telefono_1 character(12) NOT NULL,
    telefono_2 character(12),
    email character(30),
    parroquia character(16) NOT NULL,
    estado_civil character(13) NOT NULL,
    ocupacion character(50) NOT NULL,
    esterilizada character(2) NOT NULL,
    beneficio_gubernamental character(50),
    num_hijos integer,
    ingreso character(7)
);


ALTER TABLE public.solicitante OWNER TO postgres;

--
-- Name: TABLE solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitante IS 'Esta tabla contiene todos los datos personales del solicitante';


--
-- Name: COLUMN solicitante.id_solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.id_solicitante IS 'Es el identificador de la tabla solicitante, es único, auto incrementable y clave primaria';


--
-- Name: COLUMN solicitante.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.cedula IS 'El número de cedula del solicitante y es una llave primaria';


--
-- Name: COLUMN solicitante.nombre_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.nombre_apellido IS 'Los nombre del solicitante';


--
-- Name: COLUMN solicitante.direccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.direccion IS 'Dirección de habitación del solicitante';


--
-- Name: COLUMN solicitante.telefono_1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.telefono_1 IS 'El teléfono celular o personal del solicitante';


--
-- Name: COLUMN solicitante.telefono_2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.telefono_2 IS 'El teléfono fijo o de casa del solicitante';


--
-- Name: COLUMN solicitante.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.email IS 'El Correo del solicitante';


--
-- Name: COLUMN solicitante.parroquia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.parroquia IS 'El área en donde se ubica';


--
-- Name: COLUMN solicitante.estado_civil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.estado_civil IS 'Si el solicitante es casado, soltero, entre otras cosas.';


--
-- Name: COLUMN solicitante.ocupacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.ocupacion IS 'A que se dedica el solicitante actualmente';


--
-- Name: COLUMN solicitante.esterilizada; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.esterilizada IS 'Si el solicitante es esterilizada';


--
-- Name: COLUMN solicitante.beneficio_gubernamental; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.beneficio_gubernamental IS 'Si posee algún beneficio por parte del gobierno';


--
-- Name: solicitante_id_solicitante_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitante_id_solicitante_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitante_id_solicitante_seq OWNER TO postgres;

--
-- Name: solicitante_id_solicitante_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitante_id_solicitante_seq OWNED BY public.solicitante.id_solicitante;


--
-- Name: solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitud (
    id_solicitud integer NOT NULL,
    id_solicitante integer NOT NULL,
    id_tipo_solicitud integer NOT NULL,
    id_beneficiario integer NOT NULL,
    id_usuario integer NOT NULL,
    fecha date NOT NULL,
    medio_informacion character(30) NOT NULL,
    tipo_vivienda character(11) NOT NULL,
    tenencia character(9) NOT NULL,
    construccion character(9) NOT NULL,
    tipo_piso character(8) NOT NULL,
    estado character(9) NOT NULL,
    observacion character(45)
);


ALTER TABLE public.solicitud OWNER TO postgres;

--
-- Name: TABLE solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitud IS 'La tabla principal en donde se hace la solicitud y el informe social al mismo tiempo conectando todas las tablas';


--
-- Name: COLUMN solicitud.id_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_solicitud IS 'Numero de control para identificarlo y archivarlo';


--
-- Name: COLUMN solicitud.id_solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_solicitante IS 'Es el identificador de la solicitante, es único, auto incrementable y clave foranea';


--
-- Name: COLUMN solicitud.id_tipo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_tipo_solicitud IS 'Llave foránea haciendo referencia a la tabla beneficiario';


--
-- Name: COLUMN solicitud.fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.fecha IS 'Fecha en la que se hizo la solicitud';


--
-- Name: COLUMN solicitud.estado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.estado IS 'El estado de la solicitud, aprobado o en espera';


--
-- Name: solicitud_numero_control_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitud_numero_control_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_numero_control_seq OWNER TO postgres;

--
-- Name: solicitud_numero_control_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitud_numero_control_seq OWNED BY public.solicitud.id_solicitud;


--
-- Name: tipo_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_solicitud (
    id_tipo_solicitud integer NOT NULL,
    solicitud character(45) NOT NULL,
    descripcion character(45) NOT NULL,
    condicion character(1) DEFAULT 1 NOT NULL
);


ALTER TABLE public.tipo_solicitud OWNER TO postgres;

--
-- Name: TABLE tipo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tipo_solicitud IS 'Aquí es donde se va almacenar los tipos de solicitud que existen o que en algún futuro quiere añadir';


--
-- Name: COLUMN tipo_solicitud.id_tipo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.id_tipo_solicitud IS 'ID de la tabla autoincrementable';


--
-- Name: COLUMN tipo_solicitud.solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.solicitud IS 'Nombre o titulo de la solicitud';


--
-- Name: COLUMN tipo_solicitud.descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.descripcion IS 'Las infinidades de ayudas asociada a la solicitud';


--
-- Name: COLUMN tipo_solicitud.condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.condicion IS 'Si esta activa o no la solicitud para el beneficiario';


--
-- Name: tipo_solicitud_id_tipo_solicitud_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_solicitud_id_tipo_solicitud_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_solicitud_id_tipo_solicitud_seq OWNER TO postgres;

--
-- Name: tipo_solicitud_id_tipo_solicitud_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_solicitud_id_tipo_solicitud_seq OWNED BY public.tipo_solicitud.id_tipo_solicitud;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    nombre_apellido character(30) NOT NULL,
    cedula character(8) NOT NULL,
    telefono character(12) NOT NULL,
    email character(30),
    cargo character(20),
    username character(20) NOT NULL,
    password character(64) NOT NULL,
    imagen character(50),
    condicion integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: TABLE usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.usuario IS 'Los datos del usuario al registrar, entrar y manipular el sistema';


--
-- Name: COLUMN usuario.id_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.id_usuario IS 'Es el identificador de la tabla usuario, es único, auto incrementable y clave primaria';


--
-- Name: COLUMN usuario.nombre_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.nombre_apellido IS 'Nombre del usuario a manipular el sistema';


--
-- Name: COLUMN usuario.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.cedula IS 'Numero de identificación que es la cedula';


--
-- Name: COLUMN usuario.telefono; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.telefono IS 'Teléfono de contacto del usuario, preferiblemente un teléfono móvil ';


--
-- Name: COLUMN usuario.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.email IS 'Correo electronico del usuario';


--
-- Name: COLUMN usuario.cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.cargo IS 'Tipo de cargo del usuario';


--
-- Name: COLUMN usuario.username; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.username IS 'Nombre de usuario al entrar al sistema';


--
-- Name: COLUMN usuario.password; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.password IS 'Passwor o clave del usuario, no mayoro menor de 8 digitos';


--
-- Name: COLUMN usuario.imagen; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.imagen IS 'En donde se guarda la imagen del usuario';


--
-- Name: COLUMN usuario.condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.condicion IS 'La condicion del usuario';


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_usuario_seq OWNER TO postgres;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_usuario_seq OWNED BY public.usuario.id_usuario;


--
-- Name: usuario_permiso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario_permiso (
    id_usuario_permiso integer NOT NULL,
    id_usuario integer NOT NULL,
    id_permiso integer NOT NULL
);


ALTER TABLE public.usuario_permiso OWNER TO postgres;

--
-- Name: TABLE usuario_permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.usuario_permiso IS 'Es una relación para establecer uno o más permiso a un usuario';


--
-- Name: COLUMN usuario_permiso.id_usuario_permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario_permiso.id_usuario_permiso IS 'Es el identificador de la tabla usuario_permiso, es único, auto incrementable y clave primaria';


--
-- Name: COLUMN usuario_permiso.id_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario_permiso.id_usuario IS 'Llave foránea haciendo referencia a la tabla usuario';


--
-- Name: COLUMN usuario_permiso.id_permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario_permiso.id_permiso IS 'Llave foránea haciendo referencia a la tabla permiso';


--
-- Name: usuario_permiso_id_usuario_permiso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_permiso_id_usuario_permiso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_permiso_id_usuario_permiso_seq OWNER TO postgres;

--
-- Name: usuario_permiso_id_usuario_permiso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_permiso_id_usuario_permiso_seq OWNED BY public.usuario_permiso.id_usuario_permiso;


--
-- Name: visita_social; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.visita_social (
    id_visita_social integer NOT NULL,
    id_solicitud integer NOT NULL,
    fecha_v date NOT NULL,
    observaciones character(300),
    trabajador_social character(45)
);


ALTER TABLE public.visita_social OWNER TO postgres;

--
-- Name: TABLE visita_social; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.visita_social IS 'Informe de la visita social sobre el solicitante';


--
-- Name: COLUMN visita_social.id_visita_social; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.id_visita_social IS 'Es el identificador de la tabla visita_social, es único, auto incrementable y clave primaria';


--
-- Name: COLUMN visita_social.id_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.id_solicitud IS 'Numero de control para identificarlo y archivarlo';


--
-- Name: COLUMN visita_social.observaciones; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.observaciones IS 'Observaciones de la visita social';


--
-- Name: COLUMN visita_social.trabajador_social; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.trabajador_social IS 'El trabajador social quien hizo la visita social';


--
-- Name: visita_social_id_visita_social_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.visita_social_id_visita_social_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.visita_social_id_visita_social_seq OWNER TO postgres;

--
-- Name: visita_social_id_visita_social_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.visita_social_id_visita_social_seq OWNED BY public.visita_social.id_visita_social;


--
-- Name: beneficiario id_beneficiario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.beneficiario ALTER COLUMN id_beneficiario SET DEFAULT nextval('public.beneficiario_id_beneficiario_seq'::regclass);


--
-- Name: bitacora id_bitacora; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora ALTER COLUMN id_bitacora SET DEFAULT nextval('public.bitacora_id_bitacora_seq'::regclass);


--
-- Name: familiar id_familiar; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar ALTER COLUMN id_familiar SET DEFAULT nextval('public.familiar_id_familiar_seq'::regclass);


--
-- Name: familiar_solicitud id_familiar_solicitud; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar_solicitud ALTER COLUMN id_familiar_solicitud SET DEFAULT nextval('public.familiar_solicitud_id_familiar_solicitud_seq'::regclass);


--
-- Name: permiso id_permiso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso ALTER COLUMN id_permiso SET DEFAULT nextval('public.permiso_id_permiso_seq'::regclass);


--
-- Name: solicitante id_solicitante; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante ALTER COLUMN id_solicitante SET DEFAULT nextval('public.solicitante_id_solicitante_seq'::regclass);


--
-- Name: solicitud id_solicitud; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud ALTER COLUMN id_solicitud SET DEFAULT nextval('public.solicitud_numero_control_seq'::regclass);


--
-- Name: tipo_solicitud id_tipo_solicitud; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_solicitud ALTER COLUMN id_tipo_solicitud SET DEFAULT nextval('public.tipo_solicitud_id_tipo_solicitud_seq'::regclass);


--
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuario_id_usuario_seq'::regclass);


--
-- Name: usuario_permiso id_usuario_permiso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso ALTER COLUMN id_usuario_permiso SET DEFAULT nextval('public.usuario_permiso_id_usuario_permiso_seq'::regclass);


--
-- Name: visita_social id_visita_social; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visita_social ALTER COLUMN id_visita_social SET DEFAULT nextval('public.visita_social_id_visita_social_seq'::regclass);


--
-- Data for Name: beneficiario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.beneficiario VALUES (40, '45456456', 'Salas Freytez                 ', '2019-01-17', 'Abuela(o) ', '11', '19', '10', 'S  ');


--
-- Data for Name: bitacora; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.bitacora VALUES (7, 7, '2019-01-17', 'Agrego    ', 'Solicitud                                    ');
INSERT INTO public.bitacora VALUES (8, 7, '2019-01-17', 'Agrego    ', 'Solicitud                                    ');
INSERT INTO public.bitacora VALUES (9, 7, '2019-01-17', 'Agrego    ', 'Visita Social                                ');
INSERT INTO public.bitacora VALUES (10, 7, '2019-01-17', 'Agrego    ', 'Visita Social                                ');
INSERT INTO public.bitacora VALUES (11, 7, '2019-01-17', 'Agrego    ', 'Visita Social                                ');
INSERT INTO public.bitacora VALUES (12, 7, '2019-01-17', 'Agrego    ', 'Visita Social                                ');
INSERT INTO public.bitacora VALUES (13, 7, '2019-01-21', 'Acepto    ', 'Solicitud                                    ');
INSERT INTO public.bitacora VALUES (14, 7, '2019-02-04', 'Acepto    ', 'Solicitud                                    ');
INSERT INTO public.bitacora VALUES (15, 7, '2019-02-04', 'Agrego    ', 'Solicitud                                    ');
INSERT INTO public.bitacora VALUES (16, 7, '2019-02-04', 'Acepto    ', 'Solicitud                                    ');
INSERT INTO public.bitacora VALUES (17, 7, '2019-02-12', 'Acepto    ', 'Solicitud N° 66                              ');


--
-- Data for Name: familiar; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.familiar VALUES (24, 'freyt dei                     ', '2019-01-01', 'nada      ', 'quien sabe                                        ', '14.000 ', '23 ', '14  ');
INSERT INTO public.familiar VALUES (25, 'freyt dei 2                   ', '2019-01-01', 'sdfsd     ', 'puss                                              ', '34     ', '34 ', '5   ');
INSERT INTO public.familiar VALUES (26, 'familiar_1                    ', '2006-06-20', 'Hermano   ', 'Bago                                              ', '0      ', '80 ', '190 ');
INSERT INTO public.familiar VALUES (27, 'Nonguna_2                     ', '2014-12-26', 'Primo     ', 'Ingeniero                                         ', '18.000 ', '68 ', '168 ');
INSERT INTO public.familiar VALUES (28, 'Ultimo_3                      ', '2016-04-02', 'Madre     ', 'Ama de Casa                                       ', '1.000  ', '50 ', '150 ');


--
-- Data for Name: familiar_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.familiar_solicitud VALUES (27, 24, 64);
INSERT INTO public.familiar_solicitud VALUES (28, 25, 64);
INSERT INTO public.familiar_solicitud VALUES (29, 26, 66);
INSERT INTO public.familiar_solicitud VALUES (30, 27, 66);
INSERT INTO public.familiar_solicitud VALUES (31, 28, 66);


--
-- Data for Name: permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.permiso VALUES (1, 'Gestion de Usuario            ');
INSERT INTO public.permiso VALUES (2, 'Solicitante                   ');
INSERT INTO public.permiso VALUES (3, 'Gestion de Solicitud          ');
INSERT INTO public.permiso VALUES (4, 'Ninguno                       ');


--
-- Data for Name: solicitante; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.solicitante VALUES (40, '12345678', 'deibys                        ', '2019-01-17', 'Femenino ', 's.fmslñmgdeñls                                                                                      ', '0424-5684643', '            ', 'naymir-freytez-86@hotmail.com ', 'Catedral        ', 'Casada(o)    ', 'ninguna                                           ', 'Si', 'el que tu quieras                                 ', 9, '18.000 ');


--
-- Data for Name: solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.solicitud VALUES (64, 40, 7, 40, 7, '2019-01-17', 'conocida                      ', 'Rancho     ', 'Alojada  ', 'Bahareque', 'Granito ', 'Aprobado ', '.m.k.klm                                     ');
INSERT INTO public.solicitud VALUES (65, 40, 7, 40, 7, '2019-01-17', 'trabajadora                   ', 'Rancho     ', 'Alquilada', 'Zinc     ', 'Granito ', 'Aprobado ', 'vsvdsx                                       ');
INSERT INTO public.solicitud VALUES (66, 40, 7, 40, 7, '2019-02-04', 'trabajadora                   ', 'Rancho     ', 'Alojada  ', 'Bahareque', 'Cerámica', 'Aprobado ', 'pues ninguna                                 ');


--
-- Data for Name: tipo_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tipo_solicitud VALUES (9, 'Enseres y Ayudas Tecnicas                    ', 'Operaciones de piernas                       ', '1');
INSERT INTO public.tipo_solicitud VALUES (12, 'Otros                                        ', 'Solo Embarazada aCTUALIZADO2                 ', '1');
INSERT INTO public.tipo_solicitud VALUES (14, 'Otros                                        ', 'estoy probando...!!!                         ', '1');
INSERT INTO public.tipo_solicitud VALUES (8, 'Enseres y Ayudas Tecnicas                    ', 'Prueba de Canastilla para probar             ', '0');
INSERT INTO public.tipo_solicitud VALUES (19, 'Otros                                        ', 'noooooo                                      ', '1');
INSERT INTO public.tipo_solicitud VALUES (10, 'Otros                                        ', 'vamos a ver que pasa                         ', '0');
INSERT INTO public.tipo_solicitud VALUES (7, 'Canastillas                                  ', 'Solo Embarazada5432                          ', '0');
INSERT INTO public.tipo_solicitud VALUES (18, 'Canastillas                                  ', 'prueba de condicion                          ', '0');
INSERT INTO public.tipo_solicitud VALUES (11, 'Canastillas                                  ', 'Solo e incapaz                               ', '0');
INSERT INTO public.tipo_solicitud VALUES (13, 'Enseres y Ayudas Tecnicas                    ', 'como reacciona NOP                           ', '0');
INSERT INTO public.tipo_solicitud VALUES (20, 'Canastillas                                  ', 'ooooooooooooooooooooooooooo                  ', '1');


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario VALUES (34, 'ruth                          ', '12345678', '0416-0000000', '                              ', 'ninguno             ', 'ruth                ', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1542982577.png                                    ', 1);
INSERT INTO public.usuario VALUES (35, 'sgfsds                        ', '1234213 ', '0426-2342321', '                              ', 'ninguno             ', 'dei                 ', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1547758520.jpg                                    ', 1);
INSERT INTO public.usuario VALUES (7, 'deibys                        ', '19640186', '0424-5684643', 'deibysfreytez@gmail.com       ', 'Programador         ', 'deibys              ', '1234                                                            ', '1545251336.jpg                                    ', 1);


--
-- Data for Name: usuario_permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario_permiso VALUES (165, 34, 1);
INSERT INTO public.usuario_permiso VALUES (166, 34, 2);
INSERT INTO public.usuario_permiso VALUES (167, 34, 3);
INSERT INTO public.usuario_permiso VALUES (168, 34, 4);
INSERT INTO public.usuario_permiso VALUES (169, 7, 1);
INSERT INTO public.usuario_permiso VALUES (170, 7, 2);
INSERT INTO public.usuario_permiso VALUES (171, 7, 3);
INSERT INTO public.usuario_permiso VALUES (172, 7, 4);
INSERT INTO public.usuario_permiso VALUES (173, 35, 1);
INSERT INTO public.usuario_permiso VALUES (174, 35, 2);
INSERT INTO public.usuario_permiso VALUES (175, 35, 3);


--
-- Data for Name: visita_social; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.visita_social VALUES (20, 65, '2019-01-17', 'Vamos a ver que guarda                                                                                                                                                                                                                                                                                      ', 'kuygkg                                       ');
INSERT INTO public.visita_social VALUES (21, 65, '2019-01-03', 'nueva                                                                                                                                                                                                                                                                                                       ', '6586876                                      ');
INSERT INTO public.visita_social VALUES (22, 64, '2019-01-05', 'otra                                                                                                                                                                                                                                                                                                        ', 'prueba                                       ');
INSERT INTO public.visita_social VALUES (23, 64, '2019-01-07', 'nose                                                                                                                                                                                                                                                                                                        ', 'este                                         ');
INSERT INTO public.visita_social VALUES (24, 64, '2018-12-11', 'gfhfmngkgjhgjhgkjhgkjh                                                                                                                                                                                                                                                                                      ', 'hggkjhgkjgkjhgkjhgkjhg                       ');
INSERT INTO public.visita_social VALUES (25, 65, '2019-01-10', 'Esta ves sip                                                                                                                                                                                                                                                                                                ', 'Vamos a ver esta                             ');


--
-- Name: beneficiario_id_beneficiario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.beneficiario_id_beneficiario_seq', 40, true);


--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bitacora_id_bitacora_seq', 17, true);


--
-- Name: familiar_id_familiar_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.familiar_id_familiar_seq', 28, true);


--
-- Name: familiar_solicitud_id_familiar_solicitud_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.familiar_solicitud_id_familiar_solicitud_seq', 31, true);


--
-- Name: permiso_id_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permiso_id_permiso_seq', 8, true);


--
-- Name: solicitante_id_solicitante_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitante_id_solicitante_seq', 40, true);


--
-- Name: solicitud_numero_control_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitud_numero_control_seq', 66, true);


--
-- Name: tipo_solicitud_id_tipo_solicitud_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_solicitud_id_tipo_solicitud_seq', 20, true);


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_usuario_seq', 35, true);


--
-- Name: usuario_permiso_id_usuario_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_permiso_id_usuario_permiso_seq', 175, true);


--
-- Name: visita_social_id_visita_social_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.visita_social_id_visita_social_seq', 25, true);


--
-- Name: bitacora bitacora_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT bitacora_pkey PRIMARY KEY (id_bitacora);


--
-- Name: familiar familiar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar
    ADD CONSTRAINT familiar_pkey PRIMARY KEY (id_familiar);


--
-- Name: familiar_solicitud familiar_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar_solicitud
    ADD CONSTRAINT familiar_solicitud_pkey PRIMARY KEY (id_familiar_solicitud);


--
-- Name: beneficiario pk_id_beneficiario; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.beneficiario
    ADD CONSTRAINT pk_id_beneficiario PRIMARY KEY (id_beneficiario);


--
-- Name: permiso pk_id_permiso; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso
    ADD CONSTRAINT pk_id_permiso PRIMARY KEY (id_permiso);


--
-- Name: solicitante pk_id_solicitante; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante
    ADD CONSTRAINT pk_id_solicitante PRIMARY KEY (id_solicitante);


--
-- Name: usuario pk_id_usuario; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT pk_id_usuario PRIMARY KEY (id_usuario);


--
-- Name: usuario_permiso pk_id_usuario_permiso; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT pk_id_usuario_permiso PRIMARY KEY (id_usuario_permiso);


--
-- Name: visita_social pk_id_visita_social; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visita_social
    ADD CONSTRAINT pk_id_visita_social PRIMARY KEY (id_visita_social);


--
-- Name: solicitud pk_solicitud; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT pk_solicitud PRIMARY KEY (id_solicitud);


--
-- Name: tipo_solicitud tipo_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_solicitud
    ADD CONSTRAINT tipo_solicitud_pkey PRIMARY KEY (id_tipo_solicitud);


--
-- Name: solicitante u_cedula; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante
    ADD CONSTRAINT u_cedula UNIQUE (cedula);


--
-- Name: beneficiario ub_cedula; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.beneficiario
    ADD CONSTRAINT ub_cedula UNIQUE (cedula_b);


--
-- Name: bitacora fk_bitacora_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT fk_bitacora_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: familiar_solicitud fk_familiar_solicitud_familiar; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar_solicitud
    ADD CONSTRAINT fk_familiar_solicitud_familiar FOREIGN KEY (id_familiar) REFERENCES public.familiar(id_familiar) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: familiar_solicitud fk_familiar_solicitud_solicitud; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar_solicitud
    ADD CONSTRAINT fk_familiar_solicitud_solicitud FOREIGN KEY (id_solicitud) REFERENCES public.solicitud(id_solicitud) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: solicitud fk_solicitud_beneficiario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_beneficiario FOREIGN KEY (id_beneficiario) REFERENCES public.beneficiario(id_beneficiario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: solicitud fk_solicitud_solicitante; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_solicitante FOREIGN KEY (id_solicitante) REFERENCES public.solicitante(id_solicitante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: solicitud fk_solicitud_tipo_solicitud; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_tipo_solicitud FOREIGN KEY (id_tipo_solicitud) REFERENCES public.tipo_solicitud(id_tipo_solicitud) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: solicitud fk_solicitud_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuario_permiso fk_usuario_permiso; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT fk_usuario_permiso FOREIGN KEY (id_permiso) REFERENCES public.permiso(id_permiso) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuario_permiso fk_usuario_permiso_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT fk_usuario_permiso_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: visita_social fk_visita_social_solicitud; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visita_social
    ADD CONSTRAINT fk_visita_social_solicitud FOREIGN KEY (id_solicitud) REFERENCES public.solicitud(id_solicitud) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

