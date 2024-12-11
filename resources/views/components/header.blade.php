<!-- resources/views/components/header.blade.php -->
<nav>
    <div class="flex h-20 px-8 justify-between items-center bg-neutral-800 border-b border-b-neutral-700">
        <ul>
            <li>
                <a href="{{ route('affiliates.index') }}" class="text-white text-2xl font-mono font-base">Afiliados</a>
            </li>
        </ul>

        <ul class="flex gap-4">

            <li class="hover:text-gray-300">
                <a href="{{ route('affiliates.index') }}" >Afiliados</a>
            </li>

            <li class="hover:text-gray-300">
                <a href="{{ route('affiliate_commissions.index') }}" >Comissões</a>
            </li>

            <li class="hover:text-gray-300">
                <a href="{{ route('users.index') }}">Usuários</a>
            </li>
        </ul>
    </div>
</nav>
