<?php

namespace App\Models;

class ContactModel
{
    private \PDO $pdo;

    public function __construct()
    {
        require __DIR__ . '/../../config/bdd/config.php';
        $this->pdo = $pdo;
    }

    /**
     * Sauvegarde un message de contact dans la base de données
     */
    public function save(array $data): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO contact_messages (last_name, first_name, company, email, message, created_at)
             VALUES (:last_name, :first_name, :company, :email, :message, NOW())"
        );

        return $stmt->execute([
            'last_name'   => $data['last_name'],
            'first_name'  => $data['first_name'],
            'company'     => $data['company'],
            'email'       => $data['email'],
            'message'     => $data['message'],
        ]);
    }
}
