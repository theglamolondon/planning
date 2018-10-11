@extends("layout.main")
@section("content")
<div class="row">
    <div class="col-md-2">
        <form class="" action="{{ route('plan.redirect') }}" method="get">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text">Go</button>
                    </div>
                    <input type="text" name="periode" class="form-control" placeholder="JJ/MM/AAAA" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                </div>
            </div>
        </form>
    </div>
    <div class="card col-md-12">
        <div class="card-body">
            <table class="table table-bordered" width="100%">
                <thead>
                <tr class="headings">
                    <th width="14%" class="alignment-center column-title"><h4>Dimanche</h4><p>{{$week->dimanche->format('d/m/Y')}}</p></th>
                    <th width="14%" class="alignment-center column-title"><h4>Lundi</h4><p>{{$week->lundi->format('d/m/Y')}}</p></th>
                    <th width="14%" class="alignment-center column-title"><h4>Mardi</h4><p>{{$week->mardi->format('d/m/Y')}}</p></th>
                    <th width="14%" class="alignment-center column-title"><h4>Mercredi</h4><p>{{$week->mercredi->format('d/m/Y')}}</p></th>
                    <th width="14%" class="alignment-center column-title"><h4>Jeudi</h4><p>{{$week->jeudi->format('d/m/Y')}}</p></th>
                    <th width="14%" class="alignment-center column-title"><h4>Vendredi</h4><p>{{$week->vendredi->format('d/m/Y')}}</p></th>
                    <th width="14%" class="alignment-center column-title"><h4>Samedi</h4><p>{{$week->samedi->format('d/m/Y')}}</p></th>
                </tr>
                </thead>
                @if(!$taches->isEmpty())
                    <tbody>
                    <tr class="odd pointer">
                        <td class=" ">
                        @foreach($taches->where("debut",$week->dimanche->toDateString()) as $tache)
                            <div class="tile-stats">
                                <p><span class="fa fa-wrench"></span> <b>{{$tache->titre}}</b></p>
                                <hr>
                                <ul>
                                @foreach($tache->membres as $membre)
                                    <li>{{ $membre->nom }} {{ $membre->prenoms }} </li>
                                @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </td>
                        <td class=" ">
                        @foreach($taches->where("debut",$week->lundi->toDateString()) as $tache)
                            <div class="tile-stats">
                                <p><span class="fa fa-wrench"></span> <b>{{$tache->titre}}</b></p>
                                <hr>
                                <ul>
                                @foreach($tache->membres as $membre)
                                    <li>{{ $membre->nom }} {{ $membre->prenoms }} </li>
                                @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </td>
                        <td class=" ">
                        @foreach($taches->where("debut",$week->mardi->toDateString()) as $tache)
                            <div class="tile-stats">
                                <p><span class="fa fa-wrench"></span> <b>{{$tache->titre}}</b></p>
                                <hr>
                                <ul>
                                    @foreach($tache->membres as $membre)
                                        <li>{{ $membre->nom }} {{ $membre->prenoms }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </td>
                        <td class=" ">
                        @foreach($taches->where("debut",$week->mercredi->toDateString()) as $tache)
                            <div class="tile-stats">
                                <p><span class="fa fa-wrench"></span> <b>{{$tache->titre}}</b></p>
                                <hr>
                                <ul>
                                    @foreach($tache->membres as $membre)
                                        <li>{{ $membre->nom }} {{ $membre->prenoms }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </td>
                        <td class=" ">
                        @foreach($taches->where("debut",$week->jeudi->toDateString()) as $tache)
                            <div class="tile-stats">
                                <p><span class="fa fa-wrench"></span> <b>{{$tache->titre}}</b></p>
                                <hr>
                                <ul>
                                    @foreach($tache->membres as $membre)
                                        <li>{{ $membre->nom }} {{ $membre->prenoms }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </td>
                        <td class=" ">
                        @foreach($taches->where("debut",$week->vendredi->toDateString()) as $tache)
                            <div class="tile-stats">
                                <p><span class="fa fa-wrench"></span> <b>{{$tache->titre}}</b></p>
                                <hr>
                                <ul>
                                    @foreach($tache->membres as $membre)
                                        <li>{{ $membre->nom }} {{ $membre->prenoms }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </td>
                        <td class=" ">
                        @foreach($taches->where("debut",$week->samedi->toDateString()) as $tache)
                            <div class="tile-stats">
                                <p><span class="fa fa-wrench"></span> <b>{{$tache->titre}}</b></p>
                                <hr>
                                <ul>
                                    @foreach($tache->membres as $membre)
                                        <li>{{ $membre->nom }} {{ $membre->prenoms }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </td>
                    </tr>
                    </tbody>
                @else
                    <tr>
                        <td colspan="8">
                            <div class="bs-example" data-example-id="simple-jumbotron">
                                <div class="jumbotron">
                                    <h1 style="text-align: center">Planning hebdo</h1>
                                    <p style="text-align: center">Aucun planning disponible pour cette semaine.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection