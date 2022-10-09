CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS products (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  caloric INTEGER,
  PRIMARY KEY (ID)
);

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'admin', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login='admin' AND password='123'
) LIMIT 1;

INSERT INTO products (name, caloric)
SELECT * FROM (SELECT 'White chocolate', 554) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'White chocolate' AND caloric = 554
) LIMIT 1;

INSERT INTO products (name, caloric)
SELECT * FROM (SELECT 'Bitter chocolate', 539) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Bitter chocolate' AND caloric = 539
) LIMIT 1;

INSERT INTO products (name, caloric)
SELECT * FROM (SELECT 'Milk chocolate', 550) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Milk chocolate' AND caloric = 550
) LIMIT 1;


-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Alex', 'Rover') AS tmp
-- WHERE NOT EXISTS (
--     SELECT name FROM users WHERE name = 'Alex' AND surname = 'Rover'
-- ) LIMIT 1;

-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Bob', 'Marley') AS tmp
-- WHERE NOT EXISTS (
--     SELECT name FROM users WHERE name = 'Bob' AND surname = 'Marley'
-- ) LIMIT 1;

-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Alex', 'Rover') AS tmp
-- WHERE NOT EXISTS (
--     SELECT name FROM users WHERE name = 'Alex' AND surname = 'Rover'
-- ) LIMIT 1;

-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Kate', 'Yandson') AS tmp
-- WHERE NOT EXISTS (
--     SELECT name FROM users WHERE name = 'Kate' AND surname = 'Yandson'
-- ) LIMIT 1;

-- INSERT INTO users (name, surname, password)
-- SELECT * FROM (SELECT 'Lilo', 'Black') AS tmp
-- WHERE NOT EXISTS (
--     SELECT name FROM users WHERE name = 'Lilo' AND surname = 'Black'
-- ) LIMIT 1;