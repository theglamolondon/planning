@extends("layout.main")
@section("content")
    <div class="row">
        <form class="" action="" method="get">
            <div class="form-group">
                <div class="input-group">
                    <select name="mois" class="form-control">
                        @foreach(\App\Http\Controllers\EventController::getMonthsNames() as $k => $v)
                        <option value="{{ $k }}" @if($k == request("mois") ?? date('m')) selected @endif>{{ $v }}</option>
                        @endforeach
                    </select>
                    <select name="annee" class="form-control">
                        @for($i=2017; $i<= date('Y'); $i++)
                        <option value="{{ $i }}" @if($i == request("annee") ?? date('Y')) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-success">
                        <i class="menu-icon mdi mdi-calendar"></i> Rechercher
                    </button>
                </div>
            </div>
        </form>
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
                                <h2>{{ \App\Http\Controllers\EventController::getMonthsNames()[request("mois") ?? date('m')] }} {{ request("annee") ?? date('Y') }}</h2>
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
                        <tbody class="planning">
                        @foreach($membres as $membre)
                        <tr>
                            <td>{{ $membre->grade->code }}</td>
                            <td>{{ $membre->nom }} {{ $membre->prenoms }}</td>

                            @php $start->addDay(-($end->day)) //On réinitialise la date pour la mettre au début du mois @endphp
                            @for($i=0; $i < $end->day; $i++ )

                                @php $start->addDay(1);

                                $all = ($missions->where('membre_id','=', $membre->id)->filter(function($item, $key) use ($i){
                                        return
                                                \Carbon\Carbon::createFromFormat('Y-m-d',$item->fin)->day >= ($i+1) &&
                                                \Carbon\Carbon::createFromFormat('Y-m-d',$item->debut)->day <= ($i+1);
                                    }))
                                @endphp

                                <td @if($start->dayOfWeek == \Carbon\Carbon::SATURDAY || $start->dayOfWeek == \Carbon\Carbon::SUNDAY )
                                    class="bg-secondary" @endif @if($all->count() > 1) class="bg-danger" @endif>
                                    @foreach($all as $mission)
                                        @if(!($start->dayOfWeek == \Carbon\Carbon::SATURDAY || $start->dayOfWeek == \Carbon\Carbon::SUNDAY) )

                                            @php
                                            $manager = (($missions->where('mission_id','=', $mission->mission_id))->where('grade_id','=',\App\Grade::MANAGER));
                                            @endphp

                                            <div class="item" style="background-color: {{ $manager[0]->couleur ?? $manager->first()->couleur  }}">
                                                {{ $mission->titre }}
                                            </div>
                                        @endif
                                    @endforeach
                                </td>
                            @endfor
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @foreach($managers as $manager)
                    <div class="legend">
                        <a href="javascript:void(0);" title="{{ $manager->nom }} {{ $manager->prenoms }}"><span class="man-color" style="background-color: {{$manager->couleur}};"></span></a>
                        <span class="man-name">{{ substr($manager->nom,0,1) }}{{ substr($manager->prenoms,0,1) }}</span>
                    </div>
                @endforeach
                @foreach($templates as $template)
                    <div class="legend">
                        <span class="man-color" style="background-color: {{$template->couleur}};">
                        </span><span class="man-name">{{ $template->libelle }}</span>
                    </div>
                @endforeach
                <div class="legend">
                        <span class="man-color" style="background-color: {{\App\Template::CONFLIT_COULEUR}};">
                        </span><span class="man-name">{{ \App\Template::CONFLIT_LIBELLE }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection