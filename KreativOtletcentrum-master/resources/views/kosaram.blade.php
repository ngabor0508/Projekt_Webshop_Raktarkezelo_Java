@section('title', 'KÖC | Kosár')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kosár') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Kosaram
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                    <td data-th="Quantity" style="text-align: center;">
                        {{ $details['quantity'] }}
                    </td>
                    <td data-th="Subtotal" class="text-center" id="osszesen">{{ $details['price'] * $details['quantity'] }} Ft</td>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot id="kosaram_foot">
        <tr>
            <td colspan="5" class="text-right"><h3 id="vegosszeg"><strong>Végösszeg:</strong> {{ $total }} Ft</h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('cart') }}" class="btn" id="vasarlas_folytatas"><i class="fas fa-angle-left"></i> Kosár módosítása</a>
                <a href="{{ route('rendeles')}}"><button class="btn btn-success">Rendelés</button></a><br/>
            </td>
        </tr>
    </tfoot>
</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

  
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
</script> -->
@endsection