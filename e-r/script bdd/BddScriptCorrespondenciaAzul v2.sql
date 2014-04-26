/*==============================================================*/
/* DBMS name:      ORACLE Version 10gR2                         */
/* Created on:     4/15/2014 4:38:47 PM                         */
/*==============================================================*/


alter table carta
   drop constraint fk_carta_car_emp_i_empresa_;

alter table carta
   drop constraint fk_carta_car_obr_i_obra;

alter table carta
   drop constraint fk_carta_car_tip_c_tipo_car;

alter table carta
   drop constraint fk_carta_car_us_co_vista_us;

alter table carta_destinatario
   drop constraint fk_carta_de_car_des_c_carta;

alter table carta_destinatario
   drop constraint fk_carta_de_car_des_c_contacto;

alter table carta_firma
   drop constraint fk_carta_fi_car_fir_c_carta;

alter table carta_firma
   drop constraint fk_carta_fi_car_fir_e_empleado;

alter table ciudad
   drop constraint fk_ciudad_ciu_est_i_estado;

alter table contacto
   drop constraint fk_contacto_con_car_i_cargo;

alter table contacto
   drop constraint fk_contacto_con_ciu_i_ciudad;

alter table contacto
   drop constraint fk_contacto_con_suc_i_sucursal;

alter table contacto
   drop constraint fk_contacto_con_tip_p_tipo_per;

alter table contacto_relacionado
   drop constraint fk_contacto_con_rel_c_contacto;

alter table contacto_relacionado
   drop constraint fk_contacto_con_rel_t_tipo_con;

alter table despedida
   drop constraint fk_despedid_des_car_i_carta;

alter table detalle_contacto
   drop constraint fk_detalle__det_con_c_contacto;

alter table detalle_contacto
   drop constraint fk_detalle__det_con_e_empresa;

alter table detalle_contacto
   drop constraint fk_detalle__det_con_s_sucursal;

alter table detalle_contacto
   drop constraint fk_detalle__det_con_t_tipo_tel;

alter table detalle_usuario
   drop constraint fk_detalle__usu_vis_u_vista_us;

alter table empleado
   drop constraint fk_empleado_emp_car_i_cargo;

alter table empleado
   drop constraint fk_empleado_emp_emp_i_empresa_;

alter table empresa
   drop constraint fk_empresa_emp_cat_e_categori;

alter table empresa
   drop constraint fk_empresa_emp_ciu_i_ciudad;

alter table estado
   drop constraint fk_estado_est_pai_i_pais;

alter table fe_recepcion
   drop constraint fk_fe_recep_fe_rec_vi_vista_us;

alter table obra
   drop constraint fk_obra_obr_pro_i_proyecto;

alter table rol_aplicacion
   drop constraint fk_rol_apli_rol_apl_a_aplicaci;

alter table rol_aplicacion
   drop constraint fk_rol_apli_rol_apl_r_rol;

alter table rol_usuario
   drop constraint fk_rol_usua_rol_usu_r_rol;

alter table rol_usuario
   drop constraint fk_rol_usua_rol_usu_u_vista_us;

alter table saludo
   drop constraint fk_saludo_sal_car_i_carta;

alter table sucursal
   drop constraint fk_sucursal_suc_ciu_i_ciudad;

alter table sucursal
   drop constraint fk_sucursal_suc_emp_i_empresa;

drop table aplicacion cascade constraints;

drop table cargo cascade constraints;

drop index car_obr_id_fk;

drop index car_emp_int_id_fk;

drop index car_tip_car_id_fk;

drop index car_us_codigo_fk;

drop table carta cascade constraints;

drop index car_des_con_id_fk;

drop index car_des_car_id_fk;

drop table carta_destinatario cascade constraints;

drop index car_fir_car_id_fk;

drop index car_fir_epl_id_fk;

drop table carta_firma cascade constraints;

drop table categoria_empresa cascade constraints;

drop index ciu_est_id_fk;

drop table ciudad cascade constraints;

drop index con_car_id_fk;

drop index con_ciu_id_fk;

drop index con_tip_per_id_fk;

drop index con_suc_id_fk;

drop table contacto cascade constraints;

drop index con_rel_con_id_fk;

drop index con_rel_tip_con_id_fk;

drop table contacto_relacionado cascade constraints;

