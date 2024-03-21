-- Active: 1710969956952@@127.0.0.1@3306@nexus_lucian
CREATE DATABASE nexus_lucian CHARACTER SET = 'utf8mb4' COLLATE = 'utf8mb4_general_ci';

use nexus_lucian;

SELECT user FROM mysql.user WHERE user = 'lucian';
DROP USER 'lucianAdmin';

CREATE USER 'lucianAdmin' IDENTIFIED BY 'adminGG';

DROP ROLE 'admin';

CREATE ROLE 'admin';
GRANT CREATE, ALTER, DROP, SELECT, INSERT, UPDATE, DELETE on nexus_lucian.* TO 'admin';
GRANT SHOW DATABASES on *.* to 'admin';

GRANT SHOW DATABASES on *.* to 'lucianAdmin';

GRANT admin TO 'lucianAdmin';


SHOW GRANTS FOR 'admin';
SHOW GRANTS FOR 'lucianAdmin';

FLUSH PRIVILEGES;