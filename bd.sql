CREATE TABLE usuario (
    idUser INT(3) AUTO_INCREMENT,
    nomeUser VARCHAR(40) NOT NULL,
    senhaUser VARCHAR(20) NOT NULL,
    PRIMARY KEY (idUser)
);

INSERT INTO usuario (nomeUser, senhaUser) VAlUES('maristella', '1234');
INSERT INTO usuario VALUES('','raphael', '1234');
INSERT INTO usuario VALUES('', 'heloisa', '321');

ALTER TABLE usuario MODIFY COLUMN idUser INT(3) AUTO_INCREMENT;

CREATE TABLE token (
    idToken INT(3) AUTO_INCREMENT,
    accessToken VARCHAR(200) NOT NULL,
    refreshToken VARCHAR(200) NOT NULL,
    idUser INT(3),
    PRIMARY KEY (idToken),
    FOREIGN KEY (idUser) REFERENCES usuario (idUser)
);


INSERT INTO token (hashToken, idUser) VALUES ("eyJhbGciOiJTSEEyNTYiLCJ0eXAiOiJKV1QifQ==.eyJpc3MiOiJsb2NhbGhvc3QiLCJub21lIjoibWFyaXN0ZWxsYSIsImRhdGFob3JhIjoiMDMtMTAtMjAyMiAwNDozOTo1MSBwbSJ9.yBcnbA2Ty5rzbWN1In/NIPDDCtcH4UzkWPpQ9f/VVrE=
", 1);

/* SELECT usuario.nomeUser, token.hashToken
FROM usuario 
INNER JOIN token  ON usuario.idUser=token.idUser; */
DELETE FROM token WHERE idUser = 1;