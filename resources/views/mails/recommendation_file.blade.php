<table width="100%" height="100%" cellspacing="0" cellpadding="0" align="center">
    <tbody>
    <tr>
        <td >
            <img src="https://www.kremlinstom.ru/img/logo.png" width="206px" style="vertical-align: middle;padding-left: 10px;"/>
            <p style="display:inline-block;margin-top: 9px;vertical-align: middle;margin-left: 15px;padding-left: 15px;border-left:1px solid rgba(195, 196,199, 0.5);font-family:'Lato-SemiboldItalic';
            font-size: 16px;color:rgba(195, 196,199, 1);line-height: 1.2;">Клиника с отличным <br>сервисом в городе Рязани</p>
        </td>
        <td style="text-align: right;padding-right: 10px;">
            <a href="https://vk.com/kremlinstom" target="_blank" style="padding-right: 2px;display: inline-block;vertical-align: middle;">
                <img src="https://www.kremlinstom.ru/img/vk.png" style="height: 25px;width: 25px;">
            </a>
            <a href="https://www.youtube.com/channel/UCG1o5j_gJKdhVFJG7GqAXZQ" target="_blank" style="padding-right: 2px;display: inline-block;vertical-align: middle;">
                <img src="https://www.kremlinstom.ru/img/youtube2.png" style="height: 25px;width: 25px;">
            </a>
            <a href="https://instagram.com/kremlinstom.rzn/" target="_blank" style="padding-right: 2px;display: inline-block;vertical-align: middle;">
                <img src="https://www.kremlinstom.ru/img/instagram.png" style="height: 25px;width: 25px;">
            </a>
        </td>
    </tr>
    </tbody>
</table>

<table width="100%" height="100%" cellspacing="0" cellpadding="0" align="center" style="margin-top: 20px;">
    <tbody>
        <tr>
            <td colspan="2" style="font-size:14px;padding-left:20px;padding-bottom:10px;padding-top:20px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">
                <span style="color:rgba(0, 0, 0, 1);font-weight: 600;">Адрес:</span>

                @foreach (\App\Clinic::orderBy('id')->get() as $clinic)
                    @if ($clinic->id == 1)
                        {{ $clinic->address }}<br>
                    @else
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $clinic->address }}<br>
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td style="font-size:14px;padding-left:20px;padding-bottom:10px;padding-top:5px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">
                <span style="color:rgba(0, 0, 0, 1);font-weight: 600;">Часы работ:</span> с 8:00 до 20:00, без выходных
            </td>
        </tr>

        <tr>
            <td style="font-size:14px;padding-left:20px;padding-bottom:20px;padding-top:5px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">
                <span style="color:rgba(0, 0, 0, 1);font-weight: 600;">Телефоны для связи:</span> 8 (4912) 50-50-40, 8 (4912) 28-40-50, 8 (800) 77-525-77
            </td>
        </tr>
    </tbody>
</table>



{{--<table bgcolor="white" style="width: 100%;border-collapse: collapse;margin-bottom: 10px;">--}}
    {{--<tbody>--}}
        {{--<tr>--}}
            {{--<td>--}}
               {{--<span style="font-family:'RobotoRegular';font-size:18px;vertical-align:middle;margin-bottom:0px;margin-top:0px;color:rgba(225, 0, 92, 1);font-weight:600;">--}}
                    {{--Памятка по уходу за полостью рта от Кремлевской стоматологии--}}
                {{--</span>--}}
            {{--</td>--}}
            {{--<td style="">--}}
                {{--<img src="http://www.kremlinstom.ru/img/logo.png" width="206px" style="vertical-align: middle;padding-left: 10px;"/>--}}

            {{--</td>--}}
        {{--</tr>--}}
    {{--</tbody>--}}
{{--</table>--}}



{{--<table bgcolor="white" style="width: 100%;border-collapse: collapse;margin-bottom: 0px;">--}}
    {{--<tbody>--}}
        {{--<tr>--}}
            {{--<td style="font-size:14px;padding-bottom:10px;padding-top:10px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">--}}
                {{--С уважением, «Кремлевская стоматология»--}}
            {{--</td>--}}
       {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="font-size:14px;padding-bottom:5px;padding-top:10px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">--}}
                {{--<span style="color:rgba(0, 0, 0, 1);font-weight: 600;">Адрес:</span> 390000 г. Рязань, пл.Соборная, д.9--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="font-size:14px;padding-bottom:5px;padding-top:5px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">--}}
                {{--<span style="color:rgba(0, 0, 0, 1);font-weight: 600;">Работаем</span> с 9:00 до 21:00, без выходных--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="font-size:14px;padding-bottom:5px;padding-top:5px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">--}}
                 {{--<span style="color:rgba(0, 0, 0, 1);font-weight: 600;">Телефоны:</span> 8 (800) 77-525-77, 8 (4912) 50-50-40, 8 (4912) 28-40-50--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="font-size:14px;padding-bottom:10px;padding-top:5px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">--}}
                 {{--<span style="color:rgba(0, 0, 0, 1);font-weight: 600;">Email для связи:</span> info@kremlinstom.ru--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="font-size:14px;padding-bottom:10px;padding-top:10px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">--}}
                {{--Это автоматическое письмо. Пожалуйста, не отвечайте на него!--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</tbody>--}}
{{--</table>--}}


