-- Make sure you're using the correct DB
USE caperob_portfolio_app;

-- Delete existing admin if re-running
DELETE FROM users WHERE email = 'ericbenroberts@gmail.com';

-- Insert admin
INSERT INTO users (email, password, is_admin, created_at)
VALUES (
    'ericbenroberts@gmail.com',
    '$2y$10$V7H3O4wIifkPvXoGXhTPt.lM/2aL5R1wElbjvlYX1.v6u/JdRlCsi',
    1,
    NOW()
);