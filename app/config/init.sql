create table social_network.users
(
  id          int auto_increment
    primary key,
  name        varchar(255) not null,
  second_name varchar(255) not null,
  age         int          null,
  interests   varchar(255) null,
  city        varchar(255) null,
  password    varchar(255) null
);