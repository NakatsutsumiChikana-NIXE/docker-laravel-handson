<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>validate_test</title>
    </head>
    <body>
        @section('content')
            <p>{{$msg}}</p>
            @if(count($errors) > 0)
                <p>入力に問題があります。再入力してください。</p>
            @endif
            <form action = "{{route('post')}}">
                <table>
                    @csrf
                    @error('name')
                        <tr>
                            <th>ERROR</th>
                            <td>{{$message}}</td>
                        </tr>
                    @enderror
                    <tr><th>name: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
                    @error('mail')
                        <tr>
                            <th>ERROR</th>
                            <td>{{$message}}</td>
                        </tr>
                    @enderror
                    <tr><th>mail: </th><td><input type="text" name="mail" value="{{old('mail')}}"></td></tr>
                    @error('age')
                        <tr>
                            <th>ERROR</th>
                            <td>{{$message}}</td>
                        </tr>
                    @enderror
                    <tr><th>age: </th><td><input type="text" name="age" value="{{old('age')}}"></td></tr>
                    <tr><th></th><td><input type="submit" value="send"></td></tr>
                </table>
            </form>
        @show
    </body>
</html>
