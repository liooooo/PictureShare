DROP DATABASE pictureshare;
CREATE DATABASE pictureshare;
USE pictureshare;
CREATE TABLE usermanage(id int(8) primary key auto_increment,
                        username varchar(20),
                        passwd varchar(20),
                        mail varchar(30));
INSERT INTO usermanage(username, passwd, mail) VALUES('admin', 'admin_pass', 'liooooo93@outlook.com');                       
                        
CREATE TABLE image(id int(8) primary key auto_increment,
                   image_name varchar(50), 
                   uploader varchar(30));

INSERT INTO image(image_name) VALUES('1.jpg');
INSERT INTO image(image_name) VALUES('2.jpg');
INSERT INTO image(image_name) VALUES('3.jpg');
INSERT INTO image(image_name) VALUES('4.jpg');
INSERT INTO image(image_name) VALUES('5.jpg');
INSERT INTO image(image_name) VALUES('6.jpg');
INSERT INTO image(image_name) VALUES('7.jpg');
INSERT INTO image(image_name) VALUES('8.jpg');
INSERT INTO image(image_name) VALUES('9.jpg');
INSERT INTO image(image_name) VALUES('10.jpg');
INSERT INTO image(image_name) VALUES('11.jpg');
INSERT INTO image(image_name) VALUES('12.jpg');
INSERT INTO image(image_name) VALUES('13.jpg');
INSERT INTO image(image_name) VALUES('14.jpg');
INSERT INTO image(image_name) VALUES('15.jpg');
INSERT INTO image(image_name) VALUES('16.jpg');

UPDATE image SET uploader = 'system' WHERE image_name = '1.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '2.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '3.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '4.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '5.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '6.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '7.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '8.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '9.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '10.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '11.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '12.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '13.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '14.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '15.jpg';
UPDATE image SET uploader = 'system' WHERE image_name = '16.jpg';

CREATE TABLE report(id int(8) primary key auto_increment,
                    image_name varchar(50));