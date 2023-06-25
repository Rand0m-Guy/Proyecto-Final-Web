Create database ProyectoWeb;
Use ProyectoWeb;

Create table Cliente (
	CURP varchar(18) not null,
    Nombre varchar (40) not null,
    ApellidoM varchar(20) not null,
    ApellidoP varchar(20) not null,
    Calle varchar(20) not null,
    nExterior int not null,
    nInterior varchar(10),
    Colonia varchar(20) not null,
    Alcadia varchar(20) not null,
    CP varchar(5) not null,
    EntidadF varchar(20) not null,
    email varchar(30) not null,
    Tel varchar(10) not null
);

alter table Cliente add constraint PK1 primary key(CURP);

Create table Contratacion (
	CURP varchar(18) not null,
	FechaEvento date not null,
    Folio varchar(29) not null,
	Horario varchar(30) not null,
    tipoEvento varchar(20) not null,
    numPersonas int not null,
    Menu varchar(10) not null,
    Lugar varchar(10) not null
);

alter table Contratacion
	add constraint FK1 foreign key(CURP) references Cliente(CURP) on delete cascade on update cascade, 
    add constraint PK2 primary key(Folio);

Create table Admon (
    User varchar(20) not null,
    Pass varchar(15) not null,
    ID varchar(5) not null
);

Alter table Admon
    add constraint PK3 primary key(ID);

Insert into Admon values('Said_Morales','Said14+','A1');