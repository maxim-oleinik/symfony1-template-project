<?php

require_once(__DIR__.'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('##APP_NAME##', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
