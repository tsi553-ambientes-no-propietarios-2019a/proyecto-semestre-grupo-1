/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     02/07/2019 20:23:00                          */
/*==============================================================*/


drop table if exists ESTACION;

drop table if exists ESTADO;

drop table if exists GENERA;

drop table if exists LLEGA;

drop table if exists QUEJA;

drop table if exists TIENE_2;

drop table if exists TOMAN;

drop table if exists UNIDAD;

drop table if exists USR;

/*==============================================================*/
/* Table: ESTACION                                              */
/*==============================================================*/
create table ESTACION
(
   NOMBRE               varchar(25) not null,
   DIRECCION            varchar(50),
   IMAGEN               longblob,
   primary key (NOMBRE)
);

/*==============================================================*/
/* Table: ESTADO                                                */
/*==============================================================*/
create table ESTADO
(
   IDESTADO             int not null,
   ESTADO               varchar(50),
   primary key (IDESTADO)
);

/*==============================================================*/
/* Table: GENERA                                                */
/*==============================================================*/
create table GENERA
(
   ID                   int not null,
   NOMBRE               varchar(25) not null,
   primary key (ID, NOMBRE)
);

/*==============================================================*/
/* Table: LLEGA                                                 */
/*==============================================================*/
create table LLEGA
(
   NOMBRE               varchar(25) not null,
   CI                   int not null,
   primary key (NOMBRE, CI)
);

/*==============================================================*/
/* Table: QUEJA                                                 */
/*==============================================================*/
create table QUEJA
(
   ID                   int not null,
   IDESTADO             int not null,
   CLASE                varchar(25),
   DERSCRIPCION         varchar(150),
   FECHAHORA            datetime,
   primary key (ID)
);

/*==============================================================*/
/* Table: TIENE_2                                               */
/*==============================================================*/
create table TIENE_2
(
   ID                   int not null,
   NUMEROU              varchar(10) not null,
   primary key (ID, NUMEROU)
);

/*==============================================================*/
/* Table: TOMAN                                                 */
/*==============================================================*/
create table TOMAN
(
   NUMEROU              varchar(10) not null,
   CI                   int not null,
   primary key (NUMEROU, CI)
);

/*==============================================================*/
/* Table: UNIDAD                                                */
/*==============================================================*/
create table UNIDAD
(
   NUMEROU              varchar(10) not null,
   CLASE                varchar(25),
   RUTA                 varchar(30),
   primary key (NUMEROU)
);

/*==============================================================*/
/* Table: USR                                                   */
/*==============================================================*/
create table USR
(
   CI                   int not null,
   EMAIL                varchar(25),
   primary key (CI)
);

alter table GENERA add constraint FK_GENERA foreign key (ID)
      references QUEJA (ID) on delete restrict on update restrict;

alter table GENERA add constraint FK_GENERA2 foreign key (NOMBRE)
      references ESTACION (NOMBRE) on delete restrict on update restrict;

alter table LLEGA add constraint FK_LLEGA foreign key (NOMBRE)
      references ESTACION (NOMBRE) on delete restrict on update restrict;

alter table LLEGA add constraint FK_LLEGA2 foreign key (CI)
      references USR (CI) on delete restrict on update restrict;

alter table QUEJA add constraint FK_TIENE foreign key (IDESTADO)
      references ESTADO (IDESTADO) on delete restrict on update restrict;

alter table TIENE_2 add constraint FK_TIENE_2 foreign key (ID)
      references QUEJA (ID) on delete restrict on update restrict;

alter table TIENE_2 add constraint FK_TIENE_3 foreign key (NUMEROU)
      references UNIDAD (NUMEROU) on delete restrict on update restrict;

alter table TOMAN add constraint FK_TOMAN foreign key (NUMEROU)
      references UNIDAD (NUMEROU) on delete restrict on update restrict;

alter table TOMAN add constraint FK_TOMAN2 foreign key (CI)
      references USR (CI) on delete restrict on update restrict;