drop index des_car_id_fk;

drop table despedida cascade constraints;

drop index det_con_suc_id_fk;

drop index det_con_tip_tel_id_fk;

drop index det_con_emp_id_fk;

drop index det_con_con_id_fk;

drop table detalle_contacto cascade constraints;

drop table detalle_usuario cascade constraints;

drop index emp_car_id_fk;

drop index emp_emp_int_id_fk;

drop table empleado cascade constraints;

drop index emp_ciu_id_fk;

drop index emp_cat_emp_id_fk;

drop table empresa cascade constraints;

drop table empresa_interna cascade constraints;

drop index est_pai_id_fk;

drop table estado cascade constraints;

drop index fe_rec_vis_us_codigo_fk;

drop table fe_recepcion cascade constraints;

drop index obr_pro_id_fk;

drop table obra cascade constraints;

drop table pais cascade constraints;

drop table proyecto cascade constraints;

drop table rol cascade constraints;

drop index rol_apl_apl_id_fk;

drop index rol_apl_rol_id_fk;

drop table rol_aplicacion cascade constraints;

drop index rol_usu_us_codigo_fk;

drop index rol_usu_rol_id_fk;

drop table rol_usuario cascade constraints;

drop index sal_car_id_fk;

drop table saludo cascade constraints;

drop index suc_ciu_id_fk;

drop index suc_emp_id_fk;

drop table sucursal cascade constraints;

drop table tipo_carta cascade constraints;

drop table tipo_contacto cascade constraints;

drop table tipo_persona cascade constraints;

drop table tipo_telefono cascade constraints;

drop table vista_usuario cascade constraints;

drop sequence s_aplicacion;

drop sequence s_cargo;

drop sequence s_carta;

drop sequence s_categoria_empresa;

drop sequence s_ciudad;

drop sequence s_contacto;

drop sequence s_contacto_relacionado;

drop sequence s_despedida;

drop sequence s_detalle_contacto;

drop sequence s_empleado;

drop sequence s_empresa;

drop sequence s_empresa_interna;

drop sequence s_estado;

drop sequence s_fe_recepcion;

drop sequence s_obra;

drop sequence s_pais;

drop sequence s_proyecto;

drop sequence s_rol;

drop sequence s_saludo;

drop sequence s_sucursal;

drop sequence s_tipo_carta;

drop sequence s_tipo_contacto;

drop sequence s_tipo_persona;

drop sequence s_tipo_telefono;

create sequence s_aplicacion;

create sequence s_cargo;

create sequence s_carta;

create sequence s_categoria_empresa;

create sequence s_ciudad;

create sequence s_contacto;

create sequence s_contacto_relacionado;

create sequence s_despedida;

create sequence s_detalle_contacto;

create sequence s_empleado;

create sequence s_empresa;

create sequence s_empresa_interna;

create sequence s_estado;

create sequence s_fe_recepcion;

create sequence s_obra;

create sequence s_pais;

create sequence s_proyecto;

create sequence s_rol;

create sequence s_saludo;

create sequence s_sucursal;

create sequence s_tipo_carta;

create sequence s_tipo_contacto;

create sequence s_tipo_persona;

create sequence s_tipo_telefono;

/*==============================================================*/
/* Table: aplicacion                                            */
/*==============================================================*/
create table aplicacion  (
   apl_id               number(3)                       not null,
   apl_descripcion      varchar2(70)                    not null,
   constraint pk_aplicacion primary key (apl_id)
);

/*==============================================================*/
/* Table: cargo                                                 */
/*==============================================================*/
create table cargo  (
   car_id               number(6)                       not null,
   car_descripcion_es   varchar2(80)                    not null,
   car_descripcion_en   varchar2(80)                    not null,
   constraint pk_cargo primary key (car_id)
);

/*==============================================================*/
/* Table: carta                                                 */
/*==============================================================*/
create table carta  (
   ctr_id               number(11)                      not null,
   obr_id               number(11),
   emp_int_id           number(3),
   us_codigo            varchar2(20),
   tip_car_id           number(2),
   ctr_idioma           char(1)                         not null,
   ctr_fecha_creacion   date                            not null,
   ctr_cuerpo           clob                            not null,
   ctr_tipo             char(1)                         not null,
   ctr_codigo_final     varchar2(30)                    not null,
   ctr_fecha_actualizacion date                            not null,
   ctr_referencia       varchar2(300),
   constraint pk_carta primary key (ctr_id)
);

