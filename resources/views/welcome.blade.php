<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ (now()->year - 1 ) . ' - ' . now()->year }} Season Fixture | Psuedo League</title>
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v='.time()) }}">
</head>
<body>
<div id="app">
    <div class="container">
        <div class="area">
            <generate-teams></generate-teams>
            <start-season></start-season>
        </div>
    </div>
    <div class="container">
        <div class="area">
            <point-table></point-table>
        </div>
        <div class="area">
            <div class="week">
                <div class="teams">
                    <div class="team">Arctic Monkeys</div>
                    <div class="score">1 : 0</div>
                    <div class="team">Zubidubi Donkeys</div>
                </div>
                <div class="teams">
                    <div class="team">BamBam Lions</div>
                    <div class="score">4 : 2</div>
                    <div class="team">HonkHonk Pigs</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
