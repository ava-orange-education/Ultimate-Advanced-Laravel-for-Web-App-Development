#!/usr/bin/env bash
set -e

php artisan dusk tests/Browser/LoginTest.php
