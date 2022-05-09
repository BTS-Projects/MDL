# Maison Des Ligues (MDL)

Projet de groupe réalisé lors des ateliers professionnels dans le cadre des épreuves du BTS SIO. Le client est la ligue d'Escrime qui souhaite que le service informatique de la Maison des Ligues de Lorraine (le groupe) s'occupe de la refonte de l'application web pour les inscriptions des licenciés de la Fédération Française d'Escrime (FFE) à la 6ème Assises de l'Escrime, un séminaire annuel.

## Valeurs de test et Resources

### En tant que licencié souhaitant s'inscrire :
Numéro de licence : 16790322264
Mdp : hello

### En tant qu'employer de la Maison des Ligues :
Adresse email : v.schalckens@gmail.com
Mdp : hello

### Base de données :
Vous retrouverez dans le dossier public/docs/ deux scripts permettant de récupérer la base de données du projets (l'un avec l'instruction de création de la base l'autre sans)

### Base de données :
Vous retourverez dans le dossier public/docs/api/ la documentation générer automatiquement grâce à phpDocumentor.

## Contexte

La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL). Le service informatique de la Maison des Ligues de Lorraine a été sollicité par la ligue d'Escrime pour prototyper, puis mettre en place la couverture informatique nomade d'une manifestation quadrien-nale appelée "Assises nationales de l'Escrime". Une informatisation est en cours de développement. Elle va donner lieu à la création de deux applications de type client lourd pour la majorité des fonctionnalités attendues, et d'une application web pour l'enregistrement des avis.

## Objectifs
Le groupe est chargé de réalisé une application web en php avec le framework symfony basé qui remplace l'application en C# (client lourd) pour la gestion des inscriptions des licenciés de la Fédération Francaise d'Escrimes à l'évènement de la 6ème sassises nationales de l'Escrime. L'application doit principalement comporter :
- une page d'accueil avec toutes les informations relatives à l'évènement (dates, prix, ateliers, restauration, hôtels partenaires ...)
- un système de connexion : page de connexion/inscription au site et la possibilité de se déconnecter
- pour les licenciés un formulaire d'inscription à l'évènement
