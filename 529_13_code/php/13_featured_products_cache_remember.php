<?php

cache()->remember('featured.products', 300, function () {
    return Product::where('featured', true)->get();
});
