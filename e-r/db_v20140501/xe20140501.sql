/*==============================================================*/
/* DBMS name:      ORACLE Version 10gR2                         */
/* Created on:     01/05/2014 18:12:56                          */
/*==============================================================*/


alter table CARTA
   drop constraint FK_CARTA_CAR_EMP_I_EMPRESA_;

alter table CARTA
   drop constraint FK_CARTA_CAR_OBR_I_OBRA;

alter table CARTA
   drop constraint FK_CARTA_CAR_TIP_C_TIPO_CAR;

alter table CARTA
   drop constraint FK_CARTA_CAR_US_CO_VISTA_US;

alter table CARTA_DESTINATARIO
   drop constraint FK_CARTA_DE_CAR_DES_C_CARTA;

alter table CARTA_DESTINATARIO
   drop constraint FK_CARTA_DE_CAR_DES_C_CONTACTO;

alter table CARTA_FIRMA
   drop constraint FK_CARTA_FI_CAR_FIR_C_CARTA;

alter table CARTA_FIRMA
   drop constraint FK_CARTA_FI_CAR_FIR_E_EMPLEADO;

alter table CIUDAD
   drop constraint FK_CIUDAD_CIU_EST_I_ESTADO;

alter table CONTACTO
   drop constraint FK_CONTACTO_CON_CAR_I_CARGO;

alter table CONTACTO
   drop constraint FK_CONTACTO_CON_CIU_I_CIUDAD;

alter table CONTACTO
   drop constraint FK_CONTACTO_CON_TIP_P_TIPO_PER;

alter table CONTACTO_RELACIONADO
   drop constraint FK_CONTACTO_CON_REL_C_CONTACTO;

alter table CONTACTO_RELACIONADO
   drop constraint FK_CONTACTO_CON_REL_T_TIPO_CON;

alter table DESPEDIDA
   drop constraint FK_DESPEDID_DES_CAR_I_CARTA;

alter table DETALLE_CONTACTO
   drop constraint FK_DETALLE__DET_CON_C_CONTACTO;

alter table DETALLE_CONTACTO
   drop constraint FK_DETALLE__DET_CON_E_EMPRESA;

alter table DETALLE_CONTACTO
   drop constraint FK_DETALLE__DET_CON_T_TIPO_TEL;

alter table DETALLE_USUARIO
   drop constraint FK_DETALLE__USU_VIS_U_VISTA_US;

alter table EMPLEADO
   drop constraint FK_EMPLEADO_EMP_CAR_I_CARGO;

alter table EMPLEADO
   drop constraint FK_EMPLEADO_EMP_EMP_I_EMPRESA_;

alter table EMPRESA
   drop constraint FK_EMPRESA_EMP_CAT_E_CATEGORI;

alter table EMPRESA
   drop constraint FK_EMPRESA_EMP_CIU_I_CIUDAD;

alter table EMPRESA
   drop constraint FK_EMPRESA_RELATIONS_EMPRESA;

alter table ESTADO
   drop constraint FK_ESTADO_EST_PAI_I_PAIS;

alter table FE_RECEPCION
   drop constraint FK_FE_RECEP_FE_REC_VI_VISTA_US;

alter table OBRA
   drop constraint FK_OBRA_OBR_PRO_I_PROYECTO;

alter table ROL_APLICACION
   drop constraint FK_ROL_APLI_ROL_APL_A_APLICACI;

alter table ROL_APLICACION
   drop constraint FK_ROL_APLI_ROL_APL_R_ROL;

alter table ROL_USUARIO
   drop constraint FK_ROL_USUA_ROL_USU_R_ROL;

alter table ROL_USUARIO
   drop constraint FK_ROL_USUA_ROL_USU_U_VISTA_US;

alter table SALUDO
   drop constraint FK_SALUDO_SAL_CAR_I_CARTA;

drop table APLICACION cascade constraints;

drop table CARGO cascade constraints;

drop index CAR_OBR_ID_FK;

drop index CAR_EMP_INT_ID_FK;

drop index CAR_TIP_CAR_ID_FK;

drop index CAR_US_CODIGO_FK;

drop table CARTA cascade constraints;

drop index CAR_DES_CON_ID_FK;

drop index CAR_DES_CAR_ID_FK;

drop table CARTA_DESTINATARIO cascade constraints;

drop index CAR_FIR_CAR_ID_FK;

