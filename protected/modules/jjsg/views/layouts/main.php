<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/amazeui/amazeui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/amazeui/app.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/iscroll.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/amazeui.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/app.js"></script>
    </head>
    <body>
    <?php echo $content; ?>
    </body>
</html>