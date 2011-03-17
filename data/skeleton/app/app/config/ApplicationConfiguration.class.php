<?php

class ##APP_NAME##Configuration extends sfApplicationConfiguration
{
    /**
     * SetUp
     */
    public function configure()
    {
        $this->setWebDir($this->getRootDir().'/web.##APP_NAME##');

        sfValidatorBase::setDefaultMessage('required', 'Обязательно');
        sfValidatorBase::setDefaultMessage('invalid', 'Неверно');
    }


    /**
     * Инициализировать плагины
     */
    protected function initPlugins()
    {
        $plugins = array(
            'sfMainPlugin',
            'sfDoctrinePlugin',
        );

        if ('test' == $this->getEnvironment()) {
            $plugins[] = 'sfPhpunitPlugin';
        }

        $this->enablePlugins($plugins);
    }

}
