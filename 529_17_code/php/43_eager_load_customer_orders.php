<?php

$orders = Order::with('customer')->get();
