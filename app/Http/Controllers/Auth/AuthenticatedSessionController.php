<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $role = $request->user()->role;
        $status = $request->user()->status;
        $url = '';

        if ($status === 'active') {
            switch ($role) {
                case 'admin':
                    $url = 'admin/dashboard';
                    break;
                case 'collage_registrar':
                    $url = 'collageregistrar/dashboard';
                    break;
                case 'collage_dean':
                    $url = 'collagedean/dashboard';
                    break;
                case 'department_head':
                    $url = 'departmenthead/dashboard';
                    break;
                case 'stuff':
                    $url = 'stuff/dashboard';
                    break;
                default:
                    $url = 'unauthorized'; // Optionally redirect to an unauthorized page or handle it
                    break;
            }
        }

        if (empty($url)) {
            // Redirect to a fallback page or show an error if no valid role/status is found
            return redirect('login')->withErrors(
                'Invalid role or inactive status.'
            );
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
