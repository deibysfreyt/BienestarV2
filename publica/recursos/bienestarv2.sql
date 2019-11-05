--
-- PostgreSQL database dump
--

-- Dumped from database version 10.9
-- Dumped by pg_dump version 10.9

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
-- Name: area_fisica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.area_fisica (
    id_area_fisica integer NOT NULL,
    tipo_vivienda character(11),
    tenencia character(9),
    construccion character(9),
    tipo_piso character(8)
);


ALTER TABLE public.area_fisica OWNER TO postgres;

--
-- Name: TABLE area_fisica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.area_fisica IS 'Característica del hogar en donde vive';


--
-- Name: COLUMN area_fisica.id_area_fisica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_fisica.id_area_fisica IS 'ID';


--
-- Name: COLUMN area_fisica.tipo_vivienda; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_fisica.tipo_vivienda IS 'Forma de construcción';


--
-- Name: COLUMN area_fisica.tenencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_fisica.tenencia IS 'Pertenencia del hogar';


--
-- Name: COLUMN area_fisica.construccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_fisica.construccion IS 'Material del hogar';


--
-- Name: COLUMN area_fisica.tipo_piso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_fisica.tipo_piso IS 'Estado del piso del hogar';


--
-- Name: area_fisica_id_area_fisica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.area_fisica_id_area_fisica_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.area_fisica_id_area_fisica_seq OWNER TO postgres;

--
-- Name: area_fisica_id_area_fisica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.area_fisica_id_area_fisica_seq OWNED BY public.area_fisica.id_area_fisica;


--
-- Name: area_medica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.area_medica (
    id_area_medica integer NOT NULL,
    id_solicitud integer,
    diagnostico character(45),
    motivo_solicitud character(45),
    recursos_disponibles character(9),
    monto_aprobado character(9),
    observacion character(60)
);


ALTER TABLE public.area_medica OWNER TO postgres;

--
-- Name: TABLE area_medica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.area_medica IS 'Datos del estado de Salud del Beneficiario';


--
-- Name: COLUMN area_medica.id_area_medica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_medica.id_area_medica IS 'ID';


--
-- Name: COLUMN area_medica.id_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_medica.id_solicitud IS 'Clave Foránea';


--
-- Name: COLUMN area_medica.diagnostico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_medica.diagnostico IS 'Resumen de Salud';


--
-- Name: COLUMN area_medica.motivo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_medica.motivo_solicitud IS 'Motivo por la cual pide el apoyo';


--
-- Name: COLUMN area_medica.recursos_disponibles; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_medica.recursos_disponibles IS 'Que cantidad u objeto tiene';


--
-- Name: COLUMN area_medica.monto_aprobado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_medica.monto_aprobado IS 'Cantidad monetaria aprobado';


--
-- Name: COLUMN area_medica.observacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.area_medica.observacion IS 'Alguna descripción en cuanto al caso';


--
-- Name: area_medica_id_area_medica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.area_medica_id_area_medica_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.area_medica_id_area_medica_seq OWNER TO postgres;

--
-- Name: area_medica_id_area_medica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.area_medica_id_area_medica_seq OWNED BY public.area_medica.id_area_medica;


--
-- Name: atendidas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.atendidas (
    id_atendidas integer NOT NULL,
    id_medicos integer NOT NULL,
    id_beneficiario integer NOT NULL,
    fecha date NOT NULL,
    lugar character(45) NOT NULL,
    peso character(4),
    talla character(4),
    diagnostico character(100),
    edad character(3)
);


ALTER TABLE public.atendidas OWNER TO postgres;

--
-- Name: TABLE atendidas; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.atendidas IS 'Datos de las Personas que fueron atendida en el Servicio';


--
-- Name: COLUMN atendidas.id_atendidas; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.id_atendidas IS 'Identificador';


--
-- Name: COLUMN atendidas.id_medicos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.id_medicos IS 'Clave Foránea';


--
-- Name: COLUMN atendidas.id_beneficiario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.id_beneficiario IS 'Clave Foráneas';


--
-- Name: COLUMN atendidas.fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.fecha IS 'Fecha atendida';


--
-- Name: COLUMN atendidas.lugar; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.lugar IS 'Área en donde se realizo el servicio';


--
-- Name: COLUMN atendidas.peso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.peso IS 'Kg que pesa';


--
-- Name: COLUMN atendidas.talla; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.talla IS 'Cm que mide la persona';


