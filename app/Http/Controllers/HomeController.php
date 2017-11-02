<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

use App\Equipo;
use App\Jugador;
use App\Tecnico;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    // Creacion de un nuevo equipo con sus jugadores
    
    public function new_team(Request $req){
        /**   funcion para Insertar equipos en la base de datos    **/
        DB::beginTransaction();
        
        try {

        /**   Insertar un equipo en la tabla equipos   **/
            $jugadores = json_decode($req->jugadores);
            $tecnicos = json_decode($req->tecnicos);
            $quipo = Equipo::create([
                'nombre_equipo' => $req->name_team,
                "imagen_bandera" => $req->imagen_bandera,
                "escudo_equipo" => $req->imagen_escudo
            ]);

        /**   Insertar jugadores en la tabla jugadores asociados al equipo creado anteriormente   **/
            foreach ($jugadores as $key => $valor) {
                $jugador = jugador::create([
                    'nombre' => $valor->nombre_jugador1,
                    'apellido'=> $valor->apellido_jugador1,
                    'fecha_nacimiento' => $valor->fecha_nacimiento1,
                    'posicion_jugador'=>$valor->posicion_jugador1,
                    'numero_camisa' =>$valor->numero_camiseta_jugador1,
                    'titular'=> $valor->titular,
                    'foto_jugador'=>$valor->foto_jugador,
                    'equipo_id' => $quipo->id_equipo
                ]);
            }
            /**   Insertar tecnicos en la tabla tecnicos asociados al equipo creado anteriormente    **/
            foreach ($tecnicos as $key => $valor) {
                Tecnico::create([
                    'nombre' => $valor->nombre_tecnico1 ,
                    'apellido'=> $valor->apellido_tecnico1,
                    'fecha_nacimiento' => $valor->fecha_nacimiento_tecnico1,
                    'nacionalidad'=>$valor->nacionalidad_tecnico,
                    'rol' =>$valor->rol_tecnico1,
                    'equipo_id' => $quipo->id_equipo
                ]);
            }


            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            echo $e;
            // something went wrong
        }

       
        

    }
    public function estadisticas (){
        /****cantidad de equipos****/
        $equipos = Equipo::all()->count();

        /****cantidad de jugadores****/
        $jugadores = Jugador::all()->count();

        /****jugador mas joven****/
        $joven = DB::select("SELECT j.* from jugadores j order by j.fecha_nacimiento desc limit 1");

        /****jugador mas viejo****/
        $viejo = DB::select("SELECT j.* from jugadores j order by j.fecha_nacimiento asc limit 1");


        /****tecnico mas viejo****/
        $tecnico_viejo = DB::select("SELECT j.* from tecnicos j WHERE j.rol='tecnico' order by j.fecha_nacimiento asc limit 1  ");

        /****total de suplentes****/
        $suplentes = DB::table('jugadores')
                    ->where('titular',0)
                    ->count();
        
        /****promedo de edades de los jugadores****/
        $promedio_edades = DB::select("SELECT fecha_nacimiento, ROUND(AVG(TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())),0) AS edad
            FROM jugadores;");
        if($promedio_edades[0]->edad == null){
            $promedio_edades[0]->edad = 0;
        }


        /******promedio de suplentes****************/

        $promedio_suplentes = DB::select(" SELECT  COUNT(*) as total FROM jugadores  WHERE titular=0");
        if($equipos == 0){
            $promedio_suplentes_total = 0;
        }else{
            $promedio_suplentes_total =$promedio_suplentes[0]->total / $equipos;
        }
     
        /******promedio de jugadores****************/

        $promedio_titular = DB::select(" SELECT  COUNT(*) as total FROM jugadores  WHERE titular=1");
        if($equipos == 0){
            $promedio_titular_total = 0;
        }else{
            $promedio_titular_total = number_format(round($promedio_titular[0]->total / $equipos),0);
        }

        /******mas jugadores****************/
         $mas_jugadores = DB::select("SELECT  *,MAX(total) as maximo from (SELECT equipo_id, COUNT(*) as total FROM jugadores j GROUP BY equipo_id) sel1 JOIN equipo e on e.id_equipo=sel1.equipo_id ");


        /******tecnico con nacionalidad distintas****************/
         $tecnico_nacionalidad_distinta = DB::select("SELECT  * FROM equipo e JOIN tecnicos t on e.nombre_equipo!=t.nacionalidad and t.rol='tecnico' and e.id_equipo=t.equipo_id");
       
        return view('estadisticas',['equipos'=>$equipos,'jugadores'=>$jugadores,'joven'=>$joven,'viejo'=>$viejo, 'suplentes'=>$suplentes,'promedio_edades'=>$promedio_edades[0]->edad, 'tecnico_viejo'=>$tecnico_viejo, 'mas_suplentes'=>$mas_jugadores, 'promedio_suplente'=>$promedio_suplentes_total,'promedio_titular'=>$promedio_titular_total,'tecnico_nacionalidad'=>$tecnico_nacionalidad_distinta]);
    }
}