<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::withCount('order as total_orders')
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('backend.user.index', compact('users'));
    }


    public function create(): View
    {
        return view('backend.user.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'isAdmin' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['isAdmin'] = $request->has('isAdmin') ? 1 : 0;

        User::create($validated);

        return redirect()->route('backend.user.index')->with('success', 'User created successfully.');
    }


    public function show(User $user): View
    {
        $user->load([
            'order' => function ($query) {
                $query->latest()->with('products');
            }
        ]);

        return view('backend.user.show', compact('user'));
    }


    public function edit(User $user): View
    {
        return view('backend.user.edit', compact('user'));
    }


    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'isAdmin' => 'boolean',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['isAdmin'] = $request->has('isAdmin') ? 1 : 0;

        $user->update($validated);

        return redirect()->route('backend.user.index', $user)->with('success', 'User updated successfully.');
    }


    public function destroy(User $user): RedirectResponse
    {
        if ($user->order()->exists()) {
            return redirect()->route('backend.user.index')->with('error', 'Cannot delete user with existing orders.');
        }

        $user->delete();

        return redirect()->route('backend.user.index')->with('success', 'User deleted successfully.');
    }
}