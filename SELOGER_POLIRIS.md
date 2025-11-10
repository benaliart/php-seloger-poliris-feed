# Spécifications Techniques d’Exportation

**Transfert automatisé d’annonces vers les supportsSeLoger.com**

Version **4.09** - du 31 mai 2021


L'objet de ce document est de spécifier :

```
✔ Lescaractéristiquesdesfichiersquidoiventêtreenvoyéspouruneintégrationd’annoncessur
les services et supports gérés par le Groupe SeLoger
```
✔ La marche à suivre pour assurer une bonne réceptionpar nos services.

CONTACT

```
● Activation du flux pour un nouveau client :
```
```
Mail de contact : hotline.passerelles@seloger.com
Merci de préciser l’identifiant du client et ses coordonnées.
```
```
Cette adresse mail vous est réservée, merci de NEPAS LA COMMUNIQUER.
```
```
● Demande d’information sur le flux d’un client ou contactclientèle :
```
```
Mail de contact : hotline@seloger.com
Téléphone : 01 53 38 80 00
```
```
● Equipe Relation Partenaires Logiciel - Flux Logiciels& CRM :
```
```
Mail de contact : partners@groupeseloger.com
```
(^2) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


## SOMMAIRE

- Fichiers à fournir
- Spécifications du fichier d’annonces
- Liste des champs du format SeLoger
- Unicité des références d’annonces
- Spécifications du fichier de configuration
- Spécifications du fichier de configuration des photos
- Spécifications des fichiers photos / plans / visitesvirtuelles
- Transmission par URL (Conseillée)
- Transmission par Fichiers Joints
- Visites Virtuelles / Vidéos
- Loi Alur (Mars 2017)
- Pour les Ventes
- Pour les Locations
- Donnée Agence
- Codifications des champs spéciaux
- Types de chauffage
- Types de cuisines
- Sous-types de bien
- Types de garage
- Types d’étage
- Locations Vacances
- Publications
- Evolutions DPE
- Géolocalisation
- Envoi sur le serveur FTP
- Envois groupés
- Tests et mise en production de votre passerelle
- Formats spécifiques
- Notes et recommandations
- Historique des Révisions
- Tél: +33 (0)1 53 38 28 00 – Fax: +33 (0)826 620 629- http://www.seloger.com SeLoger - 65, rue Ordener - 75018 Paris France


## Fichiers à fournir

```
Le fichier à transmettre doit être un fichier ZIPcontenant les fichiers suivants:
```
✔ Annonces.csv

✔ Config.txt

✔ Photos.cfg

✔ Fichiers photos / plans (si transmission des visuelsdans le fichier ZIP)

## Spécifications du fichier d’annonces

Vos données doivent être fournies au format **CSV.** Le fichier _Annonces.csv_ contientl’ensembledes
annonces,àraisond’unenregistrementparligne.Chaqueenregistrement(chaqueannonce)estséparédu
suivant par un retour à la ligne (CRLF).

```
Chaque champ doit être :
```
- séparé du suivant par le séparateur **!#** (sans espace),
- délimité par des guillemets du type **"**.
  Exemple : _"contenu du champ1" !# "contenu du champ2" !#"contenu du champ3"_

Leschamps **nedoiventpascontenirderetouràlaligne** .Sivoussouhaitezindiquerdessautsdeligne
dans les descriptifs vous pouvez les remplacer parla chaîne _<BR>_.

Silavaleurduchampcomportedes guillemets,ceux-ci **doivent** êtreremplacéspardesapostrophes **'**
Exemple : _"Camping 'Les flots bleus' "_

Pour les valeurs de type décimal, le **séparateur dedécimale** à utiliser est le caractère **point**.
Exemple : _"12.56"_

Mêmesilechampestdépourvudevaleur,lescaractères  **!#** séparantcechampduprécédentetdusuivant
doivent être présents.

**Attention** : Lefichier annonces.csv doit toujours contenir **la totalité des annonces**.

Notresystèmefonctionneenmode« **_AnnuleetRemplace_** »,c'est-à-direquenoussupprimonslatotalité
des annonces du transfert précédent qui ne sont pasprésentes dans le nouveau fichier reçu.

Ci-dessousfigurelalistedeschampsqu'ilestpossiblededocumenterpourchaqueannonce.Leschamps
notéscomme **obligatoires** doiventconteniruneinformationvalidepourquel’annoncesoitpriseencompte.
Lesautreschampspeuventrestervides.Nousvous **recommandonsvivement** defourniruneinformation
pour chacun des champs énumérés pour être certainde répondre au mieux aux utilisateurs.

(^4) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


**Lesnuméros(ourangs)deschampsnesontPASinclusdanslesdonnéesquevousnoustransmettez :
L'ORDRE SEUL DES CHAMPS FAIT FOI**.

**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^5


## Liste des champs du format SeLoger

### RANG NOM DU CHAMP TYPE EXEMPLE COMMENTAIRES

```
1 Identifiant agence Texte (16) "monagence" Identifiant agence fourni par nos services
2 Référence agence du
bien
```
```
Texte (20) "VE950" Obligatoire
Référence de l’annonce
3 Type d’annonce Texte "Vente" Obligatoire - Choisir entre :
cession de bail, location, location vacances, produit
d'investissement, vente, vente de prestige,
vente-fonds-de-commerce, viager, produit catalogue
```
```
Le type produit catalogue ne peut être utilisé quedans
le cadre d’une publication sur SeLoger Construire
4 Type de bien Texte "Maison" Obligatoire - Choisir entre :
Appartement, bâtiment, boutique, bureaux, château,
inconnu, hôtel particulier, immeuble, local,
lo/atelier/surface, maison/villa, parking/box,
entreprises, terrain, maison avec terrain, modèlede
maison
```
```
Le type modèle de maison ne peut être utilisé quedans
le cadre d’une publication sur SeLoger Construire
5 CP Texte (5) "06210" Obligatoire - Code postal à afficher
6 Ville Texte (50) "MANDELIEU" Obligatoire - Doit correspondre au code postal
7 Pays Texte "France"
8 Adresse Texte (128) "18 avenue Renoir"
9 Quartier / Proximité Texte (64) "Métro république"
10 Activités commerciales Texte "BAR, TABAC, PMU"
11 Prix / Loyer / Prix de
cession
```
```
Décimal "1250000" Obligatoire
Prix du bien exprimé charges Acquéreur comprises
Le loyer doit être exprimé charges & complément de
loyer compris
12 Loyer / mois murs Décimal "" Dans le cas de Cession de Bail
13 Loyer CC Texte (3) "OUI" OUI / NON - loyer charges comprises
14 Loyer HT Texte (3) "NON" OUI / NON - loyer hors taxes
15 Honoraires Décimal (Vente)"2.5"
(Location)"750"
```
```
Obligatoire -
Ventes : Honoraires TTC à la charge de l’acquéreuren
pourcentagedu prix du bien hors honoraires
Locations : Montantdes honoraires en TTC à la
charge du locataire (en euros)
16 Surface (m²) Décimal "135.5"
17 Surface terrain (m²) Décimal "2500"
18 NB de pièces Entier "3" Obligatoire
19 NB de chambres Entier "2"
20 Libellé Texte (64) "Maison 3 pièces" Obligatoire - Libellé court
21 Descriptif Texte (4000)"Très belle maison" Obligatoire - Ne pas mettre de caractères spéciaux.
```
(^6) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


