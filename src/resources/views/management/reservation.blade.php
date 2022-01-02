<x-layout>
    <x-slot name="title">
        Reservation page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        <table class="owner-reservation-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>予約者名</th>
                    <th>店舗名</th>
                    <th>予約時間</th>
                    <th>予約人数</th>
                </tr>
            </thead>
            @isset ($reservations)

            @foreach ($reservations as $reservation)
            <tbody>
                <tr>
                    <td>{{ $reservation->date}}</td>
                    <td>{{ $reservation->user->name}}</td>
                    <td>{{ $reservation->restaurant->name}}</td>
                    <td>{{ $reservation->time}}</td>
                    <td>{{ $reservation->number}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endisset
    </main>
</x-layout>
