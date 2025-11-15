CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id)
);

-- Sample Data
INSERT INTO posts (title, content, author_id) VALUES
('First Blog Post', 'This is the content of the first blog post.', 1),
('Second Blog Post', 'Another interesting post for testing dynamic display.', 2),
('PHP & MySQL Demo', 'Showing how backend data is displayed dynamically.', 1);
