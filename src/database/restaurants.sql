DROP TABLE IF EXISTS users;
CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR NOT NULL,
	first_name VARCHAR NOT NULL,
	last_name VARCHAR NOT NULL,
	password VARCHAR(40) NOT NULL,
	email VARCHAR NOT NULL,
	age INTEGER,
	gender VARCHAR,
	address VARCHAR(50)
);

DROP TABLE IF EXISTS restaurants;
CREATE TABLE restaurants (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR NOT NULL,
	description VARCHAR NOT NULL,
	price FLOAT,
	category VARCHAR NOT NULL,
	link VARCHAR,
  address VARCHAR
);

DROP TABLE IF EXISTS restaurant_user;
CREATE TABLE restaurant_user (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurants,
	user_id INTEGER REFERENCES users
);

DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	user_id INTEGER REFERENCES users,
	restaurant_id INTEGER REFERENCES restaurants,
	score INTEGER NOT NULL,
	body VARCHAR NOT NULL,
	date TIMESTAMP NOT NULL,
	likes INTEGER NOT NULL,
	dislikes INTEGER NOT NULL
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	body VARCHAR NOT NULL,
	likes INTEGER NOT NULL,
	dislikes INTEGER NOT NULL
);

DROP TABLE IF EXISTS review_comment;
CREATE TABLE review_comment (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	comment_id INTEGER REFERENCES comments,
	review_id INTEGER REFERENCES reviews,
	user_id INTEGER REFERENCES users
);

DROP TABLE IF EXISTS images;
CREATE TABLE images (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurants,
  path VARCHAR NOT NULL
);

insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (1, 'sgriffin0', 'Shawn', 'Griffin', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'sgriffin0@cocolog-nifty.com', 94, 'Male', '69634 Golf Point');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (2, 'lsims1', 'Louise', 'Sims', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'lsims1@php.net', 48, 'Female', '0 Merrick Plaza');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (3, 'pweaver2', 'Phillip', 'Weaver', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'pweaver2@merriam-webster.com', 73, 'Male', '9 1st Terrace');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (4, 'dmiller3', 'Daniel', 'Miller', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'dmiller3@vistaprint.com', 50, 'Male', '1 Ridgeway Circle');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (5, 'mrichardson4', 'Martha', 'Richardson', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'mrichardson4@arstechnica.com', 35, 'Female', '6593 Spohn Crossing');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (6, 'mgreen5', 'Melissa', 'Green', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'mgreen5@theguardian.com', 58, 'Female', '6 Cherokee Center');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (7, 'cbutler6', 'Christopher', 'Butler', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'cbutler6@nps.gov', 81, 'Male', '3 Cambridge Circle');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (8, 'rfowler7', 'Roger', 'Fowler', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'rfowler7@surveymonkey.com', 87, 'Male', '0 Dunning Lane');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (9, 'pmiller8', 'Philip', 'Miller', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'pmiller8@webeden.co.uk', 39, 'Male', '49 Sugar Junction');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (10, 'afisher9', 'Anne', 'Fisher', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'afisher9@simplemachines.org', 53, 'Female', '5 Larry Park');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (11, 'ntuckera', 'Nicholas', 'Tucker', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'ntuckera@dedecms.com', 77, 'Male', '71930 Hagan Trail');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (12, 'sdixonb', 'Steve', 'Dixon', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'sdixonb@geocities.jp', 87, 'Male', '0076 Rusk Drive');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (13, 'cfreemanc', 'Carol', 'Freeman', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'cfreemanc@twitpic.com', 37, 'Female', '09 Forster Street');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (14, 'btorresd', 'Brandon', 'Torres', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'btorresd@aol.com', 93, 'Male', '1119 Derek Way');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (15, 'kwagnere', 'Keith', 'Wagner', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'kwagnere@technorati.com', 22, 'Male', '5503 Chinook Lane');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (16, 'dhuntf', 'David', 'Hunt', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'dhuntf@ehow.com', 29, 'Male', '4004 Glacier Hill Drive');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (17, 'wyoungg', 'William', 'Young', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'wyoungg@meetup.com', 20, 'Male', '92051 Redwing Center');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (18, 'hfranklinh', 'Howard', 'Franklin', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'hfranklinh@exblog.jp', 79, 'Male', '781 Utah Road');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (19, 'rclarki', 'Rose', 'Clark', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'rclarki@pen.io', 42, 'Female', '10 Boyd Hill');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (20, 'showellj', 'Stephen', 'Howell', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'showellj@google.es', 80, 'Male', '751 Wayridge Point');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (21, 'nbakerk', 'Norma', 'Baker', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'nbakerk@google.fr', 26, 'Female', '99855 Randy Junction');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (22, 'chuntl', 'Carolyn', 'Hunt', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'chuntl@gov.uk', 61, 'Female', '166 Gerald Street');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (23, 'ajordanm', 'Arthur', 'Jordan', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'ajordanm@toplist.cz', 27, 'Male', '769 Oakridge Hill');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (24, 'wdayn', 'William', 'Day', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'wdayn@networkadvertising.org', 100, 'Male', '02476 Emmet Alley');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (25, 'jbankso', 'Jennifer', 'Banks', 'c7ac8db99f1fde1d409bfab46c2843279df170fb', 'jbankso@java.com', 40, 'Female', '8466 Carey Lane');
insert into users (id, username, first_name, last_name, password, email, age, gender, address) values (26, 'renatoabreu', 'Renato', 'Abreu', '12345', 'jbankso@java.com', 40, 'Male', '8466 Carey Lane');

