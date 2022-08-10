
CREATE TABLE notes (
    id int NOT NULL AUTO_INCREMENT,
    uuid varchar(255) NOT NULL UNIQUE,
    title varchar(255) NOT NULL,
    content text NOT NULL,
    updated date NOT NULL,
    PRIMARY KEY (id)
--uuid, valor unico, no consecutivo para navegar entre las notas
--uupdate para saber cuando se ha actualizado
);