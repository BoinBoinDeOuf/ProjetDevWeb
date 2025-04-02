class ProfilController {

private $profilModel;

public function __construct($profilModel) {
    $this->profilModel = $profilModel;
}

// Afficher le profil et le formulaire de modification
public function mon_profil() {
    // Récupérer l'ID de l'utilisateur (par exemple à partir de la session)
    $userId = $_SESSION['user_id'];

    // Récupérer les informations du profil
    $profil = $this->profilModel->getProfil($userId);

    // Afficher la vue avec les informations actuelles
    echo $this->render('mon_profil.twig', ['profil' => $profil]);
}

// Mettre à jour le profil
public function update_profil() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $userId = $_SESSION['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];

        // Mettre à jour le profil
        $this->profilModel->updateProfil($userId, $username, $email, $bio);

        // Rediriger après la mise à jour
        header("Location: /monprofil");
    }
}

// Méthode pour rendre la vue Twig
private function render($template, $data) {
    $loader = new \Twig\Loader\FilesystemLoader('path/to/templates');
    $twig = new \Twig\Environment($loader);
    return $twig->render($template, $data);
}
}
