-- Create the database
CREATE DATABASE RestaurantDB;
USE RestaurantDB;

-- Table: Reservation
CREATE TABLE Reservation (
    idReservation INT PRIMARY KEY AUTO_INCREMENT,
    nomClient VARCHAR(30),
    dateReservation DATE,
    heure TIME,
    nombrePersonnes INT
);

-- Table: Contact
CREATE TABLE Contact (
    idContact INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30),
    email VARCHAR(50),
    texte VARCHAR(500)
);


-- Table: Plat
CREATE TABLE Plat (
    idPlat INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(45),
    description VARCHAR(200),
    prix DECIMAL(10, 2)
);


-- CREATE TABLE Dessert ICI



-- Table Boisson
CREATE TABLE Boisson (
    idBoisson INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(45),
    prix DECIMAL(10, 2),
    boissonCol VARCHAR(45)
);



-- CREATE TABLE Menu ICI



-- Table: Commande
CREATE TABLE Commande (
    idCommande INT AUTO_INCREMENT PRIMARY KEY,
    nomClient VARCHAR(45),
    date DATE,
    plats TEXT,
    desserts TEXT,
    boissons TEXT,
    total DECIMAL(10, 2)
);



-- CREATE TABLE Menu_has_Plat ICI



-- CREATE TABLE Menu_has_Dessert ICI



-- CREATE TABLE Menu_has_Boisson ICI



-- Table: Plat_has_Commande 
CREATE TABLE Plat_has_Commande (
    Plat_idPlat INT,
    Commande_idCommande INT,
    FOREIGN KEY (Plat_idPlat) REFERENCES Plat(idPlat),
    FOREIGN KEY (Commande_idCommande) REFERENCES Commande(idCommande)
);


-- CREATE TABLE Dessert_has_Commande ICI


-- Table: Boisson_has_Commande 
CREATE TABLE Boisson_has_Commande (
    Boisson_idBoisson INT,
    Commande_idCommande INT,
    FOREIGN KEY (Boisson_idBoisson) REFERENCES Boisson(idBoisson),
    FOREIGN KEY (Commande_idCommande) REFERENCES Commande(idCommande)
);


-- Fait l'insertion de la table reservation ICI


-- Insertion de la table Contact
INSERT INTO Contact (nom, email, texte)
VALUES
('Jean Dupont', 'jean.dupont@example.com', 'Demande de réservation pour 2 personnes.'),
('Alice Durand', 'alice.durand@example.com', 'Question sur les menus végétariens.');


-- Insertion de la table plat ICI


-- Insertion de la table Dessert ICI

-- Insertion dans la table Boissons
INSERT INTO Boisson (nom, prix, boissonCol)
VALUES
('Coca-Cola', 3.00, 'Soft Drink'),
('Fanta', 3.00, 'Soft Drink'),
('Traditional Coffee', 3.00, 'Hot Drink'),
('Pepsi', 3.00, 'Soft Drink'),
('Beer', 6.00, 'Alcoholic Drink'),
('Wine', 14.99, 'Alcoholic Drink');


-- Insertion dans la table Menu ICI


-- Insertion de la table Commande
INSERT INTO Commande (nomClient, date, plats, desserts, boissons, total)
VALUES
('Jean Dupont', '2024-12-01', 'Vegetarian Combo, Shiro', 'Fruit Salad', 'Coca-Cola', 50.00),
('Alice Durand', '2024-12-02', 'Alicha', 'Ice Cream', 'Fanta', 30.00);


-- INSERT INTO Menu_has_Plat  Ici










