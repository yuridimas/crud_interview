<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest();

        if ($request->ajax()) {

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('users.show', ['user' => $row]) . '" class="mx-2 text-warning"><i class="fas fa-eye"></i></a>';
                    $btn .= '<a href="' . route('users.edit', ['user' => $row]) . '" class="mx-2 text-info"><i class="fas fa-pencil-alt"></i></a>';
                    if ($row->is_login == false) {
                        $btn .= '<a href="#" data-id="' . $row->id . '" class="mx-2 text-danger delete-users"><i class="fas fa-trash-alt"></i></a>';
                    }

                    return $btn;
                })
                ->rawColumns([
                    'action'
                ])
                ->toJson();
        }
        return view('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();

            User::create($request->validated());

            DB::commit();

            return redirect()->route('users.index')->withSuccess('Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());

            return redirect()->back()->withErrors('Oops ada yang salah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.users.show', ['data' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.users.edit', ['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user->update($request->validated());

            DB::commit();

            return redirect()->route('users.index')->withSuccess('Data berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());

            return redirect()->back()->withErrors('Oops ada yang salah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->is_login == false) {
            $user->delete();

            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'message' => 'Data berhasil dihapus',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_NOT_FOUND,
                'message' => 'Data gagal dihapus',
            ]);
        }
    }
}
