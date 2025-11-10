<?php

namespace MeilleursBiens\SeLogerPolirisFeed;

/**
 * Configuration des photos pour le flux Seloger Poliris
 */
class PhotoConfig
{
    const MODE_URL = 'URL';
    const MODE_FULL = 'FULL';
    const MODE_DIFF = 'DIFF';

    private string $mode;

    /**
     * Constructeur
     * @param string $mode Mode d'envoi des photos (URL, FULL ou DIFF)
     */
    public function __construct(string $mode = self::MODE_URL)
    {
        $this->mode = $mode;
    }

    /**
     * Définit le mode URL (photos envoyées par URL)
     * @return $this
     */
    public function setModeURL(): self
    {
        $this->mode = self::MODE_URL;
        return $this;
    }

    /**
     * Définit le mode FULL (toutes les photos sont renvoyées à chaque fois)
     * @return $this
     */
    public function setModeFull(): self
    {
        $this->mode = self::MODE_FULL;
        return $this;
    }

    /**
     * Définit le mode DIFF (mode différentiel, seulement les nouvelles/modifiées)
     * @return $this
     */
    public function setModeDiff(): self
    {
        $this->mode = self::MODE_DIFF;
        return $this;
    }

    /**
     * Génère le contenu du fichier Photos.cfg
     * @return string
     */
    public function generate(): string
    {
        return "Mode={$this->mode}\r\n";
    }

    /**
     * Sauvegarde le fichier Photos.cfg
     * @param string $filepath Chemin du fichier
     * @return bool
     */
    public function save(string $filepath): bool
    {
        return file_put_contents($filepath, $this->generate()) !== false;
    }
}

