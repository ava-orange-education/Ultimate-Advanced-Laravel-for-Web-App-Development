<?php

Task::factory()
    ->completed()
    ->count(3)
    ->create();
