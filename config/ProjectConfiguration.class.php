<?php

require_once __DIR__.'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();


define('TIME', time());
define('DIR', dirname(__DIR__));
setlocale(LC_TIME, 'ru_RU.UTF-8');


class ProjectConfiguration extends sfProjectConfiguration
{
    /**
     * SetUp
     */
    public function setup()
    {
        $this->initPlugins();

        // Escaper
        sfOutputEscaper::markClassesAsSafe(array(
            'DateTime',
        ));
    }


    /**
     * Инициализировать все плагины для CLI
     * Конкретные приложения перекрывают этот метод
     */
    protected function initPlugins()
    {
        $this->enablePlugins(array(
            'sfDoctrinePlugin',
        ));
    }


    /**
     * Настройки Doctrine
     */
    public function configureDoctrine(Doctrine_Manager $manager)
    {
        $manager->setAttribute(Doctrine_Core::ATTR_USE_NATIVE_ENUM, true);

        $manager->setAttribute(Doctrine_Core::ATTR_DEFAULT_TABLE_CHARSET, 'utf8');
        $manager->setAttribute(Doctrine_Core::ATTR_DEFAULT_TABLE_COLLATE, 'utf8_general_ci');
        $manager->setAttribute(Doctrine_Core::ATTR_DEFAULT_TABLE_TYPE,    'INNODB');
        $manager->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS,     true);
    }

}
