<?php

namespace MeilleursBiens\SeLogerPolirisFeed\Enums;

/**
 * Types de biens disponibles
 */
class PropertyType
{
    const APPARTEMENT = 'Appartement';
    const BATIMENT = 'bâtiment';
    const BOUTIQUE = 'boutique';
    const BUREAUX = 'bureaux';
    const CHATEAU = 'château';
    const INCONNU = 'inconnu';
    const HOTEL_PARTICULIER = 'hôtel particulier';
    const IMMEUBLE = 'immeuble';
    const LOCAL = 'local';
    const LOFT_ATELIER_SURFACE = 'loft/atelier/surface';
    const MAISON_VILLA = 'maison/villa';
    const PARKING_BOX = 'parking/box';
    const ENTREPRISES = 'entreprises';
    const TERRAIN = 'terrain';
    const MAISON_AVEC_TERRAIN = 'maison avec terrain';
    const MODELE_DE_MAISON = 'modèle de maison';

    /**
     * Retourne tous les types de biens disponibles
     * @return array
     */
    public static function all(): array
    {
        return [
            self::APPARTEMENT,
            self::BATIMENT,
            self::BOUTIQUE,
            self::BUREAUX,
            self::CHATEAU,
            self::INCONNU,
            self::HOTEL_PARTICULIER,
            self::IMMEUBLE,
            self::LOCAL,
            self::LOFT_ATELIER_SURFACE,
            self::MAISON_VILLA,
            self::PARKING_BOX,
            self::ENTREPRISES,
            self::TERRAIN,
            self::MAISON_AVEC_TERRAIN,
            self::MODELE_DE_MAISON,
        ];
    }
}

