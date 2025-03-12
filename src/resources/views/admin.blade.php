

    @extends('layouts.header')

    @section('title')
    <title>管理画面</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @endsection

    @section('content')
    <main class="main_content">
        <div class="content_top">
            <div class="top-weight-pair">
                <div class="top-title">目標体重</div>
                <div class="weight">{{ $target_weight }}<span class="kg">kg</span>
                </div>
            </div>

            <div class="top-weight-pair">
                <div class="top-title">目標まで</div>
                <div class="weight">{{ $latest_weight - $target_weight }}<span class="kg">kg</span>
                </div>
            </div>

            <div class="top-weight-pair">
                <div class="top-title">最新体重</div>
                <div class="weight">{{ $latest_weight }}<span class="kg">kg</span>
                </div>
            </div>
        </div>

        <div class="content_under">
            <div class="content_under-inner">
                <form class="search-form " action="/weight_logs/search" method="GET">
                @csrf
                    <input type="date" name="start_date" value="{{ request('start_date') }}">
                    <span>~</span>
                    <input type="date" name="end_date" value="{{ request('end_date') }}">

                    <button class="serch-button" type="submit">検索</button>
                    <button class="add-button" type="button">データ追加</button>

                    @if(request('start_date') || request('end_date'))
                        <button class="reset-button" type="button" onclick="location.href='/weight_logs/search'">リセット</button>
                    @endif
                </form>

                @if(request('start_date') || request('end_date'))
                    <p>{{ request('start_date') }} ~ {{ request('end_date') }}の検索結果 {{ $logs->$count }} 件</p>
                @endif


                <table>
                    <tr class="table-header">
                        <th>日付</th>
                        <th>体重</th>
                        <th>食事摂取カロリー</th>
                        <th>運動時間</th>
                    </tr>
                    @foreach($logs as $weight_log)
                    <tr class="table-data">
                        <td>{{$weight_log->date}}</td>
                        <td>{{$weight_log->weight}}</td>
                        <td>{{$weight_log->calory}}</td>
                        <td>{{$weight_log->exercise_time}}</td>
                        <td>
                            <a href="#modal{{ $weight_log->id }}" class="open-modal-button" ><img src="/images/pen.icon.png" alt="ペンのアイコン"></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="pagination">
                {{$logs->links()}}
            </div>
        </div>
    </main>

    @foreach($logs as $weight_log)
   

    <div id="modal{{ $weight_log->id }}" class="modal">
        <div class="modal-content">
            <a href="#" class="close-modal">&times;</a>

    <div class="main-content">
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
</div>
    @endforeach
    @endsection