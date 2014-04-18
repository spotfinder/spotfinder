<?php

return array(
    /**
     * SID - Your Twilio Account SID #
     */
    "sid" => $_ENV["sid"],

    /**
     * token - Access token that can be found in your Twilio dashboard
     */
    "token" => $_ENV["token"],

    /**
     * from - The Phone number registered with Twilio that your SMS & Calls will come from
     */
    "from" => $_ENV["from"]
);