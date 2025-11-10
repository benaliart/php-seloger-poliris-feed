# Changelog

Toutes les modifications notables de ce projet seront documentées dans ce fichier.

Le format est basé sur [Keep a Changelog](https://keepachangelog.com/fr/1.0.0/),
et ce projet adhère au [Semantic Versioning](https://semver.org/lang/fr/).

## [1.0.0] - 2025-01-10

### Ajouté
- Classe `Announcement` pour représenter une annonce avec tous ses champs
- Classe `FeedGenerator` pour générer le fichier CSV Annonces.csv
- Classe `Config` pour générer le fichier Config.txt
- Classe `PhotoConfig` pour gérer la configuration des photos
- Classe `ZipBuilder` pour assembler le fichier ZIP final
- Énumérations pour les types d'annonces, types de biens, chauffage, cuisine, publications
- Support complet des 329 champs de la spécification 4.09
- Support de la Loi Alur (honoraires, charges, copropriété)
- Support du DPE avec les évolutions 2021 (VI/NS, nouvelle version)
- Support de la géolocalisation (latitude, longitude, précision)
- API fluide avec des méthodes chainables
- 26 champs personnalisables
- Documentation complète (README, ARCHITECTURE, exemples)
- Script de test automatisé
- Gestion des 3 modes de photos (URL, FULL, DIFF)
- Support de 30 photos par annonce
- Nettoyage automatique des valeurs CSV (guillemets, retours ligne)

### Conforme à
- Spécifications SeLoger Poliris version 4.09 (31 mai 2021)
- Format CSV avec séparateur `!#`
- Structure ZIP complète (Annonces.csv, Config.txt, Photos.cfg)
- Loi Alur (Mars 2017)
- Évolutions DPE (1er juillet 2021 et 1er janvier 2022)

[1.0.0]: https://github.com/votre-organisation/php-seloger-poliris/releases/tag/v1.0.0

