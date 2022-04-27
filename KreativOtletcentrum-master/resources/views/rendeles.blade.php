@extends('layouts.layout')
@section('title', 'Rendelés')
@section('content')
<h1 style="margin-top: 10%;">Rendelés</h1>
<div class="row">
    <div class="col-sm">
    <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Termék</th>
            <th style="width:10%">Mennyiség</th>
            <th style="width:40%" class="text-center">Összesen</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp

                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin" style="font-size: 1.2rem;">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Quantity" >
                        {{ $details['quantity'] }}
                        
                    </td>
                    <td data-th="Subtotal" class="text-center" id="osszesen">{{ $details['price'] * $details['quantity'] }} Ft</td>
                    <td class="actions" data-th="">
                    
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3 id="vegosszeg"><strong>Végösszeg:</strong> {{ $total }} Ft</h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-center">
                <a href="{{ url('termekek') }}" class="btn" id="vasarlas_folytatas"><i class="fas fa-angle-left"></i> Vásárlás folytatása</a>

            </td>
        </tr>
    </tfoot>
</table>
    </div>
    <div class="col-sm">
        <form action="">
    <div class="page">
  <label class="field field_v2">
    <input class="field__input" type="text" placeholder="pl. Kreatív Ötletcentrum" required>
    <span class="field__label-wrap">
      <span class="field__label">Név</span>
    </span>
  </label>   
  <label class="field field_v2">
    <input class="field__input" type="email" placeholder="pl. info@kreativotletcentrum.hu" required>
    <span class="field__label-wrap">
      <span class="field__label">E-mail</span>
    </span>
  </label> 
  <label class="field field_v2">
    <input class="field__input" type="tel" placeholder="pl. 06 20 123 4567" required>
    <span class="field__label-wrap">
      <span class="field__label">Telefonszám</span>
    </span>
  </label> 
  <label class="field field_v2">
    <input class="field__input" type="number" placeholder="pl. 1194" required>
    <span class="field__label-wrap">
      <span class="field__label">Irányítószám</span>
    </span>
  </label>
  <label class="field field_v2">
    <input class="field__input" type="text" placeholder="pl. Budapest" required>
    <span class="field__label-wrap">
      <span class="field__label">Város</span>
    </span>
  </label>
  <label class="field field_v2">
    <input class="field__input" type="text" placeholder="pl. Pipacs utca 1" required>
    <span class="field__label-wrap">
      <span class="field__label">Utca, házszám</span>
    </span>
  </label>
</div>
<div>

  <label class="rad-label">
    <input type="radio" class="rad-input" name="rad">
    <div class="rad-design"></div>
    <div class="rad-text">Személyes átvétel</div>
  </label>

  <label class="rad-label">
    <input type="radio" class="rad-input" name="rad">
    <div class="rad-design"></div>
    <div class="rad-text">Házhozszállítás</div>
  </label>

  <label class="rad-label">
    <input type="radio" class="rad-input" name="rad">
    <div class="rad-design"></div>
    <div class="rad-text">GLS csomagpont</div>
  </label>
  <a href="{{ route('rendeles')}}"><button class="btn btn-success">Rendelés</button></a>
</div></form>
    </div>
</div>



@endsection
  
@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                //var ar = $("#ar").val();
                var seged = ele.parents("tr").attr("data-id");
                var ar = $(`[data-ar=d_${seged}]`).text();
                var mennyiseg = $("#mennyiseg").val();
                var osszesen = $(ar*mennyiseg);
                $("#osszesen").html(ar*mennyiseg + " Ft");
                $("#vegosszeg").html("<b>Végösszeg: </b>" + ar*mennyiseg + " Ft");
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Biztos, hogy törölni szeretné a terméket?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection