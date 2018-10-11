<div class="modal modal-lg fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{ route("plan.add") }}">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle tache</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de la tache">
                            </div>
                            <div class="form-group">
                                <label for="debut">Début</label>
                                <input type="text" class="form-control" name="debut" id="debut" placeholder="JJ/MM/AAAA" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                            </div>
                            <div class="form-group">
                                <label for="fin">Fin</label>
                                <input type="text" class="form-control" name="fin" id="fin" placeholder="JJ/MM/AAAA" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                            </div>
                            <div class="form-group">
                                <label for="details">Détails</label>
                                <textarea type="text" class="form-control" name="details" id="details" placeholder="Commentaires"></textarea>
                            </div>
                            <div class="form-group">
                            @foreach(\App\Membre::all() as $membre)
                                <div class="form-check">
                                    <label class="form-control">
                                        <input type="checkbox" name="membres[]" value="{{ $membre->id }}" class="form-check-input"> {{ $membre->nom }} {{ $membre->prenoms }}
                                    </label>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </form>
</div>