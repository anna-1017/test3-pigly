<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>情報更新</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/update.css) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">PiGLy</div>
            <nav class="header-nav">
                <button class="target-setting" href="">
                    <img class="icon" src="設定の歯車アイコン素材 1.png" alt="歯車アイコン">
                    目標体重設定
                </button>
                <button class="logout" href="">
                    <img class="icon" src="ログアウト・サインアウトのアイコン素材 4.png" alt="ログアウトアイコン">
                    ログアウト
                </button>
            </nav>
        </div>
    </header>
    <!--ここから上はheader.blade.phpへ -->

    @extends('layouts.header')

    @section('title')
    <title>情報更新</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/update.css) }}">   @endsection

    @section('content')
    <main class="main-content">
        <div class="content-inner">
            <h1 class="content-header">Weight Log</h1>
            <form class="update-form" action="" method="POST">
                <label class="label" for="date">日付</label>
                <input class="input" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />

                <label class="label">体重</label>
                <div class="input-group">
                    <input class="input-unit" type="number" step="0.1">
                    <span class="unit">kg</span>
                </div>
                <label class="label">摂取カロリー</label>
                <div class="input-group">
                    <input class="input-unit" type="number" step="1">
                    <span class="unit">cal</span>
                </div>
                <label class="label">運動時間</label>
                <input class="input" type="number" step="0.1">
                <label class="label">運動内容</label>
                <textarea class="textarea "name="exercise" id="" placeholder="運動内容を追加"></textarea>

                <div class="button-container">
                    <div class="button-group">
                        <button class="back-button" type="button">戻る</button>
                        <button class="update-button" type="submit">更新</button>
                    </div>

                    <div class="trash-can">
                        <a href="">
                            <img class="trash-can-icon"src="ゴミ箱のアイコン素材 1.png" alt="ゴミ箱の画像">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @endsection