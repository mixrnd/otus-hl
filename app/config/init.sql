create table social_network.users
(
  id          int auto_increment primary key,
  email       varchar(40) unique,
  name        varchar(255) not null,
  second_name varchar(255) not null,
  age         int          null,
  interests   varchar(255) null,
  gender      char(1),
  city        varchar(255) null,
  password    varchar(255) null
);