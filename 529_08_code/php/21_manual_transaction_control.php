DB::beginTransaction();

try {
    // operations

    DB::commit();
} catch (\Throwable $e) {
    DB::rollBack();
    throw $e;
}