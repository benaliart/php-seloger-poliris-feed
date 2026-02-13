<?php

namespace MeilleursBiens\SeLogerPolirisFeed;

use ZipArchive;

/**
 * Constructeur de fichier ZIP pour le flux Seloger Poliris
 */
class ZipBuilder
{
    private FeedGenerator $feedGenerator;
    private Config $config;
    private PhotoConfig $photoConfig;
    private array $photoFiles = [];

    /**
     * Constructeur
     * @param FeedGenerator $feedGenerator Générateur de flux
     * @param Config $config Configuration
     * @param PhotoConfig $photoConfig Configuration des photos
     */
    public function __construct(
        FeedGenerator $feedGenerator,
        Config $config,
        PhotoConfig $photoConfig
    ) {
        $this->feedGenerator = $feedGenerator;
        $this->config = $config;
        $this->photoConfig = $photoConfig;
    }

    /**
     * Ajoute un fichier photo au ZIP
     * @param string $filepath Chemin du fichier photo
     * @param string|null $archiveName Nom du fichier dans l'archive (optionnel)
     * @return $this
     */
    public function addPhotoFile(string $filepath, ?string $archiveName = null): self
    {
        if (!file_exists($filepath)) {
            throw new \InvalidArgumentException("Le fichier photo n'existe pas: {$filepath}");
        }

        $this->photoFiles[] = [
            'filepath' => $filepath,
            'archiveName' => $archiveName ?? basename($filepath)
        ];

        return $this;
    }

    /**
     * Ajoute plusieurs fichiers photos au ZIP
     * @param array $filepaths Tableau de chemins de fichiers
     * @return $this
     */
    public function addPhotoFiles(array $filepaths): self
    {
        foreach ($filepaths as $filepath) {
            if (is_string($filepath)) {
                $this->addPhotoFile($filepath);
            }
        }
        return $this;
    }

    /**
     * Génère le fichier ZIP complet
     * @param string $outputPath Chemin de sortie du fichier ZIP
     * @return bool
     */
    public function build(string $outputPath, ?string $encode = null): bool
    {
        $zip = new ZipArchive();

        if ($zip->open($outputPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException("Impossible de créer le fichier ZIP: {$outputPath}");
        }

        // Ajoute Annonces.csv
        $csv = $this->feedGenerator->generateCSV($encode);
        $zip->addFromString('Annonces.csv', $csv);

        // Ajoute Config.txt
        $configContent = $this->config->generate();
        $zip->addFromString('Config.txt', $configContent);

        // Ajoute Photos.cfg
        $photoConfigContent = $this->photoConfig->generate();
        $zip->addFromString('Photos.cfg', $photoConfigContent);

        // Ajoute les fichiers photos
        foreach ($this->photoFiles as $photoFile) {
            $zip->addFile($photoFile['filepath'], $photoFile['archiveName']);
        }

        $result = $zip->close();

        return $result;
    }

    /**
     * Construit et retourne le contenu du ZIP en mémoire
     * @return string Contenu binaire du ZIP
     */
    public function buildToString(): string
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'seloger_');

        try {
            $this->build($tempFile);
            $content = file_get_contents($tempFile);
            unlink($tempFile);
            return $content;
        } catch (\Exception $e) {
            if (file_exists($tempFile)) {
                unlink($tempFile);
            }
            throw $e;
        }
    }

    /**
     * Vide la liste des fichiers photos
     * @return $this
     */
    public function clearPhotoFiles(): self
    {
        $this->photoFiles = [];
        return $this;
    }
}