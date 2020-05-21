<html>
<body>
    <table border="1">
        @if(!empty($categories))
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->Name}}</td>
                    <td>{{$category->items->count()}}</td>
                </tr>
            @endforeach
        @endif
    </table>
</body>
</html>
