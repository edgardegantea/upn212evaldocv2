-- create database upn212evaldoc;
-- use upn212evaldoc;


create table areas
(
    id          int(11) auto_increment primary key,
    nombre      varchar(150) not null,
    descripcion varchar(255) null,
    constraint nombre unique (nombre)
);


create table asignaturas
(
    id             int(11) auto_increment primary key,
    clave          varchar(10)                           not null,
    nombre         varchar(255)                          not null,
    descripcion    text                                  null,
    creditos       int                                   not null,
    horasSemana    int                                   not null,
    temario        text                                  null,
    temarioArchivo varchar(255)                          null,
    created_at     timestamp default current_timestamp() not null,
    updated_at     timestamp                             null,
    deleted_at     timestamp                             null
);

create table carreras
(
    id          int(11) auto_increment primary key,
    abreviatura varchar(20)  not null,
    nombre      varchar(255) not null,
    descripcion varchar(255) null,
    creditos    int          null
);

create table estudiantes
(
    id              int(11) auto_increment primary key,
    codigo          varchar(20)                              null,
    nombre          varchar(150)                             not null,
    apaterno        varchar(50)                              not null,
    amaterno        varchar(50)                              not null,
    curp            varchar(18)                              null,
    email           varchar(100)                             not null,
    password        varchar(255)                             null,
    foto            varchar(255)                             null,
    sexo            varchar(10)                              not null,
    fechaNacimiento datetime                                 null,
    bio             varchar(500) default 'Estudiante'        null,
    status          varchar(20)  default 'activo'            not null,
    created_at      timestamp    default current_timestamp() not null,
    updated_at      timestamp                                null,
    deleted_at      timestamp                                null,
    constraint codigo
        unique (codigo),
    constraint curp
        unique (curp),
    constraint email
        unique (email)
);

create table dimensiones
(
    id          int(11) auto_increment primary key,
    nombre      varchar(100)    not null,
    descripcion varchar(255)    null,
    promedio    float default 0 null,
    constraint nombre unique (nombre)
);


create table grupos
(
    id          int(11) auto_increment primary key,
    abreviatura varchar(20) not null,
    nombre      varchar(50) not null,
    constraint nombre
        unique (nombre)
);

create table migrations
(
    id        bigint auto_increment primary key,
    version   varchar(255)     not null,
    class     varchar(255)     not null,
    `group`   varchar(255)     not null,
    namespace varchar(255)     not null,
    time      int              not null,
    batch     int(11) unsigned not null
);

create table modalidades
(
    id         int(11) auto_increment primary key,
    nombre     varchar(50)                           not null,
    created_at timestamp default current_timestamp() not null,
    updated_at timestamp                             null,
    deleted_at timestamp                             null,
    constraint nombre
        unique (nombre)
);

create table periodoescolar
(
    id          int(11) auto_increment primary key,
    nombre      varchar(50)                           null,
    codigo      varchar(30)                           not null,
    tipo        varchar(50)                           null,
    fechaInicio datetime                              null,
    fechaFin    datetime                              null,
    created_at  timestamp default current_timestamp() not null,
    updated_at  timestamp                             null,
    deleted_at  timestamp                             null,
    constraint codigo
        unique (codigo),
    constraint nombre
        unique (nombre)
);

create table preguntas
(
    id        int(11) auto_increment
        primary key,
    pregunta  varchar(500)     not null,
    dimension int(11) unsigned not null,
    constraint pregunta
        unique (pregunta),
    constraint dimension
        foreign key (dimension) references dimensiones (id)
);

create table profesores
(
    id     int(11) unsigned auto_increment
        primary key,
    nombre varchar(150)     not null,
    foto   varchar(255)     null,
    area   int(11) unsigned null,
    constraint profesores_area_foreign
        foreign key (area) references areas (id)
);

create table evaluacion
(
    id         int(11) unsigned auto_increment
        primary key,
    profesor   int(11) unsigned not null,
    asignatura int(11) unsigned not null,
    pregunta   int(11) unsigned not null,
    constraint evaluacion_asignatura_foreign
        foreign key (asignatura) references asignaturas (id),
    constraint evaluacion_pregunta_foreign
        foreign key (pregunta) references preguntas (id),
    constraint evaluacion_profesor_foreign
        foreign key (profesor) references profesores (id)
);

create table profesorasignatura
(
    id         int(11) unsigned auto_increment
        primary key,
    profesor   int(11) unsigned not null,
    asignatura int(11) unsigned not null,
    constraint profesorasignatura_asignatura_foreign
        foreign key (asignatura) references asignaturas (id),
    constraint profesorasignatura_profesor_foreign
        foreign key (profesor) references profesores (id)
);

create table programaeducativo
(
    id                  int(11) unsigned auto_increment
        primary key,
    codigo              varchar(10)                           not null,
    nombre              varchar(50)                           not null,
    tipo                varchar(50)                           not null,
    duracion            varchar(50)                           not null,
    periodoDeEvaluacion varchar(50)                           not null,
    created_at          timestamp default current_timestamp() not null,
    updated_at          timestamp                             null,
    deleted_at          timestamp                             null
);

create table respuestas
(
    id        int(11) unsigned auto_increment
        primary key,
    respuesta varchar(50) not null
);

create table sedes
(
    id         int(11) unsigned auto_increment
        primary key,
    nombre     varchar(255)                          not null,
    telefono   varchar(20)                           null,
    email      varchar(100)                          null,
    website    varchar(255)                          null,
    facebook   varchar(255)                          null,
    created_at timestamp default current_timestamp() not null,
    updated_at timestamp                             null,
    deleted_at timestamp                             null,
    constraint nombre
        unique (nombre)
);

create table usuarios
(
    id              int(11) unsigned auto_increment
        primary key,
    rol             varchar(20)  default 'estudiante'        not null,
    codigo          varchar(20)                              null,
    nombre          varchar(100)                             not null,
    apaterno        varchar(50)                              null,
    amaterno        varchar(50)                              null,
    curp            varchar(18)                              null,
    email           varchar(100)                             not null,
    password        varchar(255)                             null,
    foto            varchar(255)                             null,
    sexo            varchar(10)                              not null,
    fechaNacimiento datetime                                 null,
    bio             varchar(500) default 'Estudiante'        null,
    status          varchar(20)  default 'activo'            not null,
    created_at      timestamp    default current_timestamp() not null,
    updated_at      timestamp                                null,
    deleted_at      timestamp                                null,
    constraint codigo
        unique (codigo),
    constraint curp
        unique (curp),
    constraint email
        unique (email)
);

