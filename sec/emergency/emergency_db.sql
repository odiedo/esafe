CREATE TABLE MedEmg(
    med_ID INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    coordinates VARCHAR(200) NOT NULL,
    descriptions VARCHAR(200) NOT NULL,
    phone INT(13) UNSIGNED NOT NULL,
    attended INT(5) UNSIGNED NOT NULL,
    not_attended INT(5) UNSIGNED NOT NULL,
    help_ambulance_no_plate VARCHAR(10),
    med_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)