/*==============================================================*/
/* Index: car_us_codigo_fk                                      */
/*==============================================================*/
create index car_us_codigo_fk on carta (
   us_codigo asc
);

/*==============================================================*/
/* Index: car_tip_car_id_fk                                     */
/*==============================================================*/
create index car_tip_car_id_fk on carta (
   tip_car_id asc
);

/*==============================================================*/
/* Index: car_emp_int_id_fk                                     */
/*==============================================================*/
create index car_emp_int_id_fk on carta (
   emp_int_id asc
);

/*==============================================================*/
/* Index: car_obr_id_fk                                         */
/*==============================================================*/
create index car_obr_id_fk on carta (
   obr_id asc
);

/*==============================================================*/
/* Table: carta_destinatario                                    */
/*==============================================================*/
create table carta_destinatario  (
   ctr_id               number(11)                      not null,
   con_id               number(11)                      not null,
   car_des_principal    char(1)                         not null,
   constraint pk_carta_destinatario primary key (ctr_id, con_id)
);

/*==============================================================*/
/* Index: car_des_car_id_fk                                     */
/*==============================================================*/
create index car_des_car_id_fk on carta_destinatario (
   ctr_id asc
);

/*==============================================================*/
/* Index: car_des_con_id_fk                                     */
/*==============================================================*/
create index car_des_con_id_fk on carta_destinatario (
   con_id asc
);

/*==============================================================*/
/* Table: carta_firma                                            */
/*==============================================================*/
create table carta_firma  (
   epl_id               number(11)                      not null,
   ctr_id               number(11)                      not null,
   constraint pk_carta_firma primary key (epl_id, ctr_id)
);

/*==============================================================*/
/* Index: car_fir_epl_id_fk                                     */
/*==============================================================*/
create index car_fir_epl_id_fk on carta_firma (
   epl_id asc
);

/*==============================================================*/
/* Index: car_fir_car_id_fk                                     */
/*==============================================================*/
create index car_fir_car_id_fk on carta_firma (
   ctr_id asc
);

/*==============================================================*/
/* Table: categoria_empresa                                     */
/*==============================================================*/
create table categoria_empresa  (
   cat_emp_id           number(4)                       not null,
   cat_emp_descripcion  varchar2(100)                   not null,
   constraint pk_categoria_empresa primary key (cat_emp_id)
);

/*==============================================================*/
/* Table: ciudad                                                */
/*==============================================================*/
create table ciudad  (
   ciu_id               number(11)                      not null,
   est_id               number(4),
   ciu_nombre           varchar2(150)                   not null,
   ciu_codigo_telefono  varchar2(5)                     not null,
   constraint pk_ciudad primary key (ciu_id)
);

/*==============================================================*/
/* Index: ciu_est_id_fk                                         */
/*==============================================================*/
create index ciu_est_id_fk on ciudad (
   est_id asc
);

/*==============================================================*/
/* Table: contacto                                              */
/*==============================================================*/
create table contacto  (
   con_id               number(11)                      not null,
   car_id               number(6),
   suc_id               number(11),
   tip_per_id           number(3),
   ciu_id               number(11),
   con_nombre           varchar2(35)                    not null,
   con_apellido         varchar2(35)                    not null,
   con_email            varchar2(150)                   not null,
   con_observaciones    clob,
   con_idioma           char(1)                         not null,
   con_usuario          varchar2(20)                    not null,
   con_fecha_actualizacion date                            not null,
   con_privado          char(1)                         not null,
   con_fecha_nacimiento_personal date,
   con_direccion_domicilio_per varchar2(150),
   con_email_personal   varchar2(150),
   con_codigo_pais      varchar2(5),
   con_codigo_ciudad    varchar2(5),
   con_telefono_domicilio_per varchar2(15),
   con_celular_personal varchar2(15),
   constraint pk_contacto primary key (con_id)
);

/*==============================================================*/
/* Index: con_suc_id_fk                                         */
/*==============================================================*/
create index con_suc_id_fk on contacto (
   suc_id asc
);

