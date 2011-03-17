<?php

require_once(__DIR__.'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('##APP_NAME##', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
