# Solidarity bond

Ce projet est une solution web mettant en relation le Fablab manager du CESI de Bordeaux avec des clients voulant prototyper des équipement anti-COVID

## Pour commencer

Les instructions suivantes vont vous permettre de lancer notre projet sur votre ordinateur.  
Tout d'abord, pour un bon fonctionnement du site et pour pouvoir suivre correctement la suite des instructions, vous devez être sous Linux. Plus precisement, les prochaines instructions seront données pour **Ubuntu** et **Fedora**.

### Installation prérequise

Pour pouvoir lancer notre site, vous devez avoir installé plusieurs outils sur votre ordinateur avant de commencer :
- php 
```
sudo apt-get install php //ubuntu
dnf install php //fedora
```
- mysql 
```
sudo apt-get install mysql-server //ubuntu
dnf install community-mysql-server //fedora
```
- L’extension php-mysql pour la communication entre php et mysql
```
sudo apt-get install php-mysql //ubuntu
dnf install php-mysqlnd //fedora
```
- composer 

- Redis 
```
sudo apt-install redis-server //ubuntu
dnf install php-pecl-redis //fedora
```
- npm 
```
sudo apt-get install npm //ubuntu
dnf install npm //fedora
```

- Laravel-Echo-Server 
```
npm install -g Laravel-echo-server all redis-server
```

### Installation du projet
Tout d'abord, clonez le git suivant https://github.com/Xavier-Labarbe/solidaritybond.git. Installez les dépendances composer et npm avec les commandes associées : 
```
git clone https://github.com/Xavier-Labarbe/solidaritybond.git
cd solidaritybond
composer install
npm install
```
Vous devrez par la suite créer un base de donnée mysql avec le nom que vous souhaité.  

Modifiez le .env.example en .env et rentrez y les paramètres de votre base de données.  

Générez par la suite la clé d’application avec :  

```
php artisan key:generate 
```

Migrez vos données :  

```
php artisan migrate 
```

Générer une clé d’authentification d’api avec Laravel/passport :  
```
php artisan passport:keys 
```

### Lancer notre solution 

Pour lancer notre solution, il faut : 

Lancer le serveur laravel : 
```
php artisan serve 
```
Lancer le serveur node : 
```
npm run hot 
```

Lancer le serveur Laravel-Echo : 
```
laravel-echo-server start  
```
Avec tout ceci de lancer, la solution est lancée et vous pouvez vous diriger vers l’adresse de votre site : http://localhost:8000/ 

## Auteurs
Nous sommes une équipe composée de 4 étudiants du CESI Bordeaux que voici :  
**labarbe Xavier** [Github](https://github.com/Xavier-Labarbe)  
**Jeannot Elouan** [Github](https://github.com/elouanj)  
**Forques Pierre** [Github](https://github.com/PierroCesi)  
**Berger Matéo** [Github](https://github.com/matheoberger)
