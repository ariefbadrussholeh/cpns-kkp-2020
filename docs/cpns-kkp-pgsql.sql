
CREATE TABLE admin(
    email VARCHAR(50) NOT NULL PRIMARY KEY,
    password VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE users(
    nik VARCHAR(16) NOT NULL PRIMARY KEY,
    created_at TIMESTAMP NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    dob TIMESTAMP NOT NULL,
    sex VARCHAR(10) NOT NULL,
    address VARCHAR(100) NOT NULL,
    photo VARCHAR(200) NOT NULL,
    biodata_submitted_at TIMESTAMP NOT NULL,
    ijazah VARCHAR(200) NOT NULL,
    cv VARCHAR(200),
    position_apply VARCHAR(50) NOT NULL,
    document_submitted_at TIMESTAMP NOT NULL,
    status VARCHAR(50) NOT NULL,
    verified_by VARCHAR(50),
    FOREIGN KEY (verified_by) REFERENCES admin(name)
);

CREATE TABLE test_location(
    id INT NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    zip_code VARCHAR(50) NOT NULL
);

CREATE TABLE test_time(
    id INT NOT NULL PRIMARY KEY,
    location_id INT NOT NULL,
    time_at VARCHAR(50) NOT NULL,
    date TIMESTAMP NOT NULL,
    FOREIGN KEY (location_id) REFERENCES test_location(id)
);

CREATE TABLE card (
    id INT NOT NULL PRIMARY KEY,
    nik VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    position_apply VARCHAR(50) NOT NULL,
    test_location VARCHAR(50) NOT NULL,
    time_at VARCHAR(50) NOT NULL,
    FOREIGN KEY (nik) REFERENCES users(nik),
    FOREIGN KEY (name) REFERENCES users(name),
    FOREIGN KEY (position_apply) REFERENCES users(position_apply),
    FOREIGN KEY (test_location) REFERENCES test_location(name),
    FOREIGN KEY (time_at) REFERENCES test_time(time_at)
);
