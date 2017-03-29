<?php
namespace CodinPro\Lib;

class PasswordGenerator
{
    private $length;

    private $types = [
        'numbers' => '23456789', // 0 and 1 restricted
        'big_letters' => 'ABCDEFGHIJKLMNPQRSTUVWXYZ', // O restricted
        'small_letters' => 'abcdefghijkmnpqrstuvwxyz', // o and l restricted
    ];
    private $desiredTypes = [];

    /**
     * PasswordGenerator constructor.
     * @param int $length
     * @param array $types
     * @throws \Exception
     */
    public function __construct($length = 8, $types = ['numbers', 'big_letters', 'small_letters'])
    {
        $this->desiredTypes = $types;

        $maxLength = 0;
        foreach ($this->desiredTypes as $type) {
            if (isset($this->types[$type])) {
                $maxLength += strlen($this->types[$type]);
            } else {
                throw new \Exception('Unknown symbol group "' . $type . '"');
            }
        }

        if ($length <= $maxLength) {
            $this->length = $length;
        } else {
            throw new \Exception('You are trying to generate password that is lacking entropy for desired length');
        }
    }

    public function generate()
    {
        $result = '';
        $randomLengths = $this->getRandomLengths();
        foreach ($randomLengths as $type => $length) {
            $result .= $this->getRandomSymbolsFromType($type, $length);
        }

        return str_shuffle($result);
    }

    private function getRandomLengths()
    {
        $lengths = [];
        $curLength = $this->length;
        $typesLeft = count($this->desiredTypes);

        foreach ($this->desiredTypes as $type) {
            $typesLeft--;
            $symbolCount = strlen($this->types[$type]);
            $minLength = $typesLeft > 0 ? 1 : $curLength;
            $maxLength = min($curLength - $typesLeft, $symbolCount);
            $lengths[$type] = mt_rand($minLength, $maxLength);
            $curLength -= $lengths[$type];
        }

        return $lengths;
    }

    private function getRandomSymbolsFromType($type, $length)
    {
        return substr(str_shuffle($this->types[$type]), 0, $length);
    }
}