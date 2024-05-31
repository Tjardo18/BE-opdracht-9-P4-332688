<?php

namespace App\Http\Controllers;

use App\Models\Magazijn;
use App\Models\ProductPerLeverancier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NieuweLeveringController extends Controller
{

    public function __construct()
    {
    }

    public function index($id)
    {
        $leverancierId = DB::select('CALL getLeverancierByProductId(?)', [$id]);
        $leverancier = DB::select('CALL getLeverancierById(?)', [$leverancierId[0]->leverancierId]);

        $data = [
            'title' => 'Nieuwe Levering',
            'leverancierId' => $leverancierId[0]->leverancierId,
            'leverancierNummer' => $leverancier[0]->leverancierNummer,
            'leverancier' => $leverancier,
            'productId' => $id,
        ];

        return view('nieuwe-levering', $data);
    }

    public function store()
    {
        ProductPerLeverancier::create([
            'leverancierId' => request('leverancierId'),
            'productId' => request('productId'),
            'datumLevering' => request('datumLevering'),
            'aantal' => request('aantal'),
            'datumEerstvolgendeLevering' => request('datumEerstvolgendeLevering'),
            'isActief' => 1,
            'opmerkingen' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $currentAantal = Magazijn::where('productId', request('productId'))
            ->value('aantalAanwezig');

        $newAantal = $currentAantal + request('aantal');

        Magazijn::where('productId', request('productId'))
            ->update([
                'aantalAanwezig' => $newAantal,
                'updated_at' => Carbon::now(),
            ]);


        $LId = request('leverancierId');
        return redirect(route('leveringen.index', $LId));
    }
}
