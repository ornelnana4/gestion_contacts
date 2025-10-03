<?php
require_once __DIR__ . '/../models/ContactDAO.php';

class ContactController {
    private $dao;

    public function __construct() {
        $this->dao = new ContactDAO();
    }

    public function list() {
        return $this->dao->getAll();
    }

    public function get($id) {
        return $this->dao->getById($id);
    }

    public function create($nom, $prenom, $email, $telephone) {
        $contact = new ContactModel(null, $nom, $prenom, $email, $telephone);
        $result = $this->dao->insert($contact);

        if ($result === false) {
            // Retourne un message d'erreur si le contact existe déjà
            return "Ce contact existe déjà !";
        }
        return true; // Contact inséré avec succès
    }

    public function edit($id, $nom, $prenom, $email, $telephone) {
        $contact = new ContactModel($id, $nom, $prenom, $email, $telephone);
        $this->dao->update($contact);
    }

    public function delete($id) {
        $this->dao->delete($id);
    }
}
