create table board_reply (
   idx int not null auto_increment,
   id char(15) not null,
   name char(10) not null,
   subject char(200) not null,
   content text not null,        
   regist_day char(20) not null,
   con_num int(100),
   primary key(idx)
);
