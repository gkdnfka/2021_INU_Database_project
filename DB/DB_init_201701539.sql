create user 'id201701539'@'localhost' identified by 'pw201701539';

 
create database IF NOT EXISTS manage_exer;

grant all privileges on manage_exer.*  to 'id201701539'@'localhost' WITH GRANT OPTION;
flush privileges;
commit;

use manage_exer;

create table IF NOT EXISTS person (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    age integer,
    join_year integer,
    pname varchar(20) not null
);

create table IF NOT EXISTS exer_log (
	exer_day date primary key,
    log varchar(300),
    title varchar(20) not null
);

create table IF NOT EXISTS exer_mem (
	p_id integer,
    exer_day date,
    foreign key (p_id) references person(id) ON DELETE CASCADE,
    foreign key (exer_day) references exer_log(exer_day) ON delete cascade
);

select * from person;
drop table exer_mem;
drop table exer_log;
drop table person;