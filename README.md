Pour lancer le projet :

-client:
ajouter un .env et rentrez les données suivantes:
`VITE_BASE_URL="localhost:5173/"` (ajustez en fonction du pour sur lequel tourne votre client)
lancez `npm install`
lancez `npm run dev`

-serveur:
dupliquez le .env.exemple et modifiez les lignes 11 à 16 en fonction de vos identifiants de base de donnée
lancez `composer install`
lancez `php artisan serve`

Pour des raisons inconnu (prob de comm avec mon binaume). La branche main du serveur ne fonctionne pas comme elle devrait pour la partie post du survey (prob récupération de l'url).
Pour que cela fonctionne normalement mais que je ne casse pas quelque chose que mon camarade aurait fait, utilisez la branche "revert" qui supprime son dernier commit qui casse cette fonctionnalité.