/*==============================================================*/
/* Index: con_tip_per_id_fk                                     */
/*==============================================================*/
create index con_tip_per_id_fk on contacto (
   tip_per_id asc
);

/*==============================================================*/
/* Index: con_ciu_id_fk                                         */
/*==============================================================*/
create index con_ciu_id_fk on contacto (
   ciu_id asc
);

/*==============================================================*/
/* Index: con_car_id_fk                                         */
/*==============================================================*/
create index con_car_id_fk on contacto (
   car_id asc
);

/*==============================================================*/
/* Table: contacto_relacionado                                  */
/*==============================================================*/
create table contacto_relacionado  (
   con_rel_id           number(11)                      not null,
   tip_con_id           number(3),
   con_id               number(11),
   con_rel_valor        varchar2(75)                    not null,
   constraint pk_contacto_relacionado primary key (con_rel_id)
);

/*==============================================================*/
/* Index: con_rel_tip_con_id_fk                                 */
/*==============================================================*/
create index con_rel_tip_con_id_fk on contacto_relacionado (
   tip_con_id asc
);

/*==============================================================*/
/* Index: con_rel_con_id_fk                                     */
/*==============================================================*/
create index con_rel_con_id_fk on contacto_relacionado (
   con_id asc
);

/*==============================================================*/
/* Table: despedida                                             */
/*==============================================================*/
create table despedida  (
   des_id               number(4)                       not null,
   ctr_id               number(11),
   des_descripcion      varchar2(100)                   not null,
   constraint pk_despedida primary key (des_id)
);

/*==============================================================*/
/* Index: des_car_id_fk                                         */
/*==============================================================*/
create index des_car_id_fk on despedida (
   ctr_id asc
);

/*==============================================================*/
/* Table: detalle_contacto                                      */
/*==============================================================*/
create table detalle_contacto  (
   det_con_id           number(11)                      not null,
   emp_id               number(11),
   con_id               number(11),
   suc_id               number(11),
   tip_tel_id           number(3),
   det_con_codigo_pais  varchar2(5),
   det_con_codigo_ciudad varchar2(5),
   det_con_valor        varchar2(50)                    not null,
   det_con_extension    varchar2(10),
   constraint pk_detalle_contacto primary key (det_con_id)
);

/*==============================================================*/
/* Index: det_con_con_id_fk                                     */
/*==============================================================*/
create index det_con_con_id_fk on detalle_contacto (
   con_id asc
);

/*==============================================================*/
/* Index: det_con_emp_id_fk                                     */
/*==============================================================*/
create index det_con_emp_id_fk on detalle_contacto (
   emp_id asc
);

/*==============================================================*/
/* Index: det_con_tip_tel_id_fk                                 */
/*==============================================================*/
create index det_con_tip_tel_id_fk on detalle_contacto (
   tip_tel_id asc
);

/*==============================================================*/
/* Index: det_con_suc_id_fk                                     */
/*==============================================================*/
create index det_con_suc_id_fk on detalle_contacto (
   suc_id asc
);

/*==============================================================*/
/* Table: detalle_usuario                                       */
/*==============================================================*/
create table detalle_usuario  (
   us_codigo            varchar2(20)                    not null,
   det_usu_tipo         char(1)                         not null,
   constraint pk_detalle_usuario primary key (us_codigo)
);

/*==============================================================*/
/* Table: empleado                                              */
/*==============================================================*/
create table empleado  (
   epl_id               number(11)                      not null,
   car_id               number(6),
   emp_int_id           number(3),
   epl_nombre           varchar2(35)                    not null,
   epl_apellido         varchar2(35)                    not null,
   constraint pk_empleado primary key (epl_id)
);

/*==============================================================*/
/* Index: emp_emp_int_id_fk                                     */
/*==============================================================*/
create index emp_emp_int_id_fk on empleado (
   emp_int_id asc
);

/*==============================================================*/
/* Index: emp_car_id_fk                                         */
/*==============================================================*/
create index emp_car_id_fk on empleado (
   car_id asc
);

