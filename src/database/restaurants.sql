CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	first_name VARCHAR NOT NULL,
	last_name VARCHAR NOT NULL,
	password VARCHAR,
	email VARCHAR NOT NULL,
	age INTEGER,
	gender VARCHAR,
	address VARCHAR(50)
);

CREATE TABLE restaurants (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR NOT NULL,
	description VARCHAR NOT NULL,
	image VARCHAR,
	price FLOAT,
	category VARCHAR NOT NULL,
	link VARCHAR
);

CREATE TABLE restaurant_user (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurants,
	user_id INTEGER REFERENCES users
);

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

CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	body VARCHAR NOT NULL,
	likes INTEGER NOT NULL,
	dislikes INTEGER NOT NULL
);

CREATE TABLE review_comment (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	comment_id INTEGER REFERENCES comments,
	review_id INTEGER REFERENCES reviews,
	user_id INTEGER REFERENCES users
);

insert into users (id, first_name, last_name, password, email, age, address, gender) values (1, 'Shirley', 'Johnston', '1HquSL', 'sjohnston0@independent.co.uk', 19, '974 Buell Street', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (2, 'Ruth', 'Foster', '05NIIfgqSBbg', 'rfoster1@usnews.com', 69, '6 Memorial Center', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (3, 'Michael', 'Bradley', 'wFFVnHx', 'mbradley2@wunderground.com', 51, '24 Sutteridge Court', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (4, 'Earl', 'Mitchell', '04ieWqn', 'emitchell3@imgur.com', 42, '7 Oak Place', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (5, 'Norma', 'Henderson', 'sqF4Rvjs9JB', 'nhenderson4@eepurl.com', 39, '37 Warbler Road', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (6, 'Arthur', 'Bennett', 'GULiPC', 'abennett5@drupal.org', 95, '3 Fieldstone Place', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (7, 'Irene', 'Cox', 'PL11xY', 'icox6@google.es', 12, '13 Hansons Place', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (8, 'Johnny', 'Hall', 'u91UeST', 'jhall7@hc360.com', 23, '42 Corry Court', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (9, 'Annie', 'Matthews', 'pkdEjK', 'amatthews8@networkadvertising.org', 9, '46 Fremont Park', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (10, 'Debra', 'Hernandez', 'UbOAzSToJP', 'dhernandez9@github.com', 71, '7599 Dawn Junction', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (11, 'Jerry', 'Taylor', 'SMJH5j', 'jtaylora@cdc.gov', 58, '596 Buena Vista Park', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (12, 'Cynthia', 'Ward', 'Gt6B3Ccdqd', 'cwardb@ovh.net', 35, '35022 Monterey Lane', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (13, 'Ruth', 'Carroll', '8HbRLCbtYWl', 'rcarrollc@bbb.org', 37, '70 Northport Place', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (14, 'Diane', 'Smith', '5OWD7F0', 'dsmithd@patch.com', 52, '18276 Eastlawn Parkway', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (15, 'Scott', 'Shaw', 'v1wfWpro4c', 'sshawe@globo.com', 79, '2725 Sycamore Alley', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (16, 'Jimmy', 'Simmons', 'rEOWVRs7WP', 'jsimmonsf@godaddy.com', 91, '4 Continental Terrace', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (17, 'Carol', 'Snyder', 'fz0HasCp', 'csnyderg@businessweek.com', 8, '1 Kings Center', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (18, 'Catherine', 'Cunningham', 'ps4TEeL9rqR', 'ccunninghamh@ucla.edu', 96, '51 Loftsgordon Street', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (19, 'Justin', 'Turner', '71XTcHtNOz', 'jturneri@prnewswire.com', 60, '6 Roxbury Trail', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (20, 'Carol', 'Fernandez', 'NKuH5GmVTs2H', 'cfernandezj@cnet.com', 51, '2 Buena Vista Center', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (21, 'Eugene', 'Bishop', 'YfbjC0HXnX', 'ebishopk@theguardian.com', 65, '44097 David Terrace', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (22, 'Ralph', 'Wallace', 'YiLH2D', 'rwallacel@alibaba.com', 63, '134 Golf View Road', 'Male');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (23, 'Amanda', 'Wells', 'CBpoonxoN2YG', 'awellsm@google.pl', 95, '7985 Stang Street', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (24, 'Stephanie', 'Patterson', 'N7ltVfik', 'spattersonn@themeforest.net', 100, '9370 Veith Alley', 'Female');
insert into users (id, first_name, last_name, password, email, age, address, gender) values (25, 'Marie', 'Harper', 'depCuICr0', 'mharpero@economist.com', 50, '430 Killdeer Crossing', 'Female');

insert into restaurants (id, name, description, image, price, category, link) values (1, 'Pfannerstill, Reichert and Doyle', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.

Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 'http://dummyimage.com/196x140.bmp/5fa2dd/ffffff', '$97.82', 'Asian', 'dot.gov');
insert into restaurants (id, name, description, image, price, category, link) values (2, 'Kuphal, Oberbrunner and Stiedemann', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'http://dummyimage.com/226x222.png/dddddd/000000', '$63.82', 'Drive-in', 'youtu.be');
insert into restaurants (id, name, description, image, price, category, link) values (3, 'Oberbrunner-Stiedemann', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.

Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'http://dummyimage.com/146x177.jpg/5fa2dd/ffffff', '$79.29', 'Seafood', 'google.com.hk');
insert into restaurants (id, name, description, image, price, category, link) values (4, 'Schuppe Inc', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 'http://dummyimage.com/117x235.jpg/5fa2dd/ffffff', '$35.88', 'Take-out', 'eventbrite.com');
insert into restaurants (id, name, description, image, price, category, link) values (5, 'Hudson-Heidenreich', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.

Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 'http://dummyimage.com/211x130.bmp/5fa2dd/ffffff', '$54.61', 'Fast Food', 'scribd.com');
insert into restaurants (id, name, description, image, price, category, link) values (6, 'Weber LLC', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.

Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 'http://dummyimage.com/180x241.png/5fa2dd/ffffff', '$76.69', 'Tradition Cuisine', 'usnews.com');
insert into restaurants (id, name, description, image, price, category, link) values (7, 'Ullrich, Farrell and Sipes', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.

Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 'http://dummyimage.com/172x186.png/5fa2dd/ffffff', '$12.70', 'Seafood', 'netscape.com');
insert into restaurants (id, name, description, image, price, category, link) values (8, 'Considine LLC', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.

Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'http://dummyimage.com/112x157.png/5fa2dd/ffffff', '$80.83', 'Gourmet', 'tmall.com');
insert into restaurants (id, name, description, image, price, category, link) values (9, 'Dicki Inc', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.

Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.

Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 'http://dummyimage.com/184x250.jpg/dddddd/000000', '$25.39', 'Gourmet', 'ucsd.edu');
insert into restaurants (id, name, description, image, price, category, link) values (10, 'Reynolds-Kuphal', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'http://dummyimage.com/128x189.jpg/5fa2dd/ffffff', '$32.22', 'Asian', 'comsenz.com');
insert into restaurants (id, name, description, image, price, category, link) values (11, 'Strosin, Bayer and Hirthe', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.

Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'http://dummyimage.com/113x179.png/ff4444/ffffff', '$64.08', 'Drive-in', 'goo.ne.jp');
insert into restaurants (id, name, description, image, price, category, link) values (12, 'Shanahan-Wehner', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.

Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.

Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 'http://dummyimage.com/209x137.png/5fa2dd/ffffff', '$7.14', 'Seafood', 'bandcamp.com');
insert into restaurants (id, name, description, image, price, category, link) values (13, 'Bruen-MacGyver', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 'http://dummyimage.com/123x207.png/5fa2dd/ffffff', '$94.45', 'Seafood', 'imageshack.us');
insert into restaurants (id, name, description, image, price, category, link) values (14, 'O''Reilly and Sons', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.

In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.

Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 'http://dummyimage.com/171x139.jpg/cc0000/ffffff', '$41.96', 'Take-out', 'goo.ne.jp');
insert into restaurants (id, name, description, image, price, category, link) values (15, 'Abernathy-Torp', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.

Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'http://dummyimage.com/110x185.jpg/cc0000/ffffff', '$12.54', 'Seafood', 'w3.org');
insert into restaurants (id, name, description, image, price, category, link) values (16, 'Rogahn-Daugherty', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 'http://dummyimage.com/126x127.bmp/ff4444/ffffff', '$8.87', 'Seafood', 'plala.or.jp');
insert into restaurants (id, name, description, image, price, category, link) values (17, 'Collier-Abernathy', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'http://dummyimage.com/186x168.png/5fa2dd/ffffff', '$12.93', 'Asian', 'psu.edu');
insert into restaurants (id, name, description, image, price, category, link) values (18, 'Schiller, Johnson and Ruecker', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.

Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.

Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 'http://dummyimage.com/228x143.jpg/dddddd/000000', '$59.95', 'Seafood', 'mac.com');
insert into restaurants (id, name, description, image, price, category, link) values (19, 'Kessler and Sons', 'In congue. Etiam justo. Etiam pretium iaculis justo.', 'http://dummyimage.com/121x204.jpg/cc0000/ffffff', '$41.13', 'Take-out', 'friendfeed.com');
insert into restaurants (id, name, description, image, price, category, link) values (20, 'Morissette LLC', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.

Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 'http://dummyimage.com/172x243.bmp/ff4444/ffffff', '$86.07', 'Fast Food', 'networkadvertising.org');
insert into restaurants (id, name, description, image, price, category, link) values (21, 'Weber-Ruecker', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 'http://dummyimage.com/135x196.png/5fa2dd/ffffff', '$22.08', 'Tradition Cuisine', 'xinhuanet.com');
insert into restaurants (id, name, description, image, price, category, link) values (22, 'Marquardt-Tillman', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.

Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.

Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'http://dummyimage.com/150x199.jpg/cc0000/ffffff', '$79.04', 'Take-out', 'liveinternet.ru');
insert into restaurants (id, name, description, image, price, category, link) values (23, 'Robel Inc', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 'http://dummyimage.com/227x176.bmp/dddddd/000000', '$4.56', 'Take-out', 'com.com');
insert into restaurants (id, name, description, image, price, category, link) values (24, 'Donnelly, Morissette and Breitenberg', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.

Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'http://dummyimage.com/162x147.png/cc0000/ffffff', '$84.63', 'Seafood', 'usa.gov');
insert into restaurants (id, name, description, image, price, category, link) values (25, 'Welch-Abernathy', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.

Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 'http://dummyimage.com/206x196.bmp/ff4444/ffffff', '$99.74', 'Drive-in', 'slashdot.org');
insert into restaurants (id, name, description, image, price, category, link) values (26, 'Bailey LLC', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 'http://dummyimage.com/126x235.bmp/ff4444/ffffff', '$99.38', 'Gourmet', 'engadget.com');
insert into restaurants (id, name, description, image, price, category, link) values (27, 'Lang LLC', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 'http://dummyimage.com/112x180.bmp/cc0000/ffffff', '$23.62', 'Tradition Cuisine', 'sun.com');
insert into restaurants (id, name, description, image, price, category, link) values (28, 'Hermann Inc', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 'http://dummyimage.com/188x222.png/cc0000/ffffff', '$77.79', 'Asian', 'themeforest.net');
insert into restaurants (id, name, description, image, price, category, link) values (29, 'Simonis-O''Reilly', 'Fusce consequat. Nulla nisl. Nunc nisl.', 'http://dummyimage.com/187x114.jpg/cc0000/ffffff', '$53.31', 'Seafood', 'independent.co.uk');
insert into restaurants (id, name, description, image, price, category, link) values (30, 'Hyatt-Rau', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.

Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.

Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 'http://dummyimage.com/163x228.bmp/cc0000/ffffff', '$36.47', 'Tradition Cuisine', 'skyrock.com');