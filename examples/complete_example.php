<?php

/**
 * Exemple complet d'utilisation de la librairie Seloger Poliris
 *
 * Cet exemple montre comment créer un flux complet avec plusieurs annonces
 */

require_once __DIR__ . '/../vendor/autoload.php';

use MeilleursBiens\SeLogerPolirisFeed\Announcement;
use MeilleursBiens\SeLogerPolirisFeed\FeedGenerator;
use MeilleursBiens\SeLogerPolirisFeed\Config;
use MeilleursBiens\SeLogerPolirisFeed\PhotoConfig;
use MeilleursBiens\SeLogerPolirisFeed\ZipBuilder;
use MeilleursBiens\SeLogerPolirisFeed\Enums\AnnouncementType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\PropertyType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\HeatingType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\KitchenType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\PublicationCode;

// Configuration de base
$agencyId = 'monagence';
$applicationName = 'MonLogicielImmo';
$applicationVersion = '1.0';

// ============================================
// 1. CRÉATION DES ANNONCES
// ============================================

// Annonce 1 : Vente d'une maison
$maison = new Announcement(
    agencyId: $agencyId,
    reference: 'VE001',
    technicalId: 'TECH_VE001',
    announcementType: AnnouncementType::VENTE,
    propertyType: PropertyType::MAISON_VILLA,
    postalCode: '06210',
    city: 'MANDELIEU',
    price: 850000,
    fees: 3.5, // Honoraires en % pour les ventes
    rooms: 5,
    title: 'Villa 5 pièces avec piscine',
    description: 'Magnifique villa provençale de 150m² avec piscine et vue mer. Comprenant 4 chambres, 2 salles de bain, cuisine équipée et grand séjour. Terrain de 800m² arboré et clôturé. Proche commodités.'
);

$maison
    ->setAddress('25 chemin des Mimosas')
    ->setCountry('France')
    ->setSurface(150)
    ->setLandSurface(800)
    ->setBedrooms(4)
    ->setFloor(0)
    ->setConstructionYear(2005)
    ->setBathrooms(2)
    ->setToilets(2)
    ->setSeparateToilets(true)
    ->setHeatingType(HeatingType::GAZ_RADIATEUR)
    ->setKitchenType(KitchenType::SEPAREE_EQUIPEE)
    ->setOrientations(south: true, west: true)
    ->setBasicAmenities(
        elevator: false,
        cellar: true,
        digicode: true,
        intercom: true,
        caretaker: false,
        terrace: true
    )
    ->setParkingAndBoxes(parkings: 2, boxes: 0)
    ->setPhotos([
        'http://www.example.com/photos/VE001_1.jpg',
        'http://www.example.com/photos/VE001_2.jpg',
        'http://www.example.com/photos/VE001_3.jpg',
        'http://www.example.com/photos/VE001_4.jpg',
        'http://www.example.com/photos/VE001_5.jpg',
    ])
    ->setPhotoTitles([
        'Façade principale',
        'Salon avec cheminée',
        'Cuisine équipée',
        'Piscine et jardin',
        'Chambre principale'
    ])
    ->setDPE(
        energyConsumption: 145,
        energyClass: 'C',
        gasEmissions: 35,
        gasClass: 'C'
    )
    ->setGeolocation(43.5483, 6.9383, 1)
    ->setAlurSaleInfo(
        feesCharge: 1, // Acquéreur
        priceExcludingBuyerFees: 821256.04
    )
    ->setPublications([PublicationCode::SELOGER, PublicationCode::BELLES_DEMEURES]);

// Annonce 2 : Location d'un appartement
$appartement = new Announcement(
    agencyId: $agencyId,
    reference: 'LOC001',
    technicalId: 'TECH_LOC001',
    announcementType: AnnouncementType::LOCATION,
    propertyType: PropertyType::APPARTEMENT,
    postalCode: '75018',
    city: 'PARIS',
    price: 1850, // Loyer mensuel
    fees: 925, // Honoraires en € pour les locations
    rooms: 3,
    title: 'Appartement 3 pièces Montmartre',
    description: 'Charmant appartement de 68m² au 3ème étage avec ascenseur. Comprenant 2 chambres, salle de bain, WC séparé, cuisine américaine équipée. Parquet au sol, beaucoup de cachet. Quartier calme et recherché.'
);

