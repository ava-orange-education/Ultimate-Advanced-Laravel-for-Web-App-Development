#!/usr/bin/env bash
set -e

php artisan test tests/Unit/TaxCalculatorTest.php
