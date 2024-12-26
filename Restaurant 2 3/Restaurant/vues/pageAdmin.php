<?php
require_once '../contolers/controlleurProduit.class.php';
require_once '../modele/DAO/ProduitDAO.class.php';
require_once '../modele/DAO/connexionBD.php';





$controller = new ProduitController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addPlat'])) {
        $nom = $_POST['nomPlat'];
        $description = $_POST['descriptionPlat'];
        $prix = $_POST['prixPlat'];
        $controller->addPlat($nom, $description, $prix);
    } elseif (isset($_POST['addBoisson'])) {
        $nom = $_POST['nomBoisson'];
        $prix = $_POST['prixBoisson'];
        $boissonCol = $_POST['boissonCol'];
        $controller->addBoisson($nom, $prix, $boissonCol);
    } elseif (isset($_POST['addDessert'])) {
        $nom = $_POST['nomDessert'];
        $description = $_POST['descriptionDessert'];
        $prix = $_POST['prixDessert'];
        $controller->addDessert($nom, $description, $prix);
    } elseif (isset($_POST['deletePlat'])) {
        $idPlat = $_POST['idPlat'];
        $controller->deletePlat($idPlat);
    } elseif (isset($_POST['deleteBoisson'])) {
        $idBoisson = $_POST['idBoisson'];
        $controller->deleteBoisson($idBoisson);
    } elseif (isset($_POST['deleteDessert'])) {
        $idDessert = $_POST['idDessert'];
        $controller->deleteDessert($idDessert);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ajouter un produit</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
<?php include_once "inclusions/Entete/enteteReservation.php" ?>

<!-- PARTIE AJOUTER -------------------------------------------------------------------------- -->

    <div class="Centerh2">
        <h1>Ajouter un produit</h1>
    </div>
    <div class="centerPart">
        <h2>Ajouter un plat</h2>
        <form method="POST">
            <label for="nomPlat">Nom:</label>
            <input type="text" id="nomPlat" name="nomPlat" required><br><br>
            <label for="descriptionPlat">Description:</label>
            <input type="text" id="descriptionPlat" name="descriptionPlat" required><br><br>
            <label for="prixPlat">Prix:</label>
            <input type="text" id="prixPlat" name="prixPlat" required><br><br>
            <button type="submit" name="addPlat">Ajouter Plat</button>
        </form>
    </div>

    <div class="centerPart">
        <h2>Ajouter une boisson</h2>
        <form method="POST">
            <label for="nomBoisson">Nom:</label>
            <input type="text" id="nomBoisson" name="nomBoisson" required><br><br>
            <label for="prixBoisson">Prix:</label>
            <input type="text" id="prixBoisson" name="prixBoisson" required><br><br>
            <label for="boissonCol">Boisson Col:</label>
            <input type="text" id="boissonCol" name="boissonCol" required><br><br>
            <button type="submit" name="addBoisson">Ajouter Boisson</button>
        </form>
    </div>

    <div class="centerPart">
        <h2>Ajouter un dessert</h2>
        <form method="POST">
            <label for="nomDessert">Nom:</label>
            <input type="text" id="nomDessert" name="nomDessert" required><br><br>
            <label for="descriptionDessert">Description:</label>
            <input type="text" id="descriptionDessert" name="descriptionDessert" required><br><br>
            <label for="prixDessert">Prix:</label>
            <input type="text" id="prixDessert" name="prixDessert" required><br><br>
            <button type="submit" name="addDessert">Ajouter Dessert</button>
        </form>
    </div>

<!-- PARTIE SUPPRIMER -------------------------------------------------------------------------- -->

    <div class="Centerh2">
        <h1>Supprimer un produit</h1>
    </div>
    <div class="centerPart">
        <h2>Supprimer plat</h2>
        <form method="POST">
            <label for="idPlat">ID:</label>
            <input type="text" id="idPlat" name="idPlat" required><br><br>
            <button type="submit" name="deletePlat">Supprimer Plat</button>
        </form>
    </div>

    <div class="centerPart">
        <h2>Supprimer boisson</h2>
        <form method="POST">
            <label for="idBoisson">ID:</label>
            <input type="text" id="idBoisson" name="idBoisson" required><br><br>
            <button type="submit" name="deleteBoisson">Supprimer Boisson</button>
        </form>
    </div>

    <div class="centerPart">
        <h2>Supprimer un dessert</h2>
        <form method="POST">
            <label for="idDessert">ID:</label>
            <input type="text" id="idDessert" name="idDessert" required><br><br>
            <button type="submit" name="deleteDessert">Supprimer Dessert</button>
        </form>
    </div>
    <canvas id="flocon"></canvas>


<script>

const canvas = document.getElementById('flocon');
const ctx = canvas.getContext('2d');


canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const NOMBRE_FLOCONS = 100; 
const flocons = [];


function aleatoire(min, max) {
    return Math.random() * (max - min) + min;
}


class Flocon {
    constructor() {
        this.x = aleatoire(0, canvas.width);
        this.y = aleatoire(0, canvas.height);
        this.taille = aleatoire(2, 5);
        this.vitesseY = aleatoire(1, 3);
        this.vitesseX = aleatoire(-1, 1);
    }

    dessiner() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.taille, 0, Math.PI * 2);
        ctx.fillStyle = '#fff';
        ctx.fill();
    }

    mettreAJour() {
        this.y += this.vitesseY;
        this.x += this.vitesseX;

        
        if (this.y > canvas.height) {
            this.y = 0;
            this.x = aleatoire(0, canvas.width);
        }

        this.dessiner();
    }
}


function initialiserFlocons() {
    for (let i = 0; i < NOMBRE_FLOCONS; i++) {
        flocons.push(new Flocon());
    }
}

function animer() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); 
    flocons.forEach(flocon => flocon.mettreAJour());
    requestAnimationFrame(animer);
}


window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    flocons.length = 0; 
    initialiserFlocons();
});


initialiserFlocons();
animer();
</script>

</body>

</html>
