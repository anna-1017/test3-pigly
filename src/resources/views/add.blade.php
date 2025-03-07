<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>体重登録</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/add.css) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
</head>
<body>

    @extends('layouts.no-header')

    @section('title')
    <title>体重登録</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/add.css) }}">
    @endsection

    @section('content')
    <main class="main-content">
        <div class="content-inner">
            <h1 class="content-header">Weight Logを追加</h1>
            <form class="update-form" action="" method="POST">
                <div class="label-group">
                    <label class="label" for="date">日付</label>
                    <span class="required">必須</span>
                </div>
                <input class="input" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />

                <div class="label-group">
                    <label class="label">体重</label>
                    <span class="required">必須</span>
                </div>
                <div class="input-group">
                    <input class="input-unit" type="number" step="0.1">
                    <span class="unit">kg</span>
                </div>
                <div class="label-group">
                    <label class="label">摂取カロリー</label>
                    <span class="required">必須</span>
                </div>
                <div class="input-group">
                    <input class="input-unit" type="number" step="1">
                    <span class="unit">cal</span>
                </div>
                <div class="label-group">
                    <label class="label">運動時間</label>
                    <span class="required">必須</span>
                </div>
                <input class="input" type="number" step="0.1">
                <label class="label">運動内容</label>
                <textarea class="textarea "name="exercise" id="" placeholder="運動内容を追加"></textarea>

                <div class="button-container">
                    <div class="button-group">
                        <button class="back-button" type="button">戻る</button>
                        <button class="update-button" type="submit">更新</button>
                    </div>
                </div> 
            </form>
        </div>
    </main>
    @endsection