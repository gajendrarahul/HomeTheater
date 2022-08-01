<!-- Modal -->
<div class="modal fade" id="favoriteModal{{ $user->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $user->name }} Favorite Movies</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($user->favorites as $key => $favorite)
                    <ul style="list-style: none">
                        <li>
                            {{ ++$key . ' : ' }}
                            {{ $favorite->movie->title }}
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>