--
-- Name: COLUMN atendidas.diagnostico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.diagnostico IS 'Observación Medica';


--
-- Name: COLUMN atendidas.edad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.atendidas.edad IS 'Edad de la persona atendida';


--
-- Name: atendidos_id_atendidos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.atendidos_id_atendidos_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.atendidos_id_atendidos_seq OWNER TO postgres;

--
-- Name: atendidos_id_atendidos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.atendidos_id_atendidos_seq OWNED BY public.atendidas.id_atendidas;


--
-- Name: beneficiario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.beneficiario (
    id_beneficiario integer NOT NULL,
    id_solicitante integer NOT NULL,
    cedula integer,
    nombre_apellido character(45) NOT NULL,
    fecha_nacimiento date
);


ALTER TABLE public.beneficiario OWNER TO postgres;

--
-- Name: TABLE beneficiario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.beneficiario IS 'Datos de la persona que esta recibiendo la ayuda directa';


--
-- Name: COLUMN beneficiario.id_beneficiario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.id_beneficiario IS 'ID';


--
-- Name: COLUMN beneficiario.id_solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.id_solicitante IS 'Clave Foránea';


--
-- Name: COLUMN beneficiario.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.cedula IS 'Numero de documento';


--
-- Name: COLUMN beneficiario.nombre_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.nombre_apellido IS 'Nombre y Apellido';


--
-- Name: COLUMN beneficiario.fecha_nacimiento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.beneficiario.fecha_nacimiento IS 'Fecha en que nació';


--
-- Name: beneficiario_id_beneficiario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.beneficiario_id_beneficiario_seq
    AS integer
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
    id_usuario integer NOT NULL,
    fecha_hora date NOT NULL,
    accion character(10) NOT NULL,
    descripcion character(45) NOT NULL
);


ALTER TABLE public.bitacora OWNER TO postgres;

--
-- Name: TABLE bitacora; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.bitacora IS 'Historial y de acciones o movimiento que hizo el usuario en el sistema ';


--
-- Name: COLUMN bitacora.id_bitacora; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.id_bitacora IS 'ID';


--
-- Name: COLUMN bitacora.id_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.id_usuario IS 'Clave Foránea';


--
-- Name: COLUMN bitacora.fecha_hora; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.fecha_hora IS 'Fecha y Hora en que se hizo la la acción';


--
-- Name: COLUMN bitacora.accion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.accion IS 'Que Fue lo que hizo en el Sistema';


--
-- Name: COLUMN bitacora.descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.descripcion IS 'Alguna información especifica en la acción';


--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bitacora_id_bitacora_seq
    AS integer
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
-- Name: citas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.citas (
    id_citas integer NOT NULL,
    id_medicos integer NOT NULL,
    id_beneficiario integer NOT NULL,
    fecha date NOT NULL,
    descripcion character(100),
    estado character(9) NOT NULL
);


ALTER TABLE public.citas OWNER TO postgres;

--
-- Name: TABLE citas; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.citas IS 'Persona que se le asignaron cita';


--
-- Name: COLUMN citas.id_citas; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.citas.id_citas IS 'Identificador';


--
-- Name: COLUMN citas.id_medicos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.citas.id_medicos IS 'Clave Foránea';


--
-- Name: COLUMN citas.id_beneficiario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.citas.id_beneficiario IS 'Clave Foráneas';


--
-- Name: COLUMN citas.fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.citas.fecha IS 'Fecha futura';


--
-- Name: COLUMN citas.descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.citas.descripcion IS 'Breve explicación del motivo de la cita';


--
-- Name: COLUMN citas.estado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.citas.estado IS 'Estado de la cita';


--
-- Name: citas_id_citas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.citas_id_citas_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.citas_id_citas_seq OWNER TO postgres;

--
-- Name: citas_id_citas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.citas_id_citas_seq OWNED BY public.citas.id_citas;


--
-- Name: configuracion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.configuracion (
    id_configuracion integer NOT NULL,
    frecuencia_alerta integer,
    repeticiones integer
);


ALTER TABLE public.configuracion OWNER TO postgres;

--
-- Name: TABLE configuracion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.configuracion IS 'Se Alojara las Alerta del Sistema';


--
-- Name: COLUMN configuracion.frecuencia_alerta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.configuracion.frecuencia_alerta IS 'cada cuanto tiempo es la alertra';


--
-- Name: COLUMN configuracion.repeticiones; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.configuracion.repeticiones IS 'cuantas repeticiones se producirá por eventualidad';


