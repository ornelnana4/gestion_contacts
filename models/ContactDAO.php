<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/ContactModel.php';

class ContactDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    // CREATE
  public function insert(ContactModel $contact) {
    // Vérifier si un contact avec le même email existe déjà
    $sqlCheck = "SELECT COUNT(*) FROM contacts WHERE email = :email";
    $stmtCheck = $this->pdo->prepare($sqlCheck);
    $stmtCheck->bindValue(':email', $contact->getEmail());
    $stmtCheck->execute();

    if ($stmtCheck->fetchColumn() > 0) {
        // Si le contact existe déjà, on peut renvoyer false ou lancer une exception
        return false; 
        // ou throw new Exception("Ce contact existe déjà !");
    }

    // Sinon, insérer le contact
    $sql = "INSERT INTO contacts (nom, prenom, email, telephone) 
            VALUES (:nom, :prenom, :email, :telephone)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':nom', $contact->getNom());
    $stmt->bindValue(':prenom', $contact->getPrenom());
    $stmt->bindValue(':email', $contact->getEmail());
    $stmt->bindValue(':telephone', $contact->getTelephone());
    $stmt->execute();

    return $this->pdo->lastInsertId();
}


    // READ all
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM contacts ORDER BY nom");
        $contacts = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contacts[] = new ContactModel($row['id'], $row['nom'], $row['prenom'], $row['email'], $row['telephone']);
        }
        return $contacts;
    }

    // READ by ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE id=:id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new ContactModel($row['id'], $row['nom'], $row['prenom'], $row['email'], $row['telephone']);
        }
        return null;
    }

    // UPDATE
    public function update(ContactModel $contact) {
        $sql = "UPDATE contacts SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nom', $contact->getNom());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone', $contact->getTelephone());
        $stmt->bindValue(':id', $contact->getId());
        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id=:id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
    public function contactExists($nom, $prenom, $email) {
    $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM contacts WHERE nom = :nom AND prenom = :prenom OR email = :email");
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email
    ]);
    return $stmt->fetchColumn() > 0;
}

}