drop index CAR_FIR_EPL_ID_FK;

drop table CARTA_FIRMA cascade constraints;

drop table CATEGORIA_EMPRESA cascade constraints;

drop index CIU_EST_ID_FK;

drop table CIUDAD cascade constraints;

drop index CON_CAR_ID_FK;

drop index CON_CIU_ID_FK;

drop index CON_TIP_PER_ID_FK;

drop table CONTACTO cascade constraints;

drop index CON_REL_CON_ID_FK;

drop index CON_REL_TIP_CON_ID_FK;

drop table CONTACTO_RELACIONADO cascade constraints;

drop index DES_CAR_ID_FK;

drop table DESPEDIDA cascade constraints;

drop index DET_CON_TIP_TEL_ID_FK;

drop index DET_CON_EMP_ID_FK;

drop index DET_CON_CON_ID_FK;

drop table DETALLE_CONTACTO cascade constraints;

drop table DETALLE_USUARIO cascade constraints;

drop index EMP_CAR_ID_FK;

drop index EMP_EMP_INT_ID_FK;

drop table EMPLEADO cascade constraints;

drop index RELATIONSHIP_32_FK;

drop index EMP_CIU_ID_FK;

drop index EMP_CAT_EMP_ID_FK;

drop table EMPRESA cascade constraints;

drop table EMPRESA_INTERNA cascade constraints;

drop index EST_PAI_ID_FK;

drop table ESTADO cascade constraints;

drop index FE_REC_VIS_US_CODIGO_FK;

drop table FE_RECEPCION cascade constraints;

drop index OBR_PRO_ID_FK;

drop table OBRA cascade constraints;

drop table PAIS cascade constraints;

drop table PROYECTO cascade constraints;

drop table ROL cascade constraints;

drop index ROL_APL_APL_ID_FK;

drop index ROL_APL_ROL_ID_FK;

drop table ROL_APLICACION cascade constraints;

drop index ROL_USU_US_CODIGO_FK;

drop index ROL_USU_ROL_ID_FK;

drop table ROL_USUARIO cascade constraints;

drop index SAL_CAR_ID_FK;

drop table SALUDO cascade constraints;

drop table TIPO_CARTA cascade constraints;

drop table TIPO_CONTACTO cascade constraints;

drop table TIPO_PERSONA cascade constraints;

drop table TIPO_TELEFONO cascade constraints;

drop table VISTA_USUARIO cascade constraints;

drop sequence S_APLICACION;

drop sequence S_CARGO;

drop sequence S_CARTA;

drop sequence S_CATEGORIA_EMPRESA;

drop sequence S_CIUDAD;

drop sequence S_CONTACTO;

drop sequence S_CONTACTO_RELACIONADO;

drop sequence S_DESPEDIDA;

drop sequence S_DETALLE_CONTACTO;

drop sequence S_EMPLEADO;

drop sequence S_EMPRESA;

drop sequence S_EMPRESA_INTERNA;

drop sequence S_ESTADO;

drop sequence S_FE_RECEPCION;

drop sequence S_OBRA;

drop sequence S_PAIS;

drop sequence S_PROYECTO;

drop sequence S_ROL;

drop sequence S_SALUDO;

drop sequence S_TIPO_CARTA;

drop sequence S_TIPO_CONTACTO;

drop sequence S_TIPO_PERSONA;

drop sequence S_TIPO_TELEFONO;

create sequence S_APLICACION;

create sequence S_CARGO;

create sequence S_CARTA;

create sequence S_CATEGORIA_EMPRESA;

create sequence S_CIUDAD;

create sequence S_CONTACTO;

create sequence S_CONTACTO_RELACIONADO;

create sequence S_DESPEDIDA;

create sequence S_DETALLE_CONTACTO;

create sequence S_EMPLEADO;

create sequence S_EMPRESA;

create sequence S_EMPRESA_INTERNA;

create sequence S_ESTADO;

create sequence S_FE_RECEPCION;

create sequence S_OBRA;

create sequence S_PAIS;

create sequence S_PROYECTO;

create sequence S_ROL;

create sequence S_SALUDO;

create sequence S_TIPO_CARTA;

create sequence S_TIPO_CONTACTO;

create sequence S_TIPO_PERSONA;

create sequence S_TIPO_TELEFONO;

