<?php
include_once("database_connect.php");
$query="create table t105(c25 varchar(5) primary key,c13 varchar(20),c12 integer(1),c14 varchar(1),c23 varchar(30),c24 integer(1) default 1);

create table t101(c29 integer unique key auto_increment,c1 varchar(10) primary key,c2 varchar(10) not null,c3 varchar(30),c4 integer(1) not null default 0,c5 varchar(50),c23 varchar(30),c24 integer(1) default 1,c25 varchar(10),c15 varchar(100));

create table t102(c7 varchar(20) primary key,c6 varchar(30),c13 varchar(20),c23 varchar(30),c24 integer(1) default 1);

create table t104(c29 integer ,c27 integer PRIMARY KEY auto_increment,c7 varchar(20) ,c17 varchar(1),c18 varchar(1),c19 varchar(1),c20 varchar(1),c21 varchar(1),c22 varchar(1),c30 varchar(1),c31 varchar(1),c32 varchar(1),c33 varchar(1),c34 varchar(100),c15 varchar(50),c23 varchar(30),c24 integer(1) default 1,c25 varchar(20));

create table t103(c7 varchar(20),c15 varchar(30),c25 varchar(20),c23 varchar(30),c24 integer(1) default 1);

create table t106(c16 varchar(20) primary key,c26 varchar(20),c23 varchar(30),c24 integer(1) default 1);

create table t107(c37 varchar(5) primary key,c35 varchar(10) not null);

create table t108(c38 varchar(10) primary key,c36 varchar(20) not null);
";

if(mysqli_query($con,$query))
{
	echo "All data base created";
	
}
else
{
	echo mysqli_error();
	
}


?>