{{isset($msg) ? $msg : "" }}

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <td>Tools</td>
    </tr>
    </thead>
    <tbody>

    @foreach($user as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>
                <form type="submit" action="/users/{{$row->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
            <td>
                <form id="edit" type="submit" action="/users/{{$row->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label>
                        <input name="name" placeholder="name">
                    </label>
                    <label>
                        <input name="email" placeholder="email">
                    </label>
                    <button type="submit">Edit</button>
                </form>
            </td>
        </tr>
        <td></td>

    @endforeach
    </tbody>
</table>
<table>
    <form type="submit" action="/users" method="post">
        {{ csrf_field() }}
        <label>
            <input name="name" placeholder="name">
            <p style="background-color: yellow; display: inline-block">{{ $errors->first('name') }}</p>
        </label>
            <br>
        <label>
            <input name="email" placeholder="email">
            <p style="background-color: yellow; display: inline-block">{{ $errors->first('email') }}</p>
        </label>
            <br>
        <button type="submit" style="margin-top: 10px">Store</button>
    </form>
</table>
