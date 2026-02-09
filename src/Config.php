<?php

namespace MeilleursBiens\SeLogerPolirisFeed;

/**
 * Configuration du flux Seloger Poliris
 */
class Config
{
    private string $applicationName;
    private string $applicationVersion;
    private array $customFields = [];

    /**
     * Constructeur
     * @param string $applicationName Nom de votre logiciel
     * @param string $applicationVersion Version de votre logiciel
     */
    public function __construct(string $applicationName, string $applicationVersion = '1.0')
    {
        $this->applicationName = $applicationName;
        $this->applicationVersion = $applicationVersion;
    }

    /**
     * Ajoute une description pour un champ personnalisé
     * @param int $index Index du champ personnalisé (1-26)
     * @param string $description Description du champ
     * @return $this
     */
    public function addCustomFieldDescription(int $index, string $description): self
    {
        if ($index >= 1 && $index <= 26) {
            $this->customFields[$index] = $description;
        }
        return $this;
    }

    /**
     * Génère le contenu du fichier Config.txt
     * @return string
     */
    public function generate(): string
    {
        $config = "Version=4.12\r\n";
        $config .= "Application={$this->applicationName} / {$this->applicationVersion}\r\n";
        $config .= "Devise=Euro\r\n";

        // Ajoute les descriptions des champs personnalisés
        foreach ($this->customFields as $index => $description) {
            $config .= "Champperso{$index}={$description}\r\n";
        }

        return $config;
    }

    /**
     * Sauvegarde le fichier Config.txt
     * @param string $filepath Chemin du fichier
     * @return bool
     */
    public function save(string $filepath): bool
    {
        return file_put_contents($filepath, $this->generate()) !== false;
    }
}

