<?php

namespace App\Policies;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LivroPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Livro $livro): bool
    {
        return $user->id === $livro->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Livro $livro): bool
    {
        return $user->id === $livro->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Livro $livro): bool
    {
        return $user->id === $livro->user_id;
    }
}