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