<!DOCTYPE html>
<html>
<head>
    <title>XSS Lab - Guestbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>Guestbook (XSS Lab)</h3>
                        <p class="text-muted">Tuliskan pesanmu di sini.</p>
                        
                        <form action="{{ route('guestbook.store') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="3" placeholder="Halo, apa kabar?"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                        </form>

                        <hr>

                        <h4>Daftar Pesan:</h4>
                        @foreach($posts as $post)
                            <div class="alert alert-secondary mt-3">
                                <div class="mb-2">
                                    <strong>Vulnerable Output (Bisa di-hack):</strong><br>
                                    {!! $post->content !!}
                                </div>

                                <hr>

                                <div>
                                    <strong>Secure Output (Aman):</strong><br>
                                    {{ $post->content }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>