<?php

public function index()
{
    return cache()->remember('featured.products', 300, function () {
        return Product::where('featured', true)->get();
    });
}
