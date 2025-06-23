<?php

namespace App\Controllers;

use App\Models\CvModel;

class CvController {
    public function send() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $email = trim($_POST['email']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ' . BASE_URL . '?error=invalid_email');
                exit;
            }

            CvModel::saveEmail($email);
            CvModel::sendCvByEmail($email);

            header('Location: ' . BASE_URL . '?success=cv_sent');
            exit;
        } else {
            header('Location: ' . BASE_URL);
            exit;
        }
    }
}
