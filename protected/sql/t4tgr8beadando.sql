CREATE TABLE users(
id int NOT NULL AUTO_INCREMENT,
username varchar(64) UNIQUE NOT NULL,
email varchar(250) UNIQUE NOT NULL,
password varchar(250) NOT NULL,
pemission int(1) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE threads(
id int NOT NULL AUTO_INCREMENT,
title varchar(64) NOT NULL,
ftext varchar(30000) NOT NULL,
author varchar(64) NOT NULL,
created datetime NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE comments(
id int NOT NULL AUTO_INCREMENT,
ctext varchar(30000) NOT NULL,
author varchar(64) NOT NULL,
comcreated datetime NOT NULL,
threadid int NOT NULL,
PRIMARY KEY (id)
);