<?php

$this->app->bind(
    OrderRepository::class,
    EloquentOrderRepository::class
);
