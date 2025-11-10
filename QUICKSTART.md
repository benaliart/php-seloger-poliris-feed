# Guide de démarrage rapide

## Installation en 30 secondes

```bash
composer require seloger/poliris-feed
```

## Premier flux en 5 minutes

### Étape 1 : Créer une annonce

```php
<?php
require 'vendor/autoload.php';

use SelogerPoliris\Announcement;
use SelogerPoliris\Enums\AnnouncementType;
use SelogerPoliris\Enums\PropertyType;

$annonce = new Announcement(
    agencyId: 'mon_agence',           // Fourni par SeLoger
    reference: 'VE001',               // Votre référence
    technicalId: 'UNIQUE_001',        // ID unique
    announcementType: AnnouncementType::VENTE,
    propertyType: PropertyType::MAISON_VILLA,
    postalCode: '75001',
    city: 'Paris',
    price: 500000,                    // Prix en euros
    fees: 5.5,                        // Honoraires en % (vente) ou € (location)
    rooms: 4,                         // Nombre de pièces
    title: 'Belle maison familiale',
    description: 'Magnifique maison avec jardin...'
);
```

### Étape 2 : Ajouter des détails (optionnel)

```php
$annonce
    ->setSurface(120)
    ->setBedrooms(3)
    ->setPhotos([
        'http://mon-site.com/photo1.jpg',
        'http://mon-site.com/photo2.jpg'
    ]);
```

### Étape 3 : Générer le flux

```php
use SelogerPoliris\FeedGenerator;
use SelogerPoliris\Config;
use SelogerPoliris\PhotoConfig;
use SelogerPoliris\ZipBuilder;

// Créer le générateur
$feed = new FeedGenerator();
$feed->addAnnouncement($annonce);

// Configurer
$config = new Config('MonLogiciel', '1.0');
$photoConfig = new PhotoConfig(PhotoConfig::MODE_URL);

// Générer le ZIP
$zip = new ZipBuilder($feed, $config, $photoConfig);
$zip->build('MonLogiciel_mon_agence.zip');
```

### Étape 4 : Envoyer sur le FTP

Envoyez le fichier ZIP sur le serveur FTP SeLoger :
- Serveur : `transferts.seloger.com`
- Nom du fichier : `<NomDuLogiciel>_<IdentifiantAgence>.zip`

## Cas d'usage courants

### Vente avec Loi Alur

```php
$vente = new Announcement(
    // ... champs obligatoires
);

$vente
    ->setAlurSaleInfo(
        feesCharge: 1,                    // 1=Acquéreur
        priceExcludingBuyerFees: 475000   // Prix HT honoraires
    )
    ->setCondominiumInfo(
        inCondominium: true,
        numberOfLots: 45,
        annualCharges: 3500
    );
```

### Location avec Loi Alur

```php
$location = new Announcement(
    // ... type: AnnouncementType::LOCATION
    // ... fees: 750 (en euros pour location)
);

$location
    ->setCharges(150)  // Obligatoire pour location
    ->setAlurRentalInfo(
        chargesModality: 2,        // 2=Prévisionnelles
        inventoryFees: 150
    )
    ->setFeesScaleUrl('https://mon-agence.com/bareme');
```

### Ajouter le DPE

```php
$annonce->setDPE(
    energyConsumption: 145,
    energyClass: 'C',
    gasEmissions: 35,
    gasClass: 'C'
);

// Ou pour un DPE vierge
$annonce->setDPE(
    energyConsumption: null,
    energyClass: 'VI',
    gasEmissions: null,
    gasClass: 'VI'
);
```

### Géolocaliser le bien

```php
$annonce->setGeolocation(
    latitude: 48.8566,
    longitude: 2.3522,
    precision: 1  // 1-8
);
```

### Plusieurs annonces

