# Librairie PHP Seloger Poliris

Librairie PHP permettant de générer facilement des flux Seloger Poliris conformes aux spécifications techniques version 4.09.

Ce fork modifie le fichier FeedGenerator.php pour retirer les espaces autours du séparateurs !# dans le fichier csv

## Installation

```bash
composer require seloger/poliris-feed
```

Ou ajoutez manuellement dans votre `composer.json` :

```json
{
    "require": {
        "seloger/poliris-feed": "*"
    }
}
```

## Utilisation rapide

```php
<?php

require 'vendor/autoload.php';

use SelogerPoliris\Announcement;
use SelogerPoliris\FeedGenerator;
use SelogerPoliris\Config;
use SelogerPoliris\PhotoConfig;
use SelogerPoliris\ZipBuilder;
use SelogerPoliris\Enums\AnnouncementType;
use SelogerPoliris\Enums\PropertyType;
use SelogerPoliris\Enums\PublicationCode;

// 1. Créer une annonce
$announcement = new Announcement(
    agencyId: 'mon_agence',
    reference: 'VE001',
    technicalId: 'TECH001',
    announcementType: AnnouncementType::VENTE,
    propertyType: PropertyType::MAISON_VILLA,
    postalCode: '75001',
    city: 'Paris',
    price: 450000,
    fees: 5.5,
    rooms: 4,
    title: 'Belle maison familiale',
    description: 'Magnifique maison de 120m² avec jardin...'
);

// 2. Ajouter des informations optionnelles
$announcement
    ->setSurface(120)
    ->setLandSurface(300)
    ->setBedrooms(3)
    ->setBasicAmenities(
        elevator: false,
        cellar: true,
        terrace: true
    )
    ->setPhotos([
        'photo1.jpg',
        'photo2.jpg',
        'photo3.jpg'
    ])
    ->setGeolocation(48.8566, 2.3522, 1)
    ->setPublications([PublicationCode::SELOGER, PublicationCode::BELLES_DEMEURES]);

// 3. Créer le générateur de flux
$feedGenerator = new FeedGenerator();
$feedGenerator->addAnnouncement($announcement);

// 4. Configurer les fichiers
$config = new Config('MonLogiciel', '1.0');
$photoConfig = new PhotoConfig(PhotoConfig::MODE_URL);

// 5. Générer le fichier ZIP
$zipBuilder = new ZipBuilder($feedGenerator, $config, $photoConfig);
$zipBuilder->build('flux_seloger.zip');

echo "Flux généré avec succès !";
```

## Exemples détaillés

### Créer une annonce de vente

```php
use SelogerPoliris\Announcement;
use SelogerPoliris\Enums\AnnouncementType;
use SelogerPoliris\Enums\PropertyType;
use SelogerPoliris\Enums\HeatingType;
use SelogerPoliris\Enums\KitchenType;

$vente = new Announcement(
    agencyId: 'agence123',
    reference: 'VE950',
    technicalId: 'UNIQUE001',
    announcementType: AnnouncementType::VENTE,
    propertyType: PropertyType::APPARTEMENT,
    postalCode: '06210',
    city: 'MANDELIEU',
    price: 1250000,
    fees: 2.5, // Pourcentage pour les ventes
    rooms: 3,
    title: 'Appartement 3 pièces vue mer',
    description: 'Très bel appartement avec vue mer exceptionnelle...'
);

$vente
    ->setAddress('18 avenue Renoir')
    ->setSurface(135.5)
    ->setBedrooms(2)
    ->setFloor(2)
    ->setNumberOfFloors(5)
    ->setBathrooms(1)
    ->setShowerRooms(1)
    ->setToilets(2)
    ->setSeparateToilets(true)
    ->setHeatingType(HeatingType::GAZ_RADIATEUR)
    ->setKitchenType(KitchenType::AMERICAINE_EQUIPEE)
    ->setOrientations(south: true, east: true)
    ->setBalconies(1)
    ->setBasicAmenities(
        elevator: true,
        cellar: true,
        digicode: true,
        intercom: true
    )
    ->setParkingAndBoxes(parkings: 1, boxes: 0)
    ->setDPE(
        energyConsumption: 191,
        energyClass: 'D',
        gasEmissions: 42,
        gasClass: 'E'
    )
    ->setCondominiumInfo(
        inCondominium: true,
        numberOfLots: 45,
        annualCharges: 3500,
        inProcedure: false
    )
    ->setAlurSaleInfo(
        feesCharge: 1, // Acquéreur
        priceExcludingBuyerFees: 1219512.20
    );
```

