<?php

namespace MeilleursBiens\SeLogerPolirisFeed;

/**
 * Générateur de flux CSV Seloger Poliris
 */
class FeedGenerator
{
    private array $announcements = [];

    /**
     * Ajoute une annonce au flux
     * @param Announcement $announcement
     * @return $this
     */
    public function addAnnouncement(Announcement $announcement): self
    {
        $this->announcements[] = $announcement;
        return $this;
    }

    /**
     * Ajoute plusieurs annonces au flux
     * @param array $announcements Tableau d'objets Announcement
     * @return $this
     */
    public function addAnnouncements(array $announcements): self
    {
        foreach ($announcements as $announcement) {
            if ($announcement instanceof Announcement) {
                $this->addAnnouncement($announcement);
            }
        }
        return $this;
    }

    /**
     * Génère le contenu du fichier Annonces.csv
     * @return string
     */
    public function generateCSV(): string
    {
        $csv = '';

        foreach ($this->announcements as $announcement) {
            $fields = $announcement->getFields();
            $line = [];

            foreach ($fields as $field) {
                // Nettoie les valeurs
                $value = $this->cleanValue($field);
                // Encadre avec des guillemets
                $line[] = '"' . $value . '"';
            }

            // Sépare les champs par !#
            $csv .= implode(' !# ', $line) . "\r\n";
        }

        return $csv;
    }

    /**
     * Nettoie une valeur pour le CSV
     * @param mixed $value
     * @return string
     */
    private function cleanValue($value): string
    {
        if ($value === null || $value === '') {
            return '';
        }

        $value = (string)$value;

        // Remplace les guillemets par des apostrophes
        $value = str_replace('"', "'", $value);

        // Supprime les retours à la ligne (ou les remplace par <BR> si souhaité)
        $value = str_replace(["\r\n", "\r", "\n"], '<BR>', $value);

        // Pas de code HTML sauf <BR>
        $value = strip_tags($value, '<BR>');

        return $value;
    }

    /**
     * Sauvegarde le fichier CSV
     * @param string $filepath Chemin du fichier
     * @return bool
     */
    public function saveCSV(string $filepath): bool
    {
        $csv = $this->generateCSV();
        return file_put_contents($filepath, $csv) !== false;
    }

    /**
     * Retourne le nombre d'annonces dans le flux
     * @return int
     */
    public function count(): int
    {
        return count($this->announcements);
    }

    /**
     * Vide toutes les annonces
     * @return $this
     */
    public function clear(): self
    {
        $this->announcements = [];
        return $this;
    }
}

