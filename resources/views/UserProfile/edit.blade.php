<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
</head>
<body>
    <h1>Edit User Profile</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}"><br>

 

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
