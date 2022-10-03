<html>
  <head>
    <title>CSV出力</title>
  </head>
  <body>
    <h1>CSV出力</h1>
    <form action="{{ route('user.CSV') }}" method="post">
      @csrf
      <table border="1" width="200">
        <tr>
          <th>名前</th>
          <th>年齢</th>
        </tr>
        @foreach($users as $user)
        <tr>
          <td>{{ $user['name'] }}</td>
          <td>{{ $user['age'] }}</td>
        </tr>
        @endforeach
      </table>
      <button type="submit">CSV出力</button>
    </form>
  </body>
</html>