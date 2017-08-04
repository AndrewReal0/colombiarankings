<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'rakings');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '`FW|ZlrM< _y;/~/M1L1r=}PsU?ma4ZLT%TtaUC(q_WHrimF&__fZ{pcsJ<^UUV?');
define('SECURE_AUTH_KEY', 'w>&1vTw!Z (k@wu[ h9fD3((C.A4?Q[AJ^cylBJtn2DCNUDGC9/Hw 9-e3N<ZhN@');
define('LOGGED_IN_KEY', 'FXNTj>ib-EcxTn8X4AdRUm7?S:B6g3>5zDpfXhx1.[NOlz8i/]]JIM.:pkQst^%#');
define('NONCE_KEY', 'jlP@MdyW;N.pS<k$13aI?#MsXB&`6X{0#k@(ihWE{U8plRsIqk}6UJ_p_{S{puh<');
define('AUTH_SALT', 'lLd)}WoNXu:J]gnx[V8D8#VE=!6crGb=pDqwsR31)Fd&q4dE4q)t`B,5z*y_?8sR');
define('SECURE_AUTH_SALT', 'f ^(@?X#3rVkP/`oArehD~Mx1JX2:l:Pqq!TT#rZu1$ZH=*29Qfj[(;:j+mdR#:K');
define('LOGGED_IN_SALT', 'v<6v4C|=df}JW[W[_!z7Gn P3=L_7bpQ|di$OzfKasm@Ur[f81~eJLn: 0Q=#0)/');
define('NONCE_SALT', 'J;6uuQl6KCGVk62cad<_jF0QRX!Qm<$`vA~|>kwo19)=y.6l n^<w]PFzTJj]NY3');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

