@extends('layouts.layout')
@section('title', 'Szállítás')

@section('content')
<h1 style="margin-top: 10%; margin-bottom:5%;">Szállítási opciók</h1>
<div class="row" id="szallitas_szoveg">

    <div class="col medium-7 small-12 large-7">
        <div class="col-inner">


            <h2><strong>Futárszolgálat</strong></h2>
            <p>Ára 1200 Ft, 20 000 Ft feletti rendelés esetén ingyenes a kiszállítás!</p>
            <p>Megrendeléstől számított 1, maximum 2 munkanapon szállítják ki a csomagot az ország egész területén. Általában 8 és 17 óra között kézbesítik a csomagot. Ha a megrendelése délig beérkezik hozzánk, akkor nagy valószínűséggel következő munkanap fogja kiszállítani a GLS futárszolgálat. SMS és telefonos értesítést lehet kérni a futártól a csomag érkezésének időpontjáról.</p>
            <h2></h2>
        </div>
    </div>
    <div class="col medium-5 small-12 large-5">
        <div class="col-inner">
            <div class="img has-hover x md-x lg-x y md-y lg-y" id="atvetel_kep">
                <div class="img-inner dark">
                    <img width="391" height="319" src="https://res.cloudinary.com/dnoinlxvo/image/upload/v1649764514/gls-logo_dq7z1v.png" class="attachment-large size-large" alt="Tocco GLS futárszolgálat" loading="lazy" srcset="https://tocco.hu/wp-content/uploads/2018/12/gls-logo.png 391w, https://tocco.hu/wp-content/uploads/2018/12/gls-logo-300x245.png 300w, https://tocco.hu/wp-content/uploads/2018/12/gls-logo-200x163.png 200w" sizes="(max-width: 391px) 100vw, 391px" />
                </div>

            </div>

        </div>
    </div>
</div>
<div class="row" id="szallitas_szoveg">
    <div class="col medium-7 small-12 large-7">
        <div class="col-inner">
            <h2><strong>GLS csomagpont</strong></h2>
            <p>Ára: 1200 Ft, 20 000 Ft feletti rendelés esetén ingyenes a kiszállítás!</p>
            <p>Vásárlástól számított 1, maximum 2 munkanapon belül a választott csomagponton van a csomag. Vásárló SMS-ben és emailben kap értesítést a csomag érkeztéről (ettől kezdve 7 munkanapon belül kell átvenni a csomagot).</p>
            <h2></h2>
        </div>
    </div>
    <div class="col medium-5 small-12 large-5">
        <div class="col-inner">
            <div class="img has-hover x md-x lg-x y md-y lg-y" id="atvetel_kep">
                <div class="img-inner dark">
                    <img width="230" height="230" src="https://res.cloudinary.com/dnoinlxvo/image/upload/v1649764514/gls-cscomagpont_rog7yp.png" class="attachment-large size-large" alt="Tocco GLS csomagpont" loading="lazy" srcset="https://tocco.hu/wp-content/uploads/2018/12/gls-cscomagpont.png 230w, https://tocco.hu/wp-content/uploads/2018/12/gls-cscomagpont-150x150.png 150w, https://tocco.hu/wp-content/uploads/2018/12/gls-cscomagpont-66x66.png 66w, https://tocco.hu/wp-content/uploads/2018/12/gls-cscomagpont-200x200.png 200w, https://tocco.hu/wp-content/uploads/2018/12/gls-cscomagpont-100x100.png 100w" sizes="(max-width: 230px) 100vw, 230px" />
                </div>
            </div>

        </div>
    </div>

</div>
<div class="row" id="szallitas_szoveg">

    <div class="col medium-7 small-12 large-7">
        <div class="col-inner">


            <h2><strong>PickPackPont</strong></h2>
            <p>Ára: 1200 Ft, 20 000 Ft feletti rendelés esetén ingyenes a kiszállítás!</p>
            <p>Az alábbi video jól bemutatja, hogyan működik az egyre népszerűbb PickPackPont csomagszállítás: <a href="https://www.youtube.com/watch?v=Afd_JJ8mrSA">Video link</a> Vásárlástól számított 1, maximum 2 munkanap a budapesti kiszállítás, vidékre pedig 2-3 munkanap. A Vásárló SMS-ben és emailben kap értesítést a csomag érkeztéről (ettől kezdve 7 munkanapon belül kell átvenni a csomagot).</p>
            <h2></h2>
        </div>
    </div>
    <div class="col medium-5 small-12 large-5">
        <div class="col-inner">


            <div class="img has-hover x md-x lg-x y md-y lg-y" id="atvetel_kep">
                <div class="img-inner dark">
                    <img width="1020" height="782" src="https://res.cloudinary.com/dnoinlxvo/image/upload/v1649764514/pickpack-1024x785_t0q9wz.png" class="attachment-large size-large" alt="Tocco Pick Pack Pont" loading="lazy" srcset="https://tocco.hu/wp-content/uploads/2018/12/pickpack-1024x785.png 1024w, https://tocco.hu/wp-content/uploads/2018/12/pickpack-600x460.png 600w, https://tocco.hu/wp-content/uploads/2018/12/pickpack-300x230.png 300w, https://tocco.hu/wp-content/uploads/2018/12/pickpack-768x589.png 768w, https://tocco.hu/wp-content/uploads/2018/12/pickpack-200x153.png 200w, https://tocco.hu/wp-content/uploads/2018/12/pickpack-400x307.png 400w, https://tocco.hu/wp-content/uploads/2018/12/pickpack-800x613.png 800w, https://tocco.hu/wp-content/uploads/2018/12/pickpack-1200x920.png 1200w" sizes="(max-width: 1020px) 100vw, 1020px" />
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row" id="szallitas_szoveg">

    <div class="col medium-7 small-12 large-7">
        <div class="col-inner">


            <h2><strong>Személyes vásárlás/személyes átvétel</strong></h2>
            <p>Ára: nincs szállítási díj!</p>
            <p>Lehetősége van a megrendelt termékeket személyesen átvenni a KiwiSun Szolárium szalonban. Megrendelés előtt érdeklődjön telefonon, hogy biztosan van-e raktáron az adott termék. Előrendelés nélkül is van lehetősége vásárolni a boltban, tehát nem szükséges minden esetben megrendelni a termékeket, de ajánlott előtte telefonon érdeklődni, hogy van-e készleten az adott termékből. Személyes megrendelés esetén 7 munkanapja van átvenni a terméket, utána törlődik a rendelése. E-mailben és/vagy telefonon értesítjük a Vásárlót, amint a rendelését átveheti.</p>
            <h2></h2>
        </div>
    </div>
    <div class="col medium-5 small-12 large-5">
        <div class="col-inner">


            <div class="img has-hover x md-x lg-x y md-y lg-y" id="atvetel_kep">
                <div class="img-inner dark">
                    <img width="512" height="512" src="https://res.cloudinary.com/dnoinlxvo/image/upload/v1649764514/szem%C3%A9lyes%C3%A1tv%C3%A9tel_c9yxnt.png" class="attachment-large size-large" alt="Tocco személyes átvétel" loading="lazy" srcset="https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel.png 512w, https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel-510x510.png 510w, https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel-150x150.png 150w, https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel-300x300.png 300w, https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel-66x66.png 66w, https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel-200x200.png 200w, https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel-400x400.png 400w, https://tocco.hu/wp-content/uploads/2018/12/személyesátvétel-100x100.png 100w" sizes="(max-width: 512px) 100vw, 512px" />
                </div>

            </div>

        </div>
    </div>
</div>
@endsection