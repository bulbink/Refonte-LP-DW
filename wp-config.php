<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'lpdw');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^=yraZj-#8)+2mf_y68Sxc8-el)S)BIlGy({* :+_$tp%k!S}/`KpRwx[,ROoRhC');
define('SECURE_AUTH_KEY',  '#Jb=e|^?!1<0~tf&RR/(` r1!qrg( L#$y>8TZ-)NL+&Xfb8O6r9rQCUL+@Qq$aO');
define('LOGGED_IN_KEY',    'wWo+@?Uxd0c(<JA9xut)@UYl3Y5T(foJC|yJTJ{CM~,6I%Y,t~U-J}FIfh7J/@L|');
define('NONCE_KEY',        'Qcd8Ry8!?R2z>k0I=/N#|6|cT>!uk|}G{sj8w3R0/$)v|G+m8L7I3(y@?&K!|&C!');
define('AUTH_SALT',        '9XvDPkm+]+jQwKeZ<L#Ge]db?4E{Wd/=0r0r)f!PW.8:zm3C2hsq+3(W(O||)`NK');
define('SECURE_AUTH_SALT', ';2#lnKT^G-{Q}M:qX~!k/;x8iAtiFvM(|9mx|rdoIA?T4nUuIdlL$T S]Oa&#`4?');
define('LOGGED_IN_SALT',   ';zVy:H#Gk?7EDExNjB#y+f30u8$o+]?E #s|6b^|ROqa.#5&bgs@@<lH+l^w,r$|');
define('NONCE_SALT',       'G*+y3RW^5byS_% |%K5 c[$icHV+lsI<20@I<Z-?PkET}bMD4<]ka#%:+N5L}Fl*');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');