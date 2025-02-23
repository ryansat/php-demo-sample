<?php
class AuthController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function logout() {
        session_destroy();
        header('Location: /auth');
        exit();
    }

    public function index() {
        if (isset($_SESSION['user'])) {
            header('Location: /dashboard');
            exit();
        }
        $this->view('auth/login', []);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            error_log("Login attempt - Username: " . $username);
            error_log("Login attempt - Password: " . $password); // Debug password

            $userModel = $this->model('User');
            $user = $userModel->findByUsername($username);

            // Debug password verification
            if ($user) {
                error_log("Stored hash: " . $user['password']);
                error_log("Password verification result: " . (password_verify($password, $user['password']) ? 'true' : 'false'));
            }

            // Use default admin credentials for testing
            if ($username === 'admin' && $password === 'password123') {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => 'admin'
                ];
                error_log("Session created: " . print_r($_SESSION['user'], true));
                header('Location: /dashboard');
                exit();
            }

            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'Invalid username or password. Please try again.'
            ];
        }
        
        header('Location: /auth');
        exit();
    }
}