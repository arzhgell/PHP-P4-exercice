<?php
require_once __DIR__ . '/../config/Database.php';

class Artwork {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM artworks ORDER BY id ASC');
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare('SELECT * FROM artworks WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data) {
        // Validation des données
        $errors = $this->validate($data);
        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        try {
            $stmt = $this->db->prepare('
                INSERT INTO artworks (title, artist, image, description) 
                VALUES (:title, :artist, :image, :description)
            ');

            $stmt->execute([
                ':title' => $data['title'],
                ':artist' => $data['artist'],
                ':image' => $data['image'],
                ':description' => $data['description']
            ]);

            return ['success' => true];
        } catch (PDOException $e) {
            return [
                'success' => false, 
                'errors' => ["Erreur lors de l'enregistrement : " . $e->getMessage()]
            ];
        }
    }

    private function validate($data) {
        $errors = [];

        if (empty($data['title'])) {
            $errors[] = "Le titre est obligatoire";
        }
        if (empty($data['artist'])) {
            $errors[] = "L'artiste est obligatoire";
        }
        if (empty($data['image'])) {
            $errors[] = "L'URL de l'image est obligatoire";
        } elseif (!filter_var($data['image'], FILTER_VALIDATE_URL)) {
            $errors[] = "L'URL de l'image n'est pas valide";
        }
        if (empty($data['description'])) {
            $errors[] = "La description est obligatoire";
        }

        return $errors;
    }
} 