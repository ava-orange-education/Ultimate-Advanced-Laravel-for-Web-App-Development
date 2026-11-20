<?php

return response()->json([
    'success' => false,
    'message' => 'The requested resource was not found.',
    'code' => 'RESOURCE_NOT_FOUND',
], 404);
