<?php

return array(
  // Stripe keys
  'stripe' => array(
    'secret' => $_ENV['STRIPE_SK'],
    'public' => $_ENV['STRIPE_PK']
  ),
 
);