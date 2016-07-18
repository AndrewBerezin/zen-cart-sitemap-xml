<?php
/**
 * Sitemap XML Feed
 *
 * @package Sitemap XML Feed
 * @copyright Copyright 2005-2016 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @version $Id: sitemapxml.php, v 3.8 07.07.2016 12:39:33 AndrewBerezin $
 */

define('SITEMAPXML_SITEMAPINDEX_HTTP_LINK', HTTP_CATALOG_SERVER . DIR_WS_CATALOG . SITEMAPXML_SITEMAPINDEX . '.xml');
define('HEADING_TITLE', 'Sitemap XML');
define('TEXT_SITEMAPXML_TIPS_HEAD', 'Советы:');
define('TEXT_SITEMAPXML_TIPS_TEXT', '<p>Подробно о Sitemaps xml Вы можете прочитать на <strong><a href="http://sitemaps.org/" target="_blank" class="splitPageLink">[Sitemaps.org]</a></strong>.</p>
<ol>
<li>Зарегистрируйтесь: <strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" class="splitPageLink">[Google]</a></strong>, <strong><a href="http://webmaster.yandex.ru/" target="_blank" class="splitPageLink">[Yandex]</a></strong>, <strong><a href="https://ssl.bing.com/webmaster" target="_blank" class="splitPageLink">[Bing]</a></strong>.</li>
<li>Укажите Ваш Sitemap <input type="text" readonly="readonly" value="' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK . '" size="' . strlen(SITEMAPXML_SITEMAPINDEX_HTTP_LINK) . '" style="border: solid 1px; padding: 0 4px 0 4px;"/> в <strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" class="splitPageLink">[Google]</a></strong>, <strong><a href="http://webmaster.yandex.ru/" target="_blank" class="splitPageLink">[Yandex]</a></strong>, <strong><a href="http://www.bing.com/webmaster/WebmasterAddSitesPage.aspx" target="_blank" class="splitPageLink">[Bing]</a></strong>.</li>
<li>Укажите адрес Sitemap в Вашем файле <a href="' . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . 'robots.txt' . '" target="_blank" class="splitPageLink">robots.txt</a> (<a href="http://sitemaps.org/protocol.php#submit_robots" target="_blank" class="splitPageLink">подробнее...</a>):<br /><input type="text" readonly="readonly" value="Sitemap: ' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK . '" size="' . strlen('Sitemap: ' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK) . '" style="border: solid 1px; padding: 0 4px 0 4px;"/></li>
<li>Оповестите поисковые системы об изменениях Ваших Sitemap XML.</li>
</ol>
<p>Чтобы автоматически обновлять sitemaps и автоматически оповещать (пинговать) поисковые системы, необходимо создать cron-задания в Вашей управляющей панели Вашего хостинга.</p>
<p>Например, для запуска задания ежедневно в 5:0 утра, задайте следующие параметры задания cron (конкретные команды могут отличаться в зависимости от хостинга):</p>
<div>
0 5 * * * GET \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\'<br />
0 5 * * * wget -q \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\' -O /dev/null<br />
0 5 * * * curl -s \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\'<br />
0 5 * * * php -f &lt;path to shop&gt;/cgi-bin/sitemapxml.php rebuild=yes ping=yes<br />
</div>');

//zen_catalog_href_link(SITEMAPXML_SITEMAPINDEX . '.xml')
define('TEXT_SITEMAPXML_INSTRUCTIONS_HEAD', 'Создать / обновить Ваши Sitemap:');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS', 'Выберите параметры:');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_PING', 'Пинговать поисковые системы ');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_REBUILD', 'Перезаписать все существующие файлы sitemap*.xml!');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_INLINE', 'Показать файл ' . SITEMAPXML_SITEMAPINDEX . '.xml');

define('TEXT_SITEMAPXML_PLUGINS_LIST', 'Плагины');
define('TEXT_SITEMAPXML_PLUGINS_LIST_SELECT', 'Отметьте активные плагины');

define('TEXT_SITEMAPXML_FILE_LIST', 'Список файлов Sitemap');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FNAME', 'Имя');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FSIZE', 'Размер');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FTIME', 'Дата');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FPERMS', 'Permissions');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_COMMENTS', 'Комментарии');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_TYPE', 'Тип');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_ITEMS', 'Записей');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_ACTION', 'Действие');

define('TEXT_SITEMAPXML_IMAGE_POPUP_ALT', 'открыть sitemap в новом окне');
define('TEXT_SITEMAPXML_RELOAD_WINDOW', 'Обновить список файлов');