/*==============================================================*/
/* Table: empresa                                               */
/*==============================================================*/
create table empresa  (
   emp_id               number(11)                      not null,
   cat_emp_id           number(4),
   ciu_id               number(11),
   emp_nombre           varchar2(100)                   not null,
   emp_direccion        varchar2(150)                   not null,
   emp_referencia       varchar2(75),
   emp_sector           varchar2(50)                    not null,
   emp_email            varchar2(150)                   not null,
   emp_pagina_web       varchar2(70),
   emp_fecha_actualizacion date                            not null,
   emp_usuario          varchar2(20)                    not null,
   constraint pk_empresa primary key (emp_id)
);

/*==============================================================*/
/* Index: emp_cat_emp_id_fk                                     */
/*==============================================================*/
create index emp_cat_emp_id_fk on empresa (
   cat_emp_id asc
);

/*==============================================================*/
/* Index: emp_ciu_id_fk                                         */
/*==============================================================*/
create index emp_ciu_id_fk on empresa (
   ciu_id asc
);

/*==============================================================*/
/* Table: empresa_interna                                       */
/*==============================================================*/
create table empresa_interna  (
   emp_int_id           number(3)                       not null,
   emp_int_abreviacion  varchar2(3)                     not null,
   emp_int_nombre       varchar2(75),
   constraint pk_empresa_interna primary key (emp_int_id)
);

/*==============================================================*/
/* Table: estado                                                */
/*==============================================================*/
create table estado  (
   est_id               number(4)                       not null,
   pai_id               number(4),
   est_nombre           varchar2(150)                   not null,
   constraint pk_estado primary key (est_id)
);

/*==============================================================*/
/* Index: est_pai_id_fk                                         */
/*==============================================================*/
create index est_pai_id_fk on estado (
   pai_id asc
);

/*==============================================================*/
/* Table: fe_recepcion                                          */
/*==============================================================*/
create table fe_recepcion  (
   fe_rec_id            number(11)                      not null,
   us_codigo            varchar2(20),
   constraint pk_fe_recepcion primary key (fe_rec_id)
);

/*==============================================================*/
/* Index: fe_rec_vis_us_codigo_fk                               */
/*==============================================================*/
create index fe_rec_vis_us_codigo_fk on fe_recepcion (
   us_codigo asc
);

/*==============================================================*/
/* Table: obra                                                  */
/*==============================================================*/
create table obra  (
   obr_id               number(11)                      not null,
   pro_id               number(11),
   obr_descripcion      varchar2(200)                   not null,
   constraint pk_obra primary key (obr_id)
);

/*==============================================================*/
/* Index: obr_pro_id_fk                                         */
/*==============================================================*/
create index obr_pro_id_fk on obra (
   pro_id asc
);

/*==============================================================*/
/* Table: pais                                                  */
/*==============================================================*/
create table pais  (
   pai_id               number(4)                       not null,
   pai_nombre           varchar2(120)                   not null,
   pai_codigo_telefono  varchar2(5),
   constraint pk_pais primary key (pai_id)
);

/*==============================================================*/
/* Table: proyecto                                              */
/*==============================================================*/
create table proyecto  (
   pro_id               number(11)                      not null,
   pro_descripcion      varchar2(150)                   not null,
   constraint pk_proyecto primary key (pro_id)
);

/*==============================================================*/
/* Table: rol                                                   */
/*==============================================================*/
create table rol  (
   rol_id               number(3)                       not null,
   rol_descripcion      varchar2(50)                    not null,
   constraint pk_rol primary key (rol_id)
);

/*==============================================================*/
/* Table: rol_aplicacion                                        */
/*==============================================================*/
create table rol_aplicacion  (
   rol_id               number(3)                       not null,
   apl_id               number(3)                       not null,
   rol_apl_visualizar   char(1)                         not null,
   rol_apl_insertar     char(1)                         not null,
   rol_apl_editar       char(1)                         not null,
   rol_apl_eliminar     char(1)                         not null,
   constraint pk_rol_aplicacion primary key (rol_id, apl_id)
);

/*==============================================================*/
/* Index: rol_apl_rol_id_fk                                     */
/*==============================================================*/
create index rol_apl_rol_id_fk on rol_aplicacion (
   rol_id asc
);

/*==============================================================*/
/* Index: rol_apl_apl_id_fk                                     */
/*==============================================================*/
create index rol_apl_apl_id_fk on rol_aplicacion (
   apl_id asc
);

