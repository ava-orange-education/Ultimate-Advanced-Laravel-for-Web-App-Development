<?php

cache()->lock('featured.products.lock', 10)->get(function () {
    return cache()->remember('featured.products', 300, function () {
        return Product::where('featured', true)->get();
    });
});
