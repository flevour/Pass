<?php

namespace Pass;
use Symfony\Component\Finder\SplFileInfo;

class File {
    private $file;
    public function __construct(SplFileInfo $file) {
        $this->file = $file;
    }
    
    public function countPasswords() {
        return count(file($this->file->getRealpath()));
    }
}