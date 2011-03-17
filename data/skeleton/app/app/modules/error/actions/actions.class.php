<?php
/**
 * Контроллер: Ошибки 404
 */
class errorActions extends sfActions
{
    /**
     * 404
     */
    public function executeError404(sfWebRequest $request)
    {
        $this->getResponse()->setTitle(ucfirst($request->getHost()).' — страница не найдена (Ошибка 404)');
    }


    /**
     * Эмуляция 500-ошибки для тестирования
     */
    public function execute500error()
    {
        throw new Exception(__METHOD__);
    }


    /**
     * Редирект на страницы, которые больше не существуют
     */
    public function executeRedirect(sfWebRequest $request)
    {
        $route = (string)$request->getParameter('route') ?: 'homepage';
        $params = $request->getParameterHolder()->getAll();

        unset($params['module'], $params['action'], $params['code'], $params['route']);
        $this->redirect($this->generateUrl($route, $params, true), (int) $request->getParameter('code', 302));
    }

}
