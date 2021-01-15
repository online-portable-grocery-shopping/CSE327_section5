--
-- Table structure for table `confirmation`
--
-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 06:18 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE ADMINVIEW (
  ID int(11) NOT NULL AUTO_INCREMENT,
  USERTYPE VARCHAR(50) NOT NULL,
  FIRSTNAME varchar(50) NOT NULL,
  LASTNAME  varchar(50) NOT NULL,
  EMAIL  varchar(50) NOT NULL UNIQUE,
  USERNAME varchar(50) NOT NULL,
  PASSWORD varchar(200) NOT NULL,
  RETYPEPASSWORD  varchar(200) NOT NULL, 
  GENDER varchar(200) NOT NULL,
  CONTACT int (11) NOT NULL,
  LOCATION varchar(200) NOT NULL,
  NIDNUMBER  varchar(13),
  GROCERYNAME varchar (200),
  TIME_FOR_GIVING_ORDER varchar (200),
  TIME_OF_REG DATETIME ,
  PRIMARY KEY (ID)
  )ENGINE=InnoDB DEFAULT CHARSET=latin1; 
  
 INSERT INTO ADMINVIEW (USERTYPE,FIRSTNAME,LASTNAME,EMAIL,USERNAME,PASSWORD,  RETYPEPASSWORD, GENDER, CONTACT ,LOCATION, NIDNUMBER,GROCERYNAME,TIME_FOR_GIVING_ORDER ,TIME_OF_REG) VALUES
 ('provider','sayem', 'mahmud', 'sayem.mahmud@gmail.com', 'sayem', '@@@@@@@@@@@sam', '@@@@@@@@@@@sam','MALE' , '01626909723', 'Bashundhara','345','nila','sat-sun','19-11-2020'),
 ('customer','Farah', 'Tasnur', 'farah.t@gmail.com', 'Farah Tasnur', 'farah','farah','FEMALE','01736372345' , 'Norda','','','',''),
 ('provider','sayem', 'mahmud', 'sayem.mah@northsouth.edu', 'saymm', 'sayem', 'sayem','MALE' , '01626909723', 'Bashundhara','345','nila','sat-sun','19-11-2020');

 CREATE TABLE AUTH_USER (
  ID int(11) NOT NULL AUTO_INCREMENT,
  FIRSTNAME varchar(50) NOT NULL,
  LASTNAME  varchar(50) NOT NULL,
  EMAIL  varchar(50) NOT NULL UNIQUE,
  USERNAME varchar(50) NOT NULL,
  PASSWORD varchar(200) NOT NULL,
  RETYPEPASSWORD  varchar(200) NOT NULL, 
  GENDER varchar(200) NOT NULL,
  CONTACT int (11) NOT NULL,
  LOCATION varchar(200) NOT NULL,
  PRIMARY KEY (ID)
  )ENGINE=InnoDB DEFAULT CHARSET=latin1; 
   

INSERT INTO AUTH_USER (FIRSTNAME,LASTNAME,EMAIL,USERNAME,PASSWORD,  RETYPEPASSWORD, GENDER, CONTACT ,LOCATION) VALUES
 
 ('Nur', 'Rahman', 'nur.rahman@gmail.com', 'Nur', 'nur','nur','MALE','01736372345' , 'khilgaon'),
 ('tasfiq', 'mahmud', 'tasfiq.mahmud@gmail.com', 'tasfiq', 'tasfiq', 'tasfiq','MALE' , '01626909723', 'Bashundhara'),
 ('sayem', 'mahmud', 'sayem.mahmud97@gmail.com', 'sayem', '@@@@@@@@@@@sam', '@@@@@@@@@@@sam','MALE' , '01626909723', 'Bashundhara'),
 ('hasib', 'ahmed', 'hasib.ahmed@gmail.com', 'hasib', 'hasib', 'hasib','MALE' , '01626909756', 'Badda'),
 ('Farah', 'Tasnur', 'farah.tasnur@gmail.com', 'Farah Tasnur', 'farah','farah','FEMALE','01736372345' , 'Bata signal');
 
 CREATE TABLE PROVIDER (
  ID int(11) NOT NULL AUTO_INCREMENT,
  USER_ID int(11) UNIQUE NOT NULL,
  NIDNUMBER  varchar(13) NOT NULL,
  GROCERYNAME varchar (200) NOT NULL,
  PRODUCTLIST varchar (10000),
  TIME_FOR_GIVING_ORDER varchar (200) NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY(USER_ID)REFERENCES AUTH_USER(ID)
  
  
  )ENGINE=InnoDB DEFAULT CHARSET=latin1; 
  
  INSERT INTO PROVIDER(USER_ID,NIDNUMBER, GROCERYNAME, PRODUCTLIST, TIME_FOR_GIVING_ORDER) VALUES
  (2,'347','yoyo', 'alu-poratha', 'sat-mon'),
  (3,'345','nila','soap,chips','sat-sun');


  
 
  CREATE TABLE USER_ROLE (
  ID int(11) NOT NULL AUTO_INCREMENT,
  USER_ID Int(11) UNIQUE NOT NULL,
  ROLE  varchar(50) NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY(USER_ID)REFERENCES AUTH_USER(ID)
  )ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  INSERT INTO USER_ROLE (USER_ID,ROLE) VALUES
  (1,'admin'),
  (2,'provider'),
  (3,'provider'),
  (4,'customer'),
  (5,'customer');
  
  
  CREATE TABLE ORDERLIST (
  ID int(11) NOT NULL AUTO_INCREMENT,
  PROVIDER_USER_ID Int(50) UNIQUE NOT NULL ,
  CUSTOMER_USER_ID Int(11) NOT NULL,
  PRODUCT VARCHAR (10000) NOT NULL,
  GIVEN_ORDER_DATE  DATETIME,
  PRIMARY KEY (ID),
  FOREIGN KEY(PROVIDER_USER_ID)REFERENCES AUTH_USER(ID),
  FOREIGN KEY(CUSTOMER_USER_ID)REFERENCES AUTH_USER(ID)
  
   )ENGINE=InnoDB DEFAULT CHARSET=latin1; 

   INSERT INTO ORDERLIST (PROVIDER_USER_ID, CUSTOMER_USER_ID, PRODUCT,GIVEN_ORDER_DATE) VALUES
   (2, 5, 'alu-parata', '18-01-2021' );
   
   
   CREATE TABLE DONEORDER (
  ID int(11) NOT NULL AUTO_INCREMENT,
  DONE_ORDER_NUMBER INT(11) UNIQUE NOT NULL,
  PROVIDER_USER_ID Int(50) NOT NULL,
  CUSTOMER_USER_ID Int(11) NOT NULL,
  PRODUCT VARCHAR (10000) NOT NULL,
  GIVEN_ORDER_DATE  DATETIME,
  PRIMARY KEY (ID),
  FOREIGN KEY(PROVIDER_USER_ID)REFERENCES AUTH_USER(ID),
  FOREIGN KEY(CUSTOMER_USER_ID)REFERENCES AUTH_USER(ID)
  )ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
  INSERT INTO DONEORDER (DONE_ORDER_NUMBER,PROVIDER_USER_ID, CUSTOMER_USER_ID, PRODUCT,GIVEN_ORDER_DATE) VALUES
   (2, 2, 5, 'aluvegetables', '17-01-2021' );

   COMMIT;
 
 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
