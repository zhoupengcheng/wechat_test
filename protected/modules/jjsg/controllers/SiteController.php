<?php
class SiteController extends Controller
{
    public $layout = 'main';
    public $pageTitle = '街机三国';

    public function actionIndex()
    {
        $this->render('index');
    }
}