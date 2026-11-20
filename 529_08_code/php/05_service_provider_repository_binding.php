$this->app->bind(
    UserRepository::class,
    EloquentUserRepository::class
);