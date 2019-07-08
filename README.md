**Create database script**

create database test;

use test;

create table user (id int(5) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL, email varchar(50) NOT NULL, PRIMARY KEY (id));

create table user_info (id int(5) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL, name varchar(30) NOT NULL, sname varchar(30) NOT NULL, PRIMARY KEY (id));