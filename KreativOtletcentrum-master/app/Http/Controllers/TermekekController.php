<?php

namespace App\Http\Controllers;

use App\Models\Termekek;
use App\Models\Rendeles;
use App\Models\Kosar;
use Illuminate\Http\Request;
use App\Http\Requests\TermekekRequest;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class TermekekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $termekek = Termekek::orderBy('id')->get();
        return view('index', ['termekek' => $termekek]);
    }
    public function termekek()
    {
        return view('termekek');
    }
    public function rolunk()
    {
        return view('rolunk');
    }
    public function cart()
    {
        return view('cart');
    }
    public function kapcsolat()
    {
        return view('kapcsolat');
    }
    public function adatvedelem()
    {
        return view('adatvedelem');
    }
    public function aszf()
    {
        return view('aszf');
    }
    public function szallitas()
    {
        return view('szallitas');
    }
    public function rendeles()
    {
        return view('rendeles');
    }
    public function kesz_termekek(Request $request)
    {
        $error = "";
        $kesz_termekek = Termekek::where('kategoria', 'LIKE', 'kesz')->paginate(21);
        $kesz_termekek->appends($request->all());
        return view('kesz_termekek', [
            'kesz_termekek' => $kesz_termekek,
        ], compact('kesz_termekek', 'error'));
    }
    public function alapanyagok(Request $request)
    {

        $alapanyagok = Termekek::where('kategoria', 'LIKE', 'alap')->paginate(21);
        $alapanyagok->appends($request->all());
        return view('alapanyagok', [
            'alapanyagok' => $alapanyagok,
        ]);
    }
    public function dekoraciok(Request $request)
    {
        $dekoraciok = Termekek::where('kategoria', 'LIKE', 'dekor')->paginate(21);
        $dekoraciok->appends($request->all());
        return view('dekoraciok', [
            'dekoraciok' => $dekoraciok,
        ]);
    }
    public function rendezes_novekvo_dekor(Request $request){
        $dekoraciok = Termekek::where('kategoria', 'LIKE', 'dekor')->orderBy('price', 'asc')->paginate(21);
        $dekoraciok->appends($request->all());
        return view('dekoraciok', [
            'dekoraciok' => $dekoraciok,
        ]);
    }
    public function rendezes_csokkeno_dekor(Request $request){
        $dekoraciok = Termekek::where('kategoria', 'LIKE', 'dekor')->orderBy('price', 'desc')->paginate(21);
        $dekoraciok->appends($request->all());
        return view('dekoraciok', [
            'dekoraciok' => $dekoraciok,
        ]);
    }
    public function rendezes_novekvo_alap(Request $request){
        $alapanyagok = Termekek::where('kategoria', 'LIKE', 'alap')->orderBy('price', 'asc')->paginate(21);
        $alapanyagok->appends($request->all());
        return view('alapanyagok', [
            'alapanyagok' => $alapanyagok,
        ]);
    }
    public function rendezes_csokkeno_alap(Request $request){
        $alapanyagok = Termekek::where('kategoria', 'LIKE', 'alap')->orderBy('price', 'desc')->paginate(21);
        $alapanyagok->appends($request->all());
        return view('alapanyagok', [
            'alapanyagok' => $alapanyagok,
        ]);
    }
    public function rendezes_novekvo_kesz(Request $request){
        $error = "";
        $kesz_termekek = Termekek::where('kategoria', 'LIKE', 'kesz')->orderBy('price', 'asc')->paginate(21);
        $kesz_termekek->appends($request->all());
        return view('kesz_termekek', [
            'kesz_termekek' => $kesz_termekek,
        ], compact('kesz_termekek', 'error'));
    }
    public function rendezes_csokkeno_kesz(Request $request){
        $error = "";
        $kesz_termekek = Termekek::where('kategoria', 'LIKE', 'kesz')->orderBy('price', 'desc')->paginate(21);
        $kesz_termekek->appends($request->all());
        return view('kesz_termekek', [
            'kesz_termekek' => $kesz_termekek,
        ], compact('kesz_termekek', 'error'));
    }
    // public function rendezes_novekvo_szurt(Request $request){
    //     $error = "";
    //     $szures = Termekek::orderBy('price', 'asc')->paginate(21);
    //     $szures->appends($request->all());
    //     return view('szures', [
    //         'szures' => $szures,
    //     ], compact('szures', 'error'));
    // }
    // public function rendezes_csokkeno_szurt(Request $request){
    //     $error = "";
    //     $szures = Termekek::orderBy('price', 'desc')->paginate(21);
    //     $szures->appends($request->all());
    //     return view('szures', [
    //         'szures' => $szures,
    //     ], compact('szures', 'error'));
    // }
    public function kereses_with_error($error)
    {
        $kereses = Termekek::paginate(21);
        return view('kereses', compact('kereses', "error"));
    }
    public function szures_with_error($error)
    {
        $szures = Termekek::paginate(21);
        return view('szures', compact('szures', "error"));
    }
    public function addToCart($id)
    {
        $termek = Termekek::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $termek->name,
                "quantity" => 1,
                "price" => $termek->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();/**->with('success', 'Sikeresen a kosarához adta!');**/
    }
    public function update_termek(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            /**session()->flash('success', 'Sikeresen frissítette a kosár tartalmát!');**/
        }
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            /**session()->flash('success', 'Termékét eltávolította a kosarából!');**/
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('termekek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermekekRequest $request)
    {
        $adatok = $request->only(['name', 'price', 'quantity', 'kodszam']);
        $termek = new Termekek();
        $termek->fill($adatok);
        $termek->save();
        return redirect()->route('termekek.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Termekek  $termekek
     * @return \Illuminate\Http\Response
     */
    public function show(Termekek $termekek)
    {
        return view('termekek.show', ['termekek' => $termekek]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Termekek  $termekek
     * @return \Illuminate\Http\Response
     */
    public function edit(Termekek $termekek)
    {
        return view('termekek.edit', ['termekek' => $termekek]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Termekek  $termekek
     * @return \Illuminate\Http\Response
     */
    public function update(TermekekRequest $request, Termekek $termek)
    {
        $adatok = $request->only(['name', 'price', 'quantity', 'kodszam']);
        $termek->fill($adatok);
        $termek->save();
        return redirect()->route('termekek.show', $termek->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Termekek  $termekek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Termekek $termek)
    {
        $termek->delete();
        return redirect()->route('termekek.index');
    }
    // add search function
    public function search(Request $request)
    {
        // if($request->get('query') != ""){
        //     return TermekekController::kesz_termekek_with_error("nem talált ilyet");
        // }
        // else{
        //     return view('search');
        // }

        $error = "";

        $query = $request->get("query");
        if ($query != "") {


            $kereses = Termekek::where('name', 'LIKE', '%' . $query . '%')->paginate(21);
            //$kereses = Termekek::where('price', '>=', $query)->paginate(21);
            $kereses->appends($request->all());

            if ($kereses->count() > 0) {
                return view('kereses', [
                    'kereses' => $kereses,
                    "error" => $error,
                    "query" => $query
                ]);
            } else {
                $error = "Nem található ilyen termék: " . $query;
                return TermekekController::kereses_with_error($error);
            }
        }

        return redirect("/kesz_termekek");
    }
    public function szures_dekor(Request $request){
        $error = "";

        $query_mettol = $request->get("query_mettol");
        $query_meddig = $request->get("query_meddig");
        if ($query_mettol != "" && $query_meddig != "") {


            $szures = Termekek::where('price', '>=',  $query_mettol)->where('price', '<=',  $query_meddig)->where('kategoria', 'LIKE', 'dekor')->paginate(21);
            $szures->appends($request->all());

            if ($szures->count() > 0) {
                return view('szures', [
                    'szures' => $szures,
                    "error" => $error
                ]);
            } else {
                $error = "Nem található termék " . $query_mettol . " Ft és " . $query_meddig . " ft között";
                return TermekekController::szures_with_error($error);
            }
        }

        return redirect("/kesz_termekek");
    }
    public function szures_kesz(Request $request){
        $error = "";

        $query_mettol = $request->get("query_mettol");
        $query_meddig = $request->get("query_meddig");
        if ($query_mettol != "" && $query_meddig != "") {


            $szures = Termekek::where('price', '>=',  $query_mettol)->where('price', '<=',  $query_meddig)->where('kategoria', 'LIKE', 'kesz')->paginate(21);
            $szures->appends($request->all());

            if ($szures->count() > 0) {
                return view('szures', [
                    'szures' => $szures,
                    "error" => $error
                ]);
            } else {
                $error = "Nem található termék " . $query_mettol . " Ft és " . $query_meddig . " ft között";
                return TermekekController::szures_with_error($error);
            }
        }

        return redirect("/kesz_termekek");
    }
    public function szures_alap(Request $request){
        $error = "";

        $query_mettol = $request->get("query_mettol");
        $query_meddig = $request->get("query_meddig");
        if ($query_mettol != "" && $query_meddig != "") {


            $szures = Termekek::where('price', '>=',  $query_mettol)->where('price', '<=',  $query_meddig)->where('kategoria', 'LIKE', 'alap')->paginate(21);
            $szures->appends($request->all());

            if ($szures->count() > 0) {
                return view('szures', [
                    'szures' => $szures,
                    "error" => $error,
                    "query_mettol" => $query_mettol
                ]);
            } else {
                $error = "Nem található ilyen termék ebben az ársávban";
                return TermekekController::szures_with_error($error);
            }
        }

        return redirect("/kesz_termekek");
    }
}
