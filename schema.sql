DROP DATABASE Hackkings6;
CREATE DATABASE Hackkings6;
Use Hackkings6;

CREATE TABLE user(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_name VARCHAR(255) NOT NULL UNIQUE,
    email_add VARCHAR(255) NOT NULL UNIQUE,
    hashed_password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL
);
CREATE TABLE charity_event(
    id INT  AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(8000) NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    address VARCHAR(255) NOT NULL,
    postcode VARCHAR(10) NOT NULL,
    organiser_id INT NOT NULL,
    imgurl VARCHAR(255),
    fund_goal INT DEFAULT 0,
    FOREIGN KEY(organiser_id) REFERENCES user(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


CREATE TABLE donation(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    eid INT NOT NULL,
    uid INT NOT NULL,
    amount INT NOT NULL DEFAULT 0,
    FOREIGN KEY (eid) REFERENCES charity_event(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (uid) REFERENCES user(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
    

);

CREATE TABLE participant(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    eid INT NOT NULL,
    uid INT NOT NULL,
    FOREIGN KEY (eid) REFERENCES charity_event(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (uid) REFERENCES user(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
    
);

INSERT INTO user (user_name, email_add, hashed_password, phone_number) 
VALUES ("Xinyi", "xinyi@hpb.com", "$oiaushdoaishdoiashd", "0741596152");
INSERT INTO user (user_name, email_add, hashed_password, phone_number) 
VALUES ("Ravi", "ravi@hpb.com", "$oiaushdoaishdoiashd", "074182213123");
INSERT INTO user (user_name, email_add, hashed_password, phone_number) 
VALUES ("Terry", "terry@hpb.com", "$oiaushdoaishdoiashd", "0887212312");
INSERT INTO user (user_name, email_add, hashed_password, phone_number) 
VALUES ("Hoang", "hoang@hpb.com", "$oiaushdoaishdoiashd", "0943238232");
INSERT INTO user (user_name, email_add, hashed_password, phone_number) 
VALUES ("Sam", "sam@hpb.com", "$oiaushdoaishdoiashd", "0941242232");
INSERT INTO user (user_name, email_add, hashed_password, phone_number) 
VALUES ("David", "david@hpb.com", "$oiaushdoaishdoiashd", "0949238232");

INSERT INTO charity_event(name, description, start_date, end_date, address, postcode, organiser_id, imgurl, fund_goal)
VALUES("Care For Cancer Seminar", "We will be hosting a seminar for people affected by relatives who suffer from Cancer. What could you do? What should you do? We will discuss that in this seminar!", "2019-12-09 17:00:00", "2019-12-10 19:00:00", "St. Paul Cathedral, St. Paul Churchyard", "EC4M8AD", 1, "seminar.jpeg", 30);

INSERT INTO charity_event(name, description, start_date, end_date, address, postcode, organiser_id, imgurl, fund_goal)
VALUES("Tree Spree", "As the head of the Tree Spree foundation, I will be leading a battalion of climate change warriors and planting an ample number of trees over the span of 3 days. Join us or donate!", "2019-12-03 06:00:00", "2019-12-05 17:30:00", "The Willows, Forest Road", "IG63SL ", 2, "trees.jpeg", 150);

INSERT INTO charity_event(name, description, start_date, end_date, address, postcode, organiser_id, imgurl, fund_goal)
VALUES("Rescue Street Dogs", "As beings of born to mother nature, it is our duty to help lesser animals. We will rescue animals from the street.", "2020-01-01 10:00:00", "2020-01-02 01:00:00", "100 Sporle Court", "Larkhall Park", "SW82PX", 3, "dog.jpg", 0);

INSERT INTO charity_event(name, description, start_date, end_date, address, postcode, organiser_id, imgurl, fund_goal)
VALUES("Hot Choc Society", "We are making as much as hot chocolate as possible to give out to homelesss people to warm them up in the freezing winter nights", "2019-12-01 10:00:00", "2019-12-14 16:00:00", "30 Aldwych", "WC2B4BG", 4, "hotchocolate.jpg", 100);

INSERT INTO charity_event(name, description, start_date, end_date, address, postcode, organiser_id, imgurl, fund_goal)
VALUES("Shelter the people", "We will be providing relief to homeless people for the upcoming storm next week.", "2019-12-30", "2019-12-31", "34 Aldwych, "WC2B4BG", 5, "shelter.jpg", 20);

INSERT INTO charity_event(name, description, start_date, end_date, address, postcode, organiser_id, imgurl, fund_goal)
VALUES("No cigarette ", "Let", "2019-12-30", "2019-12-31", "51 Sporle Court", "SW112ER", , "", 0);

INSERT INTO charity_event(name, description, start_date, end_date, address, postcode, organiser_id, imgurl, fund_goal)
VALUES("Free chicken soup", "Handing out birthday cake for the hungry poor!", "2019-12-30", "2019-12-31", "51 Sporle Court", "SW112ER", 3, "", 0);

