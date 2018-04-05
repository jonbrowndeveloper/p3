<?php

namespace App\Classes;

class TextBody
{
    # class takes text input and then pulls out a predetermined amount of unique words

    public $textArray;
    public $isAlphabetical = false;
    public $uniqueWords;

    # construct gets text input and alphabetical boolean

    public function __construct($textInput, $alphabetical)
    {
        $this->textArray = explode(" ", $textInput);

        $this->isAlphabetical = $alphabetical;

        $this->uniqueWords = array_unique($this->textArray);
    }
}