--
-- Name: configuracion_id_configuracion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.configuracion_id_configuracion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.configuracion_id_configuracion_seq OWNER TO postgres;

--
-- Name: configuracion_id_configuracion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.configuracion_id_configuracion_seq OWNED BY public.configuracion.id_configuracion;


--
-- Name: solicitante; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitante (
    id_solicitante integer NOT NULL,
    cedula integer NOT NULL,
    nombre_apellido character(45) NOT NULL,
    fecha_nacimiento date,
    direccion character(100),
    tlf_movil character(11),
    tlf_fijo character(11),
    parroquia character(16),
    ocupacion character(45),
    ingreso character(10),
    estado_civil character(13)
);


ALTER TABLE public.solicitante OWNER TO postgres;

--
-- Name: TABLE solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitante IS 'Datos de la persona a solicitar el beneficio u representante del niño';


--
-- Name: COLUMN solicitante.id_solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.id_solicitante IS 'ID';


--
-- Name: COLUMN solicitante.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.cedula IS 'Numero de Documento';


--
-- Name: COLUMN solicitante.nombre_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.nombre_apellido IS 'Nombre y Apellido';


--
-- Name: COLUMN solicitante.fecha_nacimiento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.fecha_nacimiento IS 'Fecha en que nació';


--
-- Name: COLUMN solicitante.direccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.direccion IS 'Donde reside';


--
-- Name: COLUMN solicitante.tlf_movil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.tlf_movil IS 'Teléfono Celular';


--
-- Name: COLUMN solicitante.tlf_fijo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.tlf_fijo IS 'Teléfono de Casa';


--
-- Name: COLUMN solicitante.parroquia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.parroquia IS 'Área en donde vive';


--
-- Name: COLUMN solicitante.ocupacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.ocupacion IS 'A que se dedica';


--
-- Name: COLUMN solicitante.ingreso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.ingreso IS 'Monto o salario que recibe';


--
-- Name: COLUMN solicitante.estado_civil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.estado_civil IS 'Casado, soltero, divorciado,...';


--
-- Name: datos_s_b; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.datos_s_b AS
 SELECT s.cedula,
    s.nombre_apellido AS solicitante,
    b.nombre_apellido AS beneficiario,
    s.id_solicitante AS id_s,
    b.id_beneficiario AS id_b
   FROM (public.solicitante s
     JOIN public.beneficiario b ON ((s.id_solicitante = b.id_beneficiario)));


ALTER TABLE public.datos_s_b OWNER TO postgres;

--
-- Name: servicios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.servicios (
    id_servicios integer NOT NULL,
    nombre character(45) NOT NULL,
    condicion boolean DEFAULT true NOT NULL,
    descripcion character(60)
);


ALTER TABLE public.servicios OWNER TO postgres;

--
-- Name: TABLE servicios; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.servicios IS 'Se cargara las especialidades o de los Servicios que la F.N. Ofrece al Publico';


--
-- Name: COLUMN servicios.id_servicios; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.servicios.id_servicios IS 'Identificador';


--
-- Name: COLUMN servicios.nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.servicios.nombre IS 'Nombre del Servicio';


--
-- Name: COLUMN servicios.condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.servicios.condicion IS 'Estado o Disponibilidad de la especialidad';


--
-- Name: COLUMN servicios.descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.servicios.descripcion IS 'Descripción de la especialidad';


--
-- Name: especialidad_id_especialidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.especialidad_id_especialidad_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.especialidad_id_especialidad_seq OWNER TO postgres;

--
-- Name: especialidad_id_especialidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.especialidad_id_especialidad_seq OWNED BY public.servicios.id_servicios;


--
-- Name: familiar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.familiar (
    id_familiar integer NOT NULL,
    nombre_apellido character(45) NOT NULL,
    edad character(3),
    parentesco character(30),
    ocupacion character(45),
    observacion character(45)
);


ALTER TABLE public.familiar OWNER TO postgres;

--
-- Name: TABLE familiar; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.familiar IS 'Datos de los Familiares que la persona convive';


--
-- Name: COLUMN familiar.id_familiar; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar.id_familiar IS 'ID';


--
-- Name: COLUMN familiar.nombre_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar.nombre_apellido IS 'Nombre y Apellido';


--
-- Name: COLUMN familiar.edad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar.edad IS 'Edad que posee el familiar';


