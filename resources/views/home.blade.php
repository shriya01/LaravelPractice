    @extends('layouts.app')

    @section('content')
        <div class="container-fluid text-center">

            @foreach($chirps as $chirp)
            <div class="jumbotron">
                <div>by
                    <b>{{ $chirp->author->name  }}</b>
                    on
                    <small>{{ $chirp->posted_at }}</small>
                </div>

                <div>
                    <p>{{ $chirp->text }}</p>
                </div>

                <div class="row">
                    <button onclick="actOnChirp(event);" data-chirp-id="{{ $chirp->id }}">Like</button>
                    <span id="likes-count-{{ $chirp->id }}">{{ $chirp->likes_count }}</span>
                </div>


            </div>
                @endforeach
        </div>
    @endsection
    @section('js')
    <script>
        var updateChirpStats = {
            Like: function (chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent++;
            },

            Unlike: function(chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent--;
            }
        };


        var toggleButtonText = {
            Like: function(button) {
                button.textContent = "Unlike";
            },

            Unlike: function(button) {
                button.textContent = "Like";
            }
        };

        var actOnChirp = function (event) {
            var chirpId = event.target.dataset.chirpId;
            var action = event.target.textContent;
            toggleButtonText[action](event.target);
            updateChirpStats[action](chirpId);
            axios.post('chirps/' + chirpId + '/act',
                { action: action });
        };

    </script>
    @endsection

