-- Table des catégories
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL
);

-- Table des métiers
CREATE TABLE metiers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    categorie_id INT NOT NULL,
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

-- Table des utilisateurs
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100),
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('client','artisan','admin') NOT NULL
);

-- Table des artisans
CREATE TABLE artisans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id INT NOT NULL,
    metier_id INT NOT NULL,
    telephone VARCHAR(20),
    adresse VARCHAR(255),
    ville VARCHAR(100),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (metier_id) REFERENCES metiers(id)
);

-- Table des services
CREATE TABLE services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artisan_id INT NOT NULL,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2),
    FOREIGN KEY (artisan_id) REFERENCES artisans(id)
);

-- Table des demandes
CREATE TABLE demandes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    service_id INT NOT NULL,
    date_demande DATE NOT NULL,
    statut ENUM('en attente','acceptée','refusée','terminée') NOT NULL,
    FOREIGN KEY (client_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);

-- Table des avis
CREATE TABLE avis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    artisan_id INT NOT NULL,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    FOREIGN KEY (client_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (artisan_id) REFERENCES artisans(id)
);

-- Table des contacts
CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    email VARCHAR(100),
    sujet VARCHAR(150),
    message TEXT,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
    repondu BIT DEFAULT 0
);

INSERT INTO categories (nom) VALUES
('Bâtiment'),
('Réparation & Maintenance'),
('Artisanat traditionnel'),
('Décoration & Design'),
('Automobile'),
('Beauté & Services personnels'),
('Services à domicile');

-- Bâtiment
INSERT INTO metiers (nom, categorie_id) VALUES
('Maçon', 1),
('Plombier', 1),
('Électricien', 1),
('Peintre', 1),
('Carreleur', 1),
('Menuisier aluminium', 1),
('Menuisier bois', 1);

-- Réparation & Maintenance
INSERT INTO metiers (nom, categorie_id) VALUES
('Réparateur électroménager', 2),
('Réparateur climatisation', 2),
('Technicien informatique', 2),
('Réparateur téléphone', 2),
('Mécanicien auto', 2),
('Serrurier', 2);

-- Artisanat traditionnel
INSERT INTO metiers (nom, categorie_id) VALUES
('Ferronnier', 3),
('Tapis traditionnel', 3),
('Zellige', 3),
('Potier', 3),
('Céramiste', 3),
('Tailleur traditionnel', 3);

-- Décoration & Design
INSERT INTO metiers (nom, categorie_id) VALUES
('Décorateur intérieur', 4),
('Designer meuble', 4),
('Plâtrier décoratif', 4),
('Installateur papier peint', 4);

-- Automobile
INSERT INTO metiers (nom, categorie_id) VALUES
('Électricien auto', 5),
('Tôlier', 5),
('Peintre auto', 5),
('Laveur voiture', 5);

-- Beauté & Services personnels
INSERT INTO metiers (nom, categorie_id) VALUES
('Coiffeur', 6),
('Esthéticienne', 6),
('Maquilleuse', 6),
('Couturière', 6);

-- Services à domicile
INSERT INTO metiers (nom, categorie_id) VALUES
('Femme de ménage', 7),
('Jardinier', 7),
('Gardien', 7),
('Agent de nettoyage', 7);