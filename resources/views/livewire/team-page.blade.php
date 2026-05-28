<div class="p-6">

    {{-- TEAM HEADER --}}
    <h1 class="text-2xl font-bold">
        {{ $team->name }}
    </h1>

    <p class="text-gray-600 mb-4">
        Division: {{ $team->division }}
    </p>

    {{-- PLAYERS LIST --}}
    <h2 class="text-xl font-semibold mb-2">
        Players
    </h2>

    <div class="space-y-2">

        @forelse($players as $player)

            <div class="border p-2 rounded flex justify-between">
                <span>{{ $player->name }}</span>
                <span class="text-gray-500">
                    {{ $player->position }}
                </span>
            </div>

        @empty

            <p class="text-gray-500">
                No players on this team yet.
            </p>

        @endforelse

    </div>

</div>
