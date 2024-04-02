Guide d'exécution de l'Application de Gestion des Stages


Pour exécuter correctement l'application de gestion des stages, suivez attentivement les étapes suivantes en vous assurant de respecter les chemins et d'exécuter les commandes dans le bon contexte. 

Assurez-vous d'avoir installé tous les prérequis nécessaires tels que Node.js, PHP, Composer, Cmder et XAMPP. Veuillez noter que l'application ne fonctionnera pas correctement si ces prérequis ne sont pas installés.

Tout d'abord, cliquez sur le bouton vert en haut de la page GitHub pour copier le lien du code.

Créez un nouveau dossier nommé "Application" dans le répertoire de votre choix.

Accédez au dossier "Application" que vous venez de créer, puis ouvrez-le à l'aide de Cmder en utilisant le chemin d'accès actuel.

Dans Cmder, exécutez la commande suivante pour cloner le dépôt GitHub :

bash
Copy code
git clone https://github.com/mohamedabi17/Gestion-des-Stages.git
Accédez au dossier nouvellement créé "Gestion-des-Stages" en utilisant la commande suivante :

bash
Copy code
cd Gestion-des-Stages
Ouvrez XAMPP et assurez-vous que les services MySQL et Apache Server sont activés.

Revenez à Cmder et exécutez les commandes suivantes :
7.1. Pour installer les dépendances PHP, exécutez :
composer install 7.2. Générez une nouvelle clé d'application en exécutant :
php artisan key:generate 7.3. Exécutez les migrations de la base de données avec la commande :
php artisan migrate Lorsque vous êtes invité à confirmer, saisissez "yes".
7.4. Démarrez le serveur PHP artisan en exécutant :
php artisan serve

Ouvrez une nouvelle fenêtre dans Cmder avec le même chemin d'accès au dossier.

8.1. Exécutez la commande suivante pour installer les dépendances JavaScript :
npm install 8.2. Compilez les ressources JavaScript en exécutant :
npm run dev

Une fois toutes les étapes terminées avec succès, ouvrez votre navigateur web et accédez à l'adresse http://127.0.0.1:8000/ pour visualiser l'application de gestion des stages.

Assurez-vous de tester l'application pour vous assurer qu'elle fonctionne correctement. En cas de problème, veuillez consulter la documentation de l'application ou rechercher de l'aide auprès de la communauté ou des mainteneurs du projet.
