<?php

if ($user->subscriptionExpired()) {
    throw new SubscriptionExpiredException();
}