```php
$feed = new FeedGenerator();

// Ajouter une par une
$feed->addAnnouncement($annonce1);
$feed->addAnnouncement($annonce2);

// Ou en masse
$feed->addAnnouncements([$annonce1, $annonce2, $annonce3]);

echo "Nombre d'annonces : " . $feed->count();
```

## Champs obligatoires par type d'annonce

### Pour TOUTES les annonces
- ✓ Identifiant agence
- ✓ Référence
- ✓ Identifiant technique (unique)
- ✓ Type d'annonce
- ✓ Type de bien
- ✓ Code postal
- ✓ Ville
- ✓ Prix/Loyer
- ✓ Honoraires
- ✓ Nombre de pièces
- ✓ Titre
- ✓ Description

### Pour les VENTES (Loi Alur)
- ✓ Honoraires à la charge de (`setAlurSaleInfo()`)
- ✓ Prix hors honoraires acquéreur (si acquéreur)

### Pour les LOCATIONS (Loi Alur)
- ✓ Charges (`setCharges()`)
- ✓ Modalités charges (`setAlurRentalInfo()`)
- ✓ Part honoraires état des lieux

## Choix importants

### Mode photos

```php
// MODE URL (recommandé) - Photos sur votre serveur
$photoConfig = new PhotoConfig(PhotoConfig::MODE_URL);
$annonce->setPhotos([
    'http://mon-site.com/photos/1.jpg',
    'http://mon-site.com/photos/2.jpg'
]);

// MODE FULL - Toutes les photos dans le ZIP
$photoConfig = new PhotoConfig(PhotoConfig::MODE_FULL);
$annonce->setPhotos(['photo1.jpg', 'photo2.jpg']);
$zip->addPhotoFiles(['/path/to/photo1.jpg', '/path/to/photo2.jpg']);
```

### Publications

```php
use SelogerPoliris\Enums\PublicationCode;

$annonce->setPublications([
    PublicationCode::SELOGER,
    PublicationCode::BELLES_DEMEURES,
    PublicationCode::SITE_WEB_AGENCE
]);
```

Si vous ne spécifiez pas de publications, l'annonce paraîtra sur tous les supports de l'agence.

## Erreurs courantes

### ❌ Identifiant technique non unique
```php
// MAUVAIS - Même ID pour 2 annonces
$annonce1 = new Announcement(..., technicalId: 'ID001', ...);
$annonce2 = new Announcement(..., technicalId: 'ID001', ...);
```

### ✓ Solution
```php
// BON - ID unique par annonce
$annonce1 = new Announcement(..., technicalId: 'ID001', ...);
$annonce2 = new Announcement(..., technicalId: 'ID002', ...);
```

### ❌ Honoraires incorrects
```php
// MAUVAIS - Honoraires en € pour une vente
$vente = new Announcement(..., fees: 7500, ...);

// MAUVAIS - Honoraires en % pour une location
$location = new Announcement(..., fees: 10, ...);
```

### ✓ Solution
```php
// BON - Honoraires en % pour vente
$vente = new Announcement(..., fees: 5.5, ...);

// BON - Honoraires en € pour location
$location = new Announcement(..., fees: 750, ...);
```

### ❌ Charges manquantes (location)
```php
// MAUVAIS - Pas de charges pour une location
$location = new Announcement(
    announcementType: AnnouncementType::LOCATION,
    // ... autres champs
);
```

### ✓ Solution
```php
// BON
$location = new Announcement(...)
    ->setCharges(150);  // Obligatoire pour location
```

## Support

- 📧 Email SeLoger : hotline@seloger.com
- ☎️ Téléphone : 01 53 38 80 00
- 📖 Documentation complète : voir README.md
- 💡 Exemples : dossier `examples/`

## Prochaines étapes

1. Consultez le [README.md](README.md) pour la documentation complète
2. Explorez les [exemples](examples/)
3. Lisez l'[ARCHITECTURE.md](ARCHITECTURE.md) pour comprendre la structure
4. Lancez `php test.php` pour vérifier votre installation

**Bon développement ! 🚀**