/*==============================================================*/
/* Table: rol_usuario                                           */
/*==============================================================*/
create table rol_usuario  (
   rol_id               number(3)                       not null,
   us_codigo            varchar2(20)                    not null,
   constraint pk_rol_usuario primary key (rol_id, us_codigo)
);

/*==============================================================*/
/* Index: rol_usu_rol_id_fk                                     */
/*==============================================================*/
create index rol_usu_rol_id_fk on rol_usuario (
   rol_id asc
);

/*==============================================================*/
/* Index: rol_usu_us_codigo_fk                                  */
/*==============================================================*/
create index rol_usu_us_codigo_fk on rol_usuario (
   us_codigo asc
);

/*==============================================================*/
/* Table: saludo                                                */
/*==============================================================*/
create table saludo  (
   sal_id               number(4)                       not null,
   ctr_id               number(11),
   sal_descripcion      varchar2(100)                   not null,
   constraint pk_saludo primary key (sal_id)
);

/*==============================================================*/
/* Index: sal_car_id_fk                                         */
/*==============================================================*/
create index sal_car_id_fk on saludo (
   ctr_id asc
);

/*==============================================================*/
/* Table: sucursal                                              */
/*==============================================================*/
create table sucursal  (
   suc_id               number(11)                      not null,
   emp_id               number(11),
   ciu_id               number(11),
   suc_nombre           varchar2(100)                   not null,
   suc_direccion        varchar2(150)                   not null,
   suc_referencia       varchar2(75),
   suc_sector           varchar2(50)                    not null,
   suc_fecha_actualizacion date                            not null,
   suc_usuario          varchar2(20)                    not null,
   constraint pk_sucursal primary key (suc_id)
);

/*==============================================================*/
/* Index: suc_emp_id_fk                                         */
/*==============================================================*/
create index suc_emp_id_fk on sucursal (
   emp_id asc
);

/*==============================================================*/
/* Index: suc_ciu_id_fk                                         */
/*==============================================================*/
create index suc_ciu_id_fk on sucursal (
   ciu_id asc
);

/*==============================================================*/
/* Table: tipo_carta                                            */
/*==============================================================*/
create table tipo_carta  (
   tip_car_id           number(2)                       not null,
   tip_car_descripcion  varchar2(60)                    not null,
   constraint pk_tipo_carta primary key (tip_car_id)
);

/*==============================================================*/
/* Table: tipo_contacto                                         */
/*==============================================================*/
create table tipo_contacto  (
   tip_con_id           number(3)                       not null,
   tip_con_descripcion  varchar2(50)                    not null,
   constraint pk_tipo_contacto primary key (tip_con_id)
);

/*==============================================================*/
/* Table: tipo_persona                                          */
/*==============================================================*/
create table tipo_persona  (
   tip_per_id           number(3)                       not null,
   tip_per_descripcion_es varchar2(30)                    not null,
   tip_per_descripcion_en varchar2(30)                    not null,
   constraint pk_tipo_persona primary key (tip_per_id)
);

/*==============================================================*/
/* Table: tipo_telefono                                         */
/*==============================================================*/
create table tipo_telefono  (
   tip_tel_id           number(3)                       not null,
   tip_tel_descripcion  varchar2(60)                    not null,
   constraint pk_tipo_telefono primary key (tip_tel_id)
);

/*==============================================================*/
/* Table: vista_usuario                                         */
/*==============================================================*/
create table vista_usuario  (
   us_codigo            varchar2(20)                    not null,
   us_clave             char(255)                       not null,
   us_nombre            varchar2(100)                   not null,
   constraint pk_vista_usuario primary key (us_codigo)
);

alter table carta
   add constraint fk_carta_car_emp_i_empresa_ foreign key (emp_int_id)
      references empresa_interna (emp_int_id);

alter table carta
   add constraint fk_carta_car_obr_i_obra foreign key (obr_id)
      references obra (obr_id);

alter table carta
   add constraint fk_carta_car_tip_c_tipo_car foreign key (tip_car_id)
      references tipo_carta (tip_car_id);

alter table carta
   add constraint fk_carta_car_us_co_vista_us foreign key (us_codigo)
      references vista_usuario (us_codigo);

alter table carta_destinatario
   add constraint fk_carta_de_car_des_c_carta foreign key (ctr_id)
      references carta (ctr_id);

