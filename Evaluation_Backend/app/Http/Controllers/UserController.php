<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Dotenv\Exception\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function update(Request $request, User $user)
    {
        try {
            $updateValidate =   $request->validate([
                'name' => ['string', 'min:6', 'max:255'],
                'email' => ['string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => [Rules\Password::defaults()],
            ]);

            if (isset($updateValidate['password'])) {
                $updateValidate['password'] = Hash::make($request->string('password'));
            }

            $user->update($updateValidate);
            return $user;
        } catch (ValidationException $error) {

            return response()->json([
                'success' => false,
                'error' => $error->getMessage(),
            ], 401);
        } catch (Exception $error) {

            return response()->json([
                'success' => false,
                'error' => $error->getMessage(),
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        return $user->delete();
        return response()->json(['success' => false, 'message' => 'User deleted']);
    }
}
