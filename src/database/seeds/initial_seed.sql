-- Insert admin user
INSERT INTO users (username, password, role) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Insert customer service users
INSERT INTO users (username, password, role) VALUES 
('cs_user1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer_service'),
('cs_user2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer_service');

-- Insert sample contacts
INSERT INTO contacts (user_id, name, phone, email) VALUES 
(2, 'John Doe', '6281234567890', 'john@example.com'),
(2, 'Jane Smith', '6287654321098', 'jane@example.com'),
(3, 'Alice Johnson', '6289876543210', 'alice@example.com');

-- Insert sample activation forms
INSERT INTO activation_forms (user_id, activation_code) VALUES 
(2, 'ACTIVATE123'),
(3, 'ACTIVATE456');