22 Date de disponibilité Date "14/04/2003" Format JJ/MM/AAAA
23 Charges Décimal "350" **Obligatoire** (locations) -Montant des charges pourle
locataire en euros.
Voir champ 304 pour préciser le type de charges
24 Etage Entier "0" "0" pour Rez-de-chaussée / Rez-de-jardin
"1" pour le premier étage
25 NB d’étages Entier "2"
26 Meublé Texte (3) "OUI" OUI / NON
27 Année de construction Entier "1985" Champ Numérique
28 Refait à neuf Texte (3) "" OUI / NON
29 NB de salles de bain Entier "2"
30 NB de salles d’eau Entier "2"
31 NB de WC Entier "2"
32 WC séparés Texte (3) "OUI OUI / NON
33 Type de chauffage Entier "512" Voir codifications en Annexe
34 Type de cuisine Entier "3" Voir codifications en Annexe
35 Orientation sud Texte (3) "OUI"  OUI / NON
36 Orientation est Texte (3) "" OUI / NON
37 Orientation ouest Texte (3) "" OUI / NON
38 Orientation nord Texte (3) "" OUI / NON
39 NB balcons Entier "2"
40 SF Balcon Décimal ""
41 Ascenseur Texte (3) "NON" OUI / NON
42 Cave Texte (3) "OUI" OUI / NON
43 NB de parkings Entier ""
44 NB de boxes Entier ""
45 Digicode Texte (3) "OUI" OUI / NON
46 Interphone Texte (3) "NON OUI / NON
47 Gardien Texte (3) "" OUI / NON
48 Terrasse Texte (3) "OUI" OUI / NON
49 Prix semaine
Basse Saison

```
Décimal "" Locations vacances uniquement
```
50 Prix quinzaine
Basse Saison

```
Décimal ""
```
51 Prix mois / Basse Saison Décimal ""
52 Prix semaine
Haute Saison

```
Décimal ""
```
53 Prix quinzaine
Haute Saison

```
Décimal ""
```
54 Prix mois
Haute Saison

```
Décimal ""
```
55 NB de personnes Entier "" **Locations vacances**  : Capacité d’accueil
56 Type de résidence Texte (3) "" **Locations vacances -** Choisir entre :
GIT pour Gîte
HOT pour Chambre d'hôte
57 Situation Texte "mer" Choisir entre : montagne, mer, campagne, ville

```
SeLoger - 65, rue Ordener - 75018 Paris France
Tél: +33 (0)1 53 38 28 00 – Fax: +33 (0)826 620 629- http://www.seloger.com^7
```

```
58 NB de couverts Entier ""
59 NB de lits doubles Entier ""
60 NB de lits simples Entier ""
61 Alarme Texte (3) "OUI" OUI / NON
62 Câble TV Texte (3) "" OUI / NON
63 Calme Texte (3) "OUI" OUI / NON
64 Climatisation Texte (3) "OUI" OUI / NON
65 Piscine Texte (3) "OUI" OUI / NON
66 Aménagement pour
handicapés
```
```
Texte (3) "" OUI / NON
```
67 Animaux acceptés Texte (3) "" OUI / NON
68 Cheminée Texte (3) "" OUI / NON
69 Congélateur Texte (3) "" OUI / NON
70 Four Texte (3) "" OUI / NON
71 Lave-vaisselle Texte (3) "" OUI / NON
72 Micro-ondes Texte (3) "" OUI / NON
73 Placards Texte (3) "" OUI / NON
74 Téléphone Texte (3) "" OUI / NON
75 Proche lac Texte (3) "" OUI / NON
76 Proche tennis Texte (3) "" OUI / NON
77 Proche pistes de ski Texte (3) "" OUI / NON
78 Vue dégagée Texte (3) "OUI" OUI / NON
79 Chiffre d’affaire Décimal ""
80 Longueur façade (m) Décimal "23"
81 Duplex Texte (3) "" OUI / NON
82 Publications Texte "SL,BD,WA" Voir chapitre publications
83 Mandat en exclusivité Texte (3) "OUI" OUI / NON
84 Coup de cœur Texte (3) "NON" OUI / NON (utilisé sur le site de l’agence si gérépar
Seloger.com)
85 Photo 1 Texte (256) "230.jpg" Nom du fichier définissant la photo 1 de l’annonce
86 Photo 2 Texte (256) "231.jpg" ...
87 Photo 3 Texte (256) "232.jpg" ...
88 Photo 4 Texte (256) "233.jpg" ...
89 Photo 5 Texte (256) "234.jpg" ....
90 Photo 6 Texte (256) "235.jpg" ...
91 Photo 7 Texte (256) "236.jpg" ...
92 Photo 8 Texte (256) "237.jpg" ...
93 Photo 9 Texte (256) "238.jpg" ...
94 Titre photo 1 Texte (256) "Entrée"
95 Titre photo 2 Texte (256) "Le Séjour"
96 Titre photo 3 Texte (256) "Cuisine"
97 Titre photo 4 Texte (256) "La piscine"
98 Titre photo 5 Texte (256) ""
99 Titre photo 6 Texte (256) ""
100 Titre photo 7 Texte (256) ""

(^8) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


101 Titre photo 8 Texte (256) ""
102 Titre photo 9 Texte (256) ""
103 Photo panoramique Texte (128) "" Nom de la photo panoramique
(voir chapitre Visites Virtuelles)
104 URL visite virtuelle Texte (256) "http://www.site.com/visitevirtu
elle?ref=VE950"

URL d’une page affichant une visite virtuelle du bien
(voir chapitre Visites Virtuelles)
105 Téléphone à afficher Texte (10) "0123456789" Coordonnées à afficher sur l'annonce **si différentes**
106 Contact à afficher Texte (64) "René Gossier" **des coordonnées de l’agence**
107 Email de contact Texte (64) "rgossier@agence.com"
108 CP Réel du bien Texte (5) "06210"
109 Ville réelle du bien Texte (50) "MANDELIEU"
110 Inter-cabinet Texte (3) "OUI" Utilisé dans le cas où l’agence dispose d’un sitegéré
par Seloger.com avec l’option d’inter-cabinet
111 Inter-cabinet prive Texte (3) "NON" Autorise ou non l'affichage des informations privées
aux autres agences ayant accès à l'inter-cabinet.
NON : accès autorise
OUI : accès non autorisé
112 N° de mandat Texte (15) "251" N° de mandat pour l'agence
113 Date mandat Date "13/02/2003" Format : JJ/MM/AAAA
114 Nom mandataire Texte (64) "DUPONT"
115 Prénom mandataire Texte (64) "LOUIS"
116 Raison sociale
mandataire

```
Texte (64)
```
117 Adresse mandataire Texte (128)
118 CP mandataire Texte (5)
119 Ville mandataire Texte (50)
120 Téléphone mandataire Texte (10) "0123456789"
121 Commentaires
mandataire

```
Texte (4000)
```
122 Commentaires privés Texte (4000)"Clefs à prendre chez le gardien"
123 Code négociateur Texte (50) "MARTIN" Code ou nom du négociateur
124 Code Langue 1 Texte (3) PourCode Langue, choisir entre :
**EN** pour anglais,
**ES** pour espagnol,
**DE** pour allemand,
**IT** pour italien,
**NL** pour néerlandais,
**PT** pour portugais.

```
PourProximité,LibelléetDescriptifremplir avecles
données de la langue sélectionnée.
```
125 Proximité Langue 1 Texte (64)
126 Libellé Langue 1 Texte (64)
127 Descriptif Langue 1 Texte (4000)
128 Code Langue 2 Texte (3)
129 Proximité Langue 2 Texte (64)
130 Libellé Langue 2 Texte (64)
131 Descriptif Langue 2 Texte (4000)
132 Code Langue 3 Texte (3)
133 Proximité Langue 3 Texte (64)
134 Libellé Langue 3 Texte (64)
135 Descriptif Langue 3 Texte (4000)
136 Champ personnalisé 1 "" Les 25 champs suivants peuvent être utilisés pour
nous transmettre des informations qui ne font pas
partie des spécifications standards.

137 Champ personnalisé 2 ""
138 Champ personnalisé 3 ""

```
SeLoger - 65, rue Ordener - 75018 Paris France
Tél: +33 (0)1 53 38 28 00 – Fax: +33 (0)826 620 629- http://www.seloger.com^9
```

