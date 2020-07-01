DROP TABLE import;

CREATE TABLE `import` (
  `Number` varchar(100) NOT NULL,
  `Buyer` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO import VALUES("123","sdg","2015-09-02","2015-09-03");



DROP TABLE order;

;




DROP TABLE orderdetail;

CREATE TABLE `orderdetail` (
  `Sc No` int(100) NOT NULL,
  `Version` int(100) NOT NULL,
  `Sl No` int(100) NOT NULL,
  `PO No.` varchar(100) NOT NULL,
  `Model/Article No` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Qty In Pcs` int(11) NOT NULL,
  `Unit Price` float NOT NULL,
  `Factory Value` float NOT NULL,
  PRIMARY KEY (`Sc No`,`Version`,`Sl No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO orderdetail VALUES("234","1","1","345","12345","ad","12","2","24");
INSERT INTO orderdetail VALUES("234","1","2","567","234/577","shmkr","23","2","46");
INSERT INTO orderdetail VALUES("234","1","3","356","56/345","htjk","2","2","4");
INSERT INTO orderdetail VALUES("234","1","4","678","678/456","nmjl","2","2","4");
INSERT INTO orderdetail VALUES("234","1","5","567","435/3434","sdfh","45","2","90");
INSERT INTO orderdetail VALUES("444","0","1","23","23/46","shirt","23","2.56","58.88");
INSERT INTO orderdetail VALUES("444","0","2","45","54/34","shirt","34","4.5","153");
INSERT INTO orderdetail VALUES("777","0","1","1","2","3","4","4","16");
INSERT INTO orderdetail VALUES("777","0","2","3","4","5","6","7","42");
INSERT INTO orderdetail VALUES("777","0","3","7","8","9","10","11","110");
INSERT INTO orderdetail VALUES("777","1","1","1","2","3","4","5","20");
INSERT INTO orderdetail VALUES("777","1","2","3","4","5","6","1.4","8.4");
INSERT INTO orderdetail VALUES("786","0","1","6","7","8","9","10","90");
INSERT INTO orderdetail VALUES("786","1","1","1","2","3","4","5","20");
INSERT INTO orderdetail VALUES("789","1","1","234","346/45","sdf","123","23","2829");
INSERT INTO orderdetail VALUES("1234","0","1","3456","234/567","sfsf","30","3","90");
INSERT INTO orderdetail VALUES("1234","2","1","45","345","A","2","2","4");
INSERT INTO orderdetail VALUES("1234","2","2","56","567","B","3","3","9");
INSERT INTO orderdetail VALUES("7658","0","1","51","12/23","Shirt","20","2","40");
INSERT INTO orderdetail VALUES("7658","0","2","52","12/24","Pant","20","3","60");
INSERT INTO orderdetail VALUES("7658","1","1","61","12/24","Shirt","20","2","30");
INSERT INTO orderdetail VALUES("7658","1","2","62","12/25","Pant","30","3","90");
INSERT INTO orderdetail VALUES("7658","1","3","","","","0","0","0");
INSERT INTO orderdetail VALUES("9999","0","1","12","12/23","Shirt","12","2","24");
INSERT INTO orderdetail VALUES("9999","0","2","13","12/24","Pant","13","3","39");
INSERT INTO orderdetail VALUES("9999","0","3","23","3/435","sdh","34","34","1156");
INSERT INTO orderdetail VALUES("9999","1","4","1","2","3","4","5","20");
INSERT INTO orderdetail VALUES("9999","2","1","1234","pls work","pls work","1","2","2");
INSERT INTO orderdetail VALUES("100100","0","1","234","123/213","Shirt","23","3","235");
INSERT INTO orderdetail VALUES("100100","0","2","45","324/45","","0","345345","35346");
INSERT INTO orderdetail VALUES("100100","0","3","456","234/345","Pant","5","3","2345");
INSERT INTO orderdetail VALUES("14270123","0","1","123","123/232","shrt","12","2","24");
INSERT INTO orderdetail VALUES("14270123","0","2","345","12345/45","pant","10","2","20");



DROP TABLE orderfinal;

CREATE TABLE `orderfinal` (
  `Sales Contact No` varchar(100) NOT NULL,
  `Buyer Name` varchar(100) NOT NULL,
  `Issue Date` date NOT NULL,
  `Recieve Date` date NOT NULL,
  `Master LC` varchar(100) DEFAULT NULL,
  `LC Date` date DEFAULT NULL,
  `Remarks` varchar(1000) DEFAULT NULL,
  `Expire Date` date NOT NULL,
  `Validity` int(100) NOT NULL,
  `Qntty PCS` int(100) NOT NULL,
  `Unit Price` double NOT NULL,
  `Total Price` double NOT NULL,
  `Shipment Date` date NOT NULL,
  PRIMARY KEY (`Sales Contact No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO orderfinal VALUES("100100","sdfs","2015-01-01","2015-01-01","fd","2015-01-01","sfsdf","2015-01-01","63","28","1354.5","37926","2015-01-01");
INSERT INTO orderfinal VALUES("1234","sdfsg","2015-01-01","0000-00-00","","0000-00-00","","0000-00-00","0","69","174.601470588235","23570","0000-00-00");
INSERT INTO orderfinal VALUES("14270123","DARA","2015-01-01","2015-01-01","","0000-00-00","","2015-01-01","62","22","2","44","2016-01-01");
INSERT INTO orderfinal VALUES("14270315","ZARA","2015-01-01","2015-01-01","","0000-00-00","","2016-01-01","65","105144","31.27228730659705","244584.29","2015-01-01");
INSERT INTO orderfinal VALUES("234","Textile","2015-10-29","2015-01-01","","0000-00-00","","2015-01-01","61","84","2","168","2015-01-01");
INSERT INTO orderfinal VALUES("444","tommy","2015-11-01","2015-11-03","","0000-00-00","","2015-11-03","-1","57","3.7171929824561","211.88","2015-11-06");
INSERT INTO orderfinal VALUES("7658","Saturn","2015-11-01","0000-00-00","","0000-00-00","","0000-00-00","0","90","2.45","220","0000-00-00");
INSERT INTO orderfinal VALUES("777","tyu","2015-01-01","0000-00-00","","0000-00-00","","0000-00-00","0","30","5.62","196.4","0000-00-00");
INSERT INTO orderfinal VALUES("786","sg,","2015-01-01","2015-01-01","","0000-00-00","","2015-01-01","62","13","8.4615384615385","110","2016-01-01");
INSERT INTO orderfinal VALUES("789","sdfb ","2015-01-01","2015-01-01","dsf","2016-01-01","","2015-01-01","61","123","23","2829","2016-01-01");
INSERT INTO orderfinal VALUES("9999","Textile","2015-10-29","2015-10-31","","0000-00-00","Ammended","2015-12-31","62","125","6.26","1063","2016-01-31");



DROP TABLE users;

CREATE TABLE `users` (
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Full Name` varchar(50) NOT NULL,
  PRIMARY KEY (`UserName`,`Password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("tamal","password","Imran Hossain");



