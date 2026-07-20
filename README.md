# TechStock

Application de gestion de parc informatique développée avec Laravel — suivi des équipements, de leur localisation et de leur maintenance.

## Fonctionnalités
- Gestion des équipements (ajout, modification, suppression, détails)
- Recherche et tri des équipements (par nom, marque, état)
- Organisation des équipements par catégories
- Organisation des équipements par salles
- Suivi des interventions de maintenance par équipement
- Association d'un équipement à plusieurs catégories

## Technologies utilisées
- PHP / Laravel
- Blade (moteur de templates)
- MySQL / Eloquent ORM
- CSS
- JavaScript

## Installation en local

1. Cloner le dépôt
```bash
   git clone https://github.com/Nika0402/techStock.git
```

2. Installer les dépendances PHP
```bash
   composer install
```

3. Installer les dépendances JS
```bash
   npm install
```

4. Copier le fichier d'environnement
```bash
   cp .env.example .env
```

5. Générer la clé d'application
```bash
   php artisan key:generate
```

6. Configurer la base de données dans le fichier `.env`

7. Lancer les migrations
```bash
   php artisan migrate
```

8. Compiler les assets
```bash
   npm run dev
```

9. Lancer le serveur
```bash
   php artisan serve
```

10. Ouvrir `http://localhost:8000`

## Auteur
Développé par Véronique HOUNKPEVI dans le cadre de mes études.