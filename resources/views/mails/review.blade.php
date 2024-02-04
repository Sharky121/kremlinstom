<table bgcolor="white" style="width: 100%;border-collapse: collapse;margin-bottom: 10px;">
    <tbody>
        <tr>
            <td style="">
                <img src="http://www.kremlinstom.ru/img/logo.png" width="206px" style="vertical-align: middle;"/>
                <br>
                <br>
                <span style="font-family:RobotoRegular;font-size:18px;padding-left:10px;vertical-align:middle;margin-bottom:0px;margin-top:0px;color:rgba(60, 106, 166, 1);font-weight:600;">
                </span>
            </td>
        </tr>
    </tbody>
</table>

<table bgcolor="white" style="width: 100%;border-collapse: collapse;margin-bottom: 10px;">
    <tbody>
        <tr>
            <td style="font-size:16px;color:rgba(225, 0, 92, 1);padding-bottom:10px;padding-top:10px;border-bottom:1px solid rgba(225, 0, 92, 1);font-family:'RobotoRegular;'">
                Имя: <span style="color:black;font-family:RobotoRegular;">{{$name}}</span>
            </td>
        </tr>
        {{--<tr>--}}
            {{--<td style="font-size:16px;color:rgba(225, 0, 92, 1);padding-bottom:10px;padding-top:10px;border-bottom:1px solid rgba(225, 0, 92, 1);font-family:'RobotoRegular;'">--}}
                {{--Номер телефона: <span style="color:black;font-family:RobotoRegular;">{{$tel}}</span>--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="font-size:16px;color:rgba(225, 0, 92, 1);padding-bottom:10px;padding-top:10px;border-bottom:1px solid rgba(225, 0, 92, 1);font-family:'RobotoRegular;'">--}}
                {{--Врач: <span style="color:black;font-family:RobotoRegular;">{{$doctor}}</span>--}}
            {{--</td>--}}
        {{--</tr>--}}
        <tr>
            <td style="font-size:16px;color:rgba(225, 0, 92, 1);padding-bottom:10px;padding-top:10px;border-bottom:1px solid rgba(225, 0, 92, 1);font-family:'RobotoRegular;'">
                Почта:<br> <span style="color:black;font-family:'RobotoRegular;'">{{$email}}</span>
            </td>
        </tr>
        <tr>
            <td style="font-size:16px;color:rgba(225, 0, 92, 1);padding-bottom:10px;padding-top:10px;border-bottom:1px solid rgba(225, 0, 92, 1);font-family:'RobotoRegular;'">
                Текст отзыва:<br> <span style="color:black;font-family:'RobotoRegular;'">{{$text}}</span>
            </td>
        </tr>
    </tbody>
</table>

<table bgcolor="white" style="width: 100%;border-collapse: collapse;margin-bottom: 0px;">
    <tbody>
        <tr>
            <td style="font-size:14px;padding-bottom:10px;padding-top:10px;font-family:RobotoRegular;color:rgba(146, 146, 146, 1);">
                <?= date('Y'); ?> © ООО «Кремлевская стоматология»
            </td>
        </tr>
    </tbody>
</table>