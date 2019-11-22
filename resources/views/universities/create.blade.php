@extends( 'layouts.app' )
@section( 'title', 'Lägg till nytt universitet' )
@section( 'content' )

    <section class="section">
        <div class="column is-half">
            <h1 class="title">Lägg till nytt universitet</h1>
            <p>Alla fält markerade med <strong>*</strong> är obligatoriska</p>
            <hr>
            <form class="" method="POST" action="{{ route( 'universities.store' ) }}">
                @csrf
                <div class="field">
                    <label for="name" class="label">Namn *</label>
                    <div class="control">
                        <input id="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="text" autofocus required>
                    </div>
                    @error( 'name' )
                        <span class="has-text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="nickname" class="label">Initialer * <button type="button" data-tooltip="Exempel: Karlstads Universitet blir KAU">?</button></label>
                    <div class="control">
                        <input id="nickname" class="input {{ $errors->has('nickname') ? ' is-danger' : '' }}" name="nickname" type="text" required>
                    </div>
                    @error( 'nickname' )
                        <span class="has-text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="description" class="label">Beskrivning</label>
                    <div class="control">
                        <textarea id="description" class="textarea {{ $errors->has('description') ? ' is-danger' : '' }}" rows="1" name="description" type="text"></textarea>
                    </div>
                    @error( 'description' )
                        <span class="has-text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="city" class="label">Stad *</label>
                    <div class="control">
                        <input id="city" class="input {{ $errors->has('city') ? ' is-danger' : '' }}" name="city" type="text" required>
                    </div>
                    @error( 'city' )
                        <span class="has-text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="country" class="label">Land *</label>
                    <div class="control">
                        <input id="country" class="input {{ $errors->has('country') ? ' is-danger' : '' }}" name="country" type="text" required>
                    </div>
                    @error( 'country' )
                    <span class="has-text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Lägg till</button>
                    </div>
                    <div class="control">
                        <a href="{{ url()->previous() }}" class="button is-link is-light">Avbryt</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