```
Il peut s’agir de noms de photos supplémentaires ou
tout autre information que vous jugerez utile de nous
transmettre dans le cadre d’évolutions futures.
```
```
Si vous utilisez ces champs, veuillez prendre contact
avec notre service technique pour nous indiquer leur
contenu.
```
139 Champ personnalisé 4 ""
140 Champ personnalisé 5 ""
141 Champ personnalisé 6 ""
142 Champ personnalisé 7 ""
143 Champ personnalisé 8 ""
144 Champ personnalisé 9 ""
145 Champ personnalisé 10 ""
146 Champ personnalisé 11 ""
147 Champ personnalisé 12 ""
148 Champ personnalisé 13 ""
149 Champ personnalisé 14 ""
150 Champ personnalisé 15 ""
151 Champ personnalisé 16 ""
152 Champ personnalisé 17 ""
153 Champ personnalisé 18 ""
154 Champ personnalisé 19 ""
155 Champ personnalisé 20 ""
156 Champ personnalisé 21 ""
157 Champ personnalisé 22 ""
158 Champ personnalisé 23 ""
159 Champ personnalisé 24 ""
160 Champ personnalisé 25 ""
161 Dépôt de garantie Décimal "700"
162 Récent Texte (3) "OUI" OUI / NON
163 Travaux à prévoir Texte (3) "OUI" OUI / NON
164 Photo 10 Texte (256) "Photo.jpg" ou "http://..." Nom du fichier définissant la photo 10 de l’annonce
165 Photo 11 Texte (256) "Photo.jpg" ou "http://..."
166 Photo 12 Texte (256) "Photo.jpg" ou "http://..."
167 Photo 13 Texte (256) "Photo.jpg" ou "http://..."
168 Photo 14 Texte (256) "Photo.jpg" ou "http://..."
169 Photo 15 Texte (256) "Photo.jpg" ou "http://..."
170 Photo 16 Texte (256) "Photo.jpg" ou "http://..."
171 Photo 17 Texte (256) "Photo.jpg" ou "http://..."
172 Photo 18 Texte (256) "Photo.jpg" ou "http://..."
173 Photo 19 Texte (256) "Photo.jpg" ou "http://..."
174 Photo 20 Texte (256) "Photo.jpg" ou "http://..."
175 Identifiant technique Texte (30) "00001" **Obligatoire -** Identifiant unique de l’annonce.
176 Consommation énergie Entier "191" Consommation d’énergie en kWhEP/m²/an
177 Bilan consommation
énergie

Texte (2) "D", "VI", "NS" Classification de la consommation d’énergie
"VI" → Vierge "NS" → Non soumis
(Cf section DPE)
178 Emissions GES Entier "42" Estimation des émissions : kg éqCO2/m²/an
179 Bilan émission GES Texte (2) "E", "VI", "NS" Classification des émissions GES
"VI" → Vierge "NS" → Non soumis
180 Identifiant quartier
**(obsolète)**

(^10) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


181 Sous type de bien Texte "Maison de village" Voir liste des sous-types en Annexe
182 Périodes de disponibilitéTexte Voir chapitre ‘Locations
vacances’

**Locations vacances** uniquement
183 Périodes basse saison Texte
184 Périodes haute saison Texte
185 Prix du bouquet Décimal Prix du bouquet (Viager)
186 Rente mensuelle Décimal Rente mensuelle (Viager)
187 Age de l’homme Entier Age de l’homme (Viager)
188 Age de la femme Entier Age de la femme (Viager)
189 Entrée Texte (3) OUI / NON - Le bien dispose d’une entrée
190 Résidence Texte (3) OUI / NON - ( **Location vacances** uniquement) Le bien
fait partie d’une résidence
191 Parquet Texte (3) OUI / NON
192 Vis-à-vis Texte (3) OUI / NON
193 Transport : Ligne Texte (5) "8"
194 Transport : Station Texte (32) "Opéra"
195 Durée bail Entier Durée du bail pour les locations
196 Places en salle Entier Nombre de places en salle (pour les restaurants par
exemple)
197 Monte-charge Texte (3) OUI / NON - Le bien dispose d’un monte-charge
198 Quai Texte (3) OUI / NON - Pour les boutiques, hangar : Le bien
dispose d’un quai.
199 Nombre de bureaux Entier
200 Prix du droit d’entrée Décimal Pour les locations
201 Prix masqué Texte (3) OUI / NON : Uniquement pour **Belles Demeures**  :
affichage d’une tranche de prix (déterminé depuisle
prix renseigné dans le champ Prix) plutôt que le prix
202 Loyer annuel global Décimal **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
203 Charges annuelles
globales

Décimal **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
204 Loyer annuel au m2 Décimal **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
205 Charges annuelles au m2Décimal **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
206 Charges mensuelles HT Texte (3) "NON" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON – Charges mensuelles hors taxes
207 Loyer annuel CC Texte (3) "OUI" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON - Loyer annuel charges comprises
208 Loyer annuel HT Texte (3) "NON" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON - Loyer annuel hors taxes
209 Charges annuelles HT Texte (3) "NON" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON - Charges annuelles hors taxes

```
SeLoger - 65, rue Ordener - 75018 Paris France
Tél: +33 (0)1 53 38 28 00 – Fax: +33 (0)826 620 629- http://www.seloger.com^11
```

210 Loyer annuel au m2 CC Texte (3) "OUI" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON - Loyer annuel au m2 charges comprises
211 Loyer annuel au m2 HT Texte (3) "NON" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON - Loyer annuel au m2 hors taxes
212 Charges annuelles au m
HT

Texte (3) "NON" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON - Charges annuelles au m2 hors taxes
213 Divisible Texte (3) "OUI" **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
OUI / NON - La surface est divisible
214 Surface divisible
minimale

Décimal **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
215 Surface divisible
maximale

Décimal **(Uniquement bureaux, commerces, bâtiment,
boutique, local et entreprises)**
216 Surface séjour Décimal Surface du séjour
217 Nombre de véhicules Entier "2" **(Uniquement parkings)**
218 Prix du droit au bail Décimal "250" **(Uniquement locations)**
219 Valeur à l’achat Décimal "150000" **(Uniquement produits d’investissement)**
220 Répartition du chiffre
d’affaire

```
Texte (100) "70 % bar / 30 % restaurant" (Uniquement Ventes fonds de commerce)
```
221 Terrain agricole Texte (3) "OUI " OUI/NON
222 Equipement bébé Texte (3) "OUI" OUI/NON

223 Terrain constructible Texte (3) "OUI" OUI/NON
224 Résultat Année N-2 Entier "65000" Résultats année N-
**(Uniquement Ventes fonds de commerce)**
225 Résultat Année N-1 Entier "55000" Résultats année N-
**(Uniquement Ventes fonds de commerce)**
226 Résultat Actuel Entier "60000" Résultats année en cours
**(Uniquement Ventes fonds de commerce)**
227 Immeuble de parkings Texte (3) "OUI" OUI/NON **(Uniquement pour les parkings)**
228 Parking isolé Texte (3) "OUI" OUI/NON **(Uniquement pour les parkings)**
229 Si Viager Vendu Libre Texte (3) "OUI" OUI/NON
230 Logement à disposition Texte (3) "OUI" OUI/NON Le commerce dispose d’un logement
231 Terrain en pente Texte (3) "OUI" OUI/NON **(Uniquement pour les terrains)**
232 Plan d’eau Texte (3) "OUI" OUI/NON : Le bien dispose d’un plan d’eau
**(Uniquement pour les terrains et/ou les châteaux)**
233 Lave-linge Texte (3) "OUI" OUI/NON
234 Sèche-linge Texte (3) "OUI" OUI/NON
235 Connexion internet Texte (3) "OUI" OUI/NON
236 Chiffre affaire Année N-2 Entier "35000" Chiffre d’affaire année N-
237 Chiffre affaire Année N-1 Entier "45000" Chiffre d’affaire année N-
238 Conditions financières Texte (4000)"Frais de rédaction d'acte : 4,5%
du loyer annuel HT/HC"

```
(Uniquement pour les bureaux)
```
(^12) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


239 Prestations diverses Texte (4000)"Interphone - Digicode" **(Uniquement pour les bureaux)**
240 Longueur façade Décimal "4,5" **(Uniquement pour les boutiques ou terrains)**
241 Montant du rapport Texte (20) "650" **(Uniquement pour les produits d’investissement)**
242 Nature du bail Texte (50) "Location meublée" **(Uniquement pour les locations)**
243 Nature bail commercial Texte (50) "Tous commerces sauf
restauration"