/*==============================================================*/
/* Table: APLICACION                                            */
/*==============================================================*/
create table APLICACION  (
   APL_ID               NUMBER(3)                       not null,
   APL_DESCRIPCION      VARCHAR2(70)                    not null,
   constraint PK_APLICACION primary key (APL_ID)
);

/*==============================================================*/
/* Table: CARGO                                                 */
/*==============================================================*/
create table CARGO  (
   CAR_ID               NUMBER(6)                       not null,
   CAR_DESCRIPCION_ES   VARCHAR2(80)                    not null,
   CAR_DESCRIPCION_EN   VARCHAR2(80)                    not null,
   constraint PK_CARGO primary key (CAR_ID)
);

/*==============================================================*/
/* Table: CARTA                                                 */
/*==============================================================*/
create table CARTA  (
   CTR_ID               NUMBER(11)                      not null,
   OBR_ID               NUMBER(11),
   EMP_INT_ID           NUMBER(3),
   US_CODIGO            VARCHAR2(20),
   TIP_CAR_ID           NUMBER(2),
   CTR_IDIOMA           CHAR(1)                         not null,
   CTR_FECHA_CREACION   DATE                            not null,
   CTR_CUERPO           CLOB                            not null,
   CTR_TIPO             CHAR(1)                         not null,
   CTR_CODIGO_FINAL     VARCHAR2(30)                    not null,
   CTR_FECHA_ACTUALIZACION DATE                            not null,
   CTR_REFERENCIA       VARCHAR2(300),
   constraint PK_CARTA primary key (CTR_ID)
);

/*==============================================================*/
/* Index: CAR_US_CODIGO_FK                                      */
/*==============================================================*/
create index CAR_US_CODIGO_FK on CARTA (
   US_CODIGO ASC
);

/*==============================================================*/
/* Index: CAR_TIP_CAR_ID_FK                                     */
/*==============================================================*/
create index CAR_TIP_CAR_ID_FK on CARTA (
   TIP_CAR_ID ASC
);

/*==============================================================*/
/* Index: CAR_EMP_INT_ID_FK                                     */
/*==============================================================*/
create index CAR_EMP_INT_ID_FK on CARTA (
   EMP_INT_ID ASC
);

/*==============================================================*/
/* Index: CAR_OBR_ID_FK                                         */
/*==============================================================*/
create index CAR_OBR_ID_FK on CARTA (
   OBR_ID ASC
);

/*==============================================================*/
/* Table: CARTA_DESTINATARIO                                    */
/*==============================================================*/
create table CARTA_DESTINATARIO  (
   CTR_ID               NUMBER(11)                      not null,
   CON_ID               NUMBER(11)                      not null,
   CAR_DES_PRINCIPAL    CHAR(1)                         not null,
   constraint PK_CARTA_DESTINATARIO primary key (CTR_ID, CON_ID)
);

/*==============================================================*/
/* Index: CAR_DES_CAR_ID_FK                                     */
/*==============================================================*/
create index CAR_DES_CAR_ID_FK on CARTA_DESTINATARIO (
   CTR_ID ASC
);

/*==============================================================*/
/* Index: CAR_DES_CON_ID_FK                                     */
/*==============================================================*/
create index CAR_DES_CON_ID_FK on CARTA_DESTINATARIO (
   CON_ID ASC
);

/*==============================================================*/
/* Table: CARTA_FIRMA                                           */
/*==============================================================*/
create table CARTA_FIRMA  (
   EPL_ID               NUMBER(11)                      not null,
   CTR_ID               NUMBER(11)                      not null,
   constraint PK_CARTA_FIRMA primary key (EPL_ID, CTR_ID)
);

/*==============================================================*/
/* Index: CAR_FIR_EPL_ID_FK                                     */
/*==============================================================*/
create index CAR_FIR_EPL_ID_FK on CARTA_FIRMA (
   EPL_ID ASC
);

/*==============================================================*/
/* Index: CAR_FIR_CAR_ID_FK                                     */
/*==============================================================*/
create index CAR_FIR_CAR_ID_FK on CARTA_FIRMA (
   CTR_ID ASC
);

/*==============================================================*/
/* Table: CATEGORIA_EMPRESA                                     */
/*==============================================================*/
create table CATEGORIA_EMPRESA  (
   CAT_EMP_ID           NUMBER(4)                       not null,
   CAT_EMP_DESCRIPCION  VARCHAR2(100)                   not null,
   constraint PK_CATEGORIA_EMPRESA primary key (CAT_EMP_ID)
);

