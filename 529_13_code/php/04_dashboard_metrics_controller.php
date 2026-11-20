<?php

public function index()
{
    return response()->json(cache()->get('dashboard.metrics'));
}
