<?php

class Word
{
    public string $foreignWord;
    public string $translation;

    public function __construct(string $foreignWord, string $englishWord)
    {
        $this->foreignWord = $foreignWord;
        $this->translation = $englishWord;
    }

    public function verify(string $answer): bool
    {
        if (strtoupper($answer) === strtoupper($this->translation)) {
            return true;
        } else {
            return false;
        }
    }
}