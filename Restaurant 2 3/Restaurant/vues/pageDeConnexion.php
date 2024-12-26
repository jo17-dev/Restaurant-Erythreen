<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // commence la session
}

// regarde si form est submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // nom et passs
    $correctUser = "admin";
    $correctPass = "admin123";

    if(empty($username) || empty($password)){
        $error = "Tu dois remplir toute les informations necessaires!";
    } else {
        // regarde si username et pass bie nmis
        if ($username === $correctUser && $password === $correctPass) {
            $_SESSION['loggedin'] = true; // variable pour si rentrer
            $_SESSION['username'] = $username;
            header("Location: vues/pageAdmin.php"); // le envoie a la page adminn
            exit;
        } else {
            $error = "Mot de passe ou Nom invalide!!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/style.css">

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var togglePassword = document.getElementById('togglePassword');
        var password = document.getElementById('password');

        togglePassword.addEventListener('click', function (e) {
            var type = password.getAttribute('type');
            if (type === 'password') {
                type = 'text';
            } else {
                type = 'password';
            }
            password.setAttribute('type', type);
            
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var boutonConnexion = document.getElementById("bconnexion");
    var sectionConnexion = document.querySelector(".login-form-container");

    boutonConnexion.addEventListener("click", function() {
        if (sectionConnexion.style.display === "none" || sectionConnexion.style.display === "") {
            sectionConnexion.style.display = "block";
        } else {
            sectionConnexion.style.display = "none";
        }
    });
});
</script>

</head>

<body>
<?php include_once "inclusions/Entete/enteteReservation.php" ?>
<div class="login-background">
    <div class="login-form-container">
        <form method="POST">
            <h2 class="login-title">Connexion</h2>
            <div class="labelsCentered">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="button" id="togglePassword">Cacher</button><br><br>
            </div>
            <div class="buttonCentered">
                <button type="submit">Login</button>
            </div>
        </form>
        <?php if (isset($error)) { echo "<p class='login-error-message'>$error</p>"; } ?>
    </div>
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
