# Script PHP d'Upload de Photos

Ce script PHP permet de gérer l'upload de photos et leur stockage en base de données via PDO.

## 🚀 Fonctionnalités

- Connexion sécurisée à la base de données via PDO
- Upload de photos avec vérifications de sécurité
- Stockage des informations en base de données
- Gestion des erreurs

## 📋 Prérequis

- PHP 7.0 ou supérieur
- MySQL/MariaDB
- Extension PDO activée
- Droits d'écriture sur le dossier d'upload

## ⚙️ Configuration

1. Configurez les paramètres de connexion à la base de données :

$bdd = new PDO('mysql:host=VOTRE_HOST;dbname=NOM_BASE;charset=utf8', 'USER', 'PASSWORD');

2. Définissez le chemin du dossier d'upload :
$folder = "votre/chemin/upload/";

## 📝 Structure de la base de données
sql
CREATE TABLE table (
column1 VARCHAR(255),
column2 VARCHAR(255),
photoName VARCHAR(255)
);
## 🔒 Sécurité

Le script inclut plusieurs vérifications de sécurité :
- Taille maximale des fichiers (5Mo)
- Types de fichiers autorisés (.jpg, .jpeg, .png, .gif)
- Protection contre la duplication de fichiers
- Échappement des caractères spéciaux

## 🛠️ Limitations

- Taille maximale : 5Mo (modifiable dans php.ini)
- Formats acceptés : JPG, JPEG, PNG, GIF
- Le nom du fichier doit être unique dans le dossier cible

## ⚠️ Notes importantes

1. Assurez-vous que le dossier d'upload a les bonnes permissions (chmod)
2. Vérifiez la configuration de `upload_max_filesize` dans php.ini
3. Adaptez les chemins des dossiers selon votre structure
4. Personnalisez les messages d'erreur selon vos besoins

## 🔧 Exemple d'utilisation
html
<form method="POST" enctype="multipart/form-data">
<input type="text" name="formValueName1">
<input type="text" name="formValueName2">
<input type="file" name="photo">
<input type="submit" name="submit">
</form>
