CREATE DATABASE `facebook_login` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `facebook_login`;

CREATE TABLE IF NOT EXISTS `users` (
  `AccountID` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Password` varbinary(100) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`AccountID`, `Email`, `FirstName`, `LastName`, `Password`, `Gender`, `Location` ) VALUES('101', `daskfj@adfjs.com`, `Adam`, `Wohlberg`, `ontology2000`, `M`, `California` );
-- INSERT INTO `users` (`sku`, `name`, `img`, `price`, `paypal`) VALUES(102, 'Mike the Frog Shirt, Black', 'img/shirts/shirt-102.jpg', 20.00, 'SXKPTHN2EES3J');

