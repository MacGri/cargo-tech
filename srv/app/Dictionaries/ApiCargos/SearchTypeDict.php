<?php
declare(strict_types=1);

namespace App\Dictionaries\ApiCargos;

use App\Dictionaries\AbstractDictionary;

class SearchTypeDict extends AbstractDictionary
{
    const ITEMS = 'items';
    const PAGES = 'pages';

    public static function all(): array
    {
        return [
            static::ITEMS => 'записи',
            static::PAGES => 'страницы',
        ];
    }
}