/*==============================================================*/
/* Table: CIUDAD                                                */
/*==============================================================*/
create table CIUDAD  (
   CIU_ID               NUMBER(11)                      not null,
   EST_ID               NUMBER(4),
   CIU_NOMBRE           VARCHAR2(150)                   not null,
   CIU_CODIGO_TELEFONO  VARCHAR2(5)                     not null,
   constraint PK_CIUDAD primary key (CIU_ID)
);

/*==============================================================*/
/* Index: CIU_EST_ID_FK                                         */
/*==============================================================*/
create index CIU_EST_ID_FK on CIUDAD (
   EST_ID ASC
);

/*==============================================================*/
/* Table: CONTACTO                                              */
/*==============================================================*/
create table CONTACTO  (
   CON_ID               NUMBER(11)                      not null,
   CAR_ID               NUMBER(6),
   TIP_PER_ID           NUMBER(3),
   CIU_ID               NUMBER(11),
   CON_NOMBRE           VARCHAR2(35)                    not null,
   CON_APELLIDO         VARCHAR2(35)                    not null,
   CON_EMAIL            VARCHAR2(150)                   not null,
   CON_OBSERVACIONES    CLOB,
   CON_IDIOMA           CHAR(1)                         not null,
   CON_USUARIO          VARCHAR2(20)                    not null,
   CON_FECHA_ACTUALIZACION DATE                            not null,
   CON_PRIVADO          CHAR(1)                         not null,
   CON_FECHA_NACIMIENTO DATE,
   CON_DIRECCION_DOMICILIO VARCHAR2(150),
   CON_EMAIL_PERSONAL   VARCHAR2(150),
   CON_CODIGO_PAIS      VARCHAR2(5),
   CON_CODIGO_CIUDAD    VARCHAR2(5),
   CON_TELEFONO_DOMICILIO VARCHAR2(15),
   CON_CELULAR_PERSONAL VARCHAR2(15),
   constraint PK_CONTACTO primary key (CON_ID)
);

/*==============================================================*/
/* Index: CON_TIP_PER_ID_FK                                     */
/*==============================================================*/
create index CON_TIP_PER_ID_FK on CONTACTO (
   TIP_PER_ID ASC
);

/*==============================================================*/
/* Index: CON_CIU_ID_FK                                         */
/*==============================================================*/
create index CON_CIU_ID_FK on CONTACTO (
   CIU_ID ASC
);

/*==============================================================*/
/* Index: CON_CAR_ID_FK                                         */
/*==============================================================*/
create index CON_CAR_ID_FK on CONTACTO (
   CAR_ID ASC
);

/*==============================================================*/
/* Table: CONTACTO_RELACIONADO                                  */
/*==============================================================*/
create table CONTACTO_RELACIONADO  (
   CON_REL_ID           NUMBER(11)                      not null,
   TIP_CON_ID           NUMBER(3),
   CON_ID               NUMBER(11),
   CON_REL_VALOR        VARCHAR2(75)                    not null,
   constraint PK_CONTACTO_RELACIONADO primary key (CON_REL_ID)
);

/*==============================================================*/
/* Index: CON_REL_TIP_CON_ID_FK                                 */
/*==============================================================*/
create index CON_REL_TIP_CON_ID_FK on CONTACTO_RELACIONADO (
   TIP_CON_ID ASC
);

/*==============================================================*/
/* Index: CON_REL_CON_ID_FK                                     */
/*==============================================================*/
create index CON_REL_CON_ID_FK on CONTACTO_RELACIONADO (
   CON_ID ASC
);

/*==============================================================*/
/* Table: DESPEDIDA                                             */
/*==============================================================*/
create table DESPEDIDA  (
   DES_ID               NUMBER(4)                       not null,
   CTR_ID               NUMBER(11),
   DES_DESCRIPCION      VARCHAR2(100)                   not null,
   constraint PK_DESPEDIDA primary key (DES_ID)
);

/*==============================================================*/
/* Index: DES_CAR_ID_FK                                         */
/*==============================================================*/
create index DES_CAR_ID_FK on DESPEDIDA (
   CTR_ID ASC
);

