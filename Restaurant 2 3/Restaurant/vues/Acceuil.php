<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Nakfa</title>
    <link rel="stylesheet" href="../Restaurant/CSS/style.css">
 


    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

</head>
<body>

<?php include_once "inclusions/Entete/enteteAcceuil.php" ?>
 
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
        <h2>LES MEILLEURES VENTES</h2>
        <div class="plats-grid">
            <div class="plats">
                <img src="../Restaurant/images/shiro.png" alt="Shiro">
                <div class="description">
                    <h3>Shiro</h3>
                    <p><strong>Ingrédients du Shiro :</strong> Ingrédients du Shiro : Farine de pois chiches, oignon, ail, huile, épices berbere, eau, sel.</p>
                </div>
            </div>
            <div class="plats">
                <img src="../Restaurant/images/ades.png" alt="Ades">
                <div class="description">
                    <h3>Ades</h3>
                    <p><strong>Ingrédients de Ades :</strong> Ingrédients de l'Ades : Lentilles, oignon, ail, tomate, huile, curcuma, cumin, sel, eau.</p>
                </div>
            </div>
            <div class="plats">
                <img src="../Restaurant/images/Vegetarien_Viande.png" alt="Combinaison Vege et Viande">
                <div class="description">
                    <h3>Vegetarian and Meat Combination (with chicken)</h3>
                    <p><strong>Ingredients du Combo :</strong> Un assortiment de ragoûts épicés (bœuf, poulet, lentilles) et de légumes sautés, servi sur de l'injera, une galette traditionnelle. Un mélange de saveurs riches et équilibrées à savourer avec les mains.</p>
                </div>
            </div>
            <div class="plats">
                <img src="../Restaurant/images/hamli.png" alt="hamli">
                <div class="description">
                    <h3>Hamli</h3>
                    <p><strong>Ingrédients du Hamli:</strong>  Épinards (ou chou frisé), oignon, ail, piment vert, huile, sel, poivre.</p>
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
        <h2>À propos</h2>
        <div class="contenu-apropos">
            <div class="texte-apropos">
                <p>La cuisine érythréenne est un mélange riche de saveurs et d'influences provenant des traditions locales et des échanges avec des cultures voisines comme l'Éthiopie, le Yémen, et même l'Italie, en raison de la période de colonisation italienne. L'un des plats de base est l'injera, une galette plate et spongieuse, semblable à une crêpe, faite de farine de teff ou d'un mélange de céréales. Elle sert de base pour plusieurs plats et est souvent accompagnée de ragoûts appelés tsebhi, cuisinés avec de la viande, des légumes, ou des légumineuses, et épicés avec le berbere, un mélange d'épices piquant.</p>
            </div>
            <img id="aproposImage" src="images/habesha.png" alt="Famille érythréenne dégustant un repas">
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
            <h3>Heures d'ouverture</h3>
            <p>Lundi : 12h00–22h00</p>
            <p>Mardi : 12h00–22h00</p>
            <p>Mercredi : 12h00–22h00</p>
            <p>Jeudi : 12h00–22h00</p>
            <p>Vendredi : 12h00–22h00</p>
            <p>Samedi : 18h00–22h00</p>
            <p>Dimanche : 17h00–22h00</p>
        </div>
    </section> 
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