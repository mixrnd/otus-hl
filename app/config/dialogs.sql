create table users_dialogs
(
  id int auto_increment,
  uid1 char(40) not null,
  uid2 char(40) null,
  created_at timestamp null,
  updated_at timestamp null,
  constraint table_name_pk
    primary key (id)
);

create index table_name_uid1_index
  on users_dialogs (uid1);

create index table_name_uid2_index
  on users_dialogs (uid2);

create index table_name_updated_at_index
  on users_dialogs (updated_at desc);


create table user_messages
(
  id int auto_increment,
  dialog_id int null,
  text tinytext null,
  created_at timestamp null,
  constraint user_messages_pk
    primary key (id)
);

create index user_messages__index
  on user_messages (dialog_id);

create index user_messages_created_at_index
  on user_messages (created_at);

create index user_messages_dialog_id_index
  on user_messages (dialog_id);
