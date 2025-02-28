<?php
require_once __DIR__ . '/../models/Artwork.php';
require_once __DIR__ . '/../utils/View.php';

class ArtworkController {
    private $artworkModel;
    private $view;

    public function __construct() {
        $this->artworkModel = new Artwork();
        $this->view = new View();
    }

    public function index() {
        $artworks = $this->artworkModel->getAll();
        
        $this->view->assign('title', 'Accueil - Artbox');
        $this->view->assign('artworks', $artworks);
        $this->view->render('artworks/index');
    }

    public function show($id) {
        $artwork = $this->artworkModel->getById($id);
        
        if (!$artwork) {
            header('Location: /');
            exit();
        }

        $this->view->assign('title', $artwork['title'] . ' - Artbox');
        $this->view->assign('artwork', $artwork);
        $this->view->render('artworks/show');
    }

    public function create() {
        $errors = [];
        $success = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->artworkModel->create($_POST);
            
            if ($result['success']) {
                $success = true;
                header("refresh:2;url=/");
            } else {
                $errors = $result['errors'];
            }
        }

        $this->view->assign('title', 'Ajouter une œuvre - Artbox');
        $this->view->assign('errors', $errors);
        $this->view->assign('success', $success);
        $this->view->assign('formData', $_POST);
        $this->view->render('artworks/create');
    }
} 