--
-- Name: COLUMN familiar.parentesco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar.parentesco IS 'Relación de sangre con el solicitante';


--
-- Name: COLUMN familiar.ocupacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar.ocupacion IS 'Que se dedica';


--
-- Name: COLUMN familiar.observacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar.observacion IS 'Alguna información adicional que se desea guardar';


--
-- Name: familiar_id_familiar_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.familiar_id_familiar_seq
    AS integer
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
    id_familiar integer NOT NULL,
    id_solicitud integer NOT NULL
);


ALTER TABLE public.familiar_solicitud OWNER TO postgres;

--
-- Name: TABLE familiar_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.familiar_solicitud IS 'Tabla puente para una relación de muchos a muchos';


--
-- Name: COLUMN familiar_solicitud.id_familiar_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar_solicitud.id_familiar_solicitud IS 'ID';


--
-- Name: COLUMN familiar_solicitud.id_familiar; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar_solicitud.id_familiar IS 'Clave Foránea';


--
-- Name: COLUMN familiar_solicitud.id_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.familiar_solicitud.id_solicitud IS 'Clave Foráneas';


--
-- Name: familiar_solicitud_id_familiar_solicitud_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.familiar_solicitud_id_familiar_solicitud_seq
    AS integer
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
-- Name: medicos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.medicos (
    id_medicos integer NOT NULL,
    nombre_apellido character(45) NOT NULL,
    cedula integer NOT NULL,
    cargo character(45),
    tlf character(11),
    condicion boolean DEFAULT true NOT NULL,
    especialidad character(45)
);


ALTER TABLE public.medicos OWNER TO postgres;

--
-- Name: TABLE medicos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.medicos IS 'Datos de los Médicos o Profesionales en el Área de salud';


--
-- Name: COLUMN medicos.id_medicos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.medicos.id_medicos IS 'Identificador';


--
-- Name: COLUMN medicos.nombre_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.medicos.nombre_apellido IS 'Nombre y Apellido';


--
-- Name: COLUMN medicos.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.medicos.cedula IS 'ID de la persona';


--
-- Name: COLUMN medicos.cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.medicos.cargo IS 'que posición tiene';


--
-- Name: COLUMN medicos.tlf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.medicos.tlf IS 'numero de contacto';


--
-- Name: COLUMN medicos.condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.medicos.condicion IS 'Disponibilidad del medico en la fundación';


--
-- Name: COLUMN medicos.especialidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.medicos.especialidad IS 'Titulo o estudio realizado';


--
-- Name: medicos_id_medico_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.medicos_id_medico_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.medicos_id_medico_seq OWNER TO postgres;

--
-- Name: medicos_id_medico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.medicos_id_medico_seq OWNED BY public.medicos.id_medicos;


--
-- Name: mostrar_s; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.mostrar_s AS
 SELECT solicitante.id_solicitante,
    solicitante.cedula,
    solicitante.nombre_apellido,
    solicitante.fecha_nacimiento,
    solicitante.direccion,
    solicitante.tlf_movil,
    solicitante.tlf_fijo,
    solicitante.parroquia,
    solicitante.ocupacion,
    solicitante.ingreso,
    solicitante.estado_civil
   FROM public.solicitante;


ALTER TABLE public.mostrar_s OWNER TO postgres;

--
-- Name: mostrar_s_b; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.mostrar_s_b AS
 SELECT s.id_solicitante,
    s.cedula,
    s.nombre_apellido,
    s.fecha_nacimiento,
    s.direccion,
    s.tlf_movil,
    s.tlf_fijo,
    s.parroquia,
    s.ocupacion,
    s.ingreso,
    s.estado_civil,
    b.id_beneficiario,
    b.cedula AS cedula_b,
    b.nombre_apellido AS nombre_apellido_b,
    b.fecha_nacimiento AS fecha_nacimiento_b
   FROM (public.solicitante s
     JOIN public.beneficiario b ON ((s.id_solicitante = b.id_beneficiario)));


ALTER TABLE public.mostrar_s_b OWNER TO postgres;

--
-- Name: permiso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permiso (
    id_permiso integer NOT NULL,
    nombre integer NOT NULL
);


ALTER TABLE public.permiso OWNER TO postgres;

--
-- Name: TABLE permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.permiso IS 'Todos los acceso al sistema';


--
-- Name: COLUMN permiso.id_permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.permiso.id_permiso IS 'ID';


--
-- Name: COLUMN permiso.nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.permiso.nombre IS 'Nombre de Permiso o Acceso al Sistema';


