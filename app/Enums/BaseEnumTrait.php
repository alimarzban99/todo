<?php

namespace App\Enums;

use Illuminate\Routing\Exceptions\BackedEnumCaseNotFoundException;
use ReflectionClass;
use ReflectionException;
use Throwable;

trait BaseEnumTrait
{
    /**
     * @return array
     * @throws ReflectionException
     * @throws Throwable
     */
    public static function transKeys(): array
    {
        $keys = array_keys(self::toArray());
        $transKeys = [];
        foreach ($keys as $key) {
            $transKeys[self::getValue($key)] = trans(self::getPrefix() . strtolower($key));
        }

        return $transKeys;
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public static function toArray(): array
    {
        $items = [];
        $class = static::class;

        $reflection = new ReflectionClass($class);
        $variables = $reflection->getConstants();

        foreach ($variables as $key => $item) {
            $items[$key] = $item->value;
        }
        return $items;
    }

    /**
     * @param string $key key enum
     * @return string
     * @throws ReflectionException
     * @throws Throwable
     */
    public static function getValue(string $key): string
    {
        $key = strtoupper($key);
        $enum = self::flipArray();
        throw_if(!in_array($key, $enum), new BackedEnumCaseNotFoundException(get_class(), $key));

        return array_search($key, $enum);

    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public static function flipArray(): array
    {
        return array_flip(static::toArray());
    }

    /**
     * @return string
     */
    public static function getPrefix(): string
    {
        return 'enums.';
    }

    /**
     * @param string $locale
     * @param array $defaultTrans
     * @return array
     * @throws ReflectionException
     */
    public static function transFlip(string $locale = 'fa', array $defaultTrans = []): array
    {
        $props = self::toArray();
        $trans = $defaultTrans;
        foreach ($props as $key => $item) {
            $trans[$item] = trans(self::getPrefix() . strtolower($key), [], $locale);
        }

        return $trans;
    }

    /**
     * @param $value
     * @param string $locale
     * @return mixed|null
     * @throws ReflectionException
     */
    public static function getLabel($value, string $locale = 'fa'): mixed
    {
        if (self::isValidKey($value)) {
            return self::trans($locale)[$value];
        } elseif (isset($value) && isset($value->name) && is_string($value->name) && isset(self::trans($locale)[$value->name])) {
            return self::trans($locale)[$value->name];
        }

        return null;
    }

    /**
     * Check if is valid enum key
     *
     * @param $key
     * @return bool
     * @throws ReflectionException
     * @psalm-pure
     */
    public static function isValidKey($key): bool
    {
        $array = static::toArray();
        return is_string($key) && array_key_exists($key, $array);
    }

    /**
     * Get full translated array.
     *
     * @param string $locale
     * @param null $prefix
     * @param null $value
     * @return string|array
     * @throws ReflectionException
     */
    public static function trans(string $locale = 'fa', $prefix = null, $value = null): string|array
    {
        if (!$prefix) {
            $prefix = self::getPrefix();
        }
        if ($value != null) {
            $flipArray = static::flipArray();
            return trans($prefix . strtolower($flipArray[$value]), [], $locale);
        }
        $props = self::toArray();
        $trans = [];
        foreach ($props as $key => $value) {
            $trans[$key] = trans($prefix . strtolower($key), [], $locale);
        }

        return $trans;
    }

    /**
     * @param string $value
     * @return string
     * @throws ReflectionException
     * @throws Throwable
     */
    public static function getKey(string $value): string
    {
        $enum = self::toArray();
        throw_if(!in_array($value, $enum), new BackedEnumCaseNotFoundException(get_class(), $value));
        return strtolower(array_search($value, $enum));
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public static function transAll(): array
    {
        $cases = self::toArray();

        $items = [];
        foreach ($cases as $case) {
            $fa = self::trans(value: $case);
            $en = self::trans('en', value: $case);
            $data['title'] = "$fa ($en)";
            $data['title_fa'] = $fa;
            $data['title_en'] = $en;
            $data['value'] = $case;
            $items[] = $data;

        }

        return $items;
    }

    /**
     * @param $value
     * @return array|null
     * @throws ReflectionException
     */
    public static function transSingle($value): ?array
    {
        if ($value == null) {
            return null;
        }

        $fa = self::trans(value: $value);
        $en = self::trans('en', value: $value);
        $data['title_fa'] = $fa;
        $data['title_en'] = $en;
        $data['value'] = $value;
        return $data;


    }
}
