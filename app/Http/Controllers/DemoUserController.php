<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DemoUserController extends Controller
{
    /**
     * Show demo users table and ensure demo users exist.
     */
    public function index(Request $request)
    {
        // Create 10 demo users if they don't already exist
        for ($i = 1; $i <= 10; $i++) {
            $email = "demo{$i}@example.com";
            User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => "Demo User {$i}",
                    'password' => bcrypt('password'),
                    'email_verified_at' => now(),
                ]
            );
        }

        $users = User::where('email', 'like', 'demo%@example.com')->get();

        return view('demo.users', compact('users'));
    }

    /**
     * Return server-side DataTables JSON for demo users.
     */
    public function data(Request $request)
    {
        $query = User::where('email', 'like', 'demo%@example.com');

        $recordsTotal = $query->count();

        // Filtering
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $recordsFiltered = $query->count();

        // Ordering
        if ($order = $request->input('order.0')) {
            $colIndex = $order['column'] ?? 0;
            $dir = $order['dir'] ?? 'desc';
            $columns = ['id', 'name', 'email', 'email_verified_at', 'created_at'];
            $colName = $columns[$colIndex] ?? 'id';
            $query->orderBy($colName, $dir);
        }

        // Pagination
        $start = (int) $request->input('start', 0);
        $length = (int) $request->input('length', 10);

        $data = $query->skip($start)->take($length)->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'verified' => $user->email_verified_at ? 'Yes' : 'No',
                'created_at' => $user->created_at->toDateTimeString(),
            ];
        });

        return response()->json([
            'draw' => (int) $request->input('draw', 0),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ]);
    }
}
