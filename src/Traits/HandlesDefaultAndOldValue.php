<?php

namespace Andach\LaravelViewComponents\Traits;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    private function returnValue(
        string $name,
        $bind = null,
        $default = null,
        $language = null
    ): string {
        $inputName = static::convertBracketsToDots($name);

        if (!$language) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            $default = is_null($boundValue) ? $default : $boundValue;

            return old($inputName, $default) ?? '';
        }

        if (false !== $bind) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }

        return old("{$inputName}.{$language}", $default) ?? '';
    }
}
