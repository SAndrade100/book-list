<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    /**
     * Construtor para garantir autenticação
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra o perfil do usuário
     */
    public function show()
    {
        return view('profile.show');
    }

    /**
     * Mostra o formulário de edição do perfil
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Atualiza o perfil do usuário
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;
        }
        
        $user->update($validated);
        
        return redirect()->route('profile.show')->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Mostra o formulário para alterar a senha
     */
    public function editPassword()
    {
        return view('profile.edit-password');
    }

    /**
     * Atualiza a senha do usuário
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        
        return redirect()->route('profile.show')->with('success', 'Senha alterada com sucesso!');
    }
}