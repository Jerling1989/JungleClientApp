CREATE TABLE users (
	id INT AUTO_INCREMENT NOT NULL,
	first_name VARCHAR (25),
	last_name VARCHAR (25),
	username VARCHAR (60),
	email VARCHAR (60),
	password VARCHAR (255),
	signup_date DATE,
	user_closed VARCHAR (3),
	client_array TEXT,
	PRIMARY KEY (id)
);