```
(Uniquement pour les ventes fonds de commerce)
```
244 Nombre terrasses Entier "3"
245 Prix hors taxes Texte (3) "OUI" OUI/NON
246 Si Salle à manger Texte (3)  "OUI" OUI/NON
247 Si Séjour Texte (3) "OUI" OUI/NON
248 Terrain donne sur la rue Texte (3) "OUI" OUI/NON
249 Immeuble de type
bureaux

```
Texte (3) "OUI" OUI/NON
```
250 Terrain viabilisé Texte (3) "OUI" OUI/NON
251 Equipement Vidéo Texte (3) "OUI" OUI/NON
252 Surface de la cave Décimal "10"
253 Surface de la salle à
manger

```
Décimal "40"
```
254 Situation commerciale Texte (64) "Rue piétonne proche marché" **(Uniquement pour les boutiques)**
255 Surface maximale d’un
bureau

```
Décimal "25" (Uniquement pour les bureaux)
```
256 Honoraires charge
acquéreur **(obsolète)**

```
Remplacé par le champ 302
```
257 Pourcentage honoraires
TTC **(obsolète)**

```
Remplacé par le champ 15
```
258 En copropriété Texte (3) "OUI" OUI/NON (Loi Alur)
Le bien est-il dans une copropriété?
259 Nombre de lots Entier 10 Nombre de lots de la copropriété (Loi Alur)
260 Charges annuelles Décimal "3500" Montant moyen annuel de la quote-part du budget
prévisionnel des dépenses courantes (Loi Alur)
261 Syndicat des
copropriétaires en
procédure

Texte (3) "OUI" OUI/NON (Loi Alur)
Le syndicat des copropriétaires fait-il l'objet d'une
procédure?
262 Détail procédure du
syndicat des
copropriétaires

```
Texte (128) Détails sur la procédure en cours du syndicat des
copropriétaires (Loi Alur)
```
263 Champ personnalisé 26 ""
264 Photo 21 Texte (256) "Photo.jpg" ou "http://..."
265 Photo 22 Texte (256) "Photo.jpg" ou "http://..."
266 Photo 23 Texte (256) "Photo.jpg" ou "http://..."
267 Photo 24 Texte (256) "Photo.jpg" ou "http://..."
268 Photo 25 Texte (256) "Photo.jpg" ou "http://..."
269 Photo 26 Texte (256) "Photo.jpg" ou "http://..."
270 Photo 27 Texte (256) "Photo.jpg" ou "http://..."
271 Photo 28 Texte (256) "Photo.jpg" ou "http://..."
272 Photo 29 Texte (256) "Photo.jpg" ou "http://..."

```
SeLoger - 65, rue Ordener - 75018 Paris France
Tél: +33 (0)1 53 38 28 00 – Fax: +33 (0)826 620 629- http://www.seloger.com^13
```

273 Photo 30 Texte (256) "Photo.jpg" ou "http://..."
274 Titre photo 10 Texte (256) ""
275 Titre photo 11 Texte (256) ""
276 Titre photo 12 Texte (256) ""
277 Titre photo 13 Texte (256) ""
278 Titre photo 14 Texte (256) ""
279 Titre photo 15 Texte (256) ""
280 Titre photo 16 Texte (256) ""
281 Titre photo 17 Texte (256) ""
282 Titre photo 18 Texte (256) ""
283 Titre photo 19 Texte (256) ""
284 Titre photo 20 Texte (256) ""
285 Titre photo 21 Texte (256) ""
286 Titre photo 22 Texte (256) ""
287 Titre photo 23 Texte (256) ""
288 Titre photo 24 Texte (256) ""
289 Titre photo 25 Texte (256) ""
290 Titre photo 26 Texte (256) ""
291 Titre photo 27 Texte (256) ""
292 Titre photo 28 Texte (256) ""
293 Titre photo 29 Texte (256) ""
294 Titre photo 30 Texte (256) ""
295 Prix du terrain Décimal "85000" Construire : Dans le cas d'une vente de "maison +
terrain"→ prix du terrain seul
296 Prix du modèle de
maison

Décimal "140000" Construire : Dans le cas d'une vente de "maison +
terrain" → Prix de la maison seule
297 Nom de l'agence gérant
le terrain

Texte (256) "Agence terra nova" Construire : Dans le cas d'une vente de "maison +
terrain" → Nom de l'agence gérant la vente du terrain
298 Latitude Décimal "48.87079" Latitude et longitude du bien (exemple
correspondant au 55 rue Faubourg Saint Honoré,
75008 Paris)

299 Longitude Décimal "2.31689"

300 Précision GPS Entier "1" **Obligatoire** pour la prise en compte des coordonnées
Degré de précision des coordonnées GPS (Cf section
Précision GPS)
301 Version Format Texte (10) "4.09" **Obligatoire**
Version du format envoyé (Version-Révision)
302 Honoraires à la charge deEntier "1" - Acquéreur
"2" - Vendeur
"3" - Acquéreur ET Vendeur

(Loi Alur 02/2017) **ObligatoireVENTE UNIQUEMENT**
Spécifie la(les) personne(s) en charge du règlement
des honoraires à l’issue de la transaction
303 Prix hors honoraires
acquéreur

Décimal "1200000" (Loi Alur 02/2017) **Obligatoire si acquéreur
VENTE UNIQUEMENT**
Prix du bien hors honoraires acquéreur
304 Modalités charges
locataire

```
Entier "1" - Forfaitaires mensuelles
"2" - Prévisionnelles mensuelles
avec régularisation annuelle
```
```
(Loi Alur 02/2017) ObligatoireLOCATION
UNIQUEMENT
Modalité de règlement des charges par le locataire
```
(^14) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


"3" - Remboursement annuel
par le locataire
305 Complément loyer Décimal "750" (Loi Alur 02/2017) **LOCATION UNIQUEMENT**
Montant éventuel d’un complément de loyer
306 Part honoraires
état des lieux

Décimal "300" (Loi Alur 02/2017) **ObligatoireLOCATION
UNIQUEMENT**
Montant TTC de la part des honoraires pour la
réalisation de l’état des lieux
307 URL du Barème des
honoraires de l’Agence

```
Texte(256) "http://www.monagence.com/b
areme"
```
(Loi Alur 02/2017)
Lien direct vers le barème des honoraires de l’agence
**Attention** : URL identique sur les annonces d’une
même agences
308 Prix minimum Décimal "150000" **Obligatoire(modèle de maison)**
309 Prix maximum Décimal "450000" **(Modèle de maison)**
310 Surface minimale Décimal "35.0" **Obligatoire(modèle de maison)**
311 Surface maximale Décimal "185.0" **(Modèle de maison)**
312 Nombre de pièces
minimum

```
Entier "2" Obligatoire(modèle de maison)
```
313 Nombre de pièces
maximum

```
Entier "6" (Modèle de maison)
```
314 Nombre de chambres
minimum

```
Entier "1" Obligatoire(modèle de maison)
```
315 Nombre de chambres
maximum

```
Entier "5" (Modèle de maison)
```
316 ID type étage Entier "1" **(Modèle de maison)**
317 Si combles
aménageables

Texte (3) "OUI" OUI/NON
**(Modèle de maison)**
318 Si garage Texte (3) "OUI" OUI/NON
**(Modèle de maison)**
319 ID type garage Entier "1" **(Modèle de maison)**
320 Si possibilité
mitoyenneté

Texte (3) "OUI" OUI/NON
**(Modèle de maison)**
321 Surface terrain
nécessaire

```
Décimal "185.0" (Modèle de maison)
```
322 Localisation Texte "75,92,93,94,95" **Obligatoire(modèle de maison)**
Liste de départements séparés par des virgules
323 Nom du modèle Texte(50) "Tradition" **(Modèle de maison)**
324 Date réalisation DPE Date “25/06/2021” Date de réalisation du DPE Format : JJ/MM/AAAA
325 Version DPE Texte(12) “DPE_v01-2011” (Loi ELAN )Choisir entre DPE_v01-2011 ( DPE effectué
avant le 1 juillet 2021 ) et DPE_v07-2021( après le 1
juillet 2021 )
326 DPE coût min conso Décimal “700.50” Montant bas supposé et théorique des dépenses
énergétiques
327 DPE coût max conso Décimal “1100.22” Montant haut supposé et théorique des dépenses
énergétiques

