SET NAMES utf8;

CREATE DATABASE myCompany CHARACTER SET utf8;

USE myCompany;

CREATE TABLE employees (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100) NOT NULL,
email VARCHAR(225) NOT NULL,
salary INT(10) NOT NULL);

INSERT INTO employees (id, name,  email, salary) VALUES
('1', 'Shurlocke Dury', 'sdury0@jalbum.net', '25500'),
('2', 'Kali Ricson', 'kricson1@samsung.com', '32700'),
('3', 'Melinde Greenstreet', 'mgreenstreet2@stanford.edu', '31200'),
('4', 'Gearalt Berre', 'gberre3@symantec.com', '32500'),
('5', 'Homere Aguirrezabal', 'haguirrezabal4@nasa.gov', '75000'),
('6', 'Oliy Huxster', 'ohuxster5@gravatar.com', '23700'),
('7', 'Dennison Yukhtin', 'dyukhtin6@usatoday.com', '24500'),
('8', 'Donn Blowfelde',	'dblowfelde7@4shared.com', '27500'),
('9', 'Ferdy McCroft', 'fmccroft8@quantcast.com', '32500'),
('10', 'Jasun Bew', 'jbew9@msu.edu', '33750');


