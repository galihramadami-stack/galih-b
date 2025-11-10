<?php
namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $data = Biodata::orderBy('created_at', 'desc')->get();

        return view('biodata.index', compact('data'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required',
            'tgl_lahir'    => 'required|date',
            'jk'           => 'required',
            'agama'        => 'required',
            'alamat'       => 'required',
            'tinggi_badan' => 'required|integer',
            'berat_badan'  => 'required|integer',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $input['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Biodata::create($input);

        return redirect()->route('biodata.index')->with('pesan', 'Data berhasil disimpan.');
    }

    public function edit(Biodata $biodata)
    {
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, Biodata $biodata)
    {
        $request->validate([
            'nama'         => 'required',
            'tgl_lahir'    => 'required|date',
            'jk'           => 'required',
            'agama'        => 'required',
            'alamat'       => 'required',
            'tinggi_badan' => 'required|integer',
            'berat_badan'  => 'required|integer',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $biodata->update($data);

        return redirect()->route('biodata.index')->with('pesan', 'Data berhasil diperbarui.');
    }

    public function destroy(Biodata $biodata)
    {
        if ($biodata->foto) {
            Storage::disk('public')->delete($biodata->foto);
        }

        $biodata->delete();

        return redirect()->route('biodata.index')->with('pesan', 'Data berhasil dihapus.');
    }
}