### Créer une annonce de location

```php
$location = new Announcement(
    agencyId: 'agence123',
    reference: 'LOC001',
    technicalId: 'UNIQUE002',
    announcementType: AnnouncementType::LOCATION,
    propertyType: PropertyType::APPARTEMENT,
    postalCode: '75018',
    city: 'Paris',
    price: 1500, // Loyer mensuel
    fees: 750, // Montant en euros pour les locations
    rooms: 3,
    title: 'Appartement 3 pièces Montmartre',
    description: 'Charmant appartement dans le quartier de Montmartre...'
);

$location
    ->setCharges(150) // Obligatoire pour les locations
    ->setSurface(65)
    ->setBedrooms(2)
    ->setFurnished(false)
    ->setRentChargesIncluded(false)
    ->setAlurRentalInfo(
        chargesModality: 2, // Prévisionnelles avec régularisation
        inventoryFees: 150,
        rentSupplement: null
    );
```

### Ajouter des photos

```php
// Option 1 : Par URL (recommandé)
$announcement->setPhotos([
    'http://www.monsite.com/photos/photo1.jpg',
    'http://www.monsite.com/photos/photo2.jpg',
]);

// Option 2 : Fichiers locaux (à ajouter au ZIP)
$announcement->setPhotos([
    'photo1.jpg',
    'photo2.jpg',
    'photo3.jpg'
]);

// Avec titres
$announcement->setPhotoTitles([
    'Vue extérieure',
    'Salon',
    'Cuisine équipée'
]);

// Si fichiers locaux, les ajouter au ZipBuilder
$zipBuilder->addPhotoFiles([
    '/path/to/photo1.jpg',
    '/path/to/photo2.jpg',
    '/path/to/photo3.jpg'
]);
```

### Géolocalisation

```php
$announcement->setGeolocation(
    latitude: 48.87079,
    longitude: 2.31689,
    precision: 1 // 1-8, voir documentation
);
```

### Gérer plusieurs annonces

```php
$feedGenerator = new FeedGenerator();

// Ajouter une à une
$feedGenerator->addAnnouncement($annonce1);
$feedGenerator->addAnnouncement($annonce2);

// Ou ajouter en masse
$feedGenerator->addAnnouncements([$annonce1, $annonce2, $annonce3]);

// Nombre d'annonces
echo "Nombre d'annonces : " . $feedGenerator->count();
```

### Champs personnalisés

```php
// Dans l'annonce
$announcement->setCustomField(1, 'SIRET: 12345678901234');
$announcement->setCustomField(2, 'Carte pro: ABC123');

// Dans la configuration
$config = new Config('MonLogiciel', '1.0');
$config->addCustomFieldDescription(1, 'SIRET de l\'agence');
$config->addCustomFieldDescription(2, 'Numéro de carte professionnelle');
```

## Énumérations disponibles

### Types d'annonces (AnnouncementType)
- `CESSION_DE_BAIL`
- `LOCATION`
- `LOCATION_VACANCES`
- `PRODUIT_INVESTISSEMENT`
- `VENTE`
- `VENTE_DE_PRESTIGE`
- `VENTE_FONDS_DE_COMMERCE`
- `VIAGER`
- `PRODUIT_CATALOGUE`