insert into restaurants (id, name, description, price, category, link, address) values (1, 'Feeney-Ryan', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.

Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '$134.20', 'Drive-In', 'https://sourceforge.net', '889 Dunning Terrace');
insert into restaurants (id, name, description, price, category, link, address) values (2, 'Sauer-Zboncak', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', '$12.32', 'Seafood', 'http://mlb.com', '17980 High Crossing Pass');
insert into restaurants (id, name, description, price, category, link, address) values (3, 'Hamill, West and Towne', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.

Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '$129.82', 'Asian', 'https://nih.gov', '814 Hovde Hill');
insert into restaurants (id, name, description, price, category, link, address) values (4, 'Sanford LLC', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '$92.34', 'Drive-In', 'http://wikispaces.com', '89258 Ohio Way');
insert into restaurants (id, name, description, price, category, link, address) values (5, 'Purdy Group', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '$82.48', 'Gourmet', 'https://tumblr.com', '9474 International Plaza');
insert into restaurants (id, name, description, price, category, link, address) values (6, 'Bosco-Roob', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '$188.77', 'Fast Food', 'https://reverbnation.com', '66 Bultman Circle');
insert into restaurants (id, name, description, price, category, link, address) values (7, 'Wisoky-Hand', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '$132.26', 'Seafood', 'http://devhub.com', '6104 Schlimgen Center');
insert into restaurants (id, name, description, price, category, link, address) values (8, 'Willms-Cummerata', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.

Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '$4.06', 'Asian', 'https://rambler.ru', '05 Corscot Center');
insert into restaurants (id, name, description, price, category, link, address) values (9, 'Jast LLC', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '$152.17', 'Fast Food', 'http://hp.com', '831 Hoffman Parkway');
insert into restaurants (id, name, description, price, category, link, address) values (10, 'Wiegand, Schaefer and Hilll', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.

Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '$169.14', 'Traditional Cuisine', 'http://fema.gov', '9 Elmside Junction');
insert into restaurants (id, name, description, price, category, link, address) values (11, 'Turner, Kulas and Romaguera', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', '$73.64', 'Fast Food', 'http://oaic.gov.au', '28 International Trail');
insert into restaurants (id, name, description, price, category, link, address) values (12, 'Rodriguez-Brakus', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '$191.92', 'Gourmet', 'http://webeden.co.uk', '5 Talmadge Avenue');
insert into restaurants (id, name, description, price, category, link, address) values (13, 'Flatley, Weissnat and Koepp', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '$217.62', 'Drive-In', 'http://economist.com', '951 Norway Maple Terrace');
insert into restaurants (id, name, description, price, category, link, address) values (14, 'Kris and Sons', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.

Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', '$23.51', 'Take-out', 'http://ask.com', '64054 Hooker Terrace');
insert into restaurants (id, name, description, price, category, link, address) values (15, 'Metz Group', 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '$60.29', 'Asian', 'https://plala.or.jp', '62 Fremont Center');
insert into restaurants (id, name, description, price, category, link, address) values (16, 'Marks, Ritchie and Nader', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '$59.12', 'Asian', 'http://cisco.com', '0 Pennsylvania Road');
insert into restaurants (id, name, description, price, category, link, address) values (17, 'Spinka, Braun and Kirlin', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.

Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '$149.21', 'Traditional Cuisine', 'http://seesaa.net', '5 Manitowish Alley');
insert into restaurants (id, name, description, price, category, link, address) values (18, 'Collins-Kertzmann', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.

Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '$237.45', 'Fast Food', 'https://weibo.com', '42598 Manley Lane');
insert into restaurants (id, name, description, price, category, link, address) values (19, 'Pacocha, Beer and Lowe', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.

Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '$240.12', 'Asian', 'http://loc.gov', '66 Wayridge Center');
insert into restaurants (id, name, description, price, category, link, address) values (20, 'Leffler LLC', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.

In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '$23.32', 'Take-out', 'http://salon.com', '9047 Dapin Crossing');
insert into restaurants (id, name, description, price, category, link, address) values (21, 'Roob-Beahan', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', '$131.48', 'Traditional Cuisine', 'http://house.gov', '9099 Sheridan Hill');
insert into restaurants (id, name, description, price, category, link, address) values (22, 'Koss, Gleichner and Wuckert', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.

Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '$15.39', 'Seafood', 'https://networksolutions.com', '7777 Tomscot Plaza');
insert into restaurants (id, name, description, price, category, link, address) values (23, 'Balistreri, Farrell and Kub', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.

Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '$239.69', 'Asian', 'http://friendfeed.com', '42 Village Green Center');
insert into restaurants (id, name, description, price, category, link, address) values (24, 'Harvey-Stamm', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '$225.02', 'Gourmet', 'http://pen.io', '7146 West Trail');
insert into restaurants (id, name, description, price, category, link, address) values (25, 'Baumbach Inc', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.

Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '$142.92', 'Gourmet', 'https://exblog.jp', '39 Stone Corner Center');

insert into restaurant_user(id, restaurant_id, user_id) values(1, 12, 26);
insert into restaurant_user(id, restaurant_id, user_id) values(2, 15, 26);
insert into restaurant_user(id, restaurant_id, user_id) values(3, 14, 26);
insert into restaurant_user(id, restaurant_id, user_id) values(4, 5, 26);