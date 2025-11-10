<?php

namespace MeilleursBiens\SeLogerPolirisFeed\Enums;

/**
 * Codes de publication
 */
class PublicationCode
{
    const SELOGER = 'SL';
    const BELLES_DEMEURES = 'BD';
    const SITE_WEB_AGENCE = 'WA';
    const WEBIMM = 'WI';
    const AGORABIZ = 'AGB';
    const RESEAU_INTERNATIONAL_PROFIL_PLUS = 'RIPP';
    const PACK_COMMERCIALISATEUR = 'PC';

    /**
     * Retourne tous les codes de publication disponibles
     * @return array
     */
    public static function all(): array
    {
        return [
            self::SELOGER,
            self::BELLES_DEMEURES,
            self::SITE_WEB_AGENCE,
            self::WEBIMM,
            self::AGORABIZ,
            self::RESEAU_INTERNATIONAL_PROFIL_PLUS,
            self::PACK_COMMERCIALISATEUR,
        ];
    }
}

