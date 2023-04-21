<?php

namespace App\Providers;

use App\Models\Deficiencia;
use App\Models\Departamento;
use App\Models\Funcionario;
use App\Models\Genero;
use App\Models\Grupo;
use App\Models\IdentidadeOrgao;
use App\Models\EstadoCivil;
use App\Models\Modulo;
use App\Models\Nacionalidade;
use App\Models\Naturalidade;
use App\Models\Notificacao;
use App\Models\Operacao;
use App\Models\Funcao;
use App\Models\Escolaridade;
use App\Models\Situacao;
use App\Models\Submodulo;
use App\Models\Ferramenta;
use App\Models\Turma;
use App\Models\User;
use App\Models\TipoEscola;
use App\Models\NivelEnsino;
use App\Models\Escola;
use App\Models\Professor;
use App\Models\Aluno;

use App\Observers\DeficienciaObserver;
use App\Observers\DepartamentoObserver;
use App\Observers\FuncionarioObserver;
use App\Observers\GeneroObserver;
use App\Observers\GrupoObserver;
use App\Observers\IdentidadeOrgaoObserver;
use App\Observers\EstadoCivilObserver;
use App\Observers\ModuloObserver;
use App\Observers\NacionalidadeObserver;
use App\Observers\NaturalidadeObserver;
use App\Observers\NotificacaoObserver;
use App\Observers\OperacaoObserver;
use App\Observers\FuncaoObserver;
use App\Observers\EscolaridadeObserver;
use App\Observers\SituacaoObserver;
use App\Observers\SubmoduloObserver;
use App\Observers\FerramentaObserver;
use App\Observers\TurmaObserver;
use App\Observers\UserObserver;
use App\Observers\TipoEscolaObserver;
use App\Observers\NivelEnsinoObserver;
use App\Observers\EscolaObserver;
use App\Observers\ProfessorObserver;
use App\Observers\AlunoObserver;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        Departamento::observe(DepartamentoObserver::class);
        Funcionario::observe(FuncionarioObserver::class);
        Genero::observe(GeneroObserver::class);
        Grupo::observe(GrupoObserver::class);
        IdentidadeOrgao::observe(IdentidadeOrgaoObserver::class);
        EstadoCivil::observe(EstadoCivilObserver::class);
        Modulo::observe(ModuloObserver::class);
        Nacionalidade::observe(NacionalidadeObserver::class);
        Naturalidade::observe(NaturalidadeObserver::class);
        Notificacao::observe(NotificacaoObserver::class);
        Operacao::observe(OperacaoObserver::class);
        Funcao::observe(FuncaoObserver::class);
        Escolaridade::observe(EscolaridadeObserver::class);
        Situacao::observe(SituacaoObserver::class);
        Submodulo::observe(SubmoduloObserver::class);
        Ferramenta::observe(FerramentaObserver::class);
        User::observe(UserObserver::class);
        TipoEscola::observe(TipoEscolaObserver::class);
        NivelEnsino::observe(NivelEnsinoObserver::class);
        Escola::observe(EscolaObserver::class);
        Professor::observe(ProfessorObserver::class);
        Aluno::observe(AlunoObserver::class);
        Turma::observe(TurmaObserver::class);
        Deficiencia::observe(DeficienciaObserver::class);
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
