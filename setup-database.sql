/* Creating a table that holds a string value to be converted into another language */
CREATE TABLE WordConverter (
  word varchar(100),
  lang varchar(100),
  PRIMARY KEY (word)
);

INSERT INTO WordConverter VALUES ('cat','French');
INSERT INTO WordConverter VALUES ('dog','French');