create table greet (
   num int not null auto_increment,
   id char(15) not null,
   subject char(100) not null,
   name  char(10) not null,
   nick  char(10) not null,
   content text not null,
   regist_day char(20) not null,
   area char(20) not null,
   due_day char(20),
   hit int,
   primary key(num)
);

