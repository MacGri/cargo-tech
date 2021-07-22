<?php
declare(strict_types=1);


namespace App\Dictionaries;

abstract class AbstractDictionary
{
    /**
     * Алиас словаря.
     * Исользуется для апи словарей
     */
    protected string $dictAlias;

    /**
     * Название словаря.
     * Исользуется для апи словарей.
     */
    protected string $dictTitle;

    /**
     * Возвращает массив алиасов словарных значений с названиями ([alias => title]
     */
    abstract static public function all(): array;

    /**
     * Возвращает title для переданного алиаса
     */
    public static function title(string $alias): mixed
    {
        $list = static::all();
        return $list[$alias] ?? null;
    }

    /**
     * Возвращает массив алиасов без title-ов
     */
    public static function allValues(): array
    {
        return array_keys(static::all());
    }

    /**
     * Возвращает подготовленный массив для контролера DictionariesController (апи словарей).
     */
    public function forDictApi(): array
    {
        $options = [];
        foreach (static::all() as $alias => $title) {
            $options[] = ['value' => $alias, 'title' => $title];
        }
        return [
            $this->dictAlias => [
                'name'    => $this->dictAlias,
                'title'   => $this->dictTitle,
                'options' => $options
            ]
        ];
    }
}