--
-- Name: permiso_id_permiso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permiso_id_permiso_seq
    AS integer
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
-- Name: servicios_medicos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.servicios_medicos (
    id_servicios_medicos integer NOT NULL,
    id_servicios integer NOT NULL,
    id_medicos integer NOT NULL
);


ALTER TABLE public.servicios_medicos OWNER TO postgres;

--
-- Name: servicios_medicos_id_servicios_medicos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.servicios_medicos_id_servicios_medicos_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.servicios_medicos_id_servicios_medicos_seq OWNER TO postgres;

--
-- Name: servicios_medicos_id_servicios_medicos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.servicios_medicos_id_servicios_medicos_seq OWNED BY public.servicios_medicos.id_servicios_medicos;


--
-- Name: solicitante_id_solicitante_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitante_id_solicitante_seq
    AS integer
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
    id_usuario integer,
    id_beneficiario integer,
    id_tipo_solicitud integer,
    id_area_fisica integer,
    fecha date,
    semana_embarazo character(3),
    estado character(11)
);


ALTER TABLE public.solicitud OWNER TO postgres;

--
-- Name: TABLE solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitud IS 'El Corazón del Sistema, en donde casi todas las tablas se relacionan y forma el Informe Social';


--
-- Name: COLUMN solicitud.id_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_solicitud IS 'ID';


--
-- Name: COLUMN solicitud.id_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_usuario IS 'Clave Foránea';


--
-- Name: COLUMN solicitud.id_beneficiario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_beneficiario IS 'Clave Foráneas';


--
-- Name: COLUMN solicitud.id_tipo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_tipo_solicitud IS 'Clave Foráneas';


--
-- Name: COLUMN solicitud.id_area_fisica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.id_area_fisica IS 'Clave Foráneas';


--
-- Name: COLUMN solicitud.fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.fecha IS 'Fecha en donde se emitió la solicitud';


--
-- Name: COLUMN solicitud.semana_embarazo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.semana_embarazo IS 'Semana de embarazo en caso de Canastilla';


--
-- Name: COLUMN solicitud.estado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud.estado IS 'Aprobado, En espera o No aprobado';


--
-- Name: solicitud_id_solicitud_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitud_id_solicitud_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_id_solicitud_seq OWNER TO postgres;

--
-- Name: solicitud_id_solicitud_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitud_id_solicitud_seq OWNED BY public.solicitud.id_solicitud;


--
-- Name: tipo_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_solicitud (
    id_tipo_solicitud integer NOT NULL,
    solicitud character(45) NOT NULL,
    descripcion character(45) NOT NULL,
    condicion boolean NOT NULL
);


ALTER TABLE public.tipo_solicitud OWNER TO postgres;

--
-- Name: TABLE tipo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tipo_solicitud IS 'Donde se registrara todas las Solicitudes que la fundación quiere o están ofreciendo';


--
-- Name: COLUMN tipo_solicitud.id_tipo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.id_tipo_solicitud IS 'ID';


--
-- Name: COLUMN tipo_solicitud.solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.solicitud IS 'La categoría de la Solicitud';


--
-- Name: COLUMN tipo_solicitud.descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.descripcion IS 'Descripción especifica de la solicitud';


--
-- Name: COLUMN tipo_solicitud.condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_solicitud.condicion IS 'Estado de la Solicitud';


--
-- Name: tipo_solicitud_id_tipo_solicitud_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_solicitud_id_tipo_solicitud_seq
    AS integer
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
    cedula integer NOT NULL,
    nombre_apellido character(45) NOT NULL,
    cargo character(30),
    username character(20) NOT NULL,
    password character(64) NOT NULL,
    condicion boolean DEFAULT true
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: TABLE usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.usuario IS 'Datos de las persona que van a manipular el Sistema';


--
-- Name: COLUMN usuario.id_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.id_usuario IS 'ID';


--
-- Name: COLUMN usuario.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.cedula IS 'Numero de Documento';


--
-- Name: COLUMN usuario.nombre_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.nombre_apellido IS 'Nombre y Apellido';


--
-- Name: COLUMN usuario.cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.cargo IS 'Grado de responsabilidad';


--
-- Name: COLUMN usuario.username; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.username IS 'Nombre para entra en el Sistema';


--
-- Name: COLUMN usuario.password; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.password IS 'Contraseña encriptada';


