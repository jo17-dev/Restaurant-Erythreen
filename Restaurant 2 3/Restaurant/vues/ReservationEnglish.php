<!DOCTYPE html> 
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="../Restaurant/CSS/style.css">
</head>
<body>
    <?php include_once "inclusions/Entete/enteteReservationEnglish.php" ?>
<div class="conteineres">
<div class="form-container">
    <form method="post" action="?action=ajouterReservation">
        <h2>Reservation</h2>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name"  value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"/>
        </div>

        <div>
            <label for="nombrePersonnes">Number of people</label>
            <input type="number" id="nombrePersonnes" name="nombrePersonnes" max="6" min="1"  value="<?php echo isset($_POST['nombrePersonnes']) ? htmlspecialchars($_POST['nombrePersonnes']) : ''; ?>"/>
        </div>

        <p></p>

        <div>
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required onchange="this.form.submit()" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''; ?>"/>
        </div>

        <div>
            <label for="time">Time</label>
            <select id="time" name="time" required>
                <?php
                if (!empty($heuresDisponibles)) {
                    foreach ($heuresDisponibles as $heure) {
                        $selected = (isset($_POST['time']) && $_POST['time'] == $heure) ? 'selected' : '';
                        echo "<option value=\"$heure\" $selected>$heure</option>";
                    }
                } else {
                    echo "<option value=\"\">Choisissez une date d'abord</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <button type="submit">Reserve</button>
        </div>
        <p><?php
        echo $messages; ?></p>
    </form>
</div>
</div>
   <?php include_once "inclusions/Pied/pied.php" ?>
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
