<?php

namespace MeilleursBiens\SeLogerPolirisFeed;

use MeilleursBiens\SeLogerPolirisFeed\Enums\AnnouncementType;
use MeilleursBiens\SeLogerPolirisFeed\Enums\PropertyType;

/**
 * Représente une annonce Seloger Poliris
 *
 * Cette classe permet de construire facilement une annonce avec toutes ses propriétés.
 * Seuls les champs obligatoires sont requis dans le constructeur.
 */
class Announcement
{
    private array $fields = [];

    /**
     * Constructeur avec les champs obligatoires
     *
     * @param string $agencyId Identifiant agence fourni par SeLoger
     * @param string $reference Référence de l'annonce
     * @param string $technicalId Identifiant unique de l'annonce
     * @param string $announcementType Type d'annonce (voir AnnouncementType)
     * @param string $propertyType Type de bien (voir PropertyType)
     * @param string $postalCode Code postal
     * @param string $city Ville
     * @param float $price Prix/Loyer
     * @param float $fees Honoraires (% pour vente, € pour location)
     * @param int $rooms Nombre de pièces
     * @param string $title Libellé court
     * @param string $description Descriptif
     */
    public function __construct(
        string $agencyId,
        string $reference,
        string $technicalId,
        string $announcementType,
        string $propertyType,
        string $postalCode,
        string $city,
        float $price,
        float $fees,
        int $rooms,
        string $title,
        string $description
    ) {
        $this->fields = array_fill(0, 329, '');

        // Champs obligatoires
        $this->fields[0] = $agencyId;
        $this->fields[1] = $reference;
        $this->fields[2] = $announcementType;
        $this->fields[3] = $propertyType;
        $this->fields[4] = $postalCode;
        $this->fields[5] = $city;
        $this->fields[10] = $price;
        $this->fields[14] = $fees;
        $this->fields[17] = $rooms;
        $this->fields[19] = $title;
        $this->fields[20] = $description;
        $this->fields[174] = $technicalId;
        $this->fields[300] = '4.09'; // Version du format
    }

    /**
     * Définit le pays
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country): self
    {
        $this->fields[6] = $country;
        return $this;
    }

    /**
     * Définit l'adresse
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address): self
    {
        $this->fields[7] = $address;
        return $this;
    }

    /**
     * Définit le quartier/proximité
     * @param string $proximity
     * @return $this
     */
    public function setProximity(string $proximity): self
    {
        $this->fields[8] = $proximity;
        return $this;
    }

    /**
     * Définit les activités commerciales
     * @param string $activities
     * @return $this
     */
    public function setCommercialActivities(string $activities): self
    {
        $this->fields[9] = $activities;
        return $this;
    }

    /**
     * Définit le loyer murs (cession de bail)
     * @param float $rent
     * @return $this
     */
    public function setWallRent(float $rent): self
    {
        $this->fields[11] = $rent;
        return $this;
    }

