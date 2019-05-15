# Exercices

## Créer les pages société (show, list minimum)

* créer et annoter une entité Societe (nom, ville par ex)
* lancer les commandes pour créer la table et les get/setter
* créer un controller avec au moins show et list Actions
* créer les templates avec du faux-texte
* enregistrer le controller via InvokableFactory
* créer les routes
* créer un service (unique cette fois) SocieteService (Doctrine)
* créer une factory pour ce service et l'enregistrer
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