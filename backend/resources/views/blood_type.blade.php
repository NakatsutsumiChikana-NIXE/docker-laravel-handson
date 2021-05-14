<!DOCTYPE>
<html lang="ja">

    <head>
        <title>blood</title>
        <body bgcolor= #fffaf0>
            <center>
            <h1>血液型別性格</h1>
                   <form method = "post" action = /blood_type_answer>
                    @csrf
                        <dd>
                            <select name="select_blood">
                                <option>選択してください</option>
                                <option value="A">A型</option>
                                <option value="B">B型</option>
                                <option value="O">O型</option>
                                <option value="AB">AB型</option>
                            </select>
                            <input type = "submit">
                        </dd>
                    </form>
                    <img src= "ketueki.jpeg" width="300" height="200">
            </center>
        </bocy>
    </head>
</html>

