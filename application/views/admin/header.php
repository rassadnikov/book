<?php /**
 * Created by PhpStorm.
 * User: Олег
 * Date: 27.08.14
 * Time: 21:01
 */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.blockUI.js"></script>
    <script type="text/javascript" src="/js/for_admin.js"></script>
    <!--    <script type="text/javascript" src="/js/for_admin.js"></script>-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="/js/tinymce/tiny_option.js"></script>

</head>
<body>
<div class="container theme-showcase">

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">Book</a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li <?php echo ($active == 'rubric')? 'class="active"':'';?>>
                    <a href="/admin/rubric">Рубрики</a>
                </li>
                <li <?php echo ($active == 'author')? 'class="active"':'';?>>
                    <a href="/admin/author">Авторы</a>
                </li>
                <li <?php echo ($active == 'book')? 'class="active"':'';?>>
                    <a href="/admin/book">Книги</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/auth/logout/">Выход</a></li>
            </ul>

        </div>
    </nav>

    <div class="panel panel-default">
        <div class="panel-body">