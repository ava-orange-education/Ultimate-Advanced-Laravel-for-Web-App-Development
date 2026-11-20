DB::transaction(function () {
    // critical operations
}, attempts: 3);