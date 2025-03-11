@extends('layouts.no-header')


    @section('title')
    <title>体重登録</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    @endsection

    @section('content')
    <a href="#modal" class="open-modal-button"><img src="/images/pen.icon.png" alt=""></a>

    <div id="modal" class="modal">
        <div class="modal-content">
            <a href="#" class="close-modal">&times;</a>

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
        </div>
    </div>
    </main>
    @endsection