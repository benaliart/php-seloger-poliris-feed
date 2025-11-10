# Architecture de la librairie

## Structure du projet

```
php-seloger-poliris/
├── src/
│   ├── Announcement.php          # Classe principale représentant une annonce
│   ├── FeedGenerator.php         # Générateur de flux CSV
│   ├── Config.php                # Configuration du flux
│   ├── PhotoConfig.php           # Configuration des photos
│   ├── ZipBuilder.php            # Assembleur de fichier ZIP
│   └── Enums/
│       ├── AnnouncementType.php  # Types d'annonces
│       ├── PropertyType.php      # Types de biens
│       ├── HeatingType.php       # Types de chauffage
│       ├── KitchenType.php       # Types de cuisine
│       └── PublicationCode.php   # Codes de publication
├── examples/
│   ├── simple_example.php        # Exemple simple
│   └── complete_example.php      # Exemple complet
├── composer.json
├── README.md
└── LICENSE
```

## Classes principales

### Announcement

Représente une annonce immobilière avec ses 329 champs possibles.

**Responsabilités :**
- Stocker toutes les données d'une annonce
- Valider les données (types, formats)
- Fournir une API fluide pour construire une annonce

**Méthodes principales :**
- `__construct()` : Initialise avec les champs obligatoires
- `setSurface()`, `setBedrooms()`, etc. : Setters fluides
- `setPhotos()` : Définit les photos (max 30)
- `setDPE()` : Définit le diagnostic de performance énergétique
- `setGeolocation()` : Définit les coordonnées GPS
- `getFields()` : Retourne le tableau de 329 champs

### FeedGenerator

Génère le fichier CSV Annonces.csv conforme aux spécifications.

