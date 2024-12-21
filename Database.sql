CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO articles (title, content) VALUES
('Introduction to PHP', 'PHP is a popular server-side scripting language.'),
('Getting Started with MySQL', 'MySQL is a powerful open-source database.'),
('Building Web Applications', 'Web applications combine HTML, CSS, and JavaScript.'),
('Understanding MVC Architecture', 'MVC is a design pattern for organizing code.');
