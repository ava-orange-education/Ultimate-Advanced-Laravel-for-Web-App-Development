<?php

public function update(Product $product, Request $request)
{
    $product->update($request->all());

    cache()->forget('featured.products');

    return response()->json(['status' => 'updated']);
}
