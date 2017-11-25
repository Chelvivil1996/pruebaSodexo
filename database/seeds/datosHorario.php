<?php

use Illuminate\Database\Seeder;
use App\Aula;
use App\Horario;

class datosHorario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $aula=new Aula;

        $aula->nombreAula='0002-A';
        $aula->save();
        //consulta
        $consultaABaseDatos=Aula::orderBy('created_at','desc')->first();

        //cada fila es una objeto
        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='07:00';
        $horario->Lunes='EG0125(3)';
    		$horario->martes='EG0125(8)';
    		$horario->miercoles='RP0001(2)';
    		$horario->jueves='EG0125(3)';
    		$horario->viernes='EG0125(3)';
    		$horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='08:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='09:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='10:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='11:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='12:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='13:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='14:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='15:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

        $horario=new Horario;
        $horario->numeroAula=$consultaABaseDatos->id;
        $horario->hora='16:00';
        $horario->Lunes='EG0125(3)';
        $horario->martes='EG0125(8)';
        $horario->miercoles='RP0001(2)';
        $horario->jueves='EG0125(3)';
        $horario->viernes='EG0125(3)';
        $horario->sabado='EG0125(3)';
        $horario->save();

    }
}
