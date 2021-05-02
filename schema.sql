DROP TABLE User;
CREATE TABLE User(
  UserID INTEGER PRIMARY KEY AUTOINCREMENT,
  Username varchar(255),
  Pass varchar(255),
  Email varchar(255)
);

DROP TABLE Bill;
CREATE TABLE Bill(
  BillID INTEGER PRIMARY KEY AUTOINCREMENT,
  Billname varchar(255),
  Amount MONEY,
  NumSplit INTEGER,
  Email1 varchar(255),
  Email2 varchar(255),
  Email3 varchar(255),
  Email4 varchar(255),
  Email5 varchar(255),
  Email6 varchar(255),
  Status1 BOOLEAN DEFAULT 0,
  Status2 BOOLEAN DEFAULT 0,
  Status3 BOOLEAN DEFAULT 0,
  Status4 BOOLEAN DEFAULT 0,
  Status5 BOOLEAN DEFAULT 0,
  Status6 BOOLEAN DEFAULT 0
);