/*==============================================================*/
/* Table: DETALLE_CONTACTO                                      */
/*==============================================================*/
create table DETALLE_CONTACTO  (
   DET_CON_ID           NUMBER(11)                      not null,
   EMP_ID               NUMBER(11),
   CON_ID               NUMBER(11),
   TIP_TEL_ID           NUMBER(3),
   DET_CON_CODIGO_PAIS  VARCHAR2(5),
   DET_CON_CODIGO_CIUDAD VARCHAR2(5),
   DET_CON_VALOR        VARCHAR2(50)                    not null,
   DET_CON_EXTENSION    VARCHAR2(10),
   constraint PK_DETALLE_CONTACTO primary key (DET_CON_ID)
);

/*==============================================================*/
/* Index: DET_CON_CON_ID_FK                                     */
/*==============================================================*/
create index DET_CON_CON_ID_FK on DETALLE_CONTACTO (
   CON_ID ASC
);

/*==============================================================*/
/* Index: DET_CON_EMP_ID_FK                                     */
/*==============================================================*/
create index DET_CON_EMP_ID_FK on DETALLE_CONTACTO (
   EMP_ID ASC
);

/*==============================================================*/
/* Index: DET_CON_TIP_TEL_ID_FK                                 */
/*==============================================================*/
create index DET_CON_TIP_TEL_ID_FK on DETALLE_CONTACTO (
   TIP_TEL_ID ASC
);

/*==============================================================*/
/* Table: DETALLE_USUARIO                                       */
/*==============================================================*/
create table DETALLE_USUARIO  (
   US_CODIGO            VARCHAR2(20)                    not null,
   DET_USU_TIPO         CHAR(1)                         not null,
   constraint PK_DETALLE_USUARIO primary key (US_CODIGO)
);

/*==============================================================*/
/* Table: EMPLEADO                                              */
/*==============================================================*/
create table EMPLEADO  (
   EPL_ID               NUMBER(11)                      not null,
   CAR_ID               NUMBER(6),
   EMP_INT_ID           NUMBER(3),
   EPL_NOMBRE           VARCHAR2(35)                    not null,
   EPL_APELLIDO         VARCHAR2(35)                    not null,
   constraint PK_EMPLEADO primary key (EPL_ID)
);

/*==============================================================*/
/* Index: EMP_EMP_INT_ID_FK                                     */
/*==============================================================*/
create index EMP_EMP_INT_ID_FK on EMPLEADO (
   EMP_INT_ID ASC
);

/*==============================================================*/
/* Index: EMP_CAR_ID_FK                                         */
/*==============================================================*/
create index EMP_CAR_ID_FK on EMPLEADO (
   CAR_ID ASC
);

/*==============================================================*/
/* Table: EMPRESA                                               */
/*==============================================================*/
create table EMPRESA  (
   EMP_ID               NUMBER(11)                      not null,
   CAT_EMP_ID           NUMBER(4),
   CIU_ID               NUMBER(11),
   EMP_EMP_ID           NUMBER(11),
   EMP_NOMBRE           VARCHAR2(100)                   not null,
   EMP_DIRECCION        VARCHAR2(150)                   not null,
   EMP_REFERENCIA       VARCHAR2(75),
   EMP_SECTOR           VARCHAR2(50)                    not null,
   EMP_EMAIL            VARCHAR2(150)                   not null,
   EMP_PAGINA_WEB       VARCHAR2(70),
   EMP_FECHA_ACTUALIZACION DATE                            not null,
   EMP_USUARIO          VARCHAR2(20)                    not null,
   constraint PK_EMPRESA primary key (EMP_ID)
);

/*==============================================================*/
/* Index: EMP_CAT_EMP_ID_FK                                     */
/*==============================================================*/
create index EMP_CAT_EMP_ID_FK on EMPRESA (
   CAT_EMP_ID ASC
);

