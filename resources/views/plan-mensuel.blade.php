@extends("layout.main")
@section("content")
    <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <thead>
                        <tr>
                            <th rowspan="2" colspan="2">
                                <h3>Période / Staff</h3>
                            </th>
                            <th colspan="{{ $end->day }}" valign="center">
                                <h2>{{ $monthName }} {{ $end->year }}</h2>
                            </th>
                        </tr>
                        <tr class="headings">
                            @php $start->addDay(-1) // on fait exprès de partir au mois pécédent pour commencer la boucle le 1er du mois en cours @endphp

                            @for($i=0; $i < $end->day; $i++ )

                                @php $start->addDay(1) // On ajoute un jour pour les calculs des week-end @endphp

                                <th @if($start->dayOfWeek == \Carbon\Carbon::SATURDAY || $start->dayOfWeek == \Carbon\Carbon::SUNDAY )
                                    class="bg-secondary"
                                    @endif >
                                    {{ $i+1 }}
                                </th>
                            @endfor
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($membres as $membre)
                        <tr>
                            <td>Titre {{ $loop->index + 1 }}</td>
                            <td>{{ $membre->nom }} {{ $membre->prenoms }}</td>

                            @php $start->addDay(-($end->day)) //On réinitialise la date pour la mettre au début du mois @endphp
                            @for($i=0; $i < $end->day; $i++ )

                                @php $start->addDay(1) @endphp

                                <td @if($start->dayOfWeek == \Carbon\Carbon::SATURDAY || $start->dayOfWeek == \Carbon\Carbon::SUNDAY )
                                    class="bg-secondary" @endif >
                                    @foreach($taches->where('membre_id','=', $membre->id)->filter(function($item, $key) use ($i){
                                        return
                                                \Carbon\Carbon::createFromFormat('Y-m-d',$item->fin)->day >= ($i+1) &&
                                                \Carbon\Carbon::createFromFormat('Y-m-d',$item->debut)->day <= ($i+1);
                                    }) as $tache)
                                        @if(!($start->dayOfWeek == \Carbon\Carbon::SATURDAY || $start->dayOfWeek == \Carbon\Carbon::SUNDAY) )
                                            <div class="item" style="background-color: {{ $tache->couleur }}">{{ $tache->titre }}</div> <hr/>
                                        @endif
                                    @endforeach
                                </td>
                            @endfor
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection