<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Http\Request;
use App\Events\NewMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Storage;
/**
 * Class DiscoController
 * @package App\Http\Controllers
 */
class DiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     Public function ValidaCodigoUtilidad($codigoS, $utilidad){
        $cod = $codigoS;
        $codigos = DB::table('codigo_utilidads')->select('codigo', 'codigo_created_at', 'user_id', 'funcion')->get();
        
        foreach($codigos as $code){
            if(Hash::check($cod, $code->codigo)){
                $date = Carbon::now();
                if($code->user_id != Auth::user()->id){
                    return redirect()->back()->with('msg', 'OTROUSU');
                }
                else{
                        if($utilidad === $code->funcion){
                            if($date->subminutes(5) <= $code->codigo_created_at){
                            if(DB::table('codigo_utilidads')->where('user_id', $code->user_id)->where('codigo', $code->codigo)->update(['codigo_verified_at' => Carbon::now()])){
                                return true;
                            }
                            else{
                                return false;
                            }
                        }
                        else{
                            return back()->with('msg', 'CADUCADO');
                        }
                    }else{
                        return back()->with('msg', 'CADUCADO2');
                    }
                    
                }
            }
        }
    }





    public function index()
    {
        $discos = Disco::withTrashed()->get();
        $discos = Disco::paginate();

        return view('disco.index', compact('discos'))
            ->with('i', (request()->input('page', 1) - 1) * $discos->perPage());
    }

    /**
     * Show the form for creating a new resour
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disco = new Disco();
        return view('disco.create', compact('disco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Disco::$rules);

        $disco = new Disco();

        $disco->nombre = $request->nombre;
        $disco->cantante = $request->cantante;
        $disco->categoria = $request->categoria;
        $disco->precio = $request->precio;
        $disco->archivo = self::guardaImagen($request);

        if($disco->save()){
                    // $disco = Disco::create($request->all());
        return redirect('/home')
               ->with('success', 'Platillo registrado.');
        }
        else{
        return redirect('/home')
               ->with('Error', 'Algo salio mal en la creación.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disco = Disco::find($id);
        $discos = Disco::withTrashed()->get();
        return view('disco.show', compact('disco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disco = Disco::find($id);

        return view('disco.edit', compact('disco'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Disco $disco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // request()->validate(Disco::$rules);



       if(Auth::user()->area < 2){
          $codigoS = $request->codigoS;

          if(self::ValidaCodigoUtilidad($codigoS, 'EDITAR') === true){
             $disco = Disco::findOrFail($id);
             $disco->nombre = $request->nombre;
             $disco->cantante = $request->cantante;
             $disco->categoria = $request->categoria;
             $disco->precio = $request->precio;
             $disco->archivo = self::guardaImagen($request);
            //  if ($request->hasFile('archivo')) {
            //     $file = $request->file('archivo');
            //     $path = $file->store('your/desired/path', 'public');
            //     $disco->archivo = $path;
            //  }else{
            //    $disco->archivo = $disco->archivo;
            //  }

             $disco->save();

             return redirect()->route('home')
                    ->with('success', 'Platillo actualizado correctamente.');
          }
          else{
             return back()->with('msg', 'NOVALIDO');
          }
       }
       else{
          $disco = Disco::findOrFail($id);
          $disco->nombre = $request->nombre;
          $disco->cantante = $request->cantante;
          $disco->categoria = $request->categoria;
          $disco->precio = $request->precio;
          $disco->archivo = self::guardaImagen($request);
        //   if($request->hasFile('archivo')) {
        //      $file = $request->file('archivo');
        //      $path = $file->store('your/desired/path', 'public');
        //      $disco->archivo = $path;
        //   }
        //   else{
        //      $disco->archivo = $disco->archivo;
        //   }
                
          $disco->save();
        
          return redirect()->route('home')
                 ->with('success', 'Platillo editado correctamente.');
        
       }
    }

    public function EditarDisco(Request $request)
    {
        Disco::where('id', $id)->update(['aprobada' => 1,'fechaaprueba' => Carbon::now(), 'usuario_autoriza' => Auth::user()->id]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $disco = Disco::find($id);
        return view('disco.delete', compact('disco'));
    }

    public function eliminarDisco($id, Request $request){

        if(Auth::user()->area <= 2){
            $codigoS = $request->codigoS;
  
            if(self::ValidaCodigoUtilidad($codigoS, 'ELIMINAR') === true){
                $disco = Disco::findOrFail($id);
                $disco->delete();

                return redirect()->route('/home')
                       ->with('success', 'Platillo eliminado correctamente.');
            }
            else{
               return back()->with('msg', 'NOVALIDO');
            }
         }
         else{
            $disco = Disco::findOrFail($id);
           $disco->delete();

           return redirect()->route('home')
                  ->with('success', 'Platillo eliminado correctamente.');
         }

    }

    public function mensaje()
    {
        event(new NewMessage('hello world'));

        return response()->json(['message'=>'evento enviado']);
    }


    public function guardaImagen(Request $request)
    {
       $image = $request->file('image');

       if($image) {
         $filename = time() . '_' . $image->getClientOriginalName();

         Storage::disk('do')->put('/proyecto/portadas/'.$filename,file_get_contents($request->file('image')->getRealPath()),'public');

         $url = Storage::disk('do')->url('/proyecto/portadas/'.$filename);
         return $url;
       }
    }

    public function Eliseo(Request $request){
        $suma = $request->codigo;
        // $codigo = $request->codigo;
        // if($codigo === 250513){
        //     return "HOLA MUNDO";
        // }
        // else{
        //     return "Adios Mundo";
        // }
        $gansito = $request->gansito;
        $codigo = $request->codigo;
        return response()
            ->json(['gansito' => $gansito, 'codigo' => $codigo]);
    }

}