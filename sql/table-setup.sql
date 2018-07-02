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

CREATE TABLE clients (
	id INT AUTO_INCREMENT NOT NULL,
	first_name VARCHAR (25),
	last_name VARCHAR (25),
	username VARCHAR (60),
	company_name VARCHAR (60),
	email VARCHAR (60),
	phone_number VARCHAR (25),
	profile_pic VARCHAR (255),
	street_address VARCHAR (60),
	city VARCHAR (25),
	state VARCHAR (25),
	website VARCHAR(60),
	facebook VARCHAR (60),
	instagram VARCHAR (60),
	twitter VARCHAR (60),
	linkedin VARCHAR (60),
	youtube VARCHAR (60),
	date_added DATE,
	client_closed VARCHAR (3),
	services_array TEXT,
	PRIMARY KEY (id)
); 

CREATE TABLE tasks (
	id INT AUTO_INCREMENT NOT NULL,
	task_name VARCHAR(60),
	client_for VARCHAR(60),
	created_at DATETIME,
	created_by VARCHAR(60),
	pending_at DATETIME,
	pending_by VARCHAR(60),
	completed_at DATETIME,
	completed_by VARCHAR(60),
	PRIMARY KEY (id)
);