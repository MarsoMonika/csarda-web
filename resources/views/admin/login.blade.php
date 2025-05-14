<form method="POST" action="{{ route('admin.login.submit') }}" class="max-w-md mx-auto mt-24 p-8 bg-white rounded-2xl shadow-lg space-y-6">
    @csrf

    <h2 class="text-2xl font-bold text-center text-gray-800">Admin belépés</h2>

    <div>
        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Felhasználónév</label>
        <input type="text" id="username" name="username" placeholder="admin"
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent">
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Jelszó</label>
        <input type="password" id="password" name="password" placeholder="Admin jelszó"
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent">
    </div>

    <button type="submit"
            class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-lg transition">
        Belépés
    </button>
</form>