alter table carta_destinatario
   add constraint fk_carta_de_car_des_c_contacto foreign key (con_id)
      references contacto (con_id);

alter table carta_firma
   add constraint fk_carta_fi_car_fir_c_carta foreign key (ctr_id)
      references carta (ctr_id);

alter table carta_firma
   add constraint fk_carta_fi_car_fir_e_empleado foreign key (epl_id)
      references empleado (epl_id);

alter table ciudad
   add constraint fk_ciudad_ciu_est_i_estado foreign key (est_id)
      references estado (est_id);

alter table contacto
   add constraint fk_contacto_con_car_i_cargo foreign key (car_id)
      references cargo (car_id);

alter table contacto
   add constraint fk_contacto_con_ciu_i_ciudad foreign key (ciu_id)
      references ciudad (ciu_id);

alter table contacto
   add constraint fk_contacto_con_suc_i_sucursal foreign key (suc_id)
      references sucursal (suc_id);

alter table contacto
   add constraint fk_contacto_con_tip_p_tipo_per foreign key (tip_per_id)
      references tipo_persona (tip_per_id);

alter table contacto_relacionado
   add constraint fk_contacto_con_rel_c_contacto foreign key (con_id)
      references contacto (con_id);

alter table contacto_relacionado
   add constraint fk_contacto_con_rel_t_tipo_con foreign key (tip_con_id)
      references tipo_contacto (tip_con_id);

alter table despedida
   add constraint fk_despedid_des_car_i_carta foreign key (ctr_id)
      references carta (ctr_id);

alter table detalle_contacto
   add constraint fk_detalle__det_con_c_contacto foreign key (con_id)
      references contacto (con_id);

alter table detalle_contacto
   add constraint fk_detalle__det_con_e_empresa foreign key (emp_id)
      references empresa (emp_id);

alter table detalle_contacto
   add constraint fk_detalle__det_con_s_sucursal foreign key (suc_id)
      references sucursal (suc_id);

alter table detalle_contacto
   add constraint fk_detalle__det_con_t_tipo_tel foreign key (tip_tel_id)
      references tipo_telefono (tip_tel_id);

alter table detalle_usuario
   add constraint fk_detalle__usu_vis_u_vista_us foreign key (us_codigo)
      references vista_usuario (us_codigo);

alter table empleado
   add constraint fk_empleado_emp_car_i_cargo foreign key (car_id)
      references cargo (car_id);

alter table empleado
   add constraint fk_empleado_emp_emp_i_empresa_ foreign key (emp_int_id)
      references empresa_interna (emp_int_id);

alter table empresa
   add constraint fk_empresa_emp_cat_e_categori foreign key (cat_emp_id)
      references categoria_empresa (cat_emp_id);

alter table empresa
   add constraint fk_empresa_emp_ciu_i_ciudad foreign key (ciu_id)
      references ciudad (ciu_id);

alter table estado
   add constraint fk_estado_est_pai_i_pais foreign key (pai_id)
      references pais (pai_id);

alter table fe_recepcion
   add constraint fk_fe_recep_fe_rec_vi_vista_us foreign key (us_codigo)
      references vista_usuario (us_codigo);

alter table obra
   add constraint fk_obra_obr_pro_i_proyecto foreign key (pro_id)
      references proyecto (pro_id);

alter table rol_aplicacion
   add constraint fk_rol_apli_rol_apl_a_aplicaci foreign key (apl_id)
      references aplicacion (apl_id);

alter table rol_aplicacion
   add constraint fk_rol_apli_rol_apl_r_rol foreign key (rol_id)
      references rol (rol_id);

alter table rol_usuario
   add constraint fk_rol_usua_rol_usu_r_rol foreign key (rol_id)
      references rol (rol_id);

alter table rol_usuario
   add constraint fk_rol_usua_rol_usu_u_vista_us foreign key (us_codigo)
      references vista_usuario (us_codigo);

alter table saludo
   add constraint fk_saludo_sal_car_i_carta foreign key (ctr_id)
      references carta (ctr_id);

alter table sucursal
   add constraint fk_sucursal_suc_ciu_i_ciudad foreign key (ciu_id)
      references ciudad (ciu_id);

alter table sucursal
   add constraint fk_sucursal_suc_emp_i_empresa foreign key (emp_id)
      references empresa (emp_id);

