<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Secteur;
use App\Models\Site;
use App\Models\SupervisionControlElement;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    /**
     * Affiche la liste de secteurs paginé
     * @return JsonResponse
    */
    public function viewAllPaginateSectors(Request $request){
        $key = $request->query("key") ?? "paginate";
        $query = Secteur::orderBy("libelle");
        $sectors = null;
        if($key==="all"){
            $sectors = $query->with("sites")->get();
        }
        else{
            $sectors = $query->paginate(10);
        }
        return response()->json([
            "status"=>"success",
            "sectors"=>$sectors
        ]);
    }

    /**
     * Affiche la liste des sites (all or paginé)
     * @return JsonResponse
    */
    public function viewAllPaginateSites(Request $request){
        $key = $request->query("key") ?? "paginate";
        $query = Site::orderBy("name");
        $sites = null;
        if($key==="all"){
            $sites = $query->with('secteur')->get();
        }
        else{
            $sites = $query->paginate(10);
        }
        return response()->json([
            "status"=>"success",
            "sites"=>$sites
        ]);
    }

    /**
     * Cree & modifie un site
     * @param Request $request
     * @return JsonResponse
    */
    public function createSite(Request $request){
        try{
            $data = $request->validate([
                "name"=>"required|string",
                "code"=>"nullable|string",
                "adresse"=>"nullable|string",
                "phone"=>"nullable|string",
                "secteur_id"=>"nullable|integer|exists:secteurs,id",
            ]);

            // If code not provided, generate one from the name (uppercase, alphanumeric)
            if (empty($data['code'])) {
                $base = Str::upper(preg_replace('/[^A-Za-z0-9]/', '', Str::slug($data['name'])));
                if (empty($base)) $base = 'S' . time();
                $code = $base;
                $suffix = 1;
                while (Site::where('code', $code)->when($request->id, function($q) use ($request){ return $q->where('id', '<>', $request->id); })->exists()) {
                    $code = $base . $suffix;
                    $suffix++;
                }
                $data['code'] = $code;
            }

            $response = Site::updateOrCreate(
                [
                    "id"=>$request->id,
                ],
                $data
            );

            return response()->json([
                "status"=>"success",
                "result"=>$response
            ]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }

    /**
     * Cree & modifie un secteur
     * @param Request $request
     * @return JsonResponse
    */
    public function createSector(Request $request){
        try{
            $data = $request->validate([
                "libelle"=>"required|string",
            ]);
            $response = Secteur::updateOrCreate(
                [
                    "id"=>$request->id,
                ],
                $data
            );

            return response()->json([
                "status"=>"success",
                "result"=>$response
            ]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }

}
