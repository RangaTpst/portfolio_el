-- Création de la base
CREATE DATABASE IF NOT EXISTS portfolio_elisa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE portfolio_elisa;

-- Nettoyage (à éviter en prod !)
DROP TABLE IF EXISTS project_tags;
DROP TABLE IF EXISTS project_competences;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS tags;
DROP TABLE IF EXISTS competences;

-- Table projets
CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(191) NOT NULL,
  slug VARCHAR(191) NOT NULL UNIQUE,
  images TEXT,
  pdf VARCHAR(255),
  date_realisation DATE,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table tags
CREATE TABLE tags (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE
);

-- Table competences
CREATE TABLE competences (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE
);

-- Table de liaison projects <-> tags
CREATE TABLE project_tags (
  project_id INT,
  tag_id INT,
  PRIMARY KEY (project_id, tag_id),
  FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
  FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

-- Table de liaison projects <-> competences
CREATE TABLE project_competences (
  project_id INT,
  competence_id INT,
  PRIMARY KEY (project_id, competence_id),
  FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
  FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE
);

-- Table User pour Admin
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Insertion projets
INSERT INTO projects (name, slug, date_realisation) VALUES
('UNIQ&CO', 'uniq-and-co', '2024-01-15'),
('PASSION FOOT', 'passion-foot', '2024-02-10'),
('ORIGEN', 'origen', '2023-12-05'),
('INDUSECURITECH', 'indusecuritech', '2024-03-01'),
('ARCHVISION', 'archvision', '2024-03-28'),
('TIMES : PERSON OF THE YEAR', 'times-person-of-the-year', '2023-11-15'),
('PORTFOLIO', 'portfolio', '2024-04-10'),
('LAU\'RANGE', 'lau-range', '2024-04-15');

-- Insertion tags
INSERT INTO tags (name) VALUES
('e-commerce'),
('animaux'),
('sport'),
('actu'),
('mode'),
('concept'),
('formation'),
('sécurité'),
('architecture'),
('3D'),
('presse'),
('créatif'),
('site perso'),
('référencement'),
('alimentaire'),
('naturel');

-- Insertion compétences
INSERT INTO competences (name) VALUES
('marketing'),
('réseaux sociaux'),
('communication'),
('identité visuelle'),
('charte graphique'),
('UX'),
('UI design'),
('branding'),
('webdesign'),
('SEO'),
('identité packaging'),
('conseil');

-- Association projects ↔ tags
INSERT INTO project_tags (project_id, tag_id) VALUES
(1, 1), (1, 2),              -- UNIQ&CO : e-commerce, animaux
(2, 3), (2, 4),              -- PASSION FOOT : sport, actu
(3, 5), (3, 6),              -- ORIGEN : mode, concept
(4, 7), (4, 8),              -- INDUSECURITECH : formation, sécurité
(5, 9), (5, 10),             -- ARCHVISION : architecture, 3D
(6, 11), (6, 12),            -- TIMES : presse, créatif
(7, 13), (7, 14),            -- PORTFOLIO : site perso, référencement
(8, 15), (8, 16);            -- LAU'RANGE : alimentaire, naturel

-- Association projects ↔ compétences
INSERT INTO project_competences (project_id, competence_id) VALUES
(1, 1), (1, 2),              -- UNIQ&CO : marketing, réseaux sociaux
(2, 3), (2, 2),              -- PASSION FOOT : communication, réseaux sociaux
(3, 4),                     -- ORIGEN : identité visuelle
(4, 5), (4, 12),            -- INDUSECURITECH : charte graphique, conseil
(5, 6), (5, 7),             -- ARCHVISION : UX, UI design
(6, 8),                     -- TIMES : branding
(7, 9), (7, 10),            -- PORTFOLIO : webdesign, SEO
(8, 11);                    -- LAU'RANGE : identité packaging
