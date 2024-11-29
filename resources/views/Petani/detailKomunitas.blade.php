<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Komunitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Success and Error Alerts -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Community Details Card -->
        <div class="card">
            <div class="card-header">
                <h3>{{ $komunitas->Komunitas->name }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $komunitas->Komunitas->image) }}"
                            alt="{{ $komunitas->Komunitas->name }}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <p><strong>Deskripsi:</strong> {{ $komunitas->Komunitas->description }}</p>
                        <button class="btn btn-primary mb-5" data-bs-toggle="modal"
                            data-bs-target="#manageMembersModal">
                            Manage Members
                        </button>
                        @if ($komunitas->role == 'creator')
                        <form action="{{ route('DeleteKomunitas', ['id' => $komunitas->Komunitas->id]) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete Komunitas" class="btn btn-danger">
                        </form>
                        @endif

                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Create Post</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('CreateKomunitasPost') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_komunitas" value="{{ $komunitas->Komunitas->id }}">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter post title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea class="form-control" id="content" name="content" rows="5"
                                            placeholder="Write your content here"></textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Manage Members -->
        <div class="modal fade" id="manageMembersModal" tabindex="-1" aria-labelledby="manageMembersModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="manageMembersModalLabel">Members in {{ $komunitas->Komunitas->name
                            }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Total Members:</strong> {{ $komunitas->Komunitas->DetailKomunitas->count() }}</p>
                        <ul class="list-group">
                            <!-- Display Creator -->
                            @php
                            $creator = $komunitas->Komunitas->DetailKomunitas->where('role', 'creator')->first();
                            @endphp

                            @if ($creator)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        {{ $creator->User->name }} (Creator)
                                    </div>
                                </div>
                            </li>
                            @endif

                            <!-- Display Other Members -->
                            @foreach ($komunitas->Komunitas->DetailKomunitas->where('role', '!=', 'creator') as $member)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        {{ $member->User->name }}
                                    </div>
                                    <div class="col-md-4">
                                        {{ ucfirst($member->role) }}
                                    </div>
                                    <div class="col-md-4 ml-20">
                                        <a href="">Kick</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Card for Posts -->
        <div class="card mt-4" style="margin-left: 15px; margin-right: 15px;">
            <div class="card-header bg-secondary text-white">
                <h5>Community Posts</h5>
            </div>
            <div class="card-body position-relative">
                @if($post->isEmpty())
                <p>No posts available.</p>
                @else
                <ul class="list-group">
                    @foreach($post as $item)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="img-fluid rounded">
                            </div>
                            <div class="col-md-8">
                                <h6>{{ $item->title }}</h6>
                                <p>{{ Str::limit($item->content, 100) }}</p>
                            </div>
                        </div>

                        <!-- Display Comments -->
                        <div class="mt-3">
                            <h6>Comments:</h6>
                            <div class="comment-list" style="max-height: 200px; overflow-y: scroll;">
                                @foreach($item->comments as $comment)
                                <div class="comment-item mb-2">
                                    <div class="d-flex justify-content-between">
                                        <span><strong>{{ $comment->user->name }}</strong></span>
                                        <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="mb-1">{{ $comment->content }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Comment input and submit -->
                        <form action="{{ route('MakeComment') }}" method="POST" class="d-flex mt-2">
                            @csrf
                            <input type="hidden" name="id_komunitas" value="{{ $item->id }}">
                            <!-- Assuming 'id' is the post ID -->
                            <input type="text" name="content" class="form-control me-2" placeholder="Comment"
                                style="flex-grow: 1;">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-arrow-right-circle"></i> <!-- Arrow icon -->
                            </button>
                        </form>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
