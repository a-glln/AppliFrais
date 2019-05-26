# AppliFrais
Projet BTS - AppliFrais (PHP)Projet permettant la consultation des fiches de frais entrant dans le cadre du BTS SIO.

Dans ce projet vous trouverez les fonctionnalités suivantes :

  - Page de connexion
  
  - Page de saisie de frais /*Visiteur*/
  - Page de visualisation de toute les fiches de frais /*Visiteur*/
  
   - Page de validation des fiches /*Comptable*/
   - Page de suivie de toute les fiches de frais de tous les utilisateurs /*Comptable*/
   
   - Page de gestion des utilisateurs (ajout, supression ) /*Administrateur*/

#Installation

1. Installer le logiciel Wamp puis placer le dossier AppliFrais dans le dossier www situé : wamp64/www/
2. Dans le dossier AppliFrais vous trouverez un fichier : " gsb_frais.sql ", ce sont les requêtes nécessaire pour créer la base de             données et les différentes tables.
    Importer ce fichier sql dans phpMyAdmin et votre bdd est fonctionnel.
3. Verifier dans le fichier class.pdogsb.inc.php que les informations de la base sont corrects
#### Emplacement du fichier :
```shell
wamp64>www>AppliFrais>models>class.pdogsb.inc.php
  ```
  
#### Variable à verifier :
```php
class PdoGsb
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=gsb';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoGsb = null;
  ```
 4. INSTALLATION TERMINER ! 
