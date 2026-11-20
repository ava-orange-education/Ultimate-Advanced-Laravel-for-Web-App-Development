<?php

Log::info('Profile updated', [
    'user_id' => auth()->id(),
    'ip_address' => request()->ip(),
]);
