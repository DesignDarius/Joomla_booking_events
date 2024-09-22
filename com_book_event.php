<?php
echo "Controller initialized";
defined('_JEXEC') or die;

// Dodajte ovde kod za frontend funkcionalnost komponente
require_once JPATH_SITE . '/components/com_book_event/helpers/route.php';

// Ostali kodovi...

// Promena putanje za medije
$mediaPath = JPATH_SITE . '/media/com_book_event/';

// Promena putanje za jezike
$languagePath = JPATH_ADMINISTRATOR . '/components/com_book_event/language/';
