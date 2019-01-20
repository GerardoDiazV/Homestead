<?php

use Illuminate\Database\Seeder;

class IndicadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Indicador::create([
            'nombre'=>'N° DE CONVENIOS DE COLABORACIÓN ACTIVOS / N°
ACTIVIDADES REALIZADAS',
            'year_inicio'=>'2015',
            'year_termino'=>'2019',
            'descripcion'=>'Número de convenios firmados por el DISC que se mantienen activos además del número
de actividades realizadas en el marco de tales convenios',
            'formula'=>' Convenio->count() AND ActividadesConConvenio->count()',
            'tipo_evidencia'=>'Fotografias, Formulario Inscripcion',
        ]);

        App\Indicador::create([
            'nombre'=>'NÚMERO DE ACTIVIDADES EXTENSIÓN/ NÚMERO DE PERSONAS',
            'year_inicio'=>'2015',
            'year_termino'=>'2019',
            'descripcion'=>'Nº de actividades de extensión - artísticas, culturales, científicas y otras - organizadas por el
DISC y el número total de participantes en las actividades de extensión. ',
            'formula'=>' Convenio->count() AND Participantes->count()',
            'tipo_evidencia'=>'Lista de Asistencia',
        ]);

        App\Indicador::create([
            'nombre'=>'ACTIVIDADES DE TITULACIÓN AVALADAS POR CONVENIO
ACTIVO ',
            'year_inicio'=>'2015',
            'year_termino'=>'2019',
            'descripcion'=>'Número de actividades de titulación 
            -tesis, memorias, capstone project, entre otras 
            avaladas por convenio activo /Número total 
            de actividades de titulación * 100 ',
            'formula'=>' TitulacionConConvenio->count()/Titulacion->count() * 100 ',
            'tipo_evidencia'=>'Formulario Inscripcion',
        ]);

        App\Indicador::create([
            'nombre'=>'NÚMERO ACTIVIDADES DE APRENDIZAJE MÁS SERVICIOS /
NÚMERO ESTUDIANTES ',
            'year_inicio'=>'2015',
            'year_termino'=>'2019',
            'descripcion'=>'Número actividades de Aprendizaje más Servicios, N° estudiantes que participaron en estas
actividades. El aprendizaje más servicio (A+S) es una metodología pedagógica donde los
estudiantes tienen la oportunidad de adquirir conocimientos y desarrollar competencias
mediante servicios semiprofesionales que prestan a usuarios de la comunidad, en el marco
de una asignatura específica.',
            'formula'=>' ActividadASP->count() AND Participantes->count() ',
            'tipo_evidencia'=>'Acuerdo Firmado',
        ]);
    }
}
