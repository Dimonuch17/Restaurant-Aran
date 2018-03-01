<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'esua21_aran');

/** Имя пользователя MySQL */
define('DB_USER', 'esua21_aran');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'C@xM$e9xI0');

/** Имя сервера MySQL */
define('DB_HOST', 'esua21.mysql.ukraine.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'es,=Nx#M ~k&wC!r^ODlj@ZJglEB~)ORMb^0/v^Mc3g3e(&:V.( Bxmk+I`&,3v{');
define('SECURE_AUTH_KEY',  ')IF#p~{s[$1Ex(}c[yOdp9]bf_{9H:r0LmebQinXmPOTAHp#VbAn=f;+i.6)y/#P');
define('LOGGED_IN_KEY',    'oyB<IIWw(_%{Db(asE){0Qj0t>-^;h)?u2MoqNe]IZCN0skLW~0w5k_w{JMZEZ1=');
define('NONCE_KEY',        'CyVhvtf|#.,eDmp.Z..<~4 (#xaG$0X!i*YG?DC3D<alq_&]Z} s%tp^wGjd9Yuy');
define('AUTH_SALT',        's]2J+4VHPg{@u/X-kn~94arT#$/J&&]nTDu+@:xYH5U)Y6j42+KmkVfxAkn)*r G');
define('SECURE_AUTH_SALT', 'IY]<>0N,JrD<Q|b&s4Z h7a]n3/W}dfD7 L_dgiL(D0j;qctKSM77CyIGvWgsy/u');
define('LOGGED_IN_SALT',   'eWlf6$d8KVaLek=U|RS[.]}M3<fE5gyRZ?d!k,BR[}8=8%k4al#JZk[f1yn[Rf 7');
define('NONCE_SALT',       '7(F=9xwaHu-7mRG#-<~nr8bUaKFF8R=-C0Rrzu,PX[lX.Owl{$P7H(;UvE`/gBbX');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'AR_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
