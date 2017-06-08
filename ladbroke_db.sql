create table race (
id int(9) not null primary key auto_increment,
closing_time datetime,
race_type_id int(9) not null
);

create table race_type (
id int(9) not null primary key auto_increment,
name varchar(100) not null);

create table competitor (
id int(9) not null primary key auto_increment,
name varchar(100) not null);

create table race_competitor (
id int(9) not null primary key auto_increment,
race_id int(9) not null,
competitor_id int(9) not null,
position int(9)
);


