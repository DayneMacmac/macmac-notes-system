CREATE DATABASE IF NOT EXISTS macmac_notes;
USE macmac_notes;

CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO notes (title, content) VALUES
('My First Note', 'This is my first saved note.'),
('School Reminder', 'Finish my school activities.'),
('Things to Do', 'Review my lessons and prepare for class.');
