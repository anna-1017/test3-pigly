

    @extends('layouts.header')

    @section('title')
    <title>管理画面</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
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
                    <p>{{ request('start_date') }} ~ {{ request('end_date') }}の検索結果 {{ $count }} 件</p>
                @endif


                <table>
                    <tr class="table-header">
                        <th>日付</th>
                        <th>体重</th>
                        <th>食事摂取カロリー</th>
                        <th>運動時間</th>
                    </tr>
                    @foreach($weight_logs as $weight_log)
                    <tr class="table-data">
                        <td>{{$weight_log->date}}</td>
                        <td>{{$weight_log->weight}}</td>
                        <td>{{$weight_log->calory}}</td>
                        <td>{{$weight_log->exercise_time}}</td>
                        <td>
                            <a class="pen-icon" href=""><img src="pen.icon.png" alt="ペンのアイコン"></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="pagination">
                {{$weight_logs->links()}}
            </div>
        </div>
    </main>
    @endsection