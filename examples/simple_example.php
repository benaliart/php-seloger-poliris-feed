<?php

/**
 * Exemple simple d'utilisation de la librairie Seloger Poliris
 *
 * Cet exemple montre le minimum nécessaire pour créer un flux
 */

require_once __DIR__ . '/../vendor/autoload.php';

use MeilleursBiens\SeLogerPolirisFeed\Announcement;
use MeilleursBiens\SeLogerPolirisFeed\FeedGenerator;
use MeilleursBiens\SeLogerPolirisFeed\Config;
use MeilleursBiens\SeLogerPolirisFeed\PhotoConfig;
use MeilleursBiens\SeLogerPolirisFeed\ZipBuilder;
use MeilleursBiens\SeLogerPolirisFeed\Enums\AnnouncementType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\PropertyType;

// Créer une annonce avec les champs obligatoires uniquement
$announcement = new Announcement(
    'monagence',              // agencyId
    'VE001',                  // reference
    'UNIQUE001',              // technicalId
    AnnouncementType::VENTE,  // announcementType
    PropertyType::MAISON_VILLA, // propertyType
    '75001',                  // postalCode
    'Paris',                  // city
    450000,                   // price
    5.5,                      // fees
    4,                        // rooms
    'Belle maison familiale', // title
    'Magnifique maison de 120m² avec jardin, proche de toutes commodités.' // description
);

// Ajouter quelques informations optionnelles
$announcement
    ->setSurface(120)
    ->setBedrooms(3)
    ->setPhotos([
        'http://www.example.com/photo1.jpg',
        'http://www.example.com/photo2.jpg',
    ]);

// Créer le générateur et ajouter l'annonce
$feedGenerator = new FeedGenerator();
$feedGenerator->addAnnouncement($announcement);

// Configurer
$config = new Config('MonLogiciel', '1.0');
$photoConfig = new PhotoConfig(PhotoConfig::MODE_URL);

// Générer le ZIP
$zipBuilder = new ZipBuilder($feedGenerator, $config, $photoConfig);

try {
    $outputFile = __DIR__ . '/flux_seloger_simple.zip';
    $zipBuilder->build($outputFile);
    echo "✓ Flux généré avec succès : {$outputFile}\n";
} catch (Exception $e) {
    echo "✗ Erreur : " . $e->getMessage() . "\n";
}

