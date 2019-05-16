# Exercices

## Créer les pages société (show, list minimum)

* créer et annoter une entité Societe (nom, ville par ex)
`module/Application/src/Entity/Societe.php`
* lancer les commandes pour créer la table et les get/setter
`vendor\bin\doctrine-module o:s:u --dump-sql`
`vendor\bin\doctrine-module o:s:u --force`
`vendor\bin\doctrine-module o:g:entities module`
* créer un controller avec au moins show et list Actions
`module/Application/src/Controller/SocieteController.php`
* créer les templates avec du faux-texte
`module/Application/view/application/societe/list.phtml`
`module/Application/view/application/societe/show.phtml`
* enregistrer le controller via InvokableFactory
`module/Application/config/module.config.php`
* créer les routes
`module/Application/config/module.config.php`
* créer un service (unique cette fois) SocieteService (Doctrine)
`module/Application/src/Service/SocieteService.php`
* créer une factory pour ce service et l'enregistrer
`module/Application/src/Service/SocieteServiceFactory.php`
`module/Application/config/module.config.php`
* injecter le service dans SocieteController et donc créer une factory
pour le controller et l'enregistrer

* appeler les méthodes du services et passer les données aux vues et faire le rendu

## Créer une factory pour ContactForm

* il faut faire disparaitre les "new" des services (ContactForm et ClassMethods)
* enregistrer cette factory dans FormElementManager
* l'injecter soit au service, soit au controller
* remplacer ClassMethods par DoctrineObject (DoctrineModule)

## Créer une page update dans Contact

* réutiliser le form ContactForm
* dans l'action update, appeler getById du service pour préremplir le formulaire
* le code qui suit est très de addAction

## Créer une page delete (si possible avec une confirmation)