<?php

namespace app\Models;

interface WheaterInterface
{
    public function getTemperature();
    
    public function getLink();
}