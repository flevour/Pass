<?php

namespace Pass;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class File {
    private $file;
    private $config;
    
    public function __construct(SplFileInfo $file) {
        $this->file = $file;
        $this->config = YAML::parse($file->getRealPath());
    }
    
    public function countPasswords() {
        return count($this->config['data']);
    }
    
    public function getSummary() {
        return sprintf('%s: %d passwords', $this->file->getBasename(), $this->countPasswords());
    }
}