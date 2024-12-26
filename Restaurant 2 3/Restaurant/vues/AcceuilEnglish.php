<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nakfa Restaurant</title>
    <link rel="stylesheet" href="../Restaurant/CSS/style.css">
</head>
<body>

     <?php include_once "inclusions/Entete/enteteAcceuilEnglish.php" ?>
     <script>
    document.addEventListener('DOMContentLoaded', function() {
        var images = [
            'images/habesha.png', 
            'images/danser.png',
            'images/view.png', 
            'images/church.png', 
            'images/familly.png'
        ];
        var currentIndex = 0;
        var imageElement = document.getElementById('aproposImage');

        setInterval(function() {
            currentIndex = (currentIndex + 1) % images.length;
            imageElement.src = images[currentIndex];
        }, 3000); 
    });
</script>
    
<div class="repetitiveBackground">    
    

<br><br>

    <div class="borderLeft">
    <section class="meilleures-ventes" >
        <h2>BEST SELLERS</h2>
        <div class="plats-grid">
            <div class="plats">
                <img src="../Restaurant/images/shiro.png" alt="Shiro">
                <div class="description">
                    <h3>Shiro</h3>
                    <p><strong>Shiro Ingrédients :</strong> Chickpea flour, onion, garlic, oil, berbere spices, water, salt.</p>
                </div>
            </div>
            <div class="plats">
                <img src="../Restaurant/images/ades.png" alt="Ades">
                <div class="description">
                    <h3>Ades</h3>
                    <p><strong>Ades Ingredients :</strong> Lentils, onion, garlic, tomato, oil, turmeric, cumin, salt, water.</p>
                </div>
            </div>
            <div class="plats">
                <img src="../Restaurant/images/Vegetarien_Viande.png" alt="Combinaison Vege et Viande">
                <div class="description">
                    <h3>Vegetarian and Meat Combination (with chicken)</h3>
                    <p><strong>Combo Ingredients :</strong> An assortment of spicy stews (beef, chicken, lentils) and sautéed vegetables, served on injera, a traditional flatbread. A blend of rich, balanced flavors to enjoy with your hands.</p>
                </div>
            </div>
            <div class="plats">
                <img src="../Restaurant/images/hamli.png" alt="hamli">
                <div class="description">
                    <h3>Hamli</h3>
                    <p><strong>Hamli Ingredients:</strong> Spinach (or kale), onion, garlic, green chili, oil, salt, pepper.</p>
                </div>
            </div>
        </div>
    </section>
    </div>

    <br>
    <br>
    <br>
    <br>

    <div class="borderRight">
    <section class="apropos">
        <h2>About</h2>
        <div class="contenu-apropos">
            <div class="texte-apropos">
                <p>  Eritrean cuisine is a rich blend of flavors
                     and influences from local traditions and exchanges 
                     with neighboring cultures like Ethiopia, Yemen, and 
                     even Italy, due to the Italian colonial period. One of 
                     the staple dishes is injera, a flat, spongy bread, similar 
                     to a crepe, made from teff flour or a mix of grains. It 
                     serves as a base for various dishes and is often accompanied 
                     by stews called tsebhi, made with meat, vegetables, or 
                     legumes, and spiced with berbere, a spicy blend of spices.
                     Eritrean family enjoying a meal
                </p>
            </div>
            <img id="aproposImage" src="../Restaurant/images/habesha.png" alt="Famille érythréenne dégustant un repas">
        </div>
    </section>
    </div>

    <br>
    <br>
    <br>
    <br>

    <div class="borderLeft">
    <section class="localisation">
        <div class="map">
       
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2798.171804300076!2d-73.61562982356301!3d45.46634293329546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc910b82d9f2439%3A0x909d20f27a082343!2s5900%20Chem.%20Upper%20Lachine%2C%20Montr%C3%A9al%2C%20QC%20H4A%202C1!5e0!3m2!1sfr!2sca!4v1730327824711!5m2!1sfr!2sca" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="heures">
            <h3>Opening Hours</h3>
            <p>Monday : 12h00–22h00</p>
            <p>Tuesday : 12h00–22h00</p>
            <p>Wednesday : 12h00–22h00</p>
            <p>Thursday : 12h00–22h00</p>
            <p>Friday : 12h00–22h00</p>
            <p>Saturday : 18h00–22h00</p>
            <p>Sunday : 17h00–22h00</p>
        </div>
    </section> 
</div>




<?php include_once "inclusions/Pied/piedEnglish.php" ?>
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


</div>
</body>
</html>
