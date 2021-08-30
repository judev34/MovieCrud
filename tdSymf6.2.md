#Adrar 34 

- ###TD6.2 : Persistance/Relations entre tables/Architecture Service
- CDC
Gestion de films et d'acteurs (1 film peut avoir plusieurs acteurs, un acteur peut
jouer dans plusieurs films -> relation ManyToMany).
On suppose que le cachet des stars est fixe.
Il s'agit d'évaluer le coût des stars dans un film (en M$) !

- Un Film = titre+année+des acteurs+coût des stars (à calculer) 
(ex: Titanic 1998 avec Leo DiCaprio + Kate Winslet )
- Un acteur = nom + cachet par Film 
(ex DiCaprio, 20 M$ ou Winslet, 5 M$)

- TODO
Il est demandé:
- 1/ de créer les entités (regarder le code produit)
- 2/ d'alimenter ces 2 tables dans le BE (easyadmin)
Nota: on peut faire le chaînage dans easyadmin 
...
   public function configureFields(string $pageName): iterable
    {      
        return [
            TextField::new('...'),
            NumberField::new('...'),
            AssociationField::new ('...')->autocomplete(),
        ];

    }
...
(penser à créer des méthode __toString() dans les entités)

- 3/ d'updater ce coût dans le FE (nouelle méthode de calcul dans l'Entity) en créant un nouveau controller qui écoute: Movie/<Titre> qui va afficher ce type de vue:

      Titanic 
                . DiCaprio 20M$
                . Winslet 5M$ 
        -> 25 M$

- Consignes:

----> Veiller à l'architecture : 
----------------------------------

-- le controller cette fois ne fait qu'injecter des données (ne fait plus des accès Repository!!)
-- la couche service fait les traitements ou s'appuie sur les repository
-- gérer les erreurs (ex: film inexistant, -> Exception?)

- 4/ Bonus: Faire un formulaire qui demande le film: 
    <ListeFilm> 
                            <Select>
    (Et rappeler la vue du 3/)