--
-- Name: COLUMN usuario.condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.condicion IS 'Estado del usuario en el Sistema';


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_usuario_seq
    AS integer
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

COMMENT ON TABLE public.usuario_permiso IS 'Tabla puente para una relación de muchos a muchos';


--
-- Name: COLUMN usuario_permiso.id_usuario_permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario_permiso.id_usuario_permiso IS 'ID';


--
-- Name: COLUMN usuario_permiso.id_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario_permiso.id_usuario IS 'Clave Foránea';


--
-- Name: COLUMN usuario_permiso.id_permiso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario_permiso.id_permiso IS 'Clave Foráneas';


--
-- Name: usuario_permiso_id_usuario_permiso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_permiso_id_usuario_permiso_seq
    AS integer
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
    observaciones character(100),
    fecha date
);


ALTER TABLE public.visita_social OWNER TO postgres;

--
-- Name: TABLE visita_social; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.visita_social IS 'Hogares que ya fueron visitado y observado';


--
-- Name: COLUMN visita_social.id_visita_social; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.id_visita_social IS 'ID';


--
-- Name: COLUMN visita_social.id_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.id_solicitud IS 'Clave Foránea';


--
-- Name: COLUMN visita_social.observaciones; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.observaciones IS 'Característica o información de la visita';


--
-- Name: COLUMN visita_social.fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.visita_social.fecha IS 'Fecha en que se hizo la visita';


--
-- Name: visita_social_id_visita_social_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.visita_social_id_visita_social_seq
    AS integer
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
-- Name: area_fisica id_area_fisica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.area_fisica ALTER COLUMN id_area_fisica SET DEFAULT nextval('public.area_fisica_id_area_fisica_seq'::regclass);


--
-- Name: area_medica id_area_medica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.area_medica ALTER COLUMN id_area_medica SET DEFAULT nextval('public.area_medica_id_area_medica_seq'::regclass);


--
-- Name: atendidas id_atendidas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.atendidas ALTER COLUMN id_atendidas SET DEFAULT nextval('public.atendidos_id_atendidos_seq'::regclass);


--
-- Name: beneficiario id_beneficiario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.beneficiario ALTER COLUMN id_beneficiario SET DEFAULT nextval('public.beneficiario_id_beneficiario_seq'::regclass);


--
-- Name: bitacora id_bitacora; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora ALTER COLUMN id_bitacora SET DEFAULT nextval('public.bitacora_id_bitacora_seq'::regclass);


--
-- Name: citas id_citas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.citas ALTER COLUMN id_citas SET DEFAULT nextval('public.citas_id_citas_seq'::regclass);


--
-- Name: configuracion id_configuracion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.configuracion ALTER COLUMN id_configuracion SET DEFAULT nextval('public.configuracion_id_configuracion_seq'::regclass);


--
-- Name: familiar id_familiar; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar ALTER COLUMN id_familiar SET DEFAULT nextval('public.familiar_id_familiar_seq'::regclass);


--
-- Name: familiar_solicitud id_familiar_solicitud; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar_solicitud ALTER COLUMN id_familiar_solicitud SET DEFAULT nextval('public.familiar_solicitud_id_familiar_solicitud_seq'::regclass);


--
-- Name: medicos id_medicos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medicos ALTER COLUMN id_medicos SET DEFAULT nextval('public.medicos_id_medico_seq'::regclass);


--
-- Name: permiso id_permiso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso ALTER COLUMN id_permiso SET DEFAULT nextval('public.permiso_id_permiso_seq'::regclass);


--
-- Name: servicios id_servicios; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios ALTER COLUMN id_servicios SET DEFAULT nextval('public.especialidad_id_especialidad_seq'::regclass);


--
-- Name: servicios_medicos id_servicios_medicos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios_medicos ALTER COLUMN id_servicios_medicos SET DEFAULT nextval('public.servicios_medicos_id_servicios_medicos_seq'::regclass);


--
-- Name: solicitante id_solicitante; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante ALTER COLUMN id_solicitante SET DEFAULT nextval('public.solicitante_id_solicitante_seq'::regclass);


--
-- Name: solicitud id_solicitud; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud ALTER COLUMN id_solicitud SET DEFAULT nextval('public.solicitud_id_solicitud_seq'::regclass);


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
-- Data for Name: area_fisica; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: area_medica; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: atendidas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: beneficiario; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: bitacora; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: citas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: configuracion; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: familiar; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: familiar_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: medicos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.medicos VALUES (1, 'Deibys                                       ', 19640186, 'Analista                                     ', '04263562547', false, 'Informatica                                  ');