```
SeLoger - 65, rue Ordener - 75018 Paris France
Tél: +33 (0)1 53 38 28 00 – Fax: +33 (0)826 620 629- http://www.seloger.com^15
```

328 DPE Année de référence
conso

Entier “2021” Année de référence utilisée pour établir la simulation
des dépenses annuelles (champs 326/327)
329 Surface terrasse Décimal “45.79” Surface terrasse ( associé au champs 48 “terrasse”)

(^16) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


## Unicité des références d’annonces

Afind’améliorer lamiseenlignedesannonces,destraitementsspécifiquesontétémisenplace,
cependant ces traitements reposent sur l’unicité desréférences des annonces.

Nousinsistonsdoncsurl’importanceduchamp 175 ( _Identifianttechnique_ )quidoitêtrerenseignéde
manière **uniquepourchaqueannonce** d’unemêmeagence.Cetidentifianttechniquen’estpasaffichésurnos
supports, seule la référence de l’annonce (champ 2)est affichée.

```
Cet identifiant doit être constant pour toute la duréede vie de l’annonce.
```
```
En cas d’anomalie, le flux du client concerné pourraêtre suspendu et les annonces dépubliées.
```
## Spécifications du fichier de configuration

Le fichier de configuration nommé « _Config.txt_ » comporteles lignes ci-dessous :

```
Version=4.
Application= nom de votre logiciel / Version de votrelogiciel
Devise=Euro
```
Danslecasoùvoustransmettezdesinformationsdansleschampspersonnalisés(champs 136 à160)
rajoutez pour chaque champ sa description

Exemple :
**Champperso1=Siret de l’agence
Champperso2=Numéro de carte pro
Champperso3=taxe foncière**

**Attention**  :ceschampssonttraitésaucasparcas,sivouslesutilisez,veuillezprendrecontactavecnotre
service technique pour nous indiquer leur contenu.

## Spécifications du fichier de configuration des photos

Lefichierdeconfigurationdesphotosnommé« _Photos.cfg_ »comporte 1 lignedécrivantlemoded’envoi
des photos :

**Mode=URL** Dans le cas où vous envoyez les url desphotos dans le fichier annonces.

**Mode=FULL** Dans le cas où vous renvoyez l’intégralitédes photos lors de chaque transfert.

**Mode=DIFF** Danslecasoùvousfonctionnezenmodedifférentiel,c’estàdirequevousnerenvoyezlorsde
chaque transfert que les nouvelles photos ou les photosayant été modifiées.

**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^17


## Spécifications des fichiers photos / plans / visitesvirtuelles

LesfichiersphotosetplansdoiventêtreauformatJPG,GIF,PNGouBMPetpeuventêtretransmisde 2
manières :
**Attention : Quel que soit le mode de transmission,le poids d'une photo ne doit pas excéder 40 Mo**

**_Transmission par URL (Conseillée)_**

VousavezlapossibilitédementionneruneURLpointantsurlaphotodansleschampsphoto1,photo2,
etc...LatailledufichierZIPsetrouveainsiréduitecarlesphotosnesontplusjointesetletransfertversnotre
serveurpaccéléré.Notresystèmesechargedetéléchargerlesphotosdepuisl’URLmentionnéeetdeles
stocker sur nos serveurs.

_Point important :_
D’unenvoiàl’autre,seuleslesnouvellesURLoulesURLmodifiéessonttéléchargées.Siuneimageaété
modifiéealorsquesonURLn’apaschangé,celle-cineserapasmiseàjour.Pourcontournerceproblème,vous
pouvezinsérerdanslesURLunevariabledonnantparexempleladatededernièremodificationdelaphoto,
ou un hash (CRC, MD5 ...) exemple :

```
http://www.serveurphotos.com/annonce123/photo1.jpg?
```
**Attention :** Vousnedevez **ENAUCUNCAS** changerlatotalitédesURLentrechaqueenvoi,ceciralentira
considérablementlamiseenlignedesannoncesetnouspourrionsêtreamenéàstopperletéléchargement
des photos pour votre passerelle.

**_Transmission par Fichiers Joints_**

Nousvousconseillonsfortementd’utiliserleformatJPGenretaillantsipossiblelesimagesavantleur
envoidemanièreàréduirelatailledufichiertransféré.Voustrouverezci-dessouslesstandardsquenous
appliquons sur chaque image avant incorporation dansnos bases de données :

```
Taille maximale (largeur / hauteur) :1440 pixels/ 1440 pixels
DPI (ou PPP) : 75
```
Chaque image se trouve ainsi réduite à une tailled’environ 20 à 150 Ko maximum.

**_Visites Virtuelles / Vidéos_**

Les annonces peuvent disposer d’un seul des 2 typesde visites virtuelles disponibles :

- _Champ 103_ - Photo panoramique : Image au format panoramique(vue à 360° complète) qui
  sera affichée par une applet Java.
- _Champ 104_ - URL : Pointant OBLIGATOIREMENT vers unepage qui sera affichée en pop-up ne
  contenant aucune autre donnée que la visite virtuelledu bien.

Si vous disposez d’autres techniques, vous pouvezprendre contact avec nous.

(^18) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


## Loi Alur (Mars 2017)

Danslecadredel'applicationdela **loiAlur** etdesamodificationappliquée **début 2017** ,nousavons
ajouté les informations suivantes :

**_Pour les Ventes_**

```
 Champ 256 ( OBSOLETE – voir champs 302 )
 Champ 15 - Honoraires - ATTENTION :MISEAJOURDEL’UTILISATIONDECECHAMPàpartirde
la révision 006
o Sileshonorairessontàlachargedel'acquéreur,honorairesTTCenpourcentageduprixhors
honoraires.
Note: pour uneannonce maison + terrain pour les clientsConstruire, leshonoraires
s'appliquent sur le prix du terrain seul. (annoncesde constructeurs de maisons individuelles)
 Champ 258 - Bien en copropriété: OUI / NON
 Champ 259 - Nombre de lots de la copropriété
 Champ 260 - Montant des charges annuelles :
o Montant moyen annuel de la quote-part du budget prévisionneldes dépenses courantes
 Champ 261 - Syndicat des copropriétaires en procédure:OUI / NON
 Champ 262 - Détail de la procédure du syndicat descopropriétaires:
o Silesyndicatdescopropriétairesestencoursdeprocédure->Détailsconcernantcette
procédure
 Champ 302 – Honoraires à la charge de :
o "1" pour Acquéreur
o "2" pour Vendeur
o "3" pour Acquéreur ET Vendeur
 Champ 303 – Prix du bien hors honoraires à la chargede l’acquéreur
```
**_Pour les Locations _**

```
 Champ 15 - Honoraires–ATTENTION :MISEAJOURDEL’UTILISATIONDECECHAMPàpartirde
la révision 006
o Montant des honoraires en TTC à la charge du locataire(en euros)
 Champ 304 – Modalités charges locataire :
o "1" pour Forfaitaires mensuelles
o "2" pour Prévisionnelles mensuelles avec régularisationannuelle
o "3" pour Remboursement annuel par le locataire
 Champ 305 - Complément de loyer éventuel
 Champ 306 - Part honoraires état des lieux
```
**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^19


**_Donnée Agence_**

```
 Champ 307 – URL du Barème des honoraires de l’Agence
Si plusieurs URL sont renseignées pour une MÊME AGENCE,ces données seront IGNOREES.
```
(^20) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


## Codifications des champs spéciaux

**TYPES DE CHAUFFAGE
128=radiateur,
256=sol,**
384=mixte,
**512=gaz,**
640=gaz radiateur,
768=gaz sol,
896=gaz mixte,
**1024=fuel,**
1152=fuel radiateur,
1280=fuel sol,
1408=fuel mixte,
**2048=électrique,**
2176=électrique radiateur,
2304=électrique sol,
2432=électrique mixte,
**4096=collectif,**
4224=collectif radiateur,
4352=collectif sol,

