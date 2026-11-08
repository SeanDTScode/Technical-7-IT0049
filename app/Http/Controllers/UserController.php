<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('username')->get();

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username',
            ],
            'full_name' => ['required', 'string', 'max:100'],
        ]);

        $validated['created_at'] = now();

        User::create($validated);

        return to_route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user),
            ],
            'full_name' => ['required', 'string', 'max:100'],
            'avatar'    => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        unset($validated['avatar']);

        if ($request->hasFile('avatar')) {
            $upload = $request->file('avatar');

            $filename = Str::uuid() . '.jpg';
            $path = 'avatars/' . $filename;

            $preparedImage = Image::read($upload)
                ->cover(300, 300)
                ->toJpeg(quality: 85);

            $stored = Storage::disk('public')->put(
                $path,
                (string) $preparedImage
            );

            if (!$stored) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'avatar' => 'The avatar could not be stored.',
                    ]);
            }

            $oldAvatar = $user->avatar;
            $validated['avatar'] = $path;

            $user->update($validated);

            if ($oldAvatar) {
                Storage::disk('public')->delete($oldAvatar);
            }
        } else {
            $user->update($validated);
        }

        return to_route('users.index')
            ->with('success', 'User updated successfully.');
    }
}