--
-- Data for Name: permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: servicios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.servicios VALUES (1, 'odontologia                                  ', false, 'todo con la geta                                            ');


--
-- Data for Name: servicios_medicos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: solicitante; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: tipo_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario VALUES (1, 19640186, 'Deibys frteytez                              ', 'Analista                      ', 'Deibys              ', '123456                                                          ', true);


--
-- Data for Name: usuario_permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: visita_social; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: area_fisica_id_area_fisica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.area_fisica_id_area_fisica_seq', 1, false);


--
-- Name: area_medica_id_area_medica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.area_medica_id_area_medica_seq', 1, false);


--
-- Name: atendidos_id_atendidos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.atendidos_id_atendidos_seq', 1, false);


--
-- Name: beneficiario_id_beneficiario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.beneficiario_id_beneficiario_seq', 1, false);


--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bitacora_id_bitacora_seq', 1, false);


--
-- Name: citas_id_citas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.citas_id_citas_seq', 1, false);


--
-- Name: configuracion_id_configuracion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.configuracion_id_configuracion_seq', 1, false);


--
-- Name: especialidad_id_especialidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.especialidad_id_especialidad_seq', 1, true);


--
-- Name: familiar_id_familiar_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.familiar_id_familiar_seq', 1, false);


--
-- Name: familiar_solicitud_id_familiar_solicitud_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.familiar_solicitud_id_familiar_solicitud_seq', 1, false);


--
-- Name: medicos_id_medico_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.medicos_id_medico_seq', 1, true);


--
-- Name: permiso_id_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permiso_id_permiso_seq', 1, false);


--
-- Name: servicios_medicos_id_servicios_medicos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.servicios_medicos_id_servicios_medicos_seq', 1, false);


--
-- Name: solicitante_id_solicitante_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitante_id_solicitante_seq', 1, false);


--
-- Name: solicitud_id_solicitud_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitud_id_solicitud_seq', 1, false);


--
-- Name: tipo_solicitud_id_tipo_solicitud_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_solicitud_id_tipo_solicitud_seq', 1, false);


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_usuario_seq', 1, true);


--
-- Name: usuario_permiso_id_usuario_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_permiso_id_usuario_permiso_seq', 1, false);


--
-- Name: visita_social_id_visita_social_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.visita_social_id_visita_social_seq', 1, false);


--
-- Name: area_fisica area_fisica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.area_fisica
    ADD CONSTRAINT area_fisica_pkey PRIMARY KEY (id_area_fisica);


--
-- Name: area_medica area_medica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.area_medica
    ADD CONSTRAINT area_medica_pkey PRIMARY KEY (id_area_medica);


--
-- Name: atendidas atendidos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.atendidas
    ADD CONSTRAINT atendidos_pkey PRIMARY KEY (id_atendidas);


--
-- Name: beneficiario beneficiario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.beneficiario
    ADD CONSTRAINT beneficiario_pkey PRIMARY KEY (id_beneficiario);


--
-- Name: bitacora bitacora_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT bitacora_pkey PRIMARY KEY (id_bitacora);


--
-- Name: citas citas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.citas
    ADD CONSTRAINT citas_pkey PRIMARY KEY (id_citas);


--
-- Name: configuracion configuracion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.configuracion
    ADD CONSTRAINT configuracion_pkey PRIMARY KEY (id_configuracion);


--
-- Name: servicios especialidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios
    ADD CONSTRAINT especialidad_pkey PRIMARY KEY (id_servicios);


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
-- Name: medicos medicos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medicos
    ADD CONSTRAINT medicos_pkey PRIMARY KEY (id_medicos);


--
-- Name: permiso permiso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso
    ADD CONSTRAINT permiso_pkey PRIMARY KEY (id_permiso);


--
-- Name: servicios_medicos servicios_medicos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios_medicos
    ADD CONSTRAINT servicios_medicos_pkey PRIMARY KEY (id_servicios_medicos);


--
-- Name: solicitante solicitante_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante
    ADD CONSTRAINT solicitante_cedula_key UNIQUE (cedula);


--
-- Name: solicitante solicitante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante
    ADD CONSTRAINT solicitante_pkey PRIMARY KEY (id_solicitante);


--
-- Name: solicitud solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT solicitud_pkey PRIMARY KEY (id_solicitud);


