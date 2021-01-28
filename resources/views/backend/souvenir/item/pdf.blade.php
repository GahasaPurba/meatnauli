<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <img alt="Logo MeatNauli" width="300" src="{{ public_path('frontend/images/icons/logo-01.jpg') }}">
    <br><br>
    <p><b>LIST ITEM</b></p>
    <p>Update : {{ date('d-m-Y') }}</p>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Harga (Rp)</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Berat (gr)</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Penjual</th>
                <th class="text-center">Foto Item</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item => $result)
            <tr>
                <th class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $result->name }}</td>
                <td class="text-center">{{ $result->price }}</td>
                <td class="text-center">{{ $result->stock }}</td>
                <td class="text-center">{{ $result->weight }}</td>
                <td>{{ $result->souvenir_category->name }}</td>
                <td>{{ $result->user->name }}</td>
                <td class="text-center">
                    <img alt="Product Photo" class="rounded" width="100" src="{{ public_path('upload/productphoto/' . $result->productphoto) }}">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
