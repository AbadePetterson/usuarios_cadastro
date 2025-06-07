<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Lista todos os usuários
    public function index()
    {
        // Se o usuário logado não for admin, mostrar apenas ele mesmo
        if (!Auth::user()->is_admin) {
            $users = collect([Auth::user()]);
        } else {
            // Se for admin, mostrar todos os usuários
            $users = User::all();
        }
        
        return view('users.index', compact('users'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        return view('users.create');
    }

    // Função para validar CPF
    private function isValidCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    // Salva um novo usuário
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'cpf' => ['required', 'unique:users,cpf', 'regex:/^\d{11}$/'],
            'email' => 'required|email|unique:users,email',
            'birth_date' => 'required|date',
            'phone' => 'nullable',
            'password' => 'required|min:6',
        ], [
            'cpf.regex' => 'O CPF deve conter exatamente 11 dígitos numéricos.',
            'email.email' => 'O e-mail informado não é válido.'
        ]);
        if (!$this->isValidCPF($validated['cpf'])) {
            return back()->withErrors(['cpf' => 'O CPF informado não é válido.'])->withInput();
        }
        $validated['password'] = Hash::make($validated['password']);
        $validated['is_admin'] = false; // Novos usuários não são admin por padrão
        User::create($validated);
        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        // Verificar se o usuário logado pode editar este usuário
        if (!Auth::user()->is_admin && Auth::id() !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Você não tem permissão para editar outros usuários.');
        }
        
        // Usuários não-admin não podem editar usuários admin
        if (!Auth::user()->is_admin && $user->is_admin) {
            return redirect()->route('users.index')->with('error', 'Você não tem permissão para editar este usuário.');
        }
        
        return view('users.edit', compact('user'));
    }

    // Atualiza um usuário
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Verificar se o usuário logado pode atualizar este usuário
        if (!Auth::user()->is_admin && Auth::id() !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Você não tem permissão para atualizar outros usuários.');
        }
        
        // Usuários não-admin não podem atualizar usuários admin
        if (!Auth::user()->is_admin && $user->is_admin) {
            return redirect()->route('users.index')->with('error', 'Você não tem permissão para atualizar este usuário.');
        }
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'birth_date' => 'required|date',
            'phone' => 'nullable',
            'password' => 'nullable|min:6',
            'cpf' => ['sometimes', 'regex:/^\d{11}$/'],
        ], [
            'cpf.regex' => 'O CPF deve conter exatamente 11 dígitos numéricos.',
            'email.email' => 'O e-mail informado não é válido.'
        ]);
        if (isset($validated['cpf']) && !$this->isValidCPF($validated['cpf'])) {
            return back()->withErrors(['cpf' => 'O CPF informado não é válido.'])->withInput();
        }
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Exclui um usuário
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Não permitir excluir o próprio usuário
        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')->with('error', 'Você não pode excluir sua própria conta.');
        }
        
        // Apenas admins podem excluir outros usuários
        if (!Auth::user()->is_admin) {
            return redirect()->route('users.index')->with('error', 'Você não tem permissão para excluir usuários.');
        }
        
        // Não permitir excluir usuários admin
        if ($user->is_admin) {
            return redirect()->route('users.index')->with('error', 'Usuários administradores não podem ser excluídos.');
        }
        
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
