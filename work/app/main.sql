CREATE TABLE bbs(
id INT AUTO_INCREMENT NOT NULL,
username VARCHAR(140),
comment VARCHAR(140),
postDate VARCHAR(140),
PRIMARY KEY (id)
);
DESC posts;
SHOW TABLES;

SELECT * FROM bbs;
INSERT INTO bbs(id,username,comment,postDate) VALUES('1','takashi','can not do','2023-1-21');