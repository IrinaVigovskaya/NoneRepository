<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<div class="container" style="margin-top: 80px">

    @error('username')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror

    @error('password')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror

    @error('error')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror

    @error('success')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror
</div>
</body>
</html>
