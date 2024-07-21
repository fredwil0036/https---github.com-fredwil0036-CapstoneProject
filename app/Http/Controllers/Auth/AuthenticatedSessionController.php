<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User; 

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.designlogin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Determine the dashboard route based on usertype
        $dashboardRoute = $this->redirectToDashboard();

        return redirect($dashboardRoute);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $offline = Auth::user();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $this->setUserOffline($offline);

        return redirect('/');
    }
    protected function setUserOnline(User $useronline): void
    {
        $useronline->is_online = true;
        $useronline->save();
    }
    protected function setUserOffline(User $useroffline): void
    {
        $useroffline->is_online = false;
        $useroffline->save();
    }
    protected function redirectToDashboard(): string
    {
        if (Auth::user()->usertype === 'admin') {
            return '/admin/dashboard';
        } elseif (Auth::user()->usertype === 'user') {
            return '/staff/dashboard';
        }

        // Default fallback if usertype is not recognized
        return '/';
    }
}