```
4480=collectif mixte,
4608=collectif gaz,
4736=collectif gaz radiateur,
4864=collectif gaz sol,
4992=collectif gaz mixte,
5120=collectif fuel,
5248=collectif fuel radiateur,
5376=collectif fuel sol,
5504=collectif fuel mixte,
6144=collectif électrique,
6272=collectif électrique radiateur,
6400=collectif électrique sol,
6528=collectif électrique mixte,
8192=individuel,
8320=individuel radiateur,
8448=individuel sol,
8576=individuel mixte,
```
```
8704=individuel gaz,
8832=individuel gaz radiateur,
8960=individuel gaz sol,
9088=individuel gaz mixte,
9216=individuel fuel,
9344=individuel fuel radiateur,
9472=individuel fuel sol,
9600=individuel fuel mixte,
10240=individuel électrique,
10368=individuel électrique radiateur,
10496=individuel électrique sol,
10624=individuel électrique mixte,
16384=climatisation réversible,
20480=climatisation réversible centrale,
24576=climatisation réversible individuelle
```
**TYPES DE CUISINES**
1 = aucune
2 = américaine
3 = séparée

```
4 = industrielle
5 = coin cuisine
6 = américaine équipée
```
```
7 = séparée équipée
8 = coin cuisine équipé
9 = équipée
```
**SOUS-TYPES DE BIEN**
bastide
bastidon
bergerie
cabanon
Chalet
Chambre de service
corps de ferme
demeure
domaine
Duplex
échoppe
Entrepôt
Exploitation agricole
Exploitation viticole
ferme
Fermette
grange
Île
Immeuble commercial
Immeuble de bureaux
Immeuble mixte

```
Local d'activités
Local de stockage
Lo
Lotissement
maison ancienne
maison basque
maison charentaise
maison contemporaine
maison d'architecte
Maison d'hôte
Maison de loisirs
maison de maître
maison de village
maison de ville
Maison en pierre
maison jumelée
maison landaise
maison longère
Maison provençale
Maison traditionnelle
manoir
```
```
mas
mazet
moulin
pavillon
Programme
Projet (uniquement pour "Construire")
propriété
Propriété de chasse
Propriété équestre
Restauration
Riad
Studette
Terrain agricole
Terrain commercial
Terrain de loisirs
Terrain industriel
Terrain viticole
toulousaine
Triplex
villa
```
**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^21


```
TYPES DE GARAGE (modèle de maison)
```
1 = accolé
2 = intégré
3 = en sous-sol

**TYPES D’ETAGE (modèle de maison)**
1 = étage plein
2 = étage partiel
3 = demi étage

(^22) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


## Locations Vacances

Auniveaudechaqueannonce,vousavezlapossibilitédenousenvoyerunelistecomplètedespériodes
dedisponibilitéetdespériodespourdéfinirlasignificationdebasse/hautesaison.Voiciledétailduformat
des champs 182, 183 & 184 réservés à cet effet.

```
Champ 182 (Périodes de disponibilité)
```
Vousdeveznousenvoyerunelistedespériodesséparéesparlecaractère  **;** .Nousallonstraiterchaque
périodedevotrelisteetnousallonsdéclarerl’annoncedelocationvacancescommeétantDISPONIBLEentre
lejourdedébutdevotrepériode(inclusedansladisponibilité)etlejourdefindevotrepériode(inclusedans
ladisponibilité).Unjourquin’estpascomprisdansaumoinsunedespériodesindiquéesseraconsidéré
comme étant NON DISPONIBLE.

```
Voici le format de la liste :
```
```
jj/mm/aaaa- jj/mm/aaaa; jj/mm/aaaa- jj/mm/aaaa;........ ;jj/mm/aaaa- jj/mm/aaaa;
```
```
Si ce champ est vide, le bien est par défaut disponiblesans restriction de dates.
```
Exemple  1 : _Votre annonce est disponible entre 1erjanvier 2009 et 1erjuin 2009 et entre 1erseptembre2009 et 30
Novembre 2009_ .Dans le champ 182, nous aurons l’informationsuivante :

```
01/01/2009-01/06/2009;01/09/2009-30/11/2009
```
Exemple 2 : _Votreannonceestdisponibletoutel’année 2009 saufentre 15 juillet 2009 et 25 août 2009_ .Dansle
champ 182, nous aurons l’information suivante :

```
01/01/2009-14/07/2009;26/08/2009-31/12/2009
```
```
Champ 183 & 184 (Périodes basse / haute saison)
```
Vousavezlapossibilitédenousenvoyerlespériodesquidéfinissentlasignificationdebasse/haute
saisonpourunelocationvacances..Pourcela,ilfautnousenvoyerdanslacolonnen° 183 / 184 lalistedes
périodes séparées par le caractère ‘ ;’.

Voici le format de la liste :

```
jj/mm - jj/mm; jj/mm - jj/mm;........ ; jj/mm - jj/mm;
```
**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^23


## Publications

Vouspouvezlaisserlapossibilitéàl’agencedechoisirpourchaqueannoncesurquel(s)support(s)elle
paraîtra en remplissant le champ 82 ( _Publications_ ).
Pardéfaut,lorsquecettezoneestvide,l’annonceparaîtautomatiquementsurtouslessupportsdont
disposel’agence.Sivousutilisezcettezone,vousdevezyinclurelalistedescodesdesupportssurlesquels
paraîtra l’annonce séparés par des virgules.

