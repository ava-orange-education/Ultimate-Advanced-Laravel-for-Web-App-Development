<?php

$total = Order::where('user_id', $user->id)->sum('amount');