define('TEXT_SITEMAPXML_FILE_LIST_COMMENTS_READONLY', 'Не доступен для записи!!!');
define('TEXT_SITEMAPXML_FILE_LIST_COMMENTS_IGNORED', 'Игнорируется');

define('TEXT_SITEMAPXML_FILE_LIST_TYPE_URLSET', 'UrlSet');
define('TEXT_SITEMAPXML_FILE_LIST_TYPE_SITEMAPINDEX', 'SitemapIndex');
define('TEXT_SITEMAPXML_FILE_LIST_TYPE_UNDEFINED', 'Не определён!!!');

define('TEXT_ACTION_VIEW_FILE', 'Просмотр');
define('TEXT_ACTION_TRUNCATE_FILE', 'Очистить');
define('TEXT_ACTION_TRUNCATE_FILE_CONFIRM', 'Вы действительно хотите очистить файл %s?');
define('TEXT_ACTION_DELETE_FILE', 'Удалить');
define('TEXT_ACTION_DELETE_FILE_CONFIRM', 'Вы действительно хотите удалить файл %s?');

define('TEXT_MESSAGE_FILE_ERROR_OPENED', 'Ошибка при открытии файла %s');
define('TEXT_MESSAGE_FILE_TRUNCATED', 'Файл %s очищен');
define('TEXT_MESSAGE_FILE_DELETED', 'Файл %s удалён');
define('TEXT_MESSAGE_FILE_ERROR_DELETED', 'Ошибка при удалении файла %s');
define('TEXT_MESSAGE_LANGUGE_FILE_NOT_FOUND', 'SitemapXML Languge file not found for %s - using default english file.');

define('TEXT_SITEMAPXML_INSTALL_HEAD', 'Замечания по установке:');

define('TEXT_SITEMAPXML_INSTALL_DELETE_FILE', 'Удалите этот файл');

///////////
define('TEXT_INSTALL', 'Установить SitemapXML SQL');
define('TEXT_UPGRADE', 'Обновить SitemapXML SQL');
define('TEXT_UNINSTALL', 'Удалить SitemapXML SQL');
define('TEXT_UPGRADE_CONFIG_ADD', '');
define('TEXT_UPGRADE_CONFIG_UPD', '');
define('TEXT_UPGRADE_CONFIG_DEL', '');

