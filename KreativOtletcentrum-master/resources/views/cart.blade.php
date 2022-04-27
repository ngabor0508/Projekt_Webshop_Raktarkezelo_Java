@extends('layouts.layout')
@section('title', 'Kosár')
@section('content')
<h1 style="margin-top: 10%;">Kosár</h1>
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>

            <th style="width:50%">Termék</th>
            <th style="width:10%">Ár</th>
            <th style="width:8%">Mennyiség</th>
            <th style="width:22%" class="text-center">Összesen</th>
            <th style="width:10%"></th>
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
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price" data-ar="d_{{ $id }}">{{ $details['price'] }} </td>
                    <td data-th="Quantity" >
                        <input type="number" id="mennyiseg" min="0" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        
                    </td>
                    <td data-th="Subtotal" class="text-center" id="osszesen">{{ $details['price'] * $details['quantity'] }} Ft</td>
                    <td class="actions" data-th="">
                    <button class="remove-from-cart"><script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/gsqxdxog.json"
                            trigger="hover"
                            colors="primary:#121331,secondary:#e83a30"
                            stroke="80"
                            style="width:3rem;height:3rem">
                        </lord-icon></i></button>
                    
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>

            <td colspan="5" class="text-right"><a href="{{ route('cart') }}"><button type="button" class="btn btn" style="color: green;">Frissítés</button></a><h3 id="vegosszeg"><strong>Végösszeg:</strong> {{ $total }} Ft</h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('termekek') }}" class="btn" id="vasarlas_folytatas"><i class="fas fa-angle-left"></i> Vásárlás folytatása</a>
                <a href="{{ route('rendeles')}}"><button class="btn btn-success">Rendelés</button></a><br/>
                
                @auth
                <a href="{{ route('kosaram') }}"><button id="kosar_mentes">Kosár mentése</button></a>
        @else
        <a href="{{ route('login') }}"><button id="kosar_mentes">Kosár Mentése</button></a>
        @endauth
            </td>
        </tr>
    </tfoot>
</table>
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