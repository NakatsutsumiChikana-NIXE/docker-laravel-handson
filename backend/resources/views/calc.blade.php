<!DOCTYPE>
<html lang="ja">

    <head>
        <title>Calc</title>
        <body>
                <form method = "post" action = "/total">
                @csrf
                    <dd><p><input type = "text" name = "box1"></p></dd>
                    <dd>              
                        <select name="select">
                            <option>選択してください</option>
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                        </select>
                    </dd>

                    <dd><p><input type = "text" name = "box3"></p></dd>
                    <input type = "submit">
                </form>
        </body>
    </head>
</html>
