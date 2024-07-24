<?php

namespace App\Core;

class FeatureManager
{
    private $features;

    public function __construct()
    {
        $this->features = include '..\App\config\featureConfig.php'; 
    }

    public function isFeatureEnabled(string $feature): bool
    {
        return !empty($this->features['features'][$feature]) && $this->features['features'][$feature];
    }
}