```
Codes supports :
```
**SL** = Seloger (et services partenaires) [http://www.seloger.com](http://www.seloger.com)
**BD** = Belles Demeures [http://www.bellesdemeures.com](http://www.bellesdemeures.com)
**WA** = Site web de l’agence si celui-ci est géré parSeloger.com
**WI** = Webimm [http://www.webimm.com](http://www.webimm.com)
**AGB =** Agorabiz [http://www.agorabiz.com](http://www.agorabiz.com)
**RIPP =** Réseau International Profil Plus
**PC** = Pack commercialisateur

## Evolutions DPE 1er juillet 2021 puis 1er janvier 2022

LesévolutionsDPEdu1erjuillet 2021 concernentàcejourexclusivementlesannoncesdeventeetde
location de biens anciens à usage d’habitation.
Autrement dit, la notion de DPE demeure inchangéepour les autres types de biens.

AfindeprendreencomptelesbiensnonsoumisauxDPEetlesDPEvierges,nousavonsfaitévoluernos
spécifications.Désormaisvouspouvezmentionnerdansleschamps 177 ( _Bilanconsommationénergie_ )et 179
( _Bilan émission GES_ ) les valeurs suivantes :

```
 " VI " dans le cas d'un DPE vierge
 " NS " dans le cas d'un DPE non soumis
```
Lorsque le DPE est vierge ou non soumis, il suffitalors de laisser les champs 176 ( _Consommation énergie_ )
et 178 ( _Emission GES_ ) vides car ceux-ci ne serontpas pris en compte.

Suite à la loi ELAN, la notion de DPE vierge disparaîtpour les nouveaux DPE et des nouveaux champs
apparaissent : “Date réalisation DPE”et “VersionDPE” visent à sécuriser la qualité des données etla bonne
distinction des DPE _ante_ 1er juillet 2021 et les DPE _post_ 30 juin 2021 ( Champs 324 et 325 )

Lesdonnéesdeschamps 326 à 328 neserontutiliséesenpublicationsurnossupportsgrandspublics
qu’àcompterdu1erjanvier2022.Leschampssontdisponiblesenentréedefluxpourvouspermettredèsà
présent de réaliser le projet en une seule itération,si vous le souhaitez.

(^24) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


## Géolocalisation

```
Pour géolocaliser un bien, vous devez nous transmettre :
```
```
● L’adresse exacte que nous géocoderons
● Les coordonnées GPS pour information qualité.
```
Sivousnousenvoyezdesdonnées,ellesserontexploitées.Nousvousdemandonsdenousenvoyer
uniquementdesdonnéesexactes.Toutedonnéeretravailléepourflouteroumasquerl’emplacementdubien
ne doit pas être envoyée.

Lequartierestdésormaiscalculéàpartirdesdonnéesadresses(oucoordonnéesGPS)transmises.L’id
quartier est une donnée qui n’est plus prise en compte.

LesclientsontlapossibilitédeparamétrerdansleurespaceMySeLogerProledegrédeprécisionde
géolocalisationdeleursbiens.Chaqueclientpeutchangerceparamétragepourunelocalisationexacteselon
letyped’annonce.Lesannoncesconcernéess’afficherontalorsviaunpinpointsurlacarte.L’internauten’aura
jamais accès à l’adresse.

Nous allons renforçons régulièrement les testsde cohérence entre les données delocalisation
transmises(adresse, coordonnées GPS,CP,Ville,Pays) pourgarantirlaqualitédel’expérience denos
utilisateurs.

## Envoi sur le serveur FTP

Sil’agencedisposedeplusieursdenossupports,unseulenvoiestnécessaire(lesannoncesseront
automatiquementenvoyéessurlesdifférentssupportsparnossoinsentenantcompteduchamp82-
_Publications_ )

```
Serveur FTP  : transferts.seloger.com
Utilisateur  : Nous contacter
Motdepasse  : Nous contacter
Nom du fichier  : <NomDuLogiciel>_<IdentifiantAgence>.zip
```
Le < _NomDuLogiciel_ > vous sera transmis lors de la validationdes spécifications techniques,
l'< _IdentifiantAgence_ > vous sera transmis par notresupport client lors de la demande d'activation dela
passerelle.

Exemple :silenomdulogicielestIMMOetsil’identifiantdel’agence(fourniparnosservices)est
MONAGENCE, le fichier transféré doit s’appeler immo_monagence.zip

**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^25


## Envois groupés

Sivoussouhaitezcentraliserl'envoidesdonnéespourlecomptedeplusieursagencesetnousenvoyer
unfichieruniquecontenantlesannonces detouteslesagencesdisposantdelapasserelle,vousdevez
impérativement remplir le champ 1 avec l'identifiant.

```
Veuillez prendre contact avec nos services pour lamise en place de ce type de passerelle.
```
## Tests et mise en production de votre passerelle

Avant la mise en production de votre passerelle, nousdevons passer par une phase de test de votre
fichier. Vous pouvez nous envoyer une extraction testpar email surediteurs@seloger.comvous recevrezen
retour une validation ainsi que les accès FTP pourla mise en production.

Nous mettons à votre disposition un outil de testde votre fichier CSV qui vous permet de vérifier son
format et les éléments principaux pour sa validitéavant de nous l’envoyer. Cet outil est téléchargeableà
l’adresse suivante :http://flux.seloger.com/TesteurImmo.4.08.zip

Attention, cet outil vous permettra des tests jusqu’àla version de 4.08 février 2018. Les nouveautés dela
version de mai 2021 sont indisponibles sur le testeurimmo.

## Formats spécifiques

Sivousn’avezpaslapossibilitédenousfournirlesspécificitésdécritesdanscettedocumentation
n’hésitezpasànouscontacterafindenousfournirvospropresspécifications.Aprèsétudedefaisabiliténous
ferons en sorte de nous adapter à votre format.

Cettedocumentationdécritnotreprocédurestandardmaisenaucuncasnel’impose.N’hésitezdonc
pasàcontacternotreservicetechnique(dontlescoordonnéesfigurententêtedecedocument)sivousêtes
dans ce cas de figure.

(^26) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


## Notes et recommandations

Les présentes spécifications peuvent être amenées à évoluer avec le temps, cependant nous
garantissonsune compatibilité ascendantelors de chaque évolutionafindegarderfonctionnellesles
passerelles existantes.

Lorsqu’uneagencedésireenvoyerpourlapremièrefoissesannonces,ilestimpératifqu’elleprenne
contact avec notre service hot line AVANT d’effectuerl’envoi.

Ledélaidemiseenlignedesannoncesaprèschaqueenvoipeuts’étendreentre1het6hsuivantla
chargeaumomentdelaréceptiondufichier.Chaqueagencepeutenvoyersonfichieraurythmesouhaité,il
esttoutefoisrecommandédefaireunenvoiaumoinsunefoisparsemaine(avecunmaximumde 3 à 4 envois
par jour) afin de garantir la fraîcheur des annoncessur les différents supports.

Afindegarantirunequalitédeservicesurnossupports,nouspouvonsêtreamenésàdésactiver(surles
sitesseloger.com,immostreet.cometpartenaires)certainesannoncesnerespectantpasnotrechartede
qualité.Voustrouverezci-dessousunelistenonexhaustivedesprincipauxcritèresdequaliténécessairesàla
validation d’une annonce :

✔ Unicité de la référence

✔ Le code postal doit **obligatoirement** être fourni **enentier**.

✔ La ville doit être **renseignée** et **correspondre au codepostal fourni**.

✔ Le prix / loyer doit être **renseigné** et contenir **unevaleur cohérente**.

✔ Les honoraires doivent être **renseignés**.

✔ L’annonce doit comporter un minimum de **descriptif** pour les internautes.

Aucun champ ne doit contenir de code HTML. (À l’exceptionde la balise <BR> pour les retours à la ligne)

Les caractères accentués ne doivent pas être transmisen code HTML.

Concernantlesphotos :Touteimageautrequ’unephotodubienouunplanpourraêtrerejetée(exemplelogo
de l’agence).

**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^27


## Historique des Révisions

**VERSION PRECEDENTE OBSERVATIONS**
4.08 - Révision 001 **Modification champ**
_Nom_  : Bilan consommation énergie
_Position :_ Colonne 177
_Type:_ Texte
_Description : Classification de la consommationd'énergie, la valeurs "VI" (vierge) et "NS" (nonsoumis)
sont désormais autorisées_
**Modification champ**
_Nom_  : Bilan émission GES
_Position :_ Colonne 179
_Type:_ Texte
_Description : OUI : Classification des émissionsGES, les valeurs "VI" (vierge) et "NS" (non soumis)sont
désormais autorisées_

```
Nouveaux champs Photo : Photo21 à Photo30
Position : Colonne 264 à 273
```
```
Nouveaux champs Titre photo : Titre photo10 à Titrephoto30
Position : Colonne 274 à 294
```
```
Mise à jour Annexe : Liste des sous types de bien
```
```
Dispositif Loi Alur
Nouveau champ
Nom  : Honoraires charge acquéreur
Position : Colonne 256
Type: OUI/NON
Description : OUI : Les honoraires sont à lacharge de l'acquéreur.
Nouveau champ
Nom  : Pourcentage honoraires TCC
Position : Colonne 257
Type: Décimal
Description : Honoraires TTC inclus à la chargede l'acquéreur en % du prix.
Nouveau champ
Nom  : En copropriété
Position : Colonne 258
Type: OUI/NON
Description : Le bien est-il dans une copropriété
Nouveau champ
Nom  : Nombre de lots
Position : Colonne 259
Type: Entier
Description : Nombre de lots de la copropriété
Nouveau champ
Nom  : Charges annuelles
Position : Colonne 260
Type: Décimal
Description : Montant moyen annuel de la quote-partdu budget prévisionnel des dépenses courantes.
Nouveau champ
Nom  : Syndicat des copropriétaires en procédure
Position : Colonne 261
```
(^28) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


_Type:_ OUI/NON
_Description :_ OUI : Le syndicat des copropriétairesfait l'objet d'une procédure.
**Nouveau champ**
_Nom_  : Détail procédure du syndicat des copropriétaires
_Position :_ Colonne 262
_Type:_ Texte
_Description : Détail de la procédure en coursdont le syndicat des copropriétaires fait l'objet._
**Nouveau champ**
_Nom_  : Champ personnalisé 26
_Position :_ Colonne 263
_Type:_ Texte
_Description : Laisser vide_
4.08 - Révision 002
(octobre 2014)

**Nouveau champ**
_Nom_  : Prix du terrain
_Position :_ Colonne 295
_Type:_ Décimal
_Description :_ Prix du terrain seul (Dans lecas d'une vente "maison + terrain" sur Construire)
**Nouveau champ**
_Nom_  : Prix du modèle de maison
_Position :_ Colonne 296
_Type:_ Décimal
_Description :_ Prix de la maison seule (Dansle cas d'une vente "maison + terrain" sur Construire)
**Nouveau champ**
_Nom_  : Nom de l'agence gérant le terrain
_Position :_ Colonne 297
_Type:_ Texte
_Description :_ Nom de l'agence gérant la ventedu terrain (Dans le cas d'une vente "maison + terrain"sur
Construire)
4.08 Révision 003
(juillet 2015)

**Champ publication**
IS (Immostreet) et SN (SNPI) ne sont plus gérés
4.08 - Révision 004
(novembre 2015)

**Nouveau champ**
_Nom_  : Latitude
_Position :_ Colonne 298
_Type:_ Décimal
_Description :_ Latitude du bien
**Nouveau champ**
_Nom_  : Longitude
_Position :_ Colonne 299
_Type:_ Décimal
_Description :_ Longitude du bien
4.08 - Révision 005
(Janvier 2016)

**Nouveau champ**
_Nom_  : Précision GPS
_Position :_ Colonne 300
_Type:_ Entier
_Description :_ Degré de la précision GPS (Cfsection Précision GPS)
4.08 - Révision 006
(Mars 2017)

```
Nouveau champobligatoire
Nom  : Version + révision du format SeLoger utilisé
Position : Colonne 301
Type: Texte
Description : Version du format SeLoger utilisé(pour la 4.08 révision 007, renseigné « 4.08-007 »)
```
```
SeLoger - 65, rue Ordener - 75018 Paris France
Tél: +33 (0)1 53 38 28 00 – Fax: +33 (0)826 620 629- http://www.seloger.com^29
```

```
Champ obsolète
Nom  : Identifiant quartier
Position : Colonne 180
Champ obsolète
Nom  : Honoraires charge acquéreur
Position : Colonne 256
Champ obsolète
Nom  : Pourcentage honoraires TTC
Position : Colonne 257
```
```
Dispositif Loi Alur (Avril 2017)
```
**Modification champ**
_Nom_  : Honoraires
_Position :_ Colonne 15
_Type:_ Décimal
_Description_  :
Ventes : Honoraires TTC à la charge de l’acquéreuren pourcentage du prix du bien hors honoraires
Locations : Montant des honoraires en TTC à la chargedu locataire (en euros)
**Nouveau champ**
_Nom_  : Honoraires à la charge de
_Position :_ Colonne 302
_Type:_ Entier
_Description :_ Spécifie la(les) personne(s) encharge du règlement des honoraires à l’issue de la
transaction
**Nouveau champ**
_Nom_  : Prix hors honoraires acquéreur
_Position :_ Colonne 303
_Type:_ Décimal
_Description :_ Prix du bien hors honoraires acquéreur
**Nouveau champ**
_Nom_  : Modalités charges locataire
_Position :_ Colonne 304
_Type:_ Entier
_Description :_ Modalité de règlement des chargespar le locataire.
**Nouveau champ**
_Nom_  : Complément de Loyer
_Position :_ Colonne 305
_Type:_ Décimal
_Description :_ Complément éventuel de Loyer
**Nouveau champ**
_Nom_  : Part honoraires état des lieux
_Position :_ Colonne 306
_Type:_ Décimal
_Description :_ Montant TTC de la part des honorairespour la réalisation de l’état des lieux
4.08 - Révision 007
(Février 2018)

```
Modèles de maison
```
```
Nouveau champobligatoire
Nom  : Prix minimum
Position : Colonne 308
Type: Décimal
Description : prix minimum du modèle
```
(^30) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


```
Nouveau champ
Nom  : Prix maximum
Position : Colonne 309
Type: Décimal
Description : prix maximum du modèle
```
```
Nouveau champobligatoire
Nom  : surface minimale
Position : Colonne 310
Type: Décimal
Description : surface minimale du modèle
```
```
Nouveau champ
Nom  : surface maximale
Position : Colonne 311
Type: Décimal
Description : surface maximale du modèle
```
```
Nouveau champobligatoire
Nom  : nombre de pièces minimum
Position : Colonne 312
Type: Entier
Description : nombre de pièces minimum du modèle
```
```
Nouveau champ
Nom  : nombre de pièces maximum
Position : Colonne 313
Type: Entier
Description : nombre de pièces maximum du modèle
```
```
Nouveau champobligatoire
Nom  : nombre de chambres minimum
Position : Colonne 314
Type: Entier
Description : nombre de chambres minimum dumodèle
```
```
Nouveau champ
Nom  : nombre de chambres maximum
Position : Colonne 315
Type: Entier
Description : nombre de chambres maximum dumodèle
```
```
Nouveau champ
Nom  : ID type étage
Position : Colonne 316
Type: Entier
Description : type d’étage
```
```
Nouveau champ
Nom  : Si combles aménageables
Position : Colonne 317
```
**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^31


```
Type: OUI/NON
Description : Le modèle de maison possède-t-ildes combles aménageables
```
```
Nouveau champ
Nom  : Si garage
Position : Colonne 318
Type: OUI/NON
Description : Le modèle de maison possède-t-ilun garage
```
```
Nouveau champ
Nom  : ID type garage
Position : Colonne 319
Type: Entier
Description : type de garage
```
```
Nouveau champ
Nom  : Si possibilité mitoyenneté
Position : Colonne 320
Type: OUI/NON
Description : Le modèle de maison peut-il êtremitoyen
```
```
Nouveau champ
Nom  : S urface terrain nécessaire
Position : Colonne 321
Type: Décimal
Description : Surface de terrain nécessaire
```
```
Nouveau champobligatoire
Nom  : Localisation
Position : Colonne 322
Type: Texte
Description : Liste de départements séparéspar des virgules
```
```
Nouveau champ
Nom  : Nom du modèle
Position : Colonne 323
Type: Texte
Description : Nom du modèle de maison
```
4.09
(Mai 2021)

```
Nouveau champ
Nom  : Date réalisation DPE
Position : Colonne 324
Type: Date
Description : Date de réalisation du DPE Format :JJ/MM/AAAA en association cohérente avec le champs
325
```
```
Nouveau champ
Nom  : Version DPE
Position : Colonne 325
Type: Texte(12)
Description : Version permettant de distinguerles DPE d’avant juillet 2021 ou d’après ; doit être
cohérent avec le champs 324
```
(^32) **Tél:** +33 (0)1 53 38 28 00 – **SeLogerFax:** +33 (0)826 620 629- 65, rue Ordener - 75018 Paris France- [http://www.seloger.com](http://www.seloger.com)


```
Nouveau champ
Nom  : Dpe Prix Bas
Position : Colonne 326
Type: Décimal
Description : Montant bas supposé et théorique desdépenses énergétiques.
! Pour usage en publication sur nos supports grandspublics à partir du 1er janvier 2022
```
```
Nouveau champ
Nom  : Dpe Prix Haut
Position : Colonne 327
Type: Décimal
Description : Montant haut supposé et théorique desdépenses énergétiques
! Pour usage en publication sur nos supports grandspublics à partir du 1er janvier 2022
```
```
Nouveau champ
Nom  : Année de référence
Position : Colonne 328
Type: Décimal
Description : En association avec les champs 326/327(simulation coût DPE)
! Pour usage en publication sur nos supports grandspublics à partir du 1er janvier 2022
```
```
Nouveau champ
Nom  : Surface Terrasse
Position : Colonne 329
Type: Décimal
Description : Surface de la terrasse (en associationavec le champs 48)
```
```
Modification champ
Nom  : Type de bien
Position : Colonne 4
Type: Texte
Description  : Ajout du type de bien “entreprises”
```
```
Modification champ
Nom  : Type de bien
Position : Colonne 202 à 215
Description  : Modification de l’éligibilité des champs(ajout “bâtiment”, “boutique”, “local”)
```
**SeLoger** - 65, rue Ordener - 75018 Paris France
**Tél:** +33 (0)1 53 38 28 00 – **Fax:** +33 (0)826 620 629- [http://www.seloger.com](http://www.seloger.com)^33


