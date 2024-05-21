DROP DATABASE IF EXISTS pesbuk;
CREATE DATABASE pesbuk;
use pesbuk;

CREATE TABLE user (
  userId int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  role enum('admin', 'user') NOT NULL,
  status enum('online', 'offline') NOT NULL DEFAULT 'offline',
  PRIMARY KEY (userId),
  UNIQUE KEY email (email)
);

CREATE TABLE post (
  postId int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  datePost date NOT NULL,
  -- urlPoster varchar(255) NOT NULL,
  userId int(11) NOT NULL,
  image LONGBLOB,
  PRIMARY KEY (postId),
  FOREIGN KEY (userId) REFERENCES user(userId)
);

INSERT INTO user (name, email, password, role, status) VALUES
('Admin', 'admin', 'admin', 'admin', 'offline');