/*==============================================================*/
/* Index: EMP_CIU_ID_FK                                         */
/*==============================================================*/
create index EMP_CIU_ID_FK on EMPRESA (
   CIU_ID ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_32_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_32_FK on EMPRESA (
   EMP_EMP_ID ASC
);

/*==============================================================*/
/* Table: EMPRESA_INTERNA                                       */
/*==============================================================*/
create table EMPRESA_INTERNA  (
   EMP_INT_ID           NUMBER(3)                       not null,
   EMP_INT_ABREVIACION  VARCHAR2(3)                     not null,
   EMP_INT_NOMBRE       VARCHAR2(75),
   constraint PK_EMPRESA_INTERNA primary key (EMP_INT_ID)
);

/*==============================================================*/
/* Table: ESTADO                                                */
/*==============================================================*/
create table ESTADO  (
   EST_ID               NUMBER(4)                       not null,
   PAI_ID               NUMBER(4),
   EST_NOMBRE           VARCHAR2(150)                   not null,
   constraint PK_ESTADO primary key (EST_ID)
);

/*==============================================================*/
/* Index: EST_PAI_ID_FK                                         */
/*==============================================================*/
create index EST_PAI_ID_FK on ESTADO (
   PAI_ID ASC
);

/*==============================================================*/
/* Table: FE_RECEPCION                                          */
/*==============================================================*/
create table FE_RECEPCION  (
   FE_REC_ID            NUMBER(11)                      not null,
   US_CODIGO            VARCHAR2(20),
   constraint PK_FE_RECEPCION primary key (FE_REC_ID)
);

/*==============================================================*/
/* Index: FE_REC_VIS_US_CODIGO_FK                               */
/*==============================================================*/
create index FE_REC_VIS_US_CODIGO_FK on FE_RECEPCION (
   US_CODIGO ASC
);

/*==============================================================*/
/* Table: OBRA                                                  */
/*==============================================================*/
create table OBRA  (
   OBR_ID               NUMBER(11)                      not null,
   PRO_ID               NUMBER(11),
   OBR_DESCRIPCION      VARCHAR2(200)                   not null,
   constraint PK_OBRA primary key (OBR_ID)
);

/*==============================================================*/
/* Index: OBR_PRO_ID_FK                                         */
/*==============================================================*/
create index OBR_PRO_ID_FK on OBRA (
   PRO_ID ASC
);

/*==============================================================*/
/* Table: PAIS                                                  */
/*==============================================================*/
create table PAIS  (
   PAI_ID               NUMBER(4)                       not null,
   PAI_NOMBRE           VARCHAR2(120)                   not null,
   PAI_CODIGO_TELEFONO  VARCHAR2(5),
   constraint PK_PAIS primary key (PAI_ID)
);

/*==============================================================*/
/* Table: PROYECTO                                              */
/*==============================================================*/
create table PROYECTO  (
   PRO_ID               NUMBER(11)                      not null,
   PRO_DESCRIPCION      VARCHAR2(150)                   not null,
   constraint PK_PROYECTO primary key (PRO_ID)
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROL  (
   ROL_ID               NUMBER(3)                       not null,
   ROL_DESCRIPCION      VARCHAR2(50)                    not null,
   constraint PK_ROL primary key (ROL_ID)
);

/*==============================================================*/
/* Table: ROL_APLICACION                                        */
/*==============================================================*/
create table ROL_APLICACION  (
   ROL_ID               NUMBER(3)                       not null,
   APL_ID               NUMBER(3)                       not null,
   ROL_APL_VISUALIZAR   CHAR(1)                         not null,
   ROL_APL_INSERTAR     CHAR(1)                         not null,
   ROL_APL_EDITAR       CHAR(1)                         not null,
   ROL_APL_ELIMINAR     CHAR(1)                         not null,
   constraint PK_ROL_APLICACION primary key (ROL_ID, APL_ID)
);

/*==============================================================*/
/* Index: ROL_APL_ROL_ID_FK                                     */
/*==============================================================*/
create index ROL_APL_ROL_ID_FK on ROL_APLICACION (
   ROL_ID ASC
);

/*==============================================================*/
/* Index: ROL_APL_APL_ID_FK                                     */
/*==============================================================*/
create index ROL_APL_APL_ID_FK on ROL_APLICACION (
   APL_ID ASC
);

/*==============================================================*/
/* Table: ROL_USUARIO                                           */
/*==============================================================*/
create table ROL_USUARIO  (
   ROL_ID               NUMBER(3)                       not null,
   US_CODIGO            VARCHAR2(20)                    not null,
   constraint PK_ROL_USUARIO primary key (ROL_ID, US_CODIGO)
);

/*==============================================================*/
/* Index: ROL_USU_ROL_ID_FK                                     */
/*==============================================================*/
create index ROL_USU_ROL_ID_FK on ROL_USUARIO (
   ROL_ID ASC
);

/*==============================================================*/
/* Index: ROL_USU_US_CODIGO_FK                                  */
/*==============================================================*/
create index ROL_USU_US_CODIGO_FK on ROL_USUARIO (
   US_CODIGO ASC
);

/*==============================================================*/
/* Table: SALUDO                                                */
/*==============================================================*/
create table SALUDO  (
   SAL_ID               NUMBER(4)                       not null,
   CTR_ID               NUMBER(11),
   SAL_DESCRIPCION      VARCHAR2(100)                   not null,
   constraint PK_SALUDO primary key (SAL_ID)
);

/*==============================================================*/
/* Index: SAL_CAR_ID_FK                                         */
/*==============================================================*/
create index SAL_CAR_ID_FK on SALUDO (
   CTR_ID ASC
);

/*==============================================================*/
/* Table: TIPO_CARTA                                            */
/*==============================================================*/
create table TIPO_CARTA  (
   TIP_CAR_ID           NUMBER(2)                       not null,
   TIP_CAR_DESCRIPCION  VARCHAR2(60)                    not null,
   constraint PK_TIPO_CARTA primary key (TIP_CAR_ID)
);

/*==============================================================*/
/* Table: TIPO_CONTACTO                                         */
/*==============================================================*/
create table TIPO_CONTACTO  (
   TIP_CON_ID           NUMBER(3)                       not null,
   TIP_CON_DESCRIPCION  VARCHAR2(50)                    not null,
   constraint PK_TIPO_CONTACTO primary key (TIP_CON_ID)
);

/*==============================================================*/
/* Table: TIPO_PERSONA                                          */
/*==============================================================*/
create table TIPO_PERSONA  (
   TIP_PER_ID           NUMBER(3)                       not null,
   TIP_PER_DESCRIPCION_ES VARCHAR2(30)                    not null,
   TIP_PER_DESCRIPCION_EN VARCHAR2(30)                    not null,
   constraint PK_TIPO_PERSONA primary key (TIP_PER_ID)
);

/*==============================================================*/
/* Table: TIPO_TELEFONO                                         */
/*==============================================================*/
create table TIPO_TELEFONO  (
   TIP_TEL_ID           NUMBER(3)                       not null,
   TIP_TEL_DESCRIPCION  VARCHAR2(60)                    not null,
   constraint PK_TIPO_TELEFONO primary key (TIP_TEL_ID)
);

/*==============================================================*/
/* Table: VISTA_USUARIO                                         */
/*==============================================================*/
create table VISTA_USUARIO  (
   US_CODIGO            VARCHAR2(20)                    not null,
   US_CLAVE             CHAR(255)                       not null,
   US_NOMBRE            VARCHAR2(100)                   not null,
   constraint PK_VISTA_USUARIO primary key (US_CODIGO)
);

alter table CARTA
   add constraint FK_CARTA_CAR_EMP_I_EMPRESA_ foreign key (EMP_INT_ID)
      references EMPRESA_INTERNA (EMP_INT_ID);

alter table CARTA
   add constraint FK_CARTA_CAR_OBR_I_OBRA foreign key (OBR_ID)
      references OBRA (OBR_ID);

alter table CARTA
   add constraint FK_CARTA_CAR_TIP_C_TIPO_CAR foreign key (TIP_CAR_ID)
      references TIPO_CARTA (TIP_CAR_ID);

alter table CARTA
   add constraint FK_CARTA_CAR_US_CO_VISTA_US foreign key (US_CODIGO)
      references VISTA_USUARIO (US_CODIGO);

alter table CARTA_DESTINATARIO
   add constraint FK_CARTA_DE_CAR_DES_C_CARTA foreign key (CTR_ID)
      references CARTA (CTR_ID);

alter table CARTA_DESTINATARIO
   add constraint FK_CARTA_DE_CAR_DES_C_CONTACTO foreign key (CON_ID)
      references CONTACTO (CON_ID);

alter table CARTA_FIRMA
   add constraint FK_CARTA_FI_CAR_FIR_C_CARTA foreign key (CTR_ID)
      references CARTA (CTR_ID);

alter table CARTA_FIRMA
   add constraint FK_CARTA_FI_CAR_FIR_E_EMPLEADO foreign key (EPL_ID)
      references EMPLEADO (EPL_ID);

alter table CIUDAD
   add constraint FK_CIUDAD_CIU_EST_I_ESTADO foreign key (EST_ID)
      references ESTADO (EST_ID);

alter table CONTACTO
   add constraint FK_CONTACTO_CON_CAR_I_CARGO foreign key (CAR_ID)
      references CARGO (CAR_ID);

alter table CONTACTO
   add constraint FK_CONTACTO_CON_CIU_I_CIUDAD foreign key (CIU_ID)
      references CIUDAD (CIU_ID);

alter table CONTACTO
   add constraint FK_CONTACTO_CON_TIP_P_TIPO_PER foreign key (TIP_PER_ID)
      references TIPO_PERSONA (TIP_PER_ID);

alter table CONTACTO_RELACIONADO
   add constraint FK_CONTACTO_CON_REL_C_CONTACTO foreign key (CON_ID)
      references CONTACTO (CON_ID);

alter table CONTACTO_RELACIONADO
   add constraint FK_CONTACTO_CON_REL_T_TIPO_CON foreign key (TIP_CON_ID)
      references TIPO_CONTACTO (TIP_CON_ID);

alter table DESPEDIDA
   add constraint FK_DESPEDID_DES_CAR_I_CARTA foreign key (CTR_ID)
      references CARTA (CTR_ID);

alter table DETALLE_CONTACTO
   add constraint FK_DETALLE__DET_CON_C_CONTACTO foreign key (CON_ID)
      references CONTACTO (CON_ID);

alter table DETALLE_CONTACTO
   add constraint FK_DETALLE__DET_CON_E_EMPRESA foreign key (EMP_ID)
      references EMPRESA (EMP_ID);

alter table DETALLE_CONTACTO
   add constraint FK_DETALLE__DET_CON_T_TIPO_TEL foreign key (TIP_TEL_ID)
      references TIPO_TELEFONO (TIP_TEL_ID);

alter table DETALLE_USUARIO
   add constraint FK_DETALLE__USU_VIS_U_VISTA_US foreign key (US_CODIGO)
      references VISTA_USUARIO (US_CODIGO);

alter table EMPLEADO
   add constraint FK_EMPLEADO_EMP_CAR_I_CARGO foreign key (CAR_ID)
      references CARGO (CAR_ID);

alter table EMPLEADO
   add constraint FK_EMPLEADO_EMP_EMP_I_EMPRESA_ foreign key (EMP_INT_ID)
      references EMPRESA_INTERNA (EMP_INT_ID);

alter table EMPRESA
   add constraint FK_EMPRESA_EMP_CAT_E_CATEGORI foreign key (CAT_EMP_ID)
      references CATEGORIA_EMPRESA (CAT_EMP_ID);

alter table EMPRESA
   add constraint FK_EMPRESA_EMP_CIU_I_CIUDAD foreign key (CIU_ID)
      references CIUDAD (CIU_ID);

alter table EMPRESA
   add constraint FK_EMPRESA_RELATIONS_EMPRESA foreign key (EMP_EMP_ID)
      references EMPRESA (EMP_ID);

alter table ESTADO
   add constraint FK_ESTADO_EST_PAI_I_PAIS foreign key (PAI_ID)
      references PAIS (PAI_ID);

alter table FE_RECEPCION
   add constraint FK_FE_RECEP_FE_REC_VI_VISTA_US foreign key (US_CODIGO)
      references VISTA_USUARIO (US_CODIGO);

alter table OBRA
   add constraint FK_OBRA_OBR_PRO_I_PROYECTO foreign key (PRO_ID)
      references PROYECTO (PRO_ID);

alter table ROL_APLICACION
   add constraint FK_ROL_APLI_ROL_APL_A_APLICACI foreign key (APL_ID)
      references APLICACION (APL_ID);

alter table ROL_APLICACION
   add constraint FK_ROL_APLI_ROL_APL_R_ROL foreign key (ROL_ID)
      references ROL (ROL_ID);

alter table ROL_USUARIO
   add constraint FK_ROL_USUA_ROL_USU_R_ROL foreign key (ROL_ID)
      references ROL (ROL_ID);

alter table ROL_USUARIO
   add constraint FK_ROL_USUA_ROL_USU_U_VISTA_US foreign key (US_CODIGO)
      references VISTA_USUARIO (US_CODIGO);

alter table SALUDO
   add constraint FK_SALUDO_SAL_CAR_I_CARTA foreign key (CTR_ID)
      references CARTA (CTR_ID);

