@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-darkblue-light overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-darkblue-light border-b border-gray-600">
            <h1 class="text-3xl font-bold text-white">Bienvenue sur notre Timeline</h1>
            <p class="mt-4 text-gray-300">Créez un compte, publiez des messages et aimez les messages des autres utilisateurs.</p>
            <hr class="my-4 border-gray-600">
            <p class="text-gray-400">Utilisez les boutons ci-dessous pour vous inscrire, vous connecter ou accéder à la timeline.</p>
            <div class="mt-6 flex justify-center space-x-4">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('register') }}">S'inscrire</a>
                <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('login') }}">Se connecter</a>
                <a class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" href="{{ route('timeline') }}">Timeline</a>
            </div>
        </div>
    </div>
</div>
@endsection
