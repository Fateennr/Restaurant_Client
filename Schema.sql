USE restaurant_project;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    pfp VARCHAR(255) DEFAULT NULL,
    contact_no VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE admin (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES user(id) ON DELETE CASCADE
);

-- insert first user id for admin privilege

INSERT INTO user (name, email, pfp, contact_no, password)
VALUES ('Admin', 'admin@gmail.com', '/uploads/pfps/admin.jpg', '9876543210', '1234');

INSERT INTO admin (id) VALUES (LAST_INSERT_ID());
