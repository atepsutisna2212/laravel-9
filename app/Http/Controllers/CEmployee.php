<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\MEmployee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CEmployee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    public function getData(Request $request)
    {
        $start = (int) $request->input('start');  // Convert to integer
        $length = (int) $request->input('length'); // Convert to integer
        $search = $request->input('search');
        $searchNip = $request->input('searchNip');
        $searchNamaKaryawan = $request->input('searchNamaKaryawan');
        $searchJabatan = $request->input('searchJabatan');
        // dd($request->all());
        $query = MEmployee::query();
        if ($searchNip) {
            $query->where('nip', 'like', '%' . $searchNip . '%');
        }

        if ($searchNamaKaryawan) {
            $query->where('nama_karyawan', 'like', '%' . $searchNamaKaryawan . '%');
        }

        if ($searchJabatan) {
            $query->where('jabatan', 'like', '%' . $searchJabatan . '%');
        }

        $totalCount = $query->count();

        // Fetch the data with pagination
        $data = $query->skip($start)->take($length)->get();
        return response()->json([
            'data' => $data,
            'countData' => $totalCount,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function getValid(Request $request, $id = 0)
    {
        // dd($request);
        $cek = Validator::make($request->all(), [
            'nip' => 'required|unique:tb_karyawan,nip,' . $id . ',id_karyawan',
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required|email|unique:tb_karyawan,email,' . $id . ',id_karyawan',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($cek->fails()) {
            return [
                'result' => true,
                "message" => $cek->errors()
            ];
        }
        return [
            'result' => false,
            'message' => ""
        ];
    }
    public function store(Request $request)
    {
        try {
            $file = $request->file('foto');
            $namaFile = "";
            if ($file) {
                // Dapatkan ekstensi file
                $extension = $file->getClientOriginalExtension();
                // Buat nama file acak
                $randomName = Str::random(10) . '.' . $extension;
                // Simpan gambar di folder 'employee' dengan nama acak
                $path = $file->storeAs('public/employee', $randomName);
                $namaFile = "storage/employee/" . $randomName;
            }
            $cek = $this->getValid($request);
            if ($cek['result']) {
                return response()->json([
                    'result' => false,
                    'message' => "Invalid input :",
                    'errors' => $cek['message']
                ]);
            }

            $data = [
                'nip' => $request->input('nip'),
                'nama_karyawan' => $request->input('nama_karyawan'),
                'jabatan' => $request->input('jabatan'),
                'alamat' => $request->input('alamat'),
                'telp' => $request->input('telp'),
                'email' => $request->input('email'),
                'foto' => $namaFile,
                'created_by' => "sys",
                'created_at' => now(),
            ];
            $employee = MEmployee::create($data);
            return response()->json([
                "result" => true,
                "message" => "Data berhasil ditambah",
                'data' => $employee
            ]);
        } catch (Exception $ex) {
            return response()->json([
                "result" => false,
                "message" => $ex->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MEmployee $employee)
    {
        // dd($employee->nama_karyawan);
        return view('employee.detail', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MEmployee $employee)
    {
        try {
            // dd($request->all());
            $file = $request->file('foto');
            $namaFile = $employee->foto;
            if ($file) {
                $extension = $file->getClientOriginalExtension();
                $randomName = Str::random(10) . '.' . $extension;
                $path = $file->storeAs('public/employee', $randomName);
                $namaFile = "storage/employee/" . $randomName;
                if ($employee->foto && Storage::exists(str_replace('storage/', 'public/', $employee->foto))) {
                    Storage::delete(str_replace('storage/', 'public/', $employee->foto));
                }
            }
            $cek = $this->getValid($request, $employee->id_karyawan);
            if ($cek['result']) {
                return response()->json([
                    'result' => false,
                    'message' => "Invalid input :",
                    'errors' => $cek['message']
                ]);
            }
            $data = [
                'nip' => $request->input('nip'),
                'nama_karyawan' => $request->input('nama_karyawan'),
                'jabatan' => $request->input('jabatan'),
                'alamat' => $request->input('alamat'),
                'telp' => $request->input('telp'),
                'email' => $request->input('email'),
                'foto' => $namaFile,
                'created_by' => "sys",
                'created_at' => now(),
            ];
            $employee = MEmployee::where('id_karyawan', $employee->id_karyawan)->update($data);
            return response()->json([
                "result" => true,
                "message" => "Data berhasil diupdate",
                'data' => $employee
            ]);
        } catch (Exception $ex) {
            dd($ex);
            return response()->json([
                "result" => false,
                "message" => $ex->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MEmployee $employee)
    {
        try {
            $data = MEmployee::destroy($employee->id_karyawan);
            if ($employee->foto) {
                if ($employee->foto && Storage::exists(str_replace('storage/', 'public/', $employee->foto))) {
                    Storage::delete(str_replace('storage/', 'public/', $employee->foto));
                }
            }
            return response()->json([
                "result" => true,
                "message" => "Data berhasil dihapus",
            ]);
        } catch (Exception $ex) {
            return response()->json([
                "result" => false,
                "message" => $ex->getMessage()
            ]);
        }
    }
}
