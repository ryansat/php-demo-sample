<?php
class DashboardController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user'])) {
            header('Location: /auth');
            exit;
        }
    }

    public function index() {
        $data = [];
        
        if ($_SESSION['user']['role'] === 'customer_service') {
            $contactModel = $this->model('Contact');
            $data['contacts'] = $contactModel->getByUserId($_SESSION['user']['id']);
        }

        $this->view('dashboard/index', $data);
    }
}