### Types de biens (PropertyType)
- `APPARTEMENT`
- `MAISON_VILLA`
- `TERRAIN`
- `PARKING_BOX`
- `BUREAUX`
- `BOUTIQUE`
- `LOCAL`
- etc...

### Types de chauffage (HeatingType)
Voir la classe `HeatingType` pour la liste complète des codes.

### Types de cuisine (KitchenType)
- `AUCUNE` = 1
- `AMERICAINE` = 2
- `SEPAREE` = 3
- `INDUSTRIELLE` = 4
- `COIN_CUISINE` = 5
- `AMERICAINE_EQUIPEE` = 6
- `SEPAREE_EQUIPEE` = 7
- `COIN_CUISINE_EQUIPE` = 8
- `EQUIPEE` = 9

### Codes de publication (PublicationCode)
- `SELOGER` = 'SL'
- `BELLES_DEMEURES` = 'BD'
- `SITE_WEB_AGENCE` = 'WA'
- `WEBIMM` = 'WI'
- `AGORABIZ` = 'AGB'
- `RESEAU_INTERNATIONAL_PROFIL_PLUS` = 'RIPP'
- `PACK_COMMERCIALISATEUR` = 'PC'

## Configuration des photos

### Mode URL (recommandé)
```php
$photoConfig = new PhotoConfig(PhotoConfig::MODE_URL);
```
Les photos sont référencées par URL dans le CSV, SeLoger les télécharge.

### Mode FULL
```php
$photoConfig = new PhotoConfig(PhotoConfig::MODE_FULL);
```
Toutes les photos sont renvoyées dans chaque ZIP.

### Mode DIFF
```php
$photoConfig = new PhotoConfig(PhotoConfig::MODE_DIFF);
```
Seules les photos nouvelles ou modifiées sont envoyées.

## Génération du fichier ZIP final

```php
$zipBuilder = new ZipBuilder($feedGenerator, $config, $photoConfig);

// Ajouter des photos si nécessaire (mode FULL ou DIFF)
$zipBuilder->addPhotoFile('/path/to/photo1.jpg');
$zipBuilder->addPhotoFile('/path/to/photo2.jpg', 'custom_name.jpg');

// Ou en masse
$zipBuilder->addPhotoFiles([
    '/path/to/photo1.jpg',
    '/path/to/photo2.jpg',
    '/path/to/photo3.jpg'
]);

// Générer le ZIP
$zipBuilder->build('mon_flux_seloger.zip');

// Ou obtenir le contenu en mémoire
$zipContent = $zipBuilder->buildToString();
```

## Format du nom de fichier

Le fichier ZIP doit être nommé selon le format :
```
<NomDuLogiciel>_<IdentifiantAgence>.zip
```

Exemple : `monlogiciel_monagence.zip`

## Points importants

### Champs obligatoires
- Identifiant agence
- Référence agence du bien
- Identifiant technique (unique)
- Type d'annonce
- Type de bien
- Code postal
- Ville
- Prix/Loyer
- Honoraires
- Nombre de pièces
- Libellé
- Descriptif
- Version du format (automatique : 4.09)

### Pour les ventes (Loi Alur)
```php
$announcement->setAlurSaleInfo(
    feesCharge: 1, // 1=Acquéreur, 2=Vendeur, 3=Les deux
    priceExcludingBuyerFees: 1200000
);
```

### Pour les locations (Loi Alur)
```php
$announcement
    ->setCharges(150) // Obligatoire
    ->setAlurRentalInfo(
        chargesModality: 2, // 1=Forfaitaires, 2=Prévisionnelles, 3=Remboursement annuel
        inventoryFees: 150,
        rentSupplement: null
    )
    ->setFeesScaleUrl('https://www.monagence.com/bareme');
```

## Licence

MIT

## Support

Pour toute question concernant les spécifications techniques Seloger :
- Email : hotline@seloger.com
- Téléphone : 01 53 38 80 00

Pour les questions concernant cette librairie, veuillez ouvrir une issue sur GitHub.

