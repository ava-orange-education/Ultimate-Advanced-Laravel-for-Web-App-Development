<?php

public function orders()
{
    return $this->hasMany(Order::class);
}