    /**
     * Définit si le loyer est charges comprises
     * @param bool $included
     * @return $this
     */
    public function setRentChargesIncluded(bool $included): self
    {
        $this->fields[12] = $included ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit si le loyer est hors taxes
     * @param bool $excludingTaxes
     * @return $this
     */
    public function setRentExcludingTaxes(bool $excludingTaxes): self
    {
        $this->fields[13] = $excludingTaxes ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit la surface en m²
     * @param float $surface
     * @return $this
     */
    public function setSurface(float $surface): self
    {
        $this->fields[15] = $surface;
        return $this;
    }

    /**
     * Définit la surface du terrain en m²
     * @param float $landSurface
     * @return $this
     */
    public function setLandSurface(float $landSurface): self
    {
        $this->fields[16] = $landSurface;
        return $this;
    }

    /**
     * Définit le nombre de chambres
     * @param int $bedrooms
     * @return $this
     */
    public function setBedrooms(int $bedrooms): self
    {
        $this->fields[18] = $bedrooms;
        return $this;
    }

    /**
     * Définit la date de disponibilité (format JJ/MM/AAAA)
     * @param string $date
     * @return $this
     */
    public function setAvailabilityDate(string $date): self
    {
        $this->fields[21] = $date;
        return $this;
    }

    /**
     * Définit les charges (obligatoire pour les locations)
     * @param float $charges
     * @return $this
     */
    public function setCharges(float $charges): self
    {
        $this->fields[22] = $charges;
        return $this;
    }

    /**
     * Définit l'étage (0 pour RDC)
     * @param int $floor
     * @return $this
     */
    public function setFloor(int $floor): self
    {
        $this->fields[23] = $floor;
        return $this;
    }

    /**
     * Définit le nombre d'étages
     * @param int $floors
     * @return $this
     */
    public function setNumberOfFloors(int $floors): self
    {
        $this->fields[24] = $floors;
        return $this;
    }

    /**
     * Définit si le bien est meublé
     * @param bool $furnished
     * @return $this
     */
    public function setFurnished(bool $furnished): self
    {
        $this->fields[25] = $furnished ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit l'année de construction
     * @param int $year
     * @return $this
     */
    public function setConstructionYear(int $year): self
    {
        $this->fields[26] = $year;
        return $this;
    }

    /**
     * Définit si le bien est refait à neuf
     * @param bool $renovated
     * @return $this
     */
    public function setRenovated(bool $renovated): self
    {
        $this->fields[27] = $renovated ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit le nombre de salles de bain
     * @param int $bathrooms
     * @return $this
     */
    public function setBathrooms(int $bathrooms): self
    {
        $this->fields[28] = $bathrooms;
        return $this;
    }

    /**
     * Définit le nombre de salles d'eau
     * @param int $showerRooms
     * @return $this
     */
    public function setShowerRooms(int $showerRooms): self
    {
        $this->fields[29] = $showerRooms;
        return $this;
    }

    /**
     * Définit le nombre de WC
     * @param int $toilets
     * @return $this
     */
    public function setToilets(int $toilets): self
    {
        $this->fields[30] = $toilets;
        return $this;
    }

    /**
     * Définit si les WC sont séparés
     * @param bool $separated
     * @return $this
     */
    public function setSeparateToilets(bool $separated): self
    {
        $this->fields[31] = $separated ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit le type de chauffage (voir HeatingType)
     * @param int $heatingType
     * @return $this
     */
    public function setHeatingType(int $heatingType): self
    {
        $this->fields[32] = $heatingType;
        return $this;
    }

    /**
     * Définit le type de cuisine (voir KitchenType)
     * @param int $kitchenType
     * @return $this
     */
    public function setKitchenType(int $kitchenType): self
    {
        $this->fields[33] = $kitchenType;
        return $this;
    }

    /**
     * Définit les orientations
     * @param bool $south
     * @param bool $east
     * @param bool $west
     * @param bool $north
     * @return $this
     */
    public function setOrientations(bool $south = false, bool $east = false, bool $west = false, bool $north = false): self
    {
        $this->fields[34] = $south ? 'OUI' : 'NON';
        $this->fields[35] = $east ? 'OUI' : 'NON';
        $this->fields[36] = $west ? 'OUI' : 'NON';
        $this->fields[37] = $north ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit le nombre de balcons
     * @param int $balconies
     * @return $this
     */
    public function setBalconies(int $balconies): self
    {
        $this->fields[38] = $balconies;
        return $this;
    }

    /**
     * Définit la surface du balcon
     * @param float $surface
     * @return $this
     */
    public function setBalconySurface(float $surface): self
    {
        $this->fields[39] = $surface;
        return $this;
    }

    /**
     * Définit les équipements basiques
     * @param bool $elevator
     * @param bool $cellar
     * @param bool $digicode
     * @param bool $intercom
     * @param bool $caretaker
     * @param bool $terrace
     * @return $this
     */
    public function setBasicAmenities(
        bool $elevator = false,
        bool $cellar = false,
        bool $digicode = false,
        bool $intercom = false,
        bool $caretaker = false,
        bool $terrace = false
    ): self {
        $this->fields[40] = $elevator ? 'OUI' : 'NON';
        $this->fields[41] = $cellar ? 'OUI' : 'NON';
        $this->fields[44] = $digicode ? 'OUI' : 'NON';
        $this->fields[45] = $intercom ? 'OUI' : 'NON';
        $this->fields[46] = $caretaker ? 'OUI' : 'NON';
        $this->fields[47] = $terrace ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit le nombre de parkings et boxes
     * @param int $parkings
     * @param int $boxes
     * @return $this
     */
    public function setParkingAndBoxes(int $parkings = 0, int $boxes = 0): self
    {
        $this->fields[42] = $parkings;
        $this->fields[43] = $boxes;
        return $this;
    }

    /**
     * Définit les photos (tableau de noms de fichiers ou URLs)
     * @param array $photos Tableau de noms de fichiers (max 30)
     * @return $this
     */
    public function setPhotos(array $photos): self
    {
        for ($i = 0; $i < min(count($photos), 30); $i++) {
            if ($i < 9) {
                $this->fields[84 + $i] = $photos[$i];
            } else {
                $this->fields[163 + ($i - 9)] = $photos[$i];
            }
        }
        return $this;
    }

    /**
     * Définit les titres des photos
     * @param array $titles Tableau de titres (max 30)
     * @return $this
     */
    public function setPhotoTitles(array $titles): self
    {
        for ($i = 0; $i < min(count($titles), 30); $i++) {
            if ($i < 9) {
                $this->fields[93 + $i] = $titles[$i];
            } else {
                $this->fields[273 + ($i - 9)] = $titles[$i];
            }
        }
        return $this;
    }

    /**
     * Définit la visite virtuelle
     * @param string|null $panoramicPhoto Photo panoramique
     * @param string|null $virtualTourUrl URL de la visite virtuelle
     * @return $this
     */
    public function setVirtualTour(?string $panoramicPhoto = null, ?string $virtualTourUrl = null): self
    {
        if ($panoramicPhoto) {
            $this->fields[102] = $panoramicPhoto;
        }
        if ($virtualTourUrl) {
            $this->fields[103] = $virtualTourUrl;
        }
        return $this;
    }

    /**
     * Définit les coordonnées de contact (si différentes de l'agence)
     * @param string|null $phone
     * @param string|null $contact
     * @param string|null $email
     * @return $this
     */
    public function setContactInfo(?string $phone = null, ?string $contact = null, ?string $email = null): self
    {
        if ($phone) $this->fields[104] = $phone;
        if ($contact) $this->fields[105] = $contact;
        if ($email) $this->fields[106] = $email;
        return $this;
    }

    /**
     * Définit la localisation réelle du bien
     * @param string|null $postalCode
     * @param string|null $city
     * @return $this
     */
    public function setRealLocation(?string $postalCode = null, ?string $city = null): self
    {
        if ($postalCode) $this->fields[107] = $postalCode;
        if ($city) $this->fields[108] = $city;
        return $this;
    }

    /**
     * Définit les options mandat
     * @param bool $exclusiveMandate
     * @param bool $favorite
     * @return $this
     */
    public function setMandateOptions(bool $exclusiveMandate = false, bool $favorite = false): self
    {
        $this->fields[82] = $exclusiveMandate ? 'OUI' : 'NON';
        $this->fields[83] = $favorite ? 'OUI' : 'NON';
        return $this;
    }

    /**
     * Définit les publications (codes séparés par des virgules)
     * @param array $publications Tableau de codes (voir PublicationCode)
     * @return $this
     */
    public function setPublications(array $publications): self
    {
        $this->fields[81] = implode(',', $publications);
        return $this;
    }

    /**
     * Définit le DPE (Diagnostic de Performance Énergétique)
     * @param int|null $energyConsumption Consommation d'énergie en kWhEP/m²/an
     * @param string|null $energyClass Classification (A-G, VI pour vierge, NS pour non soumis)
     * @param int|null $gasEmissions Émissions de GES en kg éqCO2/m²/an
     * @param string|null $gasClass Classification des émissions
     * @return $this
     */
    public function setDPE(
        ?int $energyConsumption = null,
        ?string $energyClass = null,
        ?int $gasEmissions = null,
        ?string $gasClass = null
    ): self {
        if ($energyConsumption !== null) $this->fields[175] = $energyConsumption;
        if ($energyClass !== null) $this->fields[176] = $energyClass;
        if ($gasEmissions !== null) $this->fields[177] = $gasEmissions;
        if ($gasClass !== null) $this->fields[178] = $gasClass;
        return $this;
    }

    /**
     * Définit la géolocalisation
     * @param float $latitude
     * @param float $longitude
     * @param int $precision Degré de précision (1-8)
     * @return $this
     */
    public function setGeolocation(float $latitude, float $longitude, int $precision = 1): self
    {
        $this->fields[297] = $latitude;
        $this->fields[298] = $longitude;
        $this->fields[299] = $precision;
        return $this;
    }

    /**
     * Définit les informations Loi Alur pour une vente
     * @param int $feesCharge 1=Acquéreur, 2=Vendeur, 3=Acquéreur ET Vendeur
     * @param float $priceExcludingBuyerFees Prix hors honoraires acquéreur
     * @return $this
     */
    public function setAlurSaleInfo(int $feesCharge, float $priceExcludingBuyerFees): self
    {
        $this->fields[301] = $feesCharge;
        $this->fields[302] = $priceExcludingBuyerFees;
        return $this;
    }

    /**
     * Définit les informations Loi Alur pour une location
     * @param int $chargesModality 1=Forfaitaires, 2=Prévisionnelles, 3=Remboursement annuel
     * @param float|null $rentSupplement Complément de loyer
     * @param float $inventoryFees Part honoraires état des lieux
     * @return $this
     */
    public function setAlurRentalInfo(int $chargesModality, float $inventoryFees, ?float $rentSupplement = null): self
    {
        $this->fields[303] = $chargesModality;
        $this->fields[305] = $inventoryFees;
        if ($rentSupplement !== null) {
            $this->fields[304] = $rentSupplement;
        }
        return $this;
    }

    /**
     * Définit l'URL du barème des honoraires de l'agence
     * @param string $url
     * @return $this
     */
    public function setFeesScaleUrl(string $url): self
    {
        $this->fields[306] = $url;
        return $this;
    }

    /**
     * Définit les informations de copropriété (Loi Alur)
     * @param bool $inCondominium
     * @param int|null $numberOfLots
     * @param float|null $annualCharges
     * @param bool|null $inProcedure
     * @param string|null $procedureDetails
     * @return $this
     */
    public function setCondominiumInfo(
        bool $inCondominium,
        ?int $numberOfLots = null,
        ?float $annualCharges = null,
        ?bool $inProcedure = null,
        ?string $procedureDetails = null
    ): self {
        $this->fields[257] = $inCondominium ? 'OUI' : 'NON';
        if ($numberOfLots !== null) $this->fields[258] = $numberOfLots;
        if ($annualCharges !== null) $this->fields[259] = $annualCharges;
        if ($inProcedure !== null) $this->fields[260] = $inProcedure ? 'OUI' : 'NON';
        if ($procedureDetails !== null) $this->fields[261] = $procedureDetails;
        return $this;
    }

    /**
     * Retourne les champs de l'annonce sous forme de tableau
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Définit une valeur pour un champ personnalisé (136-160, 263)
     * @param int $index Index du champ personnalisé (1-26)
     * @param string $value Valeur
     * @return $this
     */
    public function setCustomField(int $index, string $value): self
    {
        if ($index >= 1 && $index <= 25) {
            $this->fields[135 + $index] = $value;
        } elseif ($index === 26) {
            $this->fields[262] = $value;
        }
        return $this;
    }
}

