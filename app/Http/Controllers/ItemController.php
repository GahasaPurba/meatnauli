<?php

namespace App\Http\Controllers;

use App\Item;
use App\SouvenirCategory;
use App\Exports\ItemsExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (FacadesAuth::user()->role == 'Administrator') {
            $items = Item::paginate(5);
        } else if (FacadesAuth::user()->role == 'Seller') {
            $items = Item::where('user_id', FacadesAuth::user()->id)->paginate(5);
        }
        return view('backend.souvenir.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SouvenirCategory::all();
        return view('backend.souvenir.item.create', compact('categories',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'souvenir_category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'description' => 'required',
            'productphoto' => 'required|image',
        ];

        $messages = [
            'souvenir_category_id.required' => 'Pilih Salah Satu Kategori Item',
            'name.required' => 'Nama Item Tidak Boleh Kosong',
            'price.required' => 'Harga Item Tidak Boleh Kosong',
            'stock.required' => 'Stok Item Tidak Boleh Kosong',
            'weight.required' => 'Berat Item Tidak Boleh Kosong',
            'description.required' => 'Deskripsi Item Tidak Boleh Kosong',
            'productphoto.required' => 'Foto Item Tidak Boleh Kosong',
            'productphoto.image' => 'Foto Item Harus Berformat Image (jpeg, jpg, png, bmp, gif, svg, atau webp)',
        ];

        $request->validate($rules, $messages);

        $productphoto = $request->productphoto;
        $new_productphoto = time() . $productphoto->getClientOriginalName();
        $productphoto->move('upload/productphoto/', $new_productphoto);

        Item::create([
            'souvenir_category_id' => $request->souvenir_category_id,
            'user_id' => FacadesAuth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'productphoto' => $new_productphoto,
        ]);

        return redirect('/item')->with('success', 'Item Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = SouvenirCategory::all();
        $items = Item::findorfail($id);
        return view('backend.souvenir.item.edit', compact('items', 'categories',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('productphoto')) {
            $rules = [
                'souvenir_category_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'weight' => 'required',
                'description' => 'required',
                'productphoto' => 'image',
            ];

            $messages = [
                'souvenir_category_id.required' => 'Pilih Salah Satu Kategori Item',
                'name.required' => 'Nama Item Tidak Boleh Kosong',
                'price.required' => 'Harga Item Tidak Boleh Kosong',
                'stock.required' => 'Stok Item Tidak Boleh Kosong',
                'weight.required' => 'Berat Item Tidak Boleh Kosong',
                'description.required' => 'Deskripsi Item Tidak Boleh Kosong',
                'productphoto.image' => 'Foto Item Harus Berformat Image (jpeg, jpg, png, bmp, gif, svg, atau webp)',
            ];
        } else {
            $rules = [
                'souvenir_category_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'weight' => 'required',
                'description' => 'required',
            ];

            $messages = [
                'souvenir_category_id.required' => 'Pilih Salah Satu Kategori Item',
                'name.required' => 'Nama Item Tidak Boleh Kosong',
                'price.required' => 'Harga Item Tidak Boleh Kosong',
                'stock.required' => 'Stok Item Tidak Boleh Kosong',
                'weight.required' => 'Berat Item Tidak Boleh Kosong',
                'description.required' => 'Deskripsi Item Tidak Boleh Kosong',
            ];
        }

        $request->validate($rules, $messages);

        $items = Item::findorfail($id);

        if ($request->hasFile('productphoto')) {
            $productphoto = $request->productphoto;
            $new_productphoto = time() . $productphoto->getClientOriginalName();
            $productphoto->move('upload/productphoto/', $new_productphoto);

            $item_data = [
                'souvenir_category_id' => $request->souvenir_category_id,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'weight' => $request->weight,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'productphoto' => $new_productphoto,
            ];
        } else {
            $item_data = [
                'souvenir_category_id' => $request->souvenir_category_id,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'weight' => $request->weight,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
            ];
        }

        $items->update($item_data);

        return redirect('/item')->with('success', 'Item Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findorfail($id);
        $items->delete();

        if (FacadesAuth::user()->role == 'Administrator') {
            return redirect('/item')->with('success', 'Item Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
        } else if (FacadesAuth::user()->role == 'Seller') {
            return redirect('/item')->with('success', 'Item Berhasil Dihapus !');
        }
    }

    public function search(Request $request)
    {
        $items = Item::where('name', $request->search)->orWhere('name', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.souvenir.item.index', compact('items'));
    }

    public function excel()
    {
        return Excel::download(new ItemsExport, 'ListItem.xlsx');
    }

    public function pdf()
    {
        $items = Item::all();

        $pdf = PDF::loadView('backend.souvenir.item.pdf', compact('items'));
        return $pdf->download('ListItem.pdf');
    }

    public function trash()
    {
        $items = Item::onlyTrashed()->paginate(5);
        return view('backend.souvenir.item.trash', compact('items'));
    }

    public function restore($id)
    {
        $items = Item::withTrashed()->where('id', $id)->first();
        $items->restore();

        return redirect()->back()->with('success', 'Item Berhasil Direstore !');
    }

    public function kill($id)
    {
        $items = Item::withTrashed()->where('id', $id)->first();
        $items->forceDelete();
        Storage::delete($items->productphoto);

        return redirect()->back()->with('success', 'Item Berhasil Dihapus Permanen !');
    }
}
