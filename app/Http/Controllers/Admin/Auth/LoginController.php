protected function attemptLogin(Request $request)
{
    return Auth::guard('admin')->attempt([
        'username' => $request->username,
        'password' => $request->password
    ], $request->filled('remember'));
}