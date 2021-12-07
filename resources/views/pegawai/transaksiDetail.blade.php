<table class="table table-striped">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Kuantitas</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $p)
            <tr>
                <td><img src="{{ asset('images/produk/'.$p->foto.'') }}" alt="" class="w-100"></td>
                <td>{{$p->nama}}</td>
                <td>{{$p->pivot->kuantitas}}</td>
                <td>{{$p->pivot->harga}}</td>
            </tr>
        @endforeach
    </tbody>
</table>