**Responsabilités :**
- Collecter les annonces
- Générer le CSV avec le format correct (!# séparateur)
- Nettoyer les valeurs (guillemets, retours ligne)

**Méthodes principales :**
- `addAnnouncement()` : Ajoute une annonce
- `addAnnouncements()` : Ajoute plusieurs annonces
- `generateCSV()` : Génère le contenu CSV
- `saveCSV()` : Sauvegarde dans un fichier
- `count()` : Nombre d'annonces

### Config

Génère le fichier Config.txt.

**Responsabilités :**
- Définir la version du format (4.09)
- Définir l'application source
- Documenter les champs personnalisés

**Méthodes principales :**
- `__construct()` : Nom et version de l'application
- `addCustomFieldDescription()` : Ajoute une description
- `generate()` : Génère le contenu
- `save()` : Sauvegarde dans un fichier

### PhotoConfig

Génère le fichier Photos.cfg.

**Responsabilités :**
- Définir le mode d'envoi des photos (URL/FULL/DIFF)

**Modes disponibles :**
- `MODE_URL` : Photos par URL (recommandé)
- `MODE_FULL` : Toutes les photos dans chaque ZIP
- `MODE_DIFF` : Mode différentiel

### ZipBuilder

Assemble tous les fichiers dans un ZIP.

**Responsabilités :**
- Créer le fichier ZIP final
- Inclure Annonces.csv, Config.txt, Photos.cfg
- Ajouter les fichiers photos si nécessaire

**Méthodes principales :**
- `addPhotoFile()` : Ajoute un fichier photo
- `addPhotoFiles()` : Ajoute plusieurs photos
- `build()` : Génère le ZIP
- `buildToString()` : Génère le ZIP en mémoire

## Énumérations

Les classes d'énumération fournissent des constantes pour éviter les erreurs de saisie.

### AnnouncementType
Types d'annonces : vente, location, location vacances, etc.

### PropertyType
Types de biens : appartement, maison, terrain, etc.

### HeatingType
Types de chauffage avec leurs codes numériques (128-24576)

### KitchenType
Types de cuisine avec leurs codes (1-9)

### PublicationCode
Codes de publication : SL, BD, WA, etc.

## Flux de travail

```
1. Créer des annonces
   ↓
2. Les ajouter au FeedGenerator
   ↓
3. Créer Config et PhotoConfig
   ↓
4. Utiliser ZipBuilder pour assembler
   ↓
5. Générer le fichier ZIP
   ↓
6. Envoyer sur le FTP SeLoger
```

## Conformité aux spécifications

La librairie implémente la version **4.09** des spécifications SeLoger Poliris (31 mai 2021).

### Champs obligatoires implémentés :
- ✓ Identifiant agence (champ 1)
- ✓ Référence agence (champ 2)
- ✓ Type d'annonce (champ 3)
- ✓ Type de bien (champ 4)
- ✓ Code postal (champ 5)
- ✓ Ville (champ 6)
- ✓ Prix/Loyer (champ 11)
- ✓ Honoraires (champ 15)
- ✓ Nombre de pièces (champ 18)
- ✓ Libellé (champ 20)
- ✓ Descriptif (champ 21)
- ✓ Identifiant technique (champ 175)
- ✓ Version du format (champ 301)

### Loi Alur :
- ✓ Honoraires à la charge de (champ 302)
- ✓ Prix hors honoraires acquéreur (champ 303)
- ✓ Modalités charges locataire (champ 304)
- ✓ Complément de loyer (champ 305)
- ✓ Part honoraires état des lieux (champ 306)
- ✓ URL barème honoraires (champ 307)
- ✓ Informations copropriété (champs 258-262)

### DPE (évolutions 2021) :
- ✓ Consommation énergie (champ 176)
- ✓ Classification énergie (champ 177) - Support VI/NS
- ✓ Émissions GES (champ 178)
- ✓ Classification GES (champ 179) - Support VI/NS
- ✓ Date réalisation DPE (champ 324)
- ✓ Version DPE (champ 325)
- ✓ Coûts consommation (champs 326-328)

### Géolocalisation :
- ✓ Latitude (champ 298)
- ✓ Longitude (champ 299)
- ✓ Précision GPS (champ 300)

## Format CSV

Le fichier Annonces.csv respecte le format :
- Séparateur de champs : `!#` (avec espace avant et après)
- Délimiteur de valeurs : `"` (guillemets)
- Fin de ligne : CRLF (`\r\n`)
- 329 champs par ligne
- Guillemets remplacés par apostrophes dans les valeurs
- Retours ligne remplacés par `<BR>`

Exemple :
```
"agence" !# "REF001" !# "vente" !# "Appartement" !# "75001" !# "Paris" !# ...
```

## Extensibilité

### Champs personnalisés
La librairie supporte 26 champs personnalisés (136-160, 263) :

```php
$announcement->setCustomField(1, 'Valeur personnalisée');
$config->addCustomFieldDescription(1, 'Description du champ');
```

### Ajout de nouvelles fonctionnalités
Pour ajouter un nouveau setter dans `Announcement` :

```php
public function setNouveauChamp(string $value): self
{
    $this->fields[INDEX_DU_CHAMP] = $value;
    return $this;
}
```

## Gestion des erreurs

La librairie lance des exceptions dans les cas suivants :
- Fichier photo introuvable (`ZipBuilder::addPhotoFile()`)
- Impossible de créer le ZIP (`ZipBuilder::build()`)

## Performance

- Les annonces sont stockées en mémoire
- Le CSV est généré en une seule passe
- Le ZIP est créé directement sans fichiers temporaires (sauf pour `buildToString()`)

**Recommandations :**
- Pour de gros volumes (>1000 annonces), générer plusieurs flux
- Utiliser le mode URL pour les photos (évite le transfert de fichiers lourds)

## Tests

Pour tester la librairie :

```bash
php test.php
```

Ce script vérifie :
- Création d'annonces
- Génération du CSV
- Création des fichiers de configuration
- Génération du ZIP
- Intégrité du contenu

## Maintenance

### Mise à jour des spécifications
En cas de nouvelle version des spécifications SeLoger :

1. Mettre à jour la version dans `Config.php` et `Announcement.php` (champ 300)
2. Ajouter les nouveaux champs dans `Announcement.php`
3. Créer les nouveaux setters si nécessaire
4. Mettre à jour les énumérations
5. Mettre à jour la documentation

### Contribution
Pour contribuer :
1. Fork le projet
2. Créer une branche pour la fonctionnalité
3. Ajouter des tests
4. Soumettre une pull request

