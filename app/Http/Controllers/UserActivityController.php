<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserActivity;

class UserActivityController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'berat_badan' => 'required|numeric',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required'
        ]);

        $activeSession = UserActivity::whereIn('status', ['waiting', 'running'])->first();

        if ($activeSession) {
            return redirect('/')
                ->with('error', 'Masih ada sesi yang sedang berjalan atau menunggu.');
        }

        $session = UserActivity::create([
            'nama' => $request->nama,
            'berat_badan' => $request->berat_badan,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => 'waiting'
        ]);

        return redirect('/dashboard/' . $session->id);
    }

    public function dashboard($id)
{
    $data = UserActivity::findOrFail($id);

    $history = UserActivity::where('status','finished')
                ->latest()
                ->take(10)
                ->get();

    return view('dashboard', compact('data','history'));
}

    public function getWaitingSession()
    {
        $session = UserActivity::where('status', 'waiting')->first();

        if (!$session) {
            return response()->json([
                'session_id' => null
            ]);
        }

        return response()->json([
            'session_id' => $session->id
        ]);
    }

    public function getSession($id)
    {
        $session = UserActivity::findOrFail($id);
        return response()->json($session);
    }

    /* START SESSION (tombol start alat) */
    public function startSession($id)
    {
    $session = UserActivity::findOrFail($id);

    $session->status = 'running';
    $session->save();

    return response()->json([
        'message' => 'Session started'
        ]);
    }

    /* UPDATE DATA SENSOR */
    public function updateSession(Request $request, $id)
    {
    $session = UserActivity::findOrFail($id);

    $session->denyut_jantung = $request->denyut_jantung;
    $session->kalori_terbakar = $request->kalori_terbakar;
    $session->durasi = $request->durasi;
    $session->jenis_aktivitas = $request->jenis_aktivitas;

    $session->save();

    return response()->json([
        'message' => 'Session updated'
        ]);
    }

    /* FINISH SESSION (tombol stop alat) */
    public function finishSession($id)
    {
    $session = UserActivity::findOrFail($id);

    $session->status = 'finished';
    $session->save();

    return response()->json([
        'message' => 'Session finished'
        ]);
    }

    public function restartSession($id)
    {
    $session = UserActivity::findOrFail($id);

    $session->update([
        'jenis_aktivitas' => null,
        'denyut_jantung' => null,
        'kalori_terbakar' => null,
        'durasi' => null,
        'status' => 'waiting'
        ]);

    return response()->json([
        'message' => 'Session restarted'
        ]);
    }
}