///////////
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_VERSION', 'Версия скрипта');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_VERSION', '<img src="images/icon_popup.gif" border="0">&nbsp;<a href="http://ecommerce-service.com/" target="_blank" style="text-decoration: underline; font-weight: bold;">eCommerce Service</a>');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_SITEMAPINDEX', 'Имя индексного файла SitemapXML');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_SITEMAPINDEX', 'Имя индексного файла SitemapXML - этот файл должен передаваться поисковым системам');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_DIR_WS', 'Директория sitemap');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_DIR_WS', 'Директория, в которой будут сохраняться файлы sitemap');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_COMPRESS', 'Упаковывать файлы SitemapXML');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_COMPRESS', 'Упаковывать файлы SitemapXML');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_LASTMOD_FORMAT', 'Формат тега Lastmod');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_LASTMOD_FORMAT', 'Формат тега Lastmod:<br />date - Полная дата: YYYY-MM-DD (например 1997-07-16)<br />full -    Полная дата плюс часы, минуты и секунды: YYYY-MM-DDThh:mm:ssTZD (например 1997-07-16T19:20:30+01:00)');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_EXECUTION_TOKEN', 'Ключ запуска Sitemap XML');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_EXECUTION_TOKEN', 'Используется для предотвращения стороннего не авторизованного запуска генератора Sitemap XML. Чтобы избежать создания намеренной излишней нагрузки на сервер, DDoS-атак.');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_EXISTING_FILES', 'Использовать существующие файлы XML');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_EXISTING_FILES', 'Использовать существующие файлы XML или перезаписывать их');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE', 'Генерировать ссылки только для языка по умолчанию');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE', 'Генерировать ссылки только для одного языка - языка по умолчанию или  для всех языков');
//define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_DEFAULT_LANGUAGE', 'Генерировать параметр language для языка по умолчанию');
//define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_DEFAULT_LANGUAGE', 'Генерировать в ссылках параметр language для языка по умолчанию');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_LANGUAGE_PARM', 'Использование параметра language');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_LANGUAGE_PARM', 'Определяет использование параметра language при генерации ссылок для различных языков:<br />true - использовать параметр language,<br />all - использовать параметр language включая страницы для языка по умолчанию,<br />false - не использовать параметр language');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PING_URLS', 'Адреса пингуемых сервисов');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PING_URLS', 'Адреса пингуемых сервисов перечисленные через ;');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CHECK_DUPLICATES', 'Проверять дубли адресов');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CHECK_DUPLICATES', 'true - проверять дубли,<br />mysql - исользовать базу данных для проверки адресов (используется для магазинов с большим количеством товаров),<br />false - не проверять дубли');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_HOMEPAGE_ORDERBY', 'Домашняя страница - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_HOMEPAGE_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_HOMEPAGE_CHANGEFREQ', 'Домашняя страница - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_HOMEPAGE_CHANGEFREQ', 'Вероятная частота изменения Домашней страницы');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_ORDERBY', 'Товары - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_CHANGEFREQ', 'Товары - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_CHANGEFREQ', 'Вероятная частота изменения страницы Товаров');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_USE_CPATH', 'Использование параметра cPath');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_USE_CPATH', 'Использование параметра cPath в адресе товара. Согласуйте это значение со значением переменной $includeCPath в файле init_canonical.php');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_IMAGES', 'Добавлять картинки Товаров');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_IMAGES', 'Генерировать теги Image для картинок Товаров');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_IMAGES_CAPTION', 'Использовать Caption/Title');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_IMAGES_CAPTION', 'Генерировать Image-теги Title и Caption для картинок Товаров');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_IMAGES_LICENSE', 'Лицензия для картинок Товаров');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_IMAGES_LICENSE', 'Адрес URL с лицензией для картинок Товаров');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_ORDERBY', 'Категории - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_CHANGEFREQ', 'Категории - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_CHANGEFREQ', 'Вероятная частота изменения страницы Категорий');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_PAGING', 'Категория - страницы пейджинга');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_PAGING', 'Выводить все страницы категории в сайтмап');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_IMAGES', 'Добавлять картинки Категорий');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_IMAGES', 'Генерировать теги Image для картинок Категорий');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_IMAGES_CAPTION', 'Использовать Caption/Title');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_IMAGES_CAPTION', 'Генерировать Image-теги Title и Caption для картинок Категорий');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_IMAGES_LICENSE', 'Лицензия для картинок Категорий');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_IMAGES_LICENSE', 'Адрес URL с лицензией для картинок Категорий');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_REVIEWS_ORDERBY', 'Отзывы на товары - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_REVIEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_REVIEWS_CHANGEFREQ', 'Отзывы на товары - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_REVIEWS_CHANGEFREQ', 'Вероятная частота изменения страницы Отзывов');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_EZPAGES_ORDERBY', 'EZ-Страницы - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_EZPAGES_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_EZPAGES_CHANGEFREQ', 'EZ-Страницы - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_EZPAGES_CHANGEFREQ', 'Вероятная частота изменения EZ-Страницы');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_TESTIMONIALS_ORDERBY', 'Отзывы на магазин - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_TESTIMONIALS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_TESTIMONIALS_CHANGEFREQ', 'Отзывы на магазин - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_TESTIMONIALS_CHANGEFREQ', 'Вероятная частота изменения страницы Отзывов на магазин');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_NEWS_ORDERBY', 'News Articles - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_NEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_NEWS_CHANGEFREQ', 'News Articles - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_NEWS_CHANGEFREQ', 'Вероятная частота изменения страницы News Articles');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_ORDERBY', 'Бренды - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_CHANGEFREQ', 'Бренды - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_CHANGEFREQ', 'Вероятная частота изменения страницы Брендов');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_IMAGES', 'Добавлять картинки Брендов');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_IMAGES', 'Генерировать теги Image для картинок Брендов');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION', 'Использовать Caption/Title');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION', 'Генерировать Image-теги Title и Caption для картинок Брендов');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE', 'Лицензия для картинок Брендов');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE', 'Адрес URL с лицензией для картинок Брендов');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_BOXNEWS_ORDERBY', 'News Box Manager - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_BOXNEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_BOXNEWS_CHANGEFREQ', 'News Box Manager - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_BOXNEWS_CHANGEFREQ', 'Вероятная частота изменения страницы News Box Manager');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY', 'Отзывы на товар - сортировка');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ', 'Отзывы на товар - частота');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ', 'Вероятная частота изменения страницы Отзывы на товар');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PLUGINS', 'Активные плагины');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PLUGINS', 'Какие плагины из существующих используются для генерации карты сайта');

//define('TEXT_CONFIGURATION_TITLE_', '');
//define('TEXT_CONFIGURATION_DESCRIPTION_', '');

// EOF