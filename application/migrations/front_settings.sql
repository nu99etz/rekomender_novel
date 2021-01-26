CREATE TABLE front_header (
  front_header_id INT PRIMARY KEY AUTO_INCREMENT,
  front_header_logo VARCHAR(255),
  front_header_nav_key INT,
  front_header_submit_link VARCHAR(255),
  is_delete INT,
  is_active INT
  -- FOREIGN KEY(front_header_nav_key) REFERENCES front_nav(front_nav_key) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE front_nav (
  front_nav_id INT PRIMARY KEY AUTO_INCREMENT,
  front_nav_key INT,
  front_nav_name VARCHAR(255),
  front_nav_link VARCHAR(255),
  is_delete INT,
  is_active INT
);

CREATE TABLE front_image_slider (
  front_image_slider_id INT PRIMARY KEY AUTO_INCREMENT,
  front_image_slider_name VARCHAR(255),
  front_image_slider_image VARCHAR(255),
  front_image_slider_name_event INT UNSIGNED,
  is_delete INT,
  is_active INT,
  FOREIGN KEY(front_image_slider_name_event) REFERENCES periode(periode_id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE front_about_countdown (
  front_about_countdown_id INT PRIMARY KEY AUTO_INCREMENT,
  front_about_countdown_title VARCHAR(255),
  front_about_countdown_content TEXT,
  front_about_countdown_content_image VARCHAR(255),
  is_delete INT,
  is_active INT
);

CREATE TABLE front_contact (
  front_contact_id INT PRIMARY KEY AUTO_INCREMENT,
  front_contact_content TEXT,
  is_delete INT,
  is_active INT
);
