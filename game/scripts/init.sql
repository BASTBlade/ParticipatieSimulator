CREATE TABLE user_data(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(75) NOT NULL,
    reg_date TIMESTAMP
)

CREATE TABLE password_recovery(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    recovery_key VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES user_data(id)
)

CREATE TABLE maps(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    creator_id INT(6) NOT NULL,
    FOREIGN KEY(creator_id) REFERENCES user_data(id)
);

CREATE TABLE tiles(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    map_id INT(6) NOT NULL,
    starttile INT(2) NOT NULL,
    background VARCHAR(255),
    maprow INT(6) NOT NULL,
    position INT(6) NOT NULL,
    FOREIGN KEY(map_id) REFERENCES maps(id)
);