$appartement
    ->setAddress('42 rue Lepic')
    ->setCountry('France')
    ->setProximity('Métro Blanche - Ligne 2')
    ->setSurface(68)
    ->setBedrooms(2)
    ->setFloor(3)
    ->setNumberOfFloors(6)
    ->setFurnished(false)
    ->setConstructionYear(1920)
    ->setBathrooms(1)
    ->setToilets(1)
    ->setSeparateToilets(true)
    ->setHeatingType(HeatingType::COLLECTIF_GAZ_RADIATEUR)
    ->setKitchenType(KitchenType::AMERICAINE_EQUIPEE)
    ->setOrientations(south: false, east: true)
    ->setBasicAmenities(
        elevator: true,
        cellar: true,
        digicode: true,
        intercom: true,
        caretaker: true,
        terrace: false
    )
    ->setCharges(180) // Obligatoire pour les locations
    ->setRentChargesIncluded(false)
    ->setPhotos([
        'http://www.example.com/photos/LOC001_1.jpg',
        'http://www.example.com/photos/LOC001_2.jpg',
        'http://www.example.com/photos/LOC001_3.jpg',
    ])
    ->setPhotoTitles([
        'Séjour lumineux',
        'Cuisine américaine',
        'Chambre avec parquet'
    ])
    ->setDPE(
        energyConsumption: 220,
        energyClass: 'D',
        gasEmissions: 48,
        gasClass: 'D'
    )
    ->setGeolocation(48.8857, 2.3339, 1)
    ->setAlurRentalInfo(
        chargesModality: 2, // Prévisionnelles avec régularisation
        inventoryFees: 150,
        rentSupplement: null
    )
    ->setFeesScaleUrl('http://www.monagence.com/bareme-honoraires')
    ->setCondominiumInfo(
        inCondominium: true,
        numberOfLots: 25,
        annualCharges: 2160,
        inProcedure: false
    )
    ->setPublications([PublicationCode::SELOGER, PublicationCode::SITE_WEB_AGENCE]);

// Annonce 3 : Vente d'un appartement avec DPE vierge
$appartVente = new Announcement(
    agencyId: $agencyId,
    reference: 'VE002',
    technicalId: 'TECH_VE002',
    announcementType: AnnouncementType::VENTE,
    propertyType: PropertyType::APPARTEMENT,
    postalCode: '69001',
    city: 'LYON',
    price: 320000,
    fees: 4.0,
    rooms: 2,
    title: 'Appartement T2 centre Lyon',
    description: 'Bel appartement T2 de 45m² en plein centre de Lyon. Immeuble ancien rénové. Idéal investisseur ou premier achat.'
);

$appartVente
    ->setSurface(45)
    ->setBedrooms(1)
    ->setFloor(2)
    ->setNumberOfFloors(4)
    ->setHeatingType(HeatingType::ELECTRIQUE_RADIATEUR)
    ->setKitchenType(KitchenType::SEPAREE)
    ->setBasicAmenities(
        elevator: false,
        cellar: false,
        digicode: true,
        intercom: false
    )
    ->setPhotos([
        'http://www.example.com/photos/VE002_1.jpg',
        'http://www.example.com/photos/VE002_2.jpg',
    ])
    ->setDPE(
        energyConsumption: null,
        energyClass: 'VI', // DPE Vierge
        gasEmissions: null,
        gasClass: 'VI'
    )
    ->setGeolocation(45.7640, 4.8357, 1)
    ->setAlurSaleInfo(
        feesCharge: 1,
        priceExcludingBuyerFees: 307692.31
    )
    ->setCondominiumInfo(
        inCondominium: true,
        numberOfLots: 12,
        annualCharges: 1200,
        inProcedure: false
    )
    ->setPublications([PublicationCode::SELOGER]);

// ============================================
// 2. CRÉATION DU FLUX
// ============================================

$feedGenerator = new FeedGenerator();
$feedGenerator->addAnnouncements([$maison, $appartement, $appartVente]);

echo "Nombre d'annonces dans le flux : " . $feedGenerator->count() . "\n";

// ============================================
// 3. CONFIGURATION
// ============================================

$config = new Config($applicationName, $applicationVersion);

// Optionnel : ajouter des descriptions pour les champs personnalisés
// $config->addCustomFieldDescription(1, 'SIRET de l\'agence');
// $config->addCustomFieldDescription(2, 'Numéro de carte professionnelle');

// ============================================
// 4. CONFIGURATION DES PHOTOS
// ============================================

// Mode URL : les photos sont référencées par URL
$photoConfig = new PhotoConfig(PhotoConfig::MODE_URL);

// ============================================
// 5. GÉNÉRATION DU FICHIER ZIP
// ============================================

$zipBuilder = new ZipBuilder($feedGenerator, $config, $photoConfig);

// Si vous utilisez le mode FULL ou DIFF, ajoutez les fichiers photos ici
// $zipBuilder->addPhotoFile('/path/to/VE001_1.jpg');
// $zipBuilder->addPhotoFile('/path/to/VE001_2.jpg');
// etc...

$outputFile = __DIR__ . "/{$applicationName}_{$agencyId}.zip";

try {
    $zipBuilder->build($outputFile);
    echo "✓ Fichier ZIP généré avec succès : {$outputFile}\n";
    echo "✓ Taille du fichier : " . round(filesize($outputFile) / 1024, 2) . " Ko\n";
    echo "\nLe fichier est prêt à être envoyé sur le serveur FTP SeLoger.\n";
} catch (Exception $e) {
    echo "✗ Erreur lors de la génération du ZIP : " . $e->getMessage() . "\n";
    exit(1);
}

// ============================================
// 6. AFFICHAGE D'UN EXTRAIT DU CSV
// ============================================

echo "\n" . str_repeat('=', 60) . "\n";
echo "Aperçu du contenu CSV (100 premiers caractères) :\n";
echo str_repeat('=', 60) . "\n";

$csvContent = $feedGenerator->generateCSV();
$lines = explode("\n", $csvContent);
echo substr($lines[0], 0, 100) . "...\n";

echo "\n✓ Flux Seloger Poliris généré avec succès !\n";

