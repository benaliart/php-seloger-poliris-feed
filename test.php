<?php

/**
 * Script de test de la librairie Seloger Poliris
 */

require_once __DIR__ . '/vendor/autoload.php';

use MeilleursBiens\SeLogerPolirisFeed\Announcement;
use MeilleursBiens\SeLogerPolirisFeed\FeedGenerator;
use MeilleursBiens\SeLogerPolirisFeed\Config;
use MeilleursBiens\SeLogerPolirisFeed\PhotoConfig;
use MeilleursBiens\SeLogerPolirisFeed\ZipBuilder;
use MeilleursBiens\SeLogerPolirisFeed\Enums\AnnouncementType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\PropertyType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\PublicationCode;

echo "=== Test de la librairie Seloger Poliris ===\n\n";

// Test 1 : Création d'une annonce
echo "1. Création d'une annonce de test...\n";
try {
    $announcement = new Announcement(
        agencyId: 'TEST_AGENCY',
        reference: 'TEST001',
        technicalId: 'TECH_TEST001',
        announcementType: AnnouncementType::VENTE,
        propertyType: PropertyType::MAISON_VILLA,
        postalCode: '75001',
        city: 'Paris',
        price: 500000,
        fees: 5.0,
        rooms: 4,
        title: 'Maison de test',
        description: 'Ceci est une description de test pour vérifier le bon fonctionnement de la librairie.'
    );

    $announcement
        ->setSurface(100)
        ->setBedrooms(3)
        ->setPhotos(['test1.jpg', 'test2.jpg'])
        ->setPublications([PublicationCode::SELOGER]);

    echo "   ✓ Annonce créée avec succès\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur : " . $e->getMessage() . "\n";
    exit(1);
}

// Test 2 : Création du générateur de flux
echo "2. Création du générateur de flux...\n";
try {
    $feedGenerator = new FeedGenerator();
    $feedGenerator->addAnnouncement($announcement);
    echo "   ✓ Générateur créé avec " . $feedGenerator->count() . " annonce(s)\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur : " . $e->getMessage() . "\n";
    exit(1);
}

// Test 3 : Génération du CSV
echo "3. Génération du CSV...\n";
try {
    $csv = $feedGenerator->generateCSV();
    $csvLength = strlen($csv);
    echo "   ✓ CSV généré ({$csvLength} caractères)\n";
    echo "   Aperçu : " . substr($csv, 0, 100) . "...\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur : " . $e->getMessage() . "\n";
    exit(1);
}

// Test 4 : Configuration
echo "4. Création de la configuration...\n";
try {
    $config = new Config('TestApp', '1.0');
    $configContent = $config->generate();
    echo "   ✓ Configuration créée\n";
    echo "   Contenu :\n";
    echo "   " . str_replace("\r\n", "\n   ", trim($configContent)) . "\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur : " . $e->getMessage() . "\n";
    exit(1);
}

// Test 5 : Configuration des photos
echo "5. Création de la configuration des photos...\n";
try {
    $photoConfig = new PhotoConfig(PhotoConfig::MODE_URL);
    $photoConfigContent = $photoConfig->generate();
    echo "   ✓ Configuration des photos créée\n";
    echo "   Contenu : " . trim($photoConfigContent) . "\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur : " . $e->getMessage() . "\n";
    exit(1);
}

// Test 6 : Génération du ZIP
echo "6. Génération du fichier ZIP...\n";
try {
    $zipBuilder = new ZipBuilder($feedGenerator, $config, $photoConfig);
    $outputFile = __DIR__ . '/test_output.zip';

    // Supprimer le fichier s'il existe déjà
    if (file_exists($outputFile)) {
        unlink($outputFile);
    }

    $zipBuilder->build($outputFile);

    if (file_exists($outputFile)) {
        $filesize = filesize($outputFile);
        echo "   ✓ Fichier ZIP généré : test_output.zip\n";
        echo "   Taille : " . round($filesize / 1024, 2) . " Ko\n\n";

        // Vérifier le contenu du ZIP
        $zip = new ZipArchive();
        if ($zip->open($outputFile) === true) {
            echo "   Contenu du ZIP :\n";
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $stat = $zip->statIndex($i);
                echo "   - " . $stat['name'] . " (" . $stat['size'] . " octets)\n";
            }
            $zip->close();
        }
    } else {
        echo "   ✗ Le fichier ZIP n'a pas été créé\n";
        exit(1);
    }
} catch (Exception $e) {
    echo "   ✗ Erreur : " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n=== Tous les tests sont passés avec succès ! ===\n";
echo "\nLa librairie est prête à être utilisée.\n";
echo "Consultez le fichier README.md et les exemples dans le dossier examples/\n";

