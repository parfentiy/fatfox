<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Использование кодов символов</title>
</head>
<table  style="border: 1px solid white; border-collapse: collapse">
    <tr>
        <th style="border: 1px solid; padding: 3px;">#</th>
        <th style="border: 1px solid;">Фамилия</th>
        <th style="border: 1px solid;">Город</th>
        <th style="border: 1px solid;">Количество</th>
    </tr>
    @php
        $i = 0;        
    @endphp
    @foreach($relatives as $relative)
        @php
            $i++;
           
        @endphp
        <tr>
            <td style="border: 1px solid; text-align: center;">{{$i}}</td>
            <td style="border: 1px solid; text-align: center;">{{$relative->name_last}}</td>
            <td style="border: 1px solid; text-align: center;">{{$relative->l_city}}</td>
            <td style="border: 1px solid; text-align: center;">{{$relative->count}}</td>
        </tr>
    @endforeach
</table>
<br>
<b>В базе данных {{$total_in_db}} записей</b>
<br>
<b>Запрос обработан за {{round((microtime(true) - $start_time) * 1000, 2)}} миллисекунд</b>

