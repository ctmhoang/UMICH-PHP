use test;

create table users(
  user_id int not null auto_increment primary key,
  name varchar(128),
  email varchar(128),
  password varchar(128),
  index(email)
) ENGINE = InnoDB CHARSET = utf8;

insert into users (name,email,password) VALUES('Alen','tamh@duke.edu','123');
INSERT INTO users(name,email,password) VALUES('Eric','welg@mit.edu','321');
