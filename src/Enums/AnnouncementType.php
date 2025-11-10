<?php

namespace MeilleursBiens\SeLogerPolirisFeed\Enums;

/**
 * Types d'annonces disponibles
 */
class AnnouncementType
{
    const CESSION_DE_BAIL = 'cession de bail';
    const LOCATION = 'location';
    const LOCATION_VACANCES = 'location vacances';
    const PRODUIT_INVESTISSEMENT = 'produit d\'investissement';
    const VENTE = 'vente';
    const VENTE_DE_PRESTIGE = 'vente de prestige';
    const VENTE_FONDS_DE_COMMERCE = 'vente-fonds-de-commerce';
    const VIAGER = 'viager';
    const PRODUIT_CATALOGUE = 'produit catalogue';

    /**
     * Retourne tous les types d'annonces disponibles
     * @return array
     */
    public static function all(): array
    {
        return [
            self::CESSION_DE_BAIL,
            self::LOCATION,
            self::LOCATION_VACANCES,
            self::PRODUIT_INVESTISSEMENT,
            self::VENTE,
            self::VENTE_DE_PRESTIGE,
            self::VENTE_FONDS_DE_COMMERCE,
            self::VIAGER,
            self::PRODUIT_CATALOGUE,
        ];
    }
}