--
-- Name: tipo_solicitud tipo_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_solicitud
    ADD CONSTRAINT tipo_solicitud_pkey PRIMARY KEY (id_tipo_solicitud);


--
-- Name: medicos uq_cedula; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medicos
    ADD CONSTRAINT uq_cedula UNIQUE (cedula);


--
-- Name: usuario usuario_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_cedula_key UNIQUE (cedula);


--
-- Name: usuario_permiso usuario_permiso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT usuario_permiso_pkey PRIMARY KEY (id_usuario_permiso);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: visita_social visita_social_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visita_social
    ADD CONSTRAINT visita_social_pkey PRIMARY KEY (id_visita_social);


--
-- Name: area_medica fk_area_fisica_solicitud; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.area_medica
    ADD CONSTRAINT fk_area_fisica_solicitud FOREIGN KEY (id_solicitud) REFERENCES public.solicitud(id_solicitud) ON UPDATE CASCADE;


--
-- Name: atendidas fk_atendidos_beneficiario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.atendidas
    ADD CONSTRAINT fk_atendidos_beneficiario FOREIGN KEY (id_beneficiario) REFERENCES public.beneficiario(id_beneficiario) ON UPDATE CASCADE;


--
-- Name: atendidas fk_atendidos_medico; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.atendidas
    ADD CONSTRAINT fk_atendidos_medico FOREIGN KEY (id_medicos) REFERENCES public.medicos(id_medicos) ON UPDATE CASCADE;


--
-- Name: beneficiario fk_beneficiario_solicitante; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.beneficiario
    ADD CONSTRAINT fk_beneficiario_solicitante FOREIGN KEY (id_solicitante) REFERENCES public.solicitante(id_solicitante) ON UPDATE CASCADE;


--
-- Name: bitacora fk_bitacora_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT fk_bitacora_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE;


--
-- Name: citas fk_citas_beneficiario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.citas
    ADD CONSTRAINT fk_citas_beneficiario FOREIGN KEY (id_beneficiario) REFERENCES public.beneficiario(id_beneficiario) ON UPDATE CASCADE;


--
-- Name: citas fk_citas_medico; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.citas
    ADD CONSTRAINT fk_citas_medico FOREIGN KEY (id_medicos) REFERENCES public.medicos(id_medicos) ON UPDATE CASCADE;


--
-- Name: familiar_solicitud fk_familiar_solicitud_familiar; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar_solicitud
    ADD CONSTRAINT fk_familiar_solicitud_familiar FOREIGN KEY (id_familiar) REFERENCES public.familiar(id_familiar) ON UPDATE CASCADE;


--
-- Name: familiar_solicitud fk_familiar_solicitud_solicitud; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familiar_solicitud
    ADD CONSTRAINT fk_familiar_solicitud_solicitud FOREIGN KEY (id_solicitud) REFERENCES public.solicitud(id_solicitud) ON UPDATE CASCADE;


--
-- Name: servicios_medicos fk_s_m_m; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios_medicos
    ADD CONSTRAINT fk_s_m_m FOREIGN KEY (id_medicos) REFERENCES public.medicos(id_medicos) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: servicios_medicos fk_s_m_s; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios_medicos
    ADD CONSTRAINT fk_s_m_s FOREIGN KEY (id_servicios) REFERENCES public.servicios(id_servicios) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: solicitud fk_solicitud_area_fisica; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_area_fisica FOREIGN KEY (id_area_fisica) REFERENCES public.area_fisica(id_area_fisica) ON UPDATE CASCADE;


--
-- Name: solicitud fk_solicitud_beneficario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_beneficario FOREIGN KEY (id_beneficiario) REFERENCES public.beneficiario(id_beneficiario) ON UPDATE CASCADE;


--
-- Name: solicitud fk_solicitud_tipo_solicitud; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_tipo_solicitud FOREIGN KEY (id_tipo_solicitud) REFERENCES public.tipo_solicitud(id_tipo_solicitud) ON UPDATE CASCADE;


--
-- Name: solicitud fk_solicitud_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_solicitud_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE;


--
-- Name: usuario_permiso fk_usuario_permiso_permiso; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT fk_usuario_permiso_permiso FOREIGN KEY (id_permiso) REFERENCES public.permiso(id_permiso) ON UPDATE CASCADE;


--
-- Name: usuario_permiso fk_usuario_permiso_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT fk_usuario_permiso_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE;


--
-- PostgreSQL database dump complete
--

