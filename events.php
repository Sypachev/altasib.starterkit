<?php
use \Bitrix\Main\EventManager;

EventManager::getInstance()->addEventHandler(
    'main',
    'OnEndBufferContent',
    array('\Altasib\Starterkit\Debug\Functions', 'clearPre')
);

EventManager::getInstance()->addEventHandler(
    'main',
    'OnPageStart',
    array('\Altasib\Starterkit\Debug\Functions', 'isDev')
);

EventManager::getInstance()->addEventHandler(
    'main',
    'OnEpilog',
    array('\Altasib\Starterkit\Debug\Functions', 'isDevTask')
);

EventManager::getInstance()->addEventHandler(
    'main',
    'OnPageStart',
    array('\Altasib\Starterkit\Debug\Functions', 'isDevTaskOnPageStart')
);