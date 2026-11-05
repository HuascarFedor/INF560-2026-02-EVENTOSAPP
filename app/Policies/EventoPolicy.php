<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventoPolicy
{
    /*
    public function before(User $user, string $ability): ?bool
    {
        return $user->esAdmin() ? true : null;
    }
    */
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Evento $evento): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->esAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Evento $evento): bool
    {
        return $user->id === (int) $evento->user_id; // solo el dueño
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Evento $evento): bool
    {
        return $user->id === (int) $evento->user_id; // solo el